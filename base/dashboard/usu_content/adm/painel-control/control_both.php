<?php
 include "./../../../../config.php";

 $sql = mysqli_query($con, "SELECT * from aluno;");
 $row = mysqli_num_rows($sql);
 echo $row;

 $sql1 = mysqli_query($con, "SELECT * from usuario where nvl_acesso = 3;");
 $row1 = mysqli_num_rows($sql);
 echo $row1;
?>