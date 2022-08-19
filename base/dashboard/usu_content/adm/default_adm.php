
<?php
$sqlUsu = mysqli_query($con, "SELECT * from usuario;");
$rowUsu = mysqli_num_rows($sqlUsu);

$sqlAlu = mysqli_query($con, "SELECT * from aluno;");
$rowAlu = mysqli_num_rows($sqlAlu);

$sqlAdm = mysqli_query($con, "SELECT * from usuario where nvl_acesso = 3;");
$rowAdm = mysqli_num_rows($sqlAdm);

?>

<h3 class="content-title">Painel</h3>
<h6 class="info-con">Última atualização [ <span id="time-control"><?php  echo date('H:i:s | d-m-Y');?></span> ]</h6>
<h6 class="info-con-min"> Os registros são atualizados a cada 15 segundos! </h6>
<hr>
<h4> Usuários</h4>	
<div class="control-plataform">
    <div class="row c1-row justify-content-center align-items-center">
        <div class="col-xl-7 justify-content-center"> 
          <div id="piechart" style="width: 900px; height: 500px;"></div>
        </div>
        <div class="table-responsive col-xl-5 table-control">
          <div class="all-table-body">
               <table class='table table-striped tabela-gr tb-control' cellspacing='0' cellpading='0'>
                <caption class='small filter-label'> <i class='bi bi-funnel-fill'></i> Usuários ( <span id='numeroUsuTb'><?php echo $rowUsu;?></span> ) </capiton>
                  <thead>
                    <tr class='thead tb-hd'>
                      <td>Nível:</td>
                      <td class='text-center'>Cadastrados:</td>
                      <td class='actions'>Consultar</td>
                    </tr>
                  </thead>
                  <tbody id='tbody_cur'>
                    <tr>
                      <td data-toggle='tooltip' data-placement='top' title='Adm'>Administrativo</td>
                      <td class='text-center'><span id='numeroAdmTb'><?php echo $rowAdm;?></span></td>
                      <td class='actions btn-group-sm'>
                      <a class='btn btn-info btn-xs' href='' data-toggle='tooltip' data-placement='top' title='Visualizar'> <i class='bi bi-person-lines-fill'></i> </a>
                    </tr>
                    <tr>
                      <td data-toggle='tooltip' data-placement='top' title='Aluno'>Educacional</td>
                      <td class='text-center'> <span id='numeroAluTb'><?php echo $rowAlu;?><span></td>
                      <td class='actions btn-group-sm'>
                        <a class='btn btn-info btn-xs' href='' data-toggle='tooltip' data-placement='top' title='Visualizar'> <i class='bi bi-person-lines-fill'></i> </a> 
                      </td>
                    </tr>
                  </tbody>
                </table>
          </div>
	      </div>
    </div>
    <hr>
    <h4 id="ds">Certificados</h4>
    <div class="c2-row">
    <div id="curve_chart" style="width: 900px; height: 500px"></div>
    </div>
