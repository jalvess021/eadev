<?php
        $nome = $_POST['nome'];
        $sql = mysqli_query($con, "SELECT id_usu, nome_usu FROM usuario where nvl_acesso = 3 AND nome LIKE '%$nome%';");
        while($info = mysqli_fetch_array($sql)) {
            echo json_encode(
                array(
                    "id" => $info[0],
                    "nome" => $info[1]
                )
            ); 
        } 
?>