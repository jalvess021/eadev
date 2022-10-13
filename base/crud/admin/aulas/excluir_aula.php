<?php
    include "base/crud/atv_usu/atv.php";
    $id_usuario = $_SESSION['UsuarioID'];
    $queryUsu = mysqli_query($con, "SELECT nome from usuario where id_usu = '".$_SESSION['UsuarioID']."';");
    $resUsuq = mysqli_fetch_array($queryUsu);
    $usuario = $resUsuq[0];

    $id_aula = (int)$_GET['id_aula'];
    //Previnir sql_injection && passar parametro

        // *** mysqli_prepare() = Passo a Query e Prepara conectando com o banco;
        // *** mysqli_stmt_bind_param() = Recebe e retorna um statement, onde seta os parametros da variavel; ($prepare, tipo da variavel[tudo junto{i - int || s - string || d - float || b- blob ]}, variavel atribuida para a "?" );
        // *** mysqli_stmt_execute() = Executa a query;

       /* $sql = "DELETE FROM aula where id_aula = ?;";
        $res = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($res, "i", $id_aula);
        mysqli_stmt_execute($res);
        mysqli_stmt_close($res); */

        $i = mysqli_query($con, "SELECT * from aula where id_aula = ".$id_aula.";");
        $info = mysqli_fetch_array($i);
        if ($info) {

            $sql = "DELETE FROM aula where id_aula = '".$id_aula."' AND id_video = '".$info['id_video']."' AND tit_aula = '".$info['tit_aula']."' AND id_mod = '".$info['id_mod']."';";
            $res = mysqli_query($con, $sql);

            if ($res){

                $usu_atv = mysqli_query($con, atvAdm($usuario, str_replace( array("'"), "\'", $sql), $id_usuario));
                if ($usu_atv) {
                    header('Location: \tcc/plataforma.php?content_adm=lista_aula&msg=12');
                    mysqli_close($con); 
                }else{
                    header('Location: \tcc/plataforma.php?content_adm=lista_aula&msg=6');
                    mysqli_close($con);
                }
                
            }

        }
        
?>