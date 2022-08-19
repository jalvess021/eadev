<?php
 include "./../../../../config.php";

 $sql = mysqli_query($con, "SELECT * from usuario where nvl_acesso = 3;");
 $row = mysqli_num_rows($sql);
 echo $row;
?>