<?php
    include "../../base/config.php";

    $sqlAll = mysqli_query($con, "SELECT * from atv_adm;");
    $rowAll = mysqli_num_rows($sqlAll);

    $sql1 = mysqli_query($con, "SELECT * from atv_adm where atv like '%\insert%';");
    $row1 = mysqli_num_rows($sql1);

    $sql2 = mysqli_query($con, "SELECT * from atv_adm where atv like '%\update%';");
    $row2 = mysqli_num_rows($sql2);

    $sql3 = mysqli_query($con, "SELECT * from atv_adm where atv like '%\delete%';");
    $row3 = mysqli_num_rows($sql3);

    $atv = array(
        'num_total_atv' => $rowAll,
        'num_add' => $row1,
        'num_att' => $row2,
        'num_del' => $row3 
    );
    
    echo json_encode($atv);
?>