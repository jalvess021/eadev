<?php
    include "base/crud/atv_usu/atv.php";
    $usuario = $_SESSION['UsuarioNome'];
    $id_usuario = $_SESSION['UsuarioID'];

    $id_curso = (int)$_GET['id_curso'];
    
    //Previnir sql_injection && passar parametro

        // *** mysqli_prepare() = Passo a Query e Prepara conectando com o banco;
        // *** mysqli_stmt_bind_param() = Recebe e retorna um statement, onde seta os parametros da variavel; ($prepare, tipo da variavel[tudo junto{i - int || s - string || d - float || b- blob ]}, variavel atribuida para a "?" );
        // *** mysqli_stmt_execute() = Executa a query;

       /* $sql = "DELETE FROM curso where id_curso = ?;";
        $res = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($res, "i", $id_curso);
        mysqli_stmt_execute($res);
        mysqli_stmt_close($res); */

        $i = mysqli_query($con, "SELECT * from curso where id_curso = '".$id_curso."';");
        $info = mysqli_fetch_array($i);
        if ($info) {

            $sql = "DELETE FROM curso where id_curso = '".$id_curso."' AND nome_curso = '".$info['nome_curso']."' AND sigla_curso = '".$info['sigla_curso']."' AND id_formacao = '".$info['id_formacao']."';";
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
