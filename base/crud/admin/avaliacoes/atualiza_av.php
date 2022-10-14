<?php

    include "base/crud/atv_usu/atv.php";
    $id_usuario = $_SESSION['UsuarioID'];
    $queryUsu = mysqli_query($con, "SELECT nome from usuario where id_usu = '".$_SESSION['UsuarioID']."';");
    $resUsuq = mysqli_fetch_array($queryUsu);
    $usuario = $resUsuq[0];

    $id_quest           = $_POST["id_quest"];
    $dificuldade    = $_POST['dificuldade']; 
    $enunciado      = $_POST['enunciado'];
    $c              = $_POST['correta'];
    $i1             = $_POST['incorreta1'];
    $i2             = $_POST['incorreta2'];
    $modulo          = $_POST["modulo"];

    // Pontuando a questão por dificuldade
    switch ($dificuldade) {
        case 1:
            $valor = 0.3;
            break;
        case 2:
            $valor = 0.6;
            break;
        case 3:
            $valor = 0.8;
            break;
    }

    $sql = "update questoes set enunciado_quest='".$enunciado."', grau_dificuldade='".$dificuldade."', pont_quest='".$valor."', opc_certa='".$c."', opc_errada1='".$i1."', opc_errada2='".$i2."', dt_alteracao=NOW(), id_mod='".$modulo."' where id_quest='".$id_quest."';";
    $res = mysqli_query($con, $sql);

    if($res){

        $usu_atv = mysqli_query($con, atvAdm($usuario, str_replace( array("'"), "\'", $sql), $id_usuario));
        if ($usu_atv) {
            header('Location: \tcc/plataforma.php?content_adm=lista_av&msg=17');
            mysqli_close($con);
        }else{
            header('Location: \tcc/plataforma.php?content_adm=lista_av&msg=6');
            mysqli_close($con);
        }
    } 


?>