<?php  

    date_default_timezone_set ("America/Sao_Paulo");
    $con = mysqli_connect('localhost', 'root', '', 'eadev') or trigger_error(mysqli_error()); 
    mysqli_set_charset($con, "utf8");

    $ano = date('Y');

    // Novos usuários mensais
          //janeiro (Aluno e adm);
                $queryAluJan = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-01-01 00:00:00' and '".$ano."-01-31 23:59:59' AND nvl_acesso = 2 and status = 1;");
                $rowAluJan = mysqli_num_rows($queryAluJan);
                $queryAdmJan = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-01-01 00:00:00' and '".$ano."-01-31 23:59:59' AND nvl_acesso = 3 and status = 1;");
                $rowAdmJan = mysqli_num_rows($queryAdmJan);
                $queryTotJan = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-01-01 00:00:00' and '".$ano."-01-31 23:59:59'");
                $rowTotJan = mysqli_num_rows($queryTotJan);
          //fevereiro
                $queryAluFev = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-02-01 00:00:00' and '".$ano."-02-29 23:59:59' AND nvl_acesso = 2 and status = 1;");
                $rowAluFev = mysqli_num_rows($queryAluFev);
                $queryAdmFev = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-02-01 00:00:00' and '".$ano."-02-29 23:59:59' AND nvl_acesso = 3 and status = 1;");
                $rowAdmFev = mysqli_num_rows($queryAdmFev);
                $queryTotFev = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-02-01 00:00:00' and '".$ano."-02-29 23:59:59'");
                $rowTotFev = mysqli_num_rows($queryTotFev);
          //Março
                $queryAluMar = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-03-01 00:00:00' and '".$ano."-03-31 23:59:59' AND nvl_acesso = 2 and status = 1;");
                $rowAluMar = mysqli_num_rows($queryAluMar);
                $queryAdmMar = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-03-01 00:00:00' and '".$ano."-03-31 23:59:59' AND nvl_acesso = 3 and status = 1;");
                $rowAdmMar = mysqli_num_rows($queryAdmMar);
                $queryTotMar = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-03-01 00:00:00' and '".$ano."-03-31 23:59:59'");
                $rowTotMar = mysqli_num_rows($queryTotMar);
          //Abril
                $queryAluAbr = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-04-01 00:00:00' and '".$ano."-04-30 23:59:59' AND nvl_acesso = 2 and status = 1;");
                $rowAluAbr = mysqli_num_rows($queryAluAbr);
                $queryAdmAbr = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-04-01 00:00:00' and '".$ano."-04-30 23:59:59' AND nvl_acesso = 3 and status = 1;");
                $rowAdmAbr = mysqli_num_rows($queryAdmAbr);
                $queryTotAbr = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-04-01 00:00:00' and '".$ano."-04-30 23:59:59'");
                $rowTotAbr = mysqli_num_rows($queryTotAbr);
          //Maio
                $queryAluMai = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-05-01 00:00:00' and '".$ano."-05-31 23:59:59' AND nvl_acesso = 2 and status = 1;");
                $rowAluMai = mysqli_num_rows($queryAluMai);
                $queryAdmMai = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-05-01 00:00:00' and '".$ano."-05-31 23:59:59' AND nvl_acesso = 3 and status = 1;");
                $rowAdmMai = mysqli_num_rows($queryAdmMai);
                $queryTotMai = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-05-01 00:00:00' and '".$ano."-05-31 23:59:59'");
                $rowTotMai = mysqli_num_rows($queryTotMai);
          //Junho
                $queryAluJun = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-06-01 00:00:00' and '".$ano."-06-30 23:59:59' AND nvl_acesso = 2 and status = 1;");
                $rowAluJun = mysqli_num_rows($queryAluJun);
                $queryAdmJun = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-06-01 00:00:00' and '".$ano."-06-30 23:59:59' AND nvl_acesso = 3 and status = 1;");
                $rowAdmJun = mysqli_num_rows($queryAdmJun);
                $queryTotJun = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-06-01 00:00:00' and '".$ano."-06-30 23:59:59'");
                $rowTotJun = mysqli_num_rows($queryTotJun);
          //Julho
                $queryAluJul = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-07-01 00:00:00' and '".$ano."-07-31 23:59:59' AND nvl_acesso = 2 and status = 1;");
                $rowAluJul = mysqli_num_rows($queryAluJul);
                $queryAdmJul = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-07-01 00:00:00' and '".$ano."-07-31 23:59:59' AND nvl_acesso = 3 and status = 1;");
                $rowAdmJul = mysqli_num_rows($queryAdmJul);
                $queryTotJul = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-07-01 00:00:00' and '".$ano."-07-31 23:59:59'");
                $rowTotJul = mysqli_num_rows($queryTotJul);
          //Agosto
                $queryAluAgo = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-08-01 00:00:00' and '".$ano."-08-31 23:59:59' AND nvl_acesso = 2 and status = 1;");
                $rowAluAgo = mysqli_num_rows($queryAluAgo);
                $queryAdmAgo = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-08-01 00:00:00' and '".$ano."-08-31 23:59:59' AND nvl_acesso = 3 and status = 1;");
                $rowAdmAgo = mysqli_num_rows($queryAdmAgo);
                $queryTotAgo = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-08-01 00:00:00' and '".$ano."-08-31 23:59:59'");
                $rowTotAgo = mysqli_num_rows($queryTotAgo);
          //Setembro
                $queryAluSet = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-09-01 00:00:00' and '".$ano."-09-30 23:59:59' AND nvl_acesso = 2 and status = 1;");
                $rowAluSet = mysqli_num_rows($queryAluSet);
                $queryAdmSet = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-09-01 00:00:00' and '".$ano."-09-30 23:59:59' AND nvl_acesso = 3 and status = 1;");
                $rowAdmSet = mysqli_num_rows($queryAdmSet);
                $queryTotSet = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-09-01 00:00:00' and '".$ano."-09-30 23:59:59'");
                $rowTotSet = mysqli_num_rows($queryTotSet);
          //Outubro
                $queryAluOut = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-10-01 00:00:00' and '".$ano."-10-31 23:59:59' AND nvl_acesso = 2 and status = 1;");
                $rowAluOut = mysqli_num_rows($queryAluOut);
                $queryAdmOut = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-10-01 00:00:00' and '".$ano."-10-31 23:59:59' AND nvl_acesso = 3 and status = 1;");
                $rowAdmOut = mysqli_num_rows($queryAdmOut);
                $queryTotOut = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-10-01 00:00:00' and '".$ano."-10-31 23:59:59'");
                $rowTotOut = mysqli_num_rows($queryTotOut);
          //Novembro
                $queryAluNov = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-11-01 00:00:00' and '".$ano."-11-30 23:59:59' AND nvl_acesso = 2 and status = 1;");
                $rowAluNov = mysqli_num_rows($queryAluNov);
                $queryAdmNov = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-11-01 00:00:00' and '".$ano."-11-30 23:59:59' AND nvl_acesso = 3 and status = 1;");
                $rowAdmNov = mysqli_num_rows($queryAdmNov);
                $queryTotNov = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-11-01 00:00:00' and '".$ano."-11-30 23:59:59'");
                $rowTotNov = mysqli_num_rows($queryTotNov);
          //Dezembro
                $queryAluDez = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-12-01 00:00:00' and '".$ano."-12-31 23:59:59' AND nvl_acesso = 2 and status = 1;");
                $rowAluDez = mysqli_num_rows($queryAluDez);
                $queryAdmDez = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-12-01 00:00:00' and '".$ano."-12-31 23:59:59' AND nvl_acesso = 3 and status = 1;");
                $rowAdmDez = mysqli_num_rows($queryAdmDez);
                $queryTotDez = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '2022-12-01 00:00:00' and '".$ano."-12-31 23:59:59'");
                $rowTotDez = mysqli_num_rows($queryTotDez);
    
