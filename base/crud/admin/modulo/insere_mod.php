<?php
     include "base/crud/atv_usu/atv.php";
     $id_usuario = $_SESSION['UsuarioID'];
     $queryUsu = mysqli_query($con, "SELECT nome from usuario where id_usu = '".$_SESSION['UsuarioID']."';");
    $resUsuq = mysqli_fetch_array($queryUsu);
    $usuario = $resUsuq[0];

    $nome          = $_POST["nome_mod"];
    $curso              = $_POST["curso"];
    $descricao         = $_POST["desc_mod"];
  
   

    $sql1 = "insert into modulo values ";
    $sql1 .= "(0, '".$nome."', '".$descricao."', '".$curso."', NOW(), NULL);";
    $res1 = mysqli_query($con, $sql1)or die(mysqli_error());
    if($res1){
        
        $usu_atv = mysqli_query($con, atvAdm($usuario, str_replace( array("'"), "\'", $sql1), $id_usuario));
        if ($usu_atv) {
            header('Location: \tcc/plataforma.php?content_adm=lista_mod&msg=13');
            mysqli_close($con);
        }else{
            header('Location: \tcc/plataforma.php?content_adm=lista_mod&msg=6');
            mysqli_close($con);
        }
       
    }
?>