<?php

    include "base/crud/atv_usu/atv.php";
    $id_usuario = $_SESSION['UsuarioID'];
    $queryUsu = mysqli_query($con, "SELECT nome from usuario where id_usu = '".$_SESSION['UsuarioID']."';");
    $resUsuq = mysqli_fetch_array($queryUsu);
    $usuario = $resUsuq[0];
    
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

        //imagem do curso
        $extensao = strtolower(substr($_FILES['imagem']['name'], -4));
        if ($extensao == 'jpeg') {
            $extensao = strtolower(substr($_FILES['imagem']['name'], -5));
        }
        //criptografa a sigla/id
        $novoNome = md5($sigla.$info1[0]).$extensao;
        $diretorio = 'imagens/';
        $path   = dirname(__FILE__).'/'.$diretorio.$novoNome;
        $upload = move_uploaded_file($_FILES['imagem']['tmp_name'], $path);

    if($res1 && $res2 && $res3 && $upload){
            
                $usu_atv1 = mysqli_query($con, atvAdm($usuario, str_replace( array("'"), "\'", $sql1), $id_usuario));
                if ($usu_atv1) {
                    header('Location: \tcc/plataforma.php?content_adm=lista_cur&msg=7');
                    mysqli_close($con);
                }else{
                    header('Location: \tcc/plataforma.php?content_adm=lista_cur&msg=6');
                    mysqli_close($con);
                }
                
    }
?>