<script>
//Grafico Geral
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawMultSeries);

function drawMultSeries() {
      var data = google.visualization.arrayToDataTable([
      ['Mês', 'Alunos'],
      ['Janeiro', <?php echo $rowAluJan;?>],
      ['Fevereiro', <?php echo $rowAluFev;?>],
      ['Março', <?php echo $rowAluMar;?>],
      ['Abril', <?php echo $rowAluAbr;?>],
      ['Maio', <?php echo $rowAluMai;?>],
      ['Junho', <?php echo $rowAluJun;?>],
      ['Julho', <?php echo $rowAluJul;?>],
      ['Agosto', <?php echo $rowAluAgo;?>],
      ['Setembro', <?php echo $rowAluSet;?>],
      ['Outubro', <?php echo $rowAluOut;?>],
      ['Novembro', <?php echo $rowAluNov;?>],
      ['Dezembro', <?php echo $rowAluDez;?>]
      ]);

      var options = {
      series: {
            0: {  // set the options for the first series (columns)
            type: "bars",
            color: '#0ea8a8'
            }},

      title: 'Período: <?php echo $ano;?>',
      chartArea:{left:100,top:70,width:'67%',height:'65%'},
      hAxis: {
      title: 'Total de Alunos',
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
      view.setColumns([0, 1, { calc: "stringify",
                        sourceColumn: 1,
                        type: "string",
                        role: "annotation" }]);
      chart.draw(view, options);
}
</script>