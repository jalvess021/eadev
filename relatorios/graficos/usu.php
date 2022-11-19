<?php  
      $nivel_necessario = 3;
      include "../../base/testa_nivel.php";

    date_default_timezone_set ("America/Sao_Paulo");
    $con = mysqli_connect('localhost', 'root', '', 'eadev') or trigger_error(mysqli_error()); 
    mysqli_set_charset($con, "utf8");

    $ano = $_GET['periodo'];

    switch ($_GET['user']) {
      case 'all':
            $user = "usuários";
            break;

      case 'alu':
            $user = "alunos";
            break;

      case 'adm':
            $user = "administradores";
            break;
    }

    // Novos usuários mensais
          //janeiro (Aluno e adm);
                $queryAluJan = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '".$ano."-01-01 00:00:00' and '".$ano."-01-31 23:59:59' AND nvl_acesso = 2 and status = 1;");
                $rowAluJan = mysqli_num_rows($queryAluJan);
                $queryAdmJan = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '".$ano."-01-01 00:00:00' and '".$ano."-01-31 23:59:59' AND nvl_acesso = 3 and status = 1;");
                $rowAdmJan = mysqli_num_rows($queryAdmJan);
                $queryTotJan = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '".$ano."-01-01 00:00:00' and '".$ano."-01-31 23:59:59'");
                $rowTotJan = mysqli_num_rows($queryTotJan);
          //fevereiro
                $queryAluFev = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '".$ano."-02-01 00:00:00' and '".$ano."-02-29 23:59:59' AND nvl_acesso = 2 and status = 1;");
                $rowAluFev = mysqli_num_rows($queryAluFev);
                $queryAdmFev = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '".$ano."-02-01 00:00:00' and '".$ano."-02-29 23:59:59' AND nvl_acesso = 3 and status = 1;");
                $rowAdmFev = mysqli_num_rows($queryAdmFev);
                $queryTotFev = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '".$ano."-02-01 00:00:00' and '".$ano."-02-29 23:59:59'");
                $rowTotFev = mysqli_num_rows($queryTotFev);
          //Março
                $queryAluMar = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '".$ano."-03-01 00:00:00' and '".$ano."-03-31 23:59:59' AND nvl_acesso = 2 and status = 1;");
                $rowAluMar = mysqli_num_rows($queryAluMar);
                $queryAdmMar = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '".$ano."-03-01 00:00:00' and '".$ano."-03-31 23:59:59' AND nvl_acesso = 3 and status = 1;");
                $rowAdmMar = mysqli_num_rows($queryAdmMar);
                $queryTotMar = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '".$ano."-03-01 00:00:00' and '".$ano."-03-31 23:59:59'");
                $rowTotMar = mysqli_num_rows($queryTotMar);
          //Abril
                $queryAluAbr = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '".$ano."-04-01 00:00:00' and '".$ano."-04-30 23:59:59' AND nvl_acesso = 2 and status = 1;");
                $rowAluAbr = mysqli_num_rows($queryAluAbr);
                $queryAdmAbr = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '".$ano."-04-01 00:00:00' and '".$ano."-04-30 23:59:59' AND nvl_acesso = 3 and status = 1;");
                $rowAdmAbr = mysqli_num_rows($queryAdmAbr);
                $queryTotAbr = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '".$ano."-04-01 00:00:00' and '".$ano."-04-30 23:59:59'");
                $rowTotAbr = mysqli_num_rows($queryTotAbr);
          //Maio
                $queryAluMai = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '".$ano."-05-01 00:00:00' and '".$ano."-05-31 23:59:59' AND nvl_acesso = 2 and status = 1;");
                $rowAluMai = mysqli_num_rows($queryAluMai);
                $queryAdmMai = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '".$ano."-05-01 00:00:00' and '".$ano."-05-31 23:59:59' AND nvl_acesso = 3 and status = 1;");
                $rowAdmMai = mysqli_num_rows($queryAdmMai);
                $queryTotMai = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '".$ano."-05-01 00:00:00' and '".$ano."-05-31 23:59:59'");
                $rowTotMai = mysqli_num_rows($queryTotMai);
          //Junho
                $queryAluJun = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '".$ano."-06-01 00:00:00' and '".$ano."-06-30 23:59:59' AND nvl_acesso = 2 and status = 1;");
                $rowAluJun = mysqli_num_rows($queryAluJun);
                $queryAdmJun = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '".$ano."-06-01 00:00:00' and '".$ano."-06-30 23:59:59' AND nvl_acesso = 3 and status = 1;");
                $rowAdmJun = mysqli_num_rows($queryAdmJun);
                $queryTotJun = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '".$ano."-06-01 00:00:00' and '".$ano."-06-30 23:59:59'");
                $rowTotJun = mysqli_num_rows($queryTotJun);
          //Julho
                $queryAluJul = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '".$ano."-07-01 00:00:00' and '".$ano."-07-31 23:59:59' AND nvl_acesso = 2 and status = 1;");
                $rowAluJul = mysqli_num_rows($queryAluJul);
                $queryAdmJul = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '".$ano."-07-01 00:00:00' and '".$ano."-07-31 23:59:59' AND nvl_acesso = 3 and status = 1;");
                $rowAdmJul = mysqli_num_rows($queryAdmJul);
                $queryTotJul = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '".$ano."-07-01 00:00:00' and '".$ano."-07-31 23:59:59'");
                $rowTotJul = mysqli_num_rows($queryTotJul);
          //Agosto
                $queryAluAgo = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '".$ano."-08-01 00:00:00' and '".$ano."-08-31 23:59:59' AND nvl_acesso = 2 and status = 1;");
                $rowAluAgo = mysqli_num_rows($queryAluAgo);
                $queryAdmAgo = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '".$ano."-08-01 00:00:00' and '".$ano."-08-31 23:59:59' AND nvl_acesso = 3 and status = 1;");
                $rowAdmAgo = mysqli_num_rows($queryAdmAgo);
                $queryTotAgo = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '".$ano."-08-01 00:00:00' and '".$ano."-08-31 23:59:59'");
                $rowTotAgo = mysqli_num_rows($queryTotAgo);
          //Setembro
                $queryAluSet = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '".$ano."-09-01 00:00:00' and '".$ano."-09-30 23:59:59' AND nvl_acesso = 2 and status = 1;");
                $rowAluSet = mysqli_num_rows($queryAluSet);
                $queryAdmSet = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '".$ano."-09-01 00:00:00' and '".$ano."-09-30 23:59:59' AND nvl_acesso = 3 and status = 1;");
                $rowAdmSet = mysqli_num_rows($queryAdmSet);
                $queryTotSet = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '".$ano."-09-01 00:00:00' and '".$ano."-09-30 23:59:59'");
                $rowTotSet = mysqli_num_rows($queryTotSet);
          //Outubro
                $queryAluOut = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '".$ano."-10-01 00:00:00' and '".$ano."-10-31 23:59:59' AND nvl_acesso = 2 and status = 1;");
                $rowAluOut = mysqli_num_rows($queryAluOut);
                $queryAdmOut = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '".$ano."-10-01 00:00:00' and '".$ano."-10-31 23:59:59' AND nvl_acesso = 3 and status = 1;");
                $rowAdmOut = mysqli_num_rows($queryAdmOut);
                $queryTotOut = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '".$ano."-10-01 00:00:00' and '".$ano."-10-31 23:59:59'");
                $rowTotOut = mysqli_num_rows($queryTotOut);
          //Novembro
                $queryAluNov = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '".$ano."-11-01 00:00:00' and '".$ano."-11-30 23:59:59' AND nvl_acesso = 2 and status = 1;");
                $rowAluNov = mysqli_num_rows($queryAluNov);
                $queryAdmNov = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '".$ano."-11-01 00:00:00' and '".$ano."-11-30 23:59:59' AND nvl_acesso = 3 and status = 1;");
                $rowAdmNov = mysqli_num_rows($queryAdmNov);
                $queryTotNov = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '".$ano."-11-01 00:00:00' and '".$ano."-11-30 23:59:59'");
                $rowTotNov = mysqli_num_rows($queryTotNov);
          //Dezembro
                $queryAluDez = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '".$ano."-12-01 00:00:00' and '".$ano."-12-31 23:59:59' AND nvl_acesso = 2 and status = 1;");
                $rowAluDez = mysqli_num_rows($queryAluDez);
                $queryAdmDez = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '".$ano."-12-01 00:00:00' and '".$ano."-12-31 23:59:59' AND nvl_acesso = 3 and status = 1;");
                $rowAdmDez = mysqli_num_rows($queryAdmDez);
                $queryTotDez = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '".$ano."-12-01 00:00:00' and '".$ano."-12-31 23:59:59'");
                $rowTotDez = mysqli_num_rows($queryTotDez);
    
