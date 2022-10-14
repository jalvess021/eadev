<?php
    include "base/crud/atv_usu/atv.php";
    $id_usuario = $_SESSION['UsuarioID'];
    $queryUsu = mysqli_query($con, "SELECT nome from usuario where id_usu = '".$_SESSION['UsuarioID']."';");
    $resUsuq = mysqli_fetch_array($queryUsu);
    $usuario = $resUsuq[0];

    $id_mod = (int)$_GET['id_mod'];

        $i = mysqli_query($con, "SELECT * from modulo where id_mod = '".$id_mod."';");
        $info = mysqli_fetch_array($i);

        if ($info) {

            $sql = "DELETE FROM modulo where id_mod='".$id_mod."' AND nome_mod='".$info['nome_mod']."' AND id_curso='".$info['id_curso']."';";
            $res = mysqli_query($con, $sql);
            if ($res){
                $usu_atv = mysqli_query($con, atvAdm($usuario, str_replace( array("'"), "\'", $sql), $id_usuario));
                if ($usu_atv) {
                    header('Location: \tcc/plataforma.php?content_adm=lista_mod&msg=15');
                    mysqli_close($con);
                }else{
                    header('Location: \tcc/plataforma.php?content_adm=lista_mod&msg=6');
                    mysqli_close($con);
                }
            }
        }

        

?>