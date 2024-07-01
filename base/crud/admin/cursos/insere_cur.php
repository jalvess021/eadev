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
        /*$extensao = strtolower(substr($_FILES['imagem']['name'], -4));
        if ($extensao == 'jpeg') {
            $extensao = strtolower(substr($_FILES['imagem']['name'], -5));
        } */
        //criptografa a sigla/id
        $novoNome = md5($info1[0]).".jpeg";
        $diretorio = 'imagens/';
        $path   = dirname(__FILE__).'/'.$diretorio.$novoNome;
        $upload = move_uploaded_file($_FILES['imagem']['tmp_name'], $path);

        $sql4 = "insert into avaliacoes SELECT 0, a.id_aluno, u.nome, 1, 0, NULL, 1, ".$info1['id_curso'].", NULL  
        FROM aluno AS a INNER JOIN usuario AS u ON a.id_usu = u.id_usu ORDER BY id_aluno asc;";
        $res4 = mysqli_query($con, $sql4); 

       // $res5 = mysqli_query($con, "insert into pagamento SELECT 0, NULL, NULL, 0, NULL, NULL, ".mysqli_insert_id($con).";");

    if($res1 && $res2 && $res3 && $upload && $res4){
            
                $usu_atv1 = mysqli_query($con, atvAdm($usuario, str_replace( array("'"), "\'", $sql1), $id_usuario));
                if ($usu_atv1) {
                    echo "<script>window.location.href = '/eadev/plataforma.php?content_adm=lista_cur&msg=7';</script>";
                    mysqli_close($con);
                }else{
                    echo "<script>window.location.href = '/eadev/plataforma.php?content_adm=lista_cur&msg=6';</script>";
                    mysqli_close($con);
                }
                
    }
?>