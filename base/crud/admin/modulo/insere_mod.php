<?php
    $nome          = $_POST["nome_mod"];
    $curso              = $_POST["curso"];
    $descricao         = $_POST["desc_mod"];
  
   

    $sql1 = "insert into modulo values ";
    $sql1 .= "(0, '".$nome."', '".$descricao."', '".$curso."', NOW(), NULL);";
    $res1 = mysqli_query($con, $sql1)or die(mysqli_error());

    if($res1){
        header('Location: \tcc/plataforma.php?content_adm=lista_mod&msg=13');
        mysqli_close($con);
    }else{
        header('Location: \tcc/plataforma.php?content_adm=lista_mod&msg=6');
        mysqli_close($con);
    }
?>