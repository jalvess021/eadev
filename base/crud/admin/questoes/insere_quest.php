<?php
    include "base/crud/atv_usu/atv.php";
    $id_usuario = $_SESSION['UsuarioID'];
    $queryUsu = mysqli_query($con, "SELECT nome from usuario where id_usu = '".$_SESSION['UsuarioID']."';");
    $resUsuq = mysqli_fetch_array($queryUsu);
    $usuario = $resUsuq[0];

    $dificuldade    = $_POST['dificuldade']; 
    $enunciado      = $_POST['enunciado'];
    $c              = $_POST['correta'];
    $i1             = $_POST['incorreta1'];
    $i2             = $_POST['incorreta2'];
    $curso            = $_POST['curso'];
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


    $sql = "insert into questoes values ";
    $sql .= "(0, '".$enunciado."', '".$dificuldade."', '".$valor."', '".$c."', '$i1', '$i2', NOW(), NULL, '".$modulo."');";
    $res = mysqli_query($con, $sql)or die(mysqli_error());
 
    if($res){

            $usu_atv = mysqli_query($con, atvAdm($usuario, str_replace( array("'"), "\'", $sql), $id_usuario));
            if ($usu_atv) {
                header('Location: \eadev/plataforma.php?content_adm=lista_quest&msg=16');
                mysqli_close($con);
            }else{
                header('Location: \eadev/plataforma.php?content_adm=lista_quest&msg=6');
                mysqli_close($con);
            }
    } 
?>