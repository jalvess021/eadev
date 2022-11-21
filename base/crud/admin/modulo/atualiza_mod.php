<?php
    
    include "base/crud/atv_usu/atv.php";
    $id_usuario = $_SESSION['UsuarioID'];
    $queryUsu = mysqli_query($con, "SELECT nome from usuario where id_usu = '".$_SESSION['UsuarioID']."';");
    $resUsuq = mysqli_fetch_array($queryUsu);
    $usuario = $resUsuq[0];

  $formacao            = $_POST['formacao'];
  $id_mod           =  $_POST['id_mod'];
  $modulo           = $_POST['tipo_mod'];
  $curso              = $_POST["curso"];
  $descricao         = $_POST["desc_mod"];
   

    $sql = "update modulo set ";
    $sql .= "tipo_mod='".$modulo."', desc_mod='".$descricao."', id_curso='".$curso."', dt_alteracao=NOW() ";
    $sql .= "where id_mod='".$id_mod."';";
    $res = mysqli_query($con, $sql)or die(mysqli_error());

    if($res){
        
    $usu_atv = mysqli_query($con, atvAdm($usuario, str_replace( array("'"), "\'", $sql), $id_usuario));
        if ($usu_atv) {
            header('Location: \tcc/plataforma.php?content_adm=lista_mod&msg=14');
            mysqli_close($con);
        }else{
            header('Location: \tcc/plataforma.php?content_adm=lista_mod&msg=6');
            mysqli_close($con);
        }
        
    }

?>