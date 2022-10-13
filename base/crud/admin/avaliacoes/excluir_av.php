<?php
    include "base/crud/atv_usu/atv.php";
    $id_usuario = $_SESSION['UsuarioID'];
    $queryUsu = mysqli_query($con, "SELECT nome from usuario where id_usu = '".$_SESSION['UsuarioID']."';");
    $resUsuq = mysqli_fetch_array($queryUsu);
    $usuario = $resUsuq[0];

    $id_quest = (int)$_GET['id_quest'];

        $i = mysqli_query($con, "SELECT * from questoes where id_quest = ".$id_quest.";");
        $info = mysqli_fetch_array($i);
        if ($info) {

            $sql = "DELETE FROM questoes where id_quest = '".$id_quest."' AND enunciado_quest = '".$info['enunciado_quest']."' AND grau_dificuldade = '".$info['grau_dificuldade']."' AND id_mod = '".$info['id_mod']."';";
            $res = mysqli_query($con, $sql);

            if ($res){

                $usu_atv = mysqli_query($con, atvAdm($usuario, str_replace( array("'"), "\'", $sql), $id_usuario));
                if ($usu_atv) {
                    header('Location: \tcc/plataforma.php?content_adm=lista_av&msg=18');
                    mysqli_close($con); 
                }else{
                    header('Location: \tcc/plataforma.php?content_adm=lista_av&msg=6');
                    mysqli_close($con);
                }
                
            }

        }
        
?>