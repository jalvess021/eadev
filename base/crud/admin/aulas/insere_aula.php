<?php
    include "base/crud/atv_usu/atv.php";
    $id_usuario = $_SESSION['UsuarioID'];
    $queryUsu = mysqli_query($con, "SELECT nome from usuario where id_usu = '".$_SESSION['UsuarioID']."';");
    $resUsuq = mysqli_fetch_array($queryUsu);
    $usuario = $resUsuq[0];

    $id_video           = substr($_POST['id_video'], 17);
    $aula              = $_POST["tit_aula"];
    $descricao         = $_POST["desc_aula"];
    $modulo          = $_POST["modulo"];
    $start                = $_POST['start'];
    $end                  = $_POST['end'];
      
   

    $sql = "insert into aula values ";
    $sql .= "(0, '".$id_video."', '".$aula."', '".$descricao."', '".$start."', '".$end."', NOW(), NULL, '".$modulo."');";

    $resultado = mysqli_query($con, $sql)or die(mysqli_error());
    $res1 = mysqli_query($con, "SELECT * from aula where id_video = '".$id_video."';");
    $row1 = mysqli_fetch_array($res1);

    
    if($resultado){

        $mix = 'insert into aula_alu SELECT 0, a.id_aluno, '.$row1[0].', 1, NULL from aluno AS a ORDER BY a.id_aluno;';
        $res2 = mysqli_query($con, $mix); 
        
        $usu_atv = mysqli_query($con, atvAdm($usuario, str_replace( array("'"), "\'", $sql), $id_usuario));
        if ($usu_atv) {
            header('Location: \eadev/plataforma.php?content_adm=lista_aula&msg=10');
            mysqli_close($con);
        }else{
            header('Location: \eadev/plataforma.php?content_adm=lista_aula&msg=6');
            mysqli_close($con);
        }
        
    } 
?>