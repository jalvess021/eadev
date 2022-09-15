<?php
    include "../../base/config.php";

    $sql = mysqli_query($con, "SELECT * from atv_adm where atv like '%\delete from%';");
    $row = mysqli_num_rows($sql);
    echo $row;
?>