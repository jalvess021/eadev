<?php
    
    $curso              = $_POST["nome_curso"];
    $sigla              = $_POST['sigla_curso'];
    $descricao         = $_POST["desc_curso"];
    $formacao           = $_POST["formacao"];
  
   

    $sql1 = "insert into curso values ";
    $sql1 .= "(0, '".$curso."', '".$sigla."', '".$descricao."', NOW(), NULL, '".$formacao."');";
    $res1 = mysqli_query($con, $sql1)or die(mysqli_error());

    $sql2   = "select id_curso from curso where nome_curso = '". $curso ."';";
    $res2   = mysqli_query($con, $sql2)or die(mysqli_error());
    $info1  = mysqli_fetch_array($res2);

    $sql3 = "insert into for_cur values ";
    $sql3 .="(0, ". $info1[0] .", ". $formacao .");";
    $res3 = mysqli_query($con, $sql3) or die(mysqli_error());

    if($res1 && $res2 && $res3){
        header('Location: \tcc/plataforma.php?content_adm=lista_cur&msg=7');
        mysqli_close($con);
    }else{
        header('Location: \tcc/plataforma.php?content_adm=lista_cur&msg=6');
        mysqli_close($con);
    }
?>