<script>
//Grafico Geral
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawMultSeries);

function drawMultSeries() {
      var data = google.visualization.arrayToDataTable([
      ['Mês', 'Alunos', "Administradores"],
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
      title: 'Período: <?php echo $ano;?>',
      chartArea:{left:100,top:70,width:'67%',height:'65%'},
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