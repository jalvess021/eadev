<?php
    $id_aula = (int)$_GET['id_aula'];
    //Previnir sql_injection && passar parametro

        // *** mysqli_prepare() = Passo a Query e Prepara conectando com o banco;
        // *** mysqli_stmt_bind_param() = Recebe e retorna um statement, onde seta os parametros da variavel; ($prepare, tipo da variavel[tudo junto{i - int || s - string || d - float || b- blob ]}, variavel atribuida para a "?" );
        // *** mysqli_stmt_execute() = Executa a query;

        $sql = "DELETE FROM aula where id_aula = ?;";
        $res = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($res, "i", $id_aula);
        mysqli_stmt_execute($res);
        mysqli_stmt_close($res);

        if ($res){
            header('Location: \tcc/plataforma.php?content_adm=lista_aula&msg=12');
            mysqli_close($con);
        }else{
            header('Location: \tcc/plataforma.php?content_adm=lista_aula&msg=6');
            mysqli_close($con);
        }

?>