?>  
<!DOCTYPE html>  
<html>  
    <head>  
        <title>Pré-visualização de relatório | EADEV </title>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        
    </head>  
    <style>
body {
      height:100vh !important;
      margin:0;
}
.hd-gf-cert{
      width: 100%;
      display: flex;
      justify-content: center;
}
h3{
      margin-top: 20px;
      font-weight: 700;     
}
#create_pdf{
    border-radius: 40px;
    font-size: 12pt;
    background-color: transparent !important;
    padding: 6px 15px;
    color: white ;
    text-transform: uppercase;
    border:whitesmoke  4px outset;
    font-weight: bold !important;
}
#create_pdf:hover{
      background-color: white !important;
      color: #23979b;
      transition: 0.15s ease-in;
}
.panel{
      border-radius: 20px !important;
      border: 9px outset #4ea4a7;
}
.bg {
  /*animation:slide 3.5s ease-in-out infinite alternate;*/
  background-image: linear-gradient(-25deg, #047979 50%, #ffffff 50%);
  bottom:0;
  left:-50%;
  opacity:.5;
  position:fixed;
  right:-50%;
  top:0;
  z-index:-1;
}

.bg2 {
  animation-direction:alternate-reverse;
  animation-duration:4s;
}

.bg3 {
  animation-duration:5s;
}

@keyframes slide {
  0% {
    transform:translateX(-25%);
  }
  100% {
    transform:translateX(25%);
  }
}
#div-hidden{
      
}
    </style>
    <body>  
    <div class="bg"></div>
