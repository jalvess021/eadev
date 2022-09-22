<?php
    include "base/crud/atv_usu/atv.php";
    $usuario = $_SESSION['UsuarioNome'];
    $id_usuario = $_SESSION['UsuarioID'];

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


    $sql = "INSERT into questoes (id_quest, enunciado_quest, grau_dificuldade, pont_quest, id_mod) values ";
    $sql .= "('0', '".$enunciado."','".$dificuldade."','".$valor."','".$modulo."');";
    $res = mysqli_query($con, $sql)or die(mysqli_error());
 
    if($res){

        $res1 = mysqli_query($con, "SELECT id_quest from questoes where enunciado_quest = '".$enunciado."';");
        if (mysqli_num_rows($res1) > 0) {

            $row1 = mysqli_fetch_array($res1);

            $sql2 = "INSERT into opcao_questoes (id_opc, alternativa_opc, tipo_opc, id_quest) values ('0', '".$c."', '1', '".$row1[0]."'), ('0', '".$i1."', '2', '".$row1[0]."'), ('0', '".$i2."', '2', '".$row1[0]."');";
            $res2 = mysqli_query($con, $sql2); 
            
            $usu_atv = mysqli_query($con, atvAdm($usuario, str_replace( array("'"), "\'", $sql), $id_usuario));
            $usu_atv1 = mysqli_query($con, atvAdm($usuario, str_replace( array("'"), "\'", $sql2), $id_usuario));
            if ($usu_atv && $usu_atv1) {
                header('Location: \tcc/plataforma.php?content_adm=lista_av&msg=16');
                mysqli_close($con);
            }else{
                header('Location: \tcc/plataforma.php?content_adm=lista_av&msg=6');
                mysqli_close($con);
            }
        }
        
        
    } 
?>