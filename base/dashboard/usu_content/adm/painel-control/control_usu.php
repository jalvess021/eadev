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

      // Novos usuários mensais
            //janeiro (Aluno e adm);
                  $queryAluJan = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-01-01 00:00:00' and '".$anoVigente."-01-31 23:59:59' AND nvl_acesso = 2 and status = 1;");
                  $rowAluJan = mysqli_num_rows($queryAluJan);
                  $queryAdmJan = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-01-01 00:00:00' and '".$anoVigente."-01-31 23:59:59' AND nvl_acesso = 3 and status = 1;");
                  $rowAdmJan = mysqli_num_rows($queryAdmJan);
            //fevereiro
                  $queryAluFev = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-02-01 00:00:00' and '".$anoVigente."-02-29 23:59:59' AND nvl_acesso = 2 and status = 1;");
                  $rowAluFev = mysqli_num_rows($queryAluFev);
                  $queryAdmFev = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-02-01 00:00:00' and '".$anoVigente."-02-29 23:59:59' AND nvl_acesso = 3 and status = 1;");
                  $rowAdmFev = mysqli_num_rows($queryAdmFev);
            //Março
                  $queryAluMar = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-03-01 00:00:00' and '".$anoVigente."-03-31 23:59:59' AND nvl_acesso = 2 and status = 1;");
                  $rowAluMar = mysqli_num_rows($queryAluMar);
                  $queryAdmMar = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-03-01 00:00:00' and '".$anoVigente."-03-31 23:59:59' AND nvl_acesso = 3 and status = 1;");
                  $rowAdmMar = mysqli_num_rows($queryAdmMar);
            //Abril
                  $queryAluAbr = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-04-01 00:00:00' and '".$anoVigente."-04-30 23:59:59' AND nvl_acesso = 2 and status = 1;");
                  $rowAluAbr = mysqli_num_rows($queryAluAbr);
                  $queryAdmAbr = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-04-01 00:00:00' and '".$anoVigente."-04-30 23:59:59' AND nvl_acesso = 3 and status = 1;");
                  $rowAdmAbr = mysqli_num_rows($queryAdmAbr);
            //Maio
                  $queryAluMai = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-05-01 00:00:00' and '".$anoVigente."-05-31 23:59:59' AND nvl_acesso = 2 and status = 1;");
                  $rowAluMai = mysqli_num_rows($queryAluMai);
                  $queryAdmMai = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-05-01 00:00:00' and '".$anoVigente."-05-31 23:59:59' AND nvl_acesso = 3 and status = 1;");
                  $rowAdmMai = mysqli_num_rows($queryAdmMai);
            //Junho
                  $queryAluJun = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-06-01 00:00:00' and '".$anoVigente."-06-30 23:59:59' AND nvl_acesso = 2 and status = 1;");
                  $rowAluJun = mysqli_num_rows($queryAluJun);
                  $queryAdmJun = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-06-01 00:00:00' and '".$anoVigente."-06-30 23:59:59' AND nvl_acesso = 3 and status = 1;");
                  $rowAdmJun = mysqli_num_rows($queryAdmJun);
            //Julho
                  $queryAluJul = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-07-01 00:00:00' and '".$anoVigente."-07-31 23:59:59' AND nvl_acesso = 2 and status = 1;");
                  $rowAluJul = mysqli_num_rows($queryAluJul);
                  $queryAdmJul = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-07-01 00:00:00' and '".$anoVigente."-07-31 23:59:59' AND nvl_acesso = 3 and status = 1;");
                  $rowAdmJul = mysqli_num_rows($queryAdmJul);
            //Agosto
                  $queryAluAgo = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-08-01 00:00:00' and '".$anoVigente."-08-31 23:59:59' AND nvl_acesso = 2 and status = 1;");
                  $rowAluAgo = mysqli_num_rows($queryAluAgo);
                  $queryAdmAgo = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-08-01 00:00:00' and '".$anoVigente."-08-31 23:59:59' AND nvl_acesso = 3 and status = 1;");
                  $rowAdmAgo = mysqli_num_rows($queryAdmAgo);
            //Setembro
                  $queryAluSet = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-09-01 00:00:00' and '".$anoVigente."-09-30 23:59:59' AND nvl_acesso = 2 and status = 1;");
                  $rowAluSet = mysqli_num_rows($queryAluSet);
                  $queryAdmSet = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-09-01 00:00:00' and '".$anoVigente."-09-30 23:59:59' AND nvl_acesso = 3 and status = 1;");
                  $rowAdmSet = mysqli_num_rows($queryAdmSet);
            //Outubro
                  $queryAluOut = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-10-01 00:00:00' and '".$anoVigente."-10-31 23:59:59' AND nvl_acesso = 2 and status = 1;");
                  $rowAluOut = mysqli_num_rows($queryAluOut);
                  $queryAdmOut = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-10-01 00:00:00' and '".$anoVigente."-10-31 23:59:59' AND nvl_acesso = 3 and status = 1;");
                  $rowAdmOut = mysqli_num_rows($queryAdmOut);
            //Novembro
                  $queryAluNov = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-11-01 00:00:00' and '".$anoVigente."-11-30 23:59:59' AND nvl_acesso = 2 and status = 1;");
                  $rowAluNov = mysqli_num_rows($queryAluNov);
                  $queryAdmNov = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-11-01 00:00:00' and '".$anoVigente."-11-30 23:59:59' AND nvl_acesso = 3 and status = 1;");
                  $rowAdmNov = mysqli_num_rows($queryAdmNov);
            //Dezembro
                  $queryAluDez = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-12-01 00:00:00' and '".$anoVigente."-12-31 23:59:59' AND nvl_acesso = 2 and status = 1;");
                  $rowAluDez = mysqli_num_rows($queryAluDez);
                  $queryAdmDez = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-12-01 00:00:00' and '".$anoVigente."-12-31 23:59:59' AND nvl_acesso = 3 and status = 1;");
                  $rowAdmDez = mysqli_num_rows($queryAdmDez);

      
      //Usuários até o mes vigente
            //janeiro (Aluno e adm);
            $queryAluJanVig = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-01-01 00:00:00' and '".$anoVigente."-01-31 23:59:59' AND nvl_acesso = 2 and status = 1;");
            $rowAluJanVig = mysqli_num_rows($queryAluJanVig);
            $queryAdmJanVig = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-01-01 00:00:00' and '".$anoVigente."-01-31 23:59:59' AND nvl_acesso = 3 and status = 1;");
            $rowAdmJanVig = mysqli_num_rows($queryAdmJanVig);
      //fevereiro
            $queryAluFevVig = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-01-01 00:00:00' and '".$anoVigente."-02-29 23:59:59' AND nvl_acesso = 2 and status = 1;");
            $rowAluFevVig = mysqli_num_rows($queryAluFevVig);
            $queryAdmFevVig = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-01-01 00:00:00' and '".$anoVigente."-02-29 23:59:59' AND nvl_acesso = 3 and status = 1;");
            $rowAdmFevVig = mysqli_num_rows($queryAdmFevVig);
      //Março
            $queryAluMarVig = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-01-01 00:00:00' and '".$anoVigente."-03-31 23:59:59' AND nvl_acesso = 2 and status = 1;");
            $rowAluMarVig = mysqli_num_rows($queryAluMarVig);
            $queryAdmMarVig = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-01-01 00:00:00' and '".$anoVigente."-03-31 23:59:59' AND nvl_acesso = 3 and status = 1;");
            $rowAdmMarVig = mysqli_num_rows($queryAdmMarVig);
      //Abril
            $queryAluAbrVig = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-01-01 00:00:00' and '".$anoVigente."-04-30 23:59:59' AND nvl_acesso = 2 and status = 1;");
            $rowAluAbrVig = mysqli_num_rows($queryAluAbrVig);
            $queryAdmAbrVig = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-01-01 00:00:00' and '".$anoVigente."-04-30 23:59:59' AND nvl_acesso = 3 and status = 1;");
            $rowAdmAbrVig = mysqli_num_rows($queryAdmAbrVig);
      //Maio
            $queryAluMaiVig = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-01-01 00:00:00' and '".$anoVigente."-05-31 23:59:59' AND nvl_acesso = 2 and status = 1;");
            $rowAluMaiVig = mysqli_num_rows($queryAluMaiVig);
            $queryAdmMaiVig = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-01-01 00:00:00' and '".$anoVigente."-05-31 23:59:59' AND nvl_acesso = 3 and status = 1;");
            $rowAdmMaiVig = mysqli_num_rows($queryAdmMaiVig);
      //Junho
            $queryAluJunVig = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-01-01 00:00:00' and '".$anoVigente."-06-30 23:59:59' AND nvl_acesso = 2 and status = 1;");
            $rowAluJunVig = mysqli_num_rows($queryAluJunVig);
            $queryAdmJunVig = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-01-01 00:00:00' and '".$anoVigente."-06-30 23:59:59' AND nvl_acesso = 3 and status = 1;");
            $rowAdmJunVig = mysqli_num_rows($queryAdmJunVig);
      //Julho
            $queryAluJulVig = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-01-01 00:00:00' and '".$anoVigente."-07-31 23:59:59' AND nvl_acesso = 2 and status = 1;");
            $rowAluJulVig = mysqli_num_rows($queryAluJulVig);
            $queryAdmJulVig = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-01-01 00:00:00' and '".$anoVigente."-07-31 23:59:59' AND nvl_acesso = 3 and status = 1;");
            $rowAdmJulVig = mysqli_num_rows($queryAdmJulVig);
      //Agosto
            $queryAluAgoVig = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-01-01 00:00:00' and '".$anoVigente."-08-31 23:59:59' AND nvl_acesso = 2 and status = 1;");
            $rowAluAgoVig = mysqli_num_rows($queryAluAgoVig);
            $queryAdmAgoVig = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-01-01 00:00:00' and '".$anoVigente."-08-31 23:59:59' AND nvl_acesso = 3 and status = 1;");
            $rowAdmAgoVig = mysqli_num_rows($queryAdmAgoVig);
      //Setembro
            $queryAluSetVig = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-01-01 00:00:00' and '".$anoVigente."-09-30 23:59:59' AND nvl_acesso = 2 and status = 1;");
            $rowAluSetVig = mysqli_num_rows($queryAluSetVig);
            $queryAdmSetVig = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-01-01 00:00:00' and '".$anoVigente."-09-30 23:59:59' AND nvl_acesso = 3 and status = 1;");
            $rowAdmSetVig = mysqli_num_rows($queryAdmSetVig);
      //Outubro
            $queryAluOutVig = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-01-01 00:00:00' and '".$anoVigente."-10-31 23:59:59' AND nvl_acesso = 2 and status = 1;");
            $rowAluOutVig = mysqli_num_rows($queryAluOutVig);
            $queryAdmOutVig = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-01-01 00:00:00' and '".$anoVigente."-10-31 23:59:59' AND nvl_acesso = 3 and status = 1;");
            $rowAdmOutVig = mysqli_num_rows($queryAdmOutVig);
      //Novembro
            $queryAluNovVig = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-01-01 00:00:00' and '".$anoVigente."-11-30 23:59:59' AND nvl_acesso = 2 and status = 1;");
            $rowAluNovVig = mysqli_num_rows($queryAluNovVig);
            $queryAdmNovVig = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-01-01 00:00:00' and '".$anoVigente."-11-30 23:59:59' AND nvl_acesso = 3 and status = 1;");
            $rowAdmNovVig = mysqli_num_rows($queryAdmNovVig);
      //Dezembro
            $queryAluDezVig = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-01-01 00:00:00' and '".$anoVigente."-12-31 23:59:59' AND nvl_acesso = 2 and status = 1;");
            $rowAluDezVig = mysqli_num_rows($queryAluDezVig);
            $queryAdmDezVig = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-01-01 00:00:00' and '".$anoVigente."-12-31 23:59:59' AND nvl_acesso = 3 and status = 1;");
            $rowAdmDezVig = mysqli_num_rows($queryAdmDezVig);

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
         ),

      'mes_usu_vig' => array (
            'jan_alu_vig' => $rowAluJanVig,
            'jan_adm_vig' => $rowAdmJanVig,
            'fev_alu_vig' => $rowAluFevVig,
            'fev_adm_vig' => $rowAdmFevVig,
            'mar_alu_vig' => $rowAluMarVig,
            'mar_adm_vig' => $rowAdmMarVig,
            'abr_alu_vig' => $rowAluAbrVig,
            'abr_adm_vig' => $rowAdmAbrVig,
            'mai_alu_vig' => $rowAluMaiVig,
            'mai_adm_vig' => $rowAdmMaiVig,
            'jun_alu_vig' => $rowAluJunVig,
            'jun_adm_vig' => $rowAdmJunVig,
            'jul_alu_vig' => $rowAluJulVig,
            'jul_adm_vig' => $rowAdmJulVig,
            'ago_alu_vig' => $rowAluAgoVig,
            'ago_adm_vig' => $rowAdmAgoVig,
            'set_alu_vig' => $rowAluSetVig,
            'set_adm_vig' => $rowAdmSetVig,
            'out_alu_vig' => $rowAluOutVig,
            'out_adm_vig' => $rowAdmOutVig,
            'nov_alu_vig' => $rowAluNovVig,
            'nov_adm_vig' => $rowAdmNovVig,
            'dez_alu_vig' => $rowAluDezVig,
            'dez_adm_vig' => $rowAdmDezVig
      )
      );

      echo json_encode($usu);
?>