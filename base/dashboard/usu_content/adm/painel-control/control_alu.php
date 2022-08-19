<?php
 include "./../../../../config.php";

 $sql = mysqli_query($con, "SELECT * from aluno;");
 $row = mysqli_num_rows($sql);
 echo $row;
?>