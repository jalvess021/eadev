<?php
    include "base/crud/atv_usu/atv.php";
    $id_usuario = $_SESSION['UsuarioID'];
    $queryUsu = mysqli_query($con, "SELECT nome from usuario where id_usu = '".$_SESSION['UsuarioID']."';");
    $resUsuq = mysqli_fetch_array($queryUsu);
    $usuario = $resUsuq[0];

    $id_aula           = $_POST["id_aula"];
    $aula              = $_POST["tit_aula"];
    $descricao         = $_POST["desc_aula"];
    $id_video           = substr($_POST["id_video"], 17);
    $modulo            = $_POST['modulo'];
    $start                = $_POST['start'];
    $end                  = $_POST['end'];

    $sql = "update aula set ";
    $sql .= "id_video='".$id_video."', tit_aula='".$aula."', desc_aula='".$descricao."', start_aula='".$start."', end_aula='".$end."', dt_alteracao=NOW(), id_mod='".$modulo."' ";
    $sql .= "where id_aula='".$id_aula."';";

    $resultado = mysqli_query($con, $sql)or die(mysqli_error());

    if($resultado){
        $usu_atv = mysqli_query($con, atvAdm($usuario, str_replace( array("'"), "\'", $sql), $id_usuario));
        if ($usu_atv) {
            // Redirecionamento usando JavaScript
            echo "<script>window.location.href = '/eadev/plataforma.php?content_adm=lista_aula&msg=11';</script>";
            mysqli_close($con);
        }else{
            echo "<script>window.location.href = '/eadev/plataforma.php?content_adm=lista_aula&msg=6';</script>";
            mysqli_close($con);
        }
    }
?>
