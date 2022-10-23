<script>
//Grafico Geral
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawMultSeries);

function drawMultSeries() {
      var data = google.visualization.arrayToDataTable([
      ['Mês', "Administradores"],
      ['Janeiro', <?php echo $rowAdmJan;?>],
      ['Fevereiro', <?php echo $rowAdmFev;?>],
      ['Março', <?php echo $rowAdmMar;?>],
      ['Abril', <?php echo $rowAdmAbr;?>],
      ['Maio', <?php echo $rowAdmMai;?>],
      ['Junho', <?php echo $rowAdmJun;?>],
      ['Julho', <?php echo $rowAdmJul;?>],
      ['Agosto', <?php echo $rowAdmAgo;?>],
      ['Setembro', <?php echo $rowAdmSet;?>],
      ['Outubro', <?php echo $rowAdmOut;?>],
      ['Novembro', <?php echo $rowAdmNov;?>],
      ['Dezembro', <?php echo $rowAdmDez;?>]
      ]);

      var options = {
      series: {
            0: {  // set the options for the first series (columns)
            type: "bars",
            color: '#1e2023'
            }},

      title: 'Período: <?php echo $ano;?>',
      chartArea:{left:100,top:70,width:'67%',height:'65%'},
      hAxis: {
      title: 'Total de Administradores',
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