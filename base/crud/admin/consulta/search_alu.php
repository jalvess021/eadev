<?php
    include "../../../config.php";
    $sqlAll = mysqli_query($con, "SELECT nome, id_usu from usuario where nvl_acesso = 2;");
    $rowAll = mysqli_fetch_all($sqlAll, MYSQLI_ASSOC);

    echo json_encode($rowAll);
?>