</div>
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
<script>

    //ATUALIZANDO EM TEMPO REAL 10s
    setInterval(function update_visitas(){ //função que será carregada
            $.ajax({url: "base/dashboard/usu_content/adm/painel-control/data.php", // ajax que vai carregar o arquivo PHP
                    cache: false, // remover cache caso haja
                    success: function(resultData){ //se carregar com sucesso, carrega os dados do PHP
                      $('#time-control').html(resultData); //exibe dentro da DIV #numeroUsu a saída do PHP
            }});  

            $.ajax({url: "base/dashboard/usu_content/adm/painel-control/control_adm.php",
                    cache: false, 
                    success: function(resultAdm){ 
                      $('#numeroAdmTb').html(resultAdm); 
            }});  

          $.ajax({url: "base/dashboard/usu_content/adm/painel-control/control_alu.php",
                  cache: false,
                  success: function(resultAlu){
                    $('#numeroAluTb').html(resultAlu);
          }}); 

          $.ajax({url: "base/dashboard/usu_content/adm/painel-control/control.php", 
                  cache: false,
                  success: function(result){ 
                    $('#numeroUsuTb').html(result); 
                 }});  

          //GRAFICO USUARIO
         /* google.charts.load('current', {'packages':['corechart']});
          google.charts.setOnLoadCallback(drawChart);

          $.ajax({url: "base/dashboard/usu_content/adm/painel-control/control_both.php", // ajax que vai carregar o arquivo PHP
                  cache: false, // remover cache caso haja
                  success: function(result){ //se carregar com sucesso, carrega os dados do PHP
                  
                  function drawChart() {

                      var data = google.visualization.arrayToDataTable([
                        ['Task', 'Hours per Day'],
                        ['Alunos',   492],
                        ['Administradores',      40]
                      ]);

                      var options = {
                        title: 'Usuários',
                        is3D: true,
                        slices: {
                          0: { color: '#0CB7B7' },
                          1: { color: '#6b6b6b' }
                        }
                      };
                      var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                      chart.draw(data, options);
                      } 
                 }}); */
          

    },15000); // vai rodar a função a cada 15000 milésimos (15 segundos)
    

    //TESTE AJAX MESMA PAG.
    /*
    $(document).ready(function() {
    $('img').click(function(){
      //alert("Alerta chamada pelo click na imagem PHP");
      var nome = $('#nome').val();
      var email = $('#email').val();

      var varDados = 'nome=' + nome + '&email=' + email;
      console.log(varDados);

      $.ajax({
        type: 'POST',
        url: 'funcoes.php',
        data: varDados,
        success: function() {
          alert('Alerta Sucesso do Ajax: função PHP chamada com sucesso');
        }
      });

    });



    $(document).on('click', '.delete', function(){

$tr = $(this).closest('tr');

$.ajax({
	type: "POST",
	url: "apagar.php",
	data: {id: $tr.attr('id')}
	success: function(data){
		$tr.remove();
	}
});
});
    
    */
</script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>

          google.charts.load('current', {'packages':['corechart']});
          google.charts.setOnLoadCallback(drawChart);

          let numAlu = $.ajax({url: "base/dashboard/usu_content/adm/painel-control/control_adm.php",
                      cache: false, 
                      success: function(resultAdm){ 
                      numAdm = parseInt(resultAdm);
                    }}); 
          let numAdm = $.ajax({url: "base/dashboard/usu_content/adm/painel-control/control_alu.php",
                        cache: false,
                        success: function(resultAlu){
                        numAlu = parseInt(resultAlu);
                    }}); 

          /*  setInterval(() => {
                $.ajax({url: "base/dashboard/usu_content/adm/painel-control/control_adm.php",
                        cache: false, 
                        success: function(resultAdm){ 
                         // numAdm = parseInt(resultAdm);
                         numAdm = 40;
                        
                }}); 

                $.ajax({url: "base/dashboard/usu_content/adm/painel-control/control_alu.php",
                      cache: false,
                      success: function(resultAlu){
                        // numAlu = parseInt(resultAlu);
                        numAlu = 300;
              }}); 
          }, 3000); */
          
          function drawChart() {

          var data = google.visualization.arrayToDataTable([
            ['Usuários', 'Quantidade'],
            ['Alunos',  numAlu],
            ['Administradores', numAdm]
          ]);

          var options = {
            title: 'Usuários',
            is3D: true,
            slices: {
              0: { color: '#0CB7B7' },
              1: { color: '#6b6b6b' }
            }
          };
          var chart = new google.visualization.PieChart(document.getElementById('piechart'));
          chart.draw(data, options);
          }
          
</script>
  

<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Mês', 'Alunos aptos', 'Certificados'],
          ['Janeiro',  1000, 200],
          ['Fevereiro',  1170,400],
          ['Março',  660,204],
          ['Abril',  1030,410],
          ['Maio',  1030,480],
          ['Junho',  1070,20],
          ['Julho',  3030,2690],
          ['Agosto',  2030,1000]
        ]);

        var options = {
          title: 'Certificados emitidos',
          curveType: 'function',
          legend: { position: 'right' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>