?>  
<!DOCTYPE html>  
<html>  
    <head>  
        <title>Relatório de usuários mensais - EADEV </title>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
        <script type="text/javascript">

        google.charts.load('current', {packages: ['corechart', 'bar']});
        google.charts.setOnLoadCallback(drawMultSeries);

function drawMultSeries() {
      var data = google.visualization.arrayToDataTable([
        ['Mês', 'Alunos', "Adm's"],
        ['Janeiro ('+ <?php echo $rowTotJan;?> +')', <?php echo $rowAluJan;?>, <?php echo $rowAdmJan;?>],
        ['Fevereiro ('+ <?php echo $rowTotFev;?> +')', <?php echo $rowAluFev;?>, <?php echo $rowAdmFev;?>],
        ['Março ('+ <?php echo $rowTotMar;?> +')', <?php echo $rowAluMar;?>, <?php echo $rowAdmMar;?>],
        ['Abril ('+ <?php echo $rowTotAbr;?> +')', <?php echo $rowAluAbr;?>, <?php echo $rowAdmAbr;?>],
        ['Maio ('+ <?php echo $rowTotMai;?> +')', <?php echo $rowAluMai;?>, <?php echo $rowAdmMai;?>],
        ['Junho ('+ <?php echo $rowTotJun;?> +')', <?php echo $rowAluJun;?>, <?php echo $rowAdmJun;?>],
        ['Julho ('+ <?php echo $rowTotJul;?> +')', <?php echo $rowAluJul;?>, <?php echo $rowAdmJul;?>],
        ['Agosto ('+ <?php echo $rowTotAgo;?> +')', <?php echo $rowAluAgo;?>, <?php echo $rowAdmAgo;?>],
        ['Setembro ('+ <?php echo $rowTotSet;?> +')', <?php echo $rowAluSet;?>, <?php echo $rowAdmSet;?>],
        ['Outubro ('+ <?php echo $rowTotOut;?> +')', <?php echo $rowAluOut;?>, <?php echo $rowAdmOut;?>],
        ['Novembro ('+ <?php echo $rowTotNov;?> +')', <?php echo $rowAluNov;?>, <?php echo $rowAdmNov;?>],
        ['Dezembro ('+ <?php echo $rowTotDez;?> +')', <?php echo $rowAluDez;?>, <?php echo $rowAdmDez;?>]
      ]);

      var options = {
        series: {
            0: {  // set the options for the first series (columns)
                type: "bars",
                color: '#0ea8a8'

            },
            1: {  // set the options for the second series (line)
                type: "bars",
                color: '#1e2023'

            }},

            
        title: 'Período: 2022',
        chartArea:{left:100,top:70,width:'75%',height:'100%'},
        hAxis: {
          title: 'Total de Usuários',
          minValue: 0
        },
        vAxis: {
          title: '',
        bars: 'horizontal'
        }
      };
      var chart_area = document.getElementById('chart_div');
      var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
      google.visualization.events.addListener(chart, 'ready', function(){
        chart_area.innerHTML = '<img src="' + chart.getImageURI() + '" class="img-responsive">';
        });

        var view = new google.visualization.DataView(data);
      view.setColumns([0, 

                       1, { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                         2, { calc: "stringify",
                         sourceColumn: 2,
                         type: "string",
                         role: "annotation" }]);

        
      chart.draw(view, options);
    }

        </script>  
    </head>  
    <body>  
        <br /><br />  
        <div class="container" id="testing">  
            <div class="panel panel-default">
              <div class="panel-body" align="center">
              <div id="chart_div" style="width: 100%; max-width:800px; height: 550px;"></div>
              </div>
            </div>
        </div>
  <br />
  <div align="center">
   <form method="post" id="make_pdf" action="../usuarios.php">
    <input type="hidden" name="hidden_html" id="hidden_html" />
    <button type="button" name="create_pdf" id="create_pdf" class="btn btn-danger btn-xs">Make PDF</button>
   </form>
  </div>
  <br />
  <br />
  <br />
    </body>  
</html>

<script>
$(document).ready(function(){
 $('#create_pdf').click(function(){
  $('#hidden_html').val($('#testing').html());
  $('#make_pdf').submit();
 });
});
</script>