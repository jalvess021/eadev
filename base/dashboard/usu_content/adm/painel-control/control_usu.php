<?php
      include "./../../../../config.php";
      date_default_timezone_set ("America/Sao_Paulo");
      $data = date('H:i:s | d-m-Y');

      $sql = mysqli_query($con, "SELECT * from usuario;");
      $row = mysqli_num_rows($sql);

      $sql1 = mysqli_query($con, "SELECT * from aluno;");
      $row1 = mysqli_num_rows($sql1);
      
      $sql2 = mysqli_query($con, "SELECT * from usuario where nvl_acesso = 3;");
      $row2 = mysqli_num_rows($sql2);

      $usu = array (
         'tempo' => $data,
         'total_usu' => $row,
         'total_alu' => $row1,
         'total_adm' => $row2
      );

      echo json_encode($usu);
?>