<div class="bg bg2"></div>
<div class="bg bg3"></div>

        <div class="container" id="testing">  
        <div class="hd-gf-cert">
            
              <h3 align="center">Relatório de usuários mensais</h3>
        </div>  
            <div class="panel panel-default">
              <div class="panel-body" align="center">
              <h5 class="panel-title"> Número de <?php echo $user;?> na plataforma </h5>
                  <div id="chart_div" style="width: 100%; max-width:800px; height: 550px;"></div>
                  </div>
            </div>
        </div>

      <div align="center" id='div-hidden'>
      <form method="post" id="make_pdf" action='/tcc/relatorios/loads/gf_load.php'>
      <input type="hidden" name="hidden_html" id="hidden_html"/>
      <input type="hidden" name="url" value="<?php echo "/tcc/relatorios/usuarios.php?user=".$_GET['user']."&periodo=".$_GET['periodo'];?>">
      
      <button type="button" name="create_pdf" id="create_pdf">Gerar relatório</button>
      </form>
      </div>
    </body>  
</html>


<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 
<?php 
      if ($_GET['user'] === 'all') {
            include "get_user/all.php";
      }elseif ($_GET['user'] === 'alu') {
            include "get_user/alu.php";
      }elseif ($_GET['user'] === 'adm') {
            include "get_user/adm.php";
      }
?>

<script>
$(document).ready(function(){
 $('#create_pdf').click(function(){
  $('#hidden_html').val($('#testing').html());
  $('#make_pdf').submit();
 });
});
</script>

