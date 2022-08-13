<?php
        include "./../../../../config.php";

        $sql = mysqli_query($con, "select * from usuario;");
        $row = mysqli_num_rows($sql);
        echo $row;
?>