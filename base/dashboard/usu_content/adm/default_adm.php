<?php 
	//Definindo nível de acesso para esta página & fazendo a verificação.
    $nivel_necessario = 3;
    include "base/testa_nivel.php"; 
?>

<h3 class="content-title">Painel</h3>
<h6 class="info-con">Última atualização [ <span id="time-control"></span> ]</h6>
<h6 class="info-con-min"> Os registros são atualizados a cada 15 segundos!</h6>
<div id="all-count">
  <p class="info-count"> Atualizando em: <span id="gfTimeUsu">15</span> </p>
</div>

<hr>
	
<div class="d-flex flex-row justify-content-between">
  <h5>Usuários</h5>
    <!-- Chama o Formulário para adicionar Cursos -->
    <a href="?content_adm=lista_aula&add=aula" class="btn btn-sm bt-padrao float-right"><i class="bi bi-file-earmark-bar-graph-fill"></i> Relatório</a>
</div>
<div class="control-plataform">
    <div class="row c1-row justify-content-center align-items-center">
        <div class="col-xl-7 justify-content-center" id="gl"> 
        <figure class="highcharts-figure">
          <div id="container"></div>
        </figure>
         <!-- <div id="piechart" style="width: 100%; height: 500px;"></div> -->
        </div>
        <div class="table-responsive col-xl-5 table-control">
          <div class="all-table-body">
               <table class='table table-striped tabela-gr tb-control' cellspacing='0' cellpading='0'>
                <caption class='small filter-label'> <i class='bi bi-funnel-fill'></i> Usuários ( <span id='numeroUsuTb'></span> ) </capiton>
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
                      <td class='text-center'><span id='numeroAdmTb'></span></td>
                      <td class='actions btn-group-sm'>
                      <a class='btn btn-info btn-xs' href='?content_adm=consulta_adm' data-toggle='tooltip' data-placement='top' title='Visualizar'> <i class='bi bi-person-lines-fill'></i> </a>
                    </tr>
                    <tr>
                      <td data-toggle='tooltip' data-placement='top' title='Aluno'>Educacional</td>
                      <td class='text-center'> <span id='numeroAluTb'><span></td>
                      <td class='actions btn-group-sm'>
                        <a class='btn btn-info btn-xs' href='?content_adm=consulta_alu' data-toggle='tooltip' data-placement='top' title='Visualizar'> <i class='bi bi-person-lines-fill'></i> </a> 
                      </td>
                    </tr>
                  </tbody>
                </table>
          </div>
	      </div>
    </div>
    <hr>
    <div class="d-flex flex-row justify-content-between">
      <h5>Certificados</h5>
        <!-- Chama o Formulário para adicionar Cursos -->
        <a href="?content_adm=lista_aula&add=aula" class="btn btn-sm bt-padrao float-right"><i class="bi bi-file-earmark-bar-graph-fill"></i> Relatório</a>
    </div>
    <div class="c2-row row">
      <div class="col-12">
      <div id="curve_chart" style=" height: 500px"></div>
      </div>
    
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="crossorigin="anonymous"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>

// Atualizar os dados a cada 15s recarregando a pág;
var counter = 15;
window.setInterval(function () {
    counter--;
    if (counter >= 0) {
        span = document.getElementById("gfTimeUsu");
        span.innerHTML = counter;
    }
    if (counter === 0) {
        counter = 15;
    }

}, 1000);
    
function gfUsu() {
  $.getJSON('base/dashboard/usu_content/adm/painel-control/control_usu.php', function(dados) {
        Highcharts.chart('container', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: 0,
            plotShadow: false
        },
        title: {
            text: 'Usuários: '+ dados.total_usu,
            align: 'center',
            verticalAlign: 'middle',
            y: 60
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                dataLabels: {
                    enabled: true,
                    distance: -50,
                    style: {
                        fontWeight: 'bold',
                        color: 'white'
                    }
                },
                startAngle: -90,
                endAngle: 90,
                center: ['50%', '75%'],
                size: '110%'
            }
        },
        series: [{
            type: 'pie',
            name: 'Porcentagem',
            innerSize: '50%',
            data: [
                ['Alunos', dados.total_alu],
                ['Administradores', dados.total_adm]
            ]
        }]
});
        $('#time-control').html(dados.tempo);
        $('#numeroAdmTb').html(dados.total_adm);
        $('#numeroAluTb').html(dados.total_alu);
        $('#numeroUsuTb').html(dados.total_usu);       
    });
}

    //executa a função ao carregar
    $(document).ready(gfUsu());
    //Executa a função a cada 1 seg
    setInterval(() => { gfUsu(); }, 15000);
</script>