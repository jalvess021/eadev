<?php
      include "./../../../../config.php";
      date_default_timezone_set ("America/Sao_Paulo");
      $data = date('H:i:s | d-m-Y');

      $sql = mysqli_query($con, "SELECT * from usuario where status = 1;");
      $row = mysqli_num_rows($sql);

      $sql1 = mysqli_query($con, "SELECT * from aluno;");
      $row1 = mysqli_num_rows($sql1);
      
      $sql2 = mysqli_query($con, "SELECT * from usuario where nvl_acesso = 3 and status = 1;");
      $row2 = mysqli_num_rows($sql2);

      $anoVigente = date('Y');

      //Usuários por mês
            //janeiro (Aluno e adm);
                  $queryAluJan = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-01-01 00:00:00' and '".$anoVigente."-01-31 23:59:59' AND nvl_acesso = 2 and status = 1;");
                  $rowAluJan = mysqli_num_rows($queryAluJan);
                  $queryAdmJan = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-01-01 00:00:00' and '".$anoVigente."-01-31 23:59:59' AND nvl_acesso = 3 and status = 1;");
                  $rowAdmJan = mysqli_num_rows($queryAdmJan);
            //fevereiro
                  $queryAluFev = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-01-01 00:00:00' and '".$anoVigente."-02-29 23:59:59' AND nvl_acesso = 2 and status = 1;");
                  $rowAluFev = mysqli_num_rows($queryAluFev);
                  $queryAdmFev = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-01-01 00:00:00' and '".$anoVigente."-02-29 23:59:59' AND nvl_acesso = 3 and status = 1;");
                  $rowAdmFev = mysqli_num_rows($queryAdmFev);
            //Março
                  $queryAluMar = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-01-01 00:00:00' and '".$anoVigente."-03-31 23:59:59' AND nvl_acesso = 2 and status = 1;");
                  $rowAluMar = mysqli_num_rows($queryAluMar);
                  $queryAdmMar = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-01-01 00:00:00' and '".$anoVigente."-03-31 23:59:59' AND nvl_acesso = 3 and status = 1;");
                  $rowAdmMar = mysqli_num_rows($queryAdmMar);
            //Abril
                  $queryAluAbr = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-01-01 00:00:00' and '".$anoVigente."-04-30 23:59:59' AND nvl_acesso = 2 and status = 1;");
                  $rowAluAbr = mysqli_num_rows($queryAluAbr);
                  $queryAdmAbr = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-01-01 00:00:00' and '".$anoVigente."-04-30 23:59:59' AND nvl_acesso = 3 and status = 1;");
                  $rowAdmAbr = mysqli_num_rows($queryAdmAbr);
            //Maio
                  $queryAluMai = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-01-01 00:00:00' and '".$anoVigente."-05-31 23:59:59' AND nvl_acesso = 2 and status = 1;");
                  $rowAluMai = mysqli_num_rows($queryAluMai);
                  $queryAdmMai = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-01-01 00:00:00' and '".$anoVigente."-05-31 23:59:59' AND nvl_acesso = 3 and status = 1;");
                  $rowAdmMai = mysqli_num_rows($queryAdmMai);
            //Junho
                  $queryAluJun = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-01-01 00:00:00' and '".$anoVigente."-06-30 23:59:59' AND nvl_acesso = 2 and status = 1;");
                  $rowAluJun = mysqli_num_rows($queryAluJun);
                  $queryAdmJun = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-01-01 00:00:00' and '".$anoVigente."-06-30 23:59:59' AND nvl_acesso = 3 and status = 1;");
                  $rowAdmJun = mysqli_num_rows($queryAdmJun);
            //Julho
                  $queryAluJul = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-01-01 00:00:00' and '".$anoVigente."-07-31 23:59:59' AND nvl_acesso = 2 and status = 1;");
                  $rowAluJul = mysqli_num_rows($queryAluJul);
                  $queryAdmJul = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-01-01 00:00:00' and '".$anoVigente."-07-31 23:59:59' AND nvl_acesso = 3 and status = 1;");
                  $rowAdmJul = mysqli_num_rows($queryAdmJul);
            //Agosto
                  $queryAluAgo = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-01-01 00:00:00' and '".$anoVigente."-08-31 23:59:59' AND nvl_acesso = 2 and status = 1;");
                  $rowAluAgo = mysqli_num_rows($queryAluAgo);
                  $queryAdmAgo = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-01-01 00:00:00' and '".$anoVigente."-08-31 23:59:59' AND nvl_acesso = 3 and status = 1;");
                  $rowAdmAgo = mysqli_num_rows($queryAdmAgo);
            //Setembro
                  $queryAluSet = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-01-01 00:00:00' and '".$anoVigente."-09-30 23:59:59' AND nvl_acesso = 2 and status = 1;");
                  $rowAluSet = mysqli_num_rows($queryAluSet);
                  $queryAdmSet = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-01-01 00:00:00' and '".$anoVigente."-09-30 23:59:59' AND nvl_acesso = 3 and status = 1;");
                  $rowAdmSet = mysqli_num_rows($queryAdmSet);
            //Outubro
                  $queryAluOut = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-01-01 00:00:00' and '".$anoVigente."-10-31 23:59:59' AND nvl_acesso = 2 and status = 1;");
                  $rowAluOut = mysqli_num_rows($queryAluOut);
                  $queryAdmOut = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-01-01 00:00:00' and '".$anoVigente."-10-31 23:59:59' AND nvl_acesso = 3 and status = 1;");
                  $rowAdmOut = mysqli_num_rows($queryAdmOut);
            //Novembro
                  $queryAluNov = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-01-01 00:00:00' and '".$anoVigente."-11-30 23:59:59' AND nvl_acesso = 2 and status = 1;");
                  $rowAluNov = mysqli_num_rows($queryAluNov);
                  $queryAdmNov = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-01-01 00:00:00' and '".$anoVigente."-11-30 23:59:59' AND nvl_acesso = 3 and status = 1;");
                  $rowAdmNov = mysqli_num_rows($queryAdmNov);
            //Dezembro
                  $queryAluDez = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-01-01 00:00:00' and '".$anoVigente."-12-31 23:59:59' AND nvl_acesso = 2 and status = 1;");
                  $rowAluDez = mysqli_num_rows($queryAluDez);
                  $queryAdmDez = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-01-01 00:00:00' and '".$anoVigente."-12-31 23:59:59' AND nvl_acesso = 3 and status = 1;");
                  $rowAdmDez = mysqli_num_rows($queryAdmDez);

      $usu = array (
         'tempo' => $data,
         'total_usu' => $row,
         'total_alu' => $row1,
         'total_adm' => $row2,
         'ano_vigente' => $anoVigente,
         'mes_usu' => array (
            'jan_alu' => $rowAluJan,
            'jan_adm' => $rowAdmJan,
            'fev_alu' => $rowAluFev,
            'fev_adm' => $rowAdmFev,
            'mar_alu' => $rowAluMar,
            'mar_adm' => $rowAdmMar,
            'abr_alu' => $rowAluAbr,
            'abr_adm' => $rowAdmAbr,
            'mai_alu' => $rowAluMai,
            'mai_adm' => $rowAdmMai,
            'jun_alu' => $rowAluJun,
            'jun_adm' => $rowAdmJun,
            'jul_alu' => $rowAluJul,
            'jul_adm' => $rowAdmJul,
            'ago_alu' => $rowAluAgo,
            'ago_adm' => $rowAdmAgo,
            'set_alu' => $rowAluSet,
            'set_adm' => $rowAdmSet,
            'out_alu' => $rowAluOut,
            'out_adm' => $rowAdmOut,
            'nov_alu' => $rowAluNov,
            'nov_adm' => $rowAdmNov,
            'dez_alu' => $rowAluDez,
            'dez_adm' => $rowAdmDez
      )
      );

      echo json_encode($usu);
?>