<?php
    include "base/crud/atv_usu/atv.php";
    $id_usuario = $_SESSION['UsuarioID'];
    $queryUsu = mysqli_query($con, "SELECT nome from usuario where id_usu = '".$_SESSION['UsuarioID']."';");
    $resUsuq = mysqli_fetch_array($queryUsu);
    $usuario = $resUsuq[0];

    $id_curso = (int)$_GET['id_curso'];

        $i = mysqli_query($con, "SELECT * from curso where id_curso = '".$id_curso."';");
        $info = mysqli_fetch_array($i);
        if ($info) {

            $sql = "DELETE FROM curso where id_curso='".$id_curso."' AND nome_curso='".$info['nome_curso']."' AND sigla_curso='".$info['sigla_curso']."' AND id_formacao='".$info['id_formacao']."';";
            $res = mysqli_query($con, $sql);

            if ($res){

                $usu_atv = mysqli_query($con, atvAdm($usuario, str_replace( array("'"), "\'", $sql), $id_usuario));
                if ($usu_atv) {
                    header('Location: \tcc/plataforma.php?content_adm=lista_cur&msg=9');
                    mysqli_close($con);
                }else{
                    header('Location: \tcc/plataforma.php?content_adm=lista_cur&msg=6');
                    mysqli_close($con);
                }
        
                
            }
        }
        
?>
