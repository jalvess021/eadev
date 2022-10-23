<?php 
	//Definindo nível de acesso para esta página & fazendo a verificação.
    $nivel_necessario = 3;
    include "base/testa_nivel.php"; 
    include "base/config.php";

    $anoAnteriorAnterior = date('Y', strtotime('-2 year'));
    $anoAnterior = date('Y', strtotime('-1 year'));
    $anoAtual = date('Y');
   

    $queryAntAnt = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '".$anoAnteriorAnterior."-01-01 00:00:00' and '".$anoAnteriorAnterior."-12-31 23:59:59'");
    $rowAntAnt = mysqli_num_rows($queryAntAnt);

    $queryAnt = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '".$anoAnterior."-01-01 00:00:00' and '".$anoAnterior."-12-31 23:59:59'");
    $rowAnt = mysqli_num_rows($queryAnt);

    $queryAtu = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '".$anoAtual."-01-01 00:00:00' and '".$anoAtual."-12-31 23:59:59'");
    $rowAtu = mysqli_num_rows($queryAtu);
    
    if ($rowAntAnt > 0) {
      $optAnteriorAnterior = "<option value='".$anoAnteriorAnterior."'>".$anoAnteriorAnterior."</option>";
    }else {
      $optAnteriorAnterior = "<option value='".$anoAnteriorAnterior."' disabled>". $anoAnteriorAnterior." - Sem registros!</option>";
    }

    if ($rowAnt > 0) {
      $optAnterior = "<option value='".$anoAnterior."'>".$anoAnterior."</option>";
    }else {
      $optAnterior = "<option value='".$anoAnterior."' disabled>". $anoAnterior." - Sem registros!</option>";
    }

    if ($rowAtu > 0) {
      $optAtual = "<option value='".$anoAtual."' selected>".$anoAtual."</option>";
    }else {
      $optAtual = "<option value='".$anoAtual."' selected disabled>".$anoAtual." - Sem registros!</option>";
    }
?>
<style>
#chart-usu-control  .highcharts-title {
    fill: #272727c0 !important;
    font-weight: 600 !important;
    font-size: 17pt !important;
}


#chart-3d-control-usu{
  height: 350px !important;
}
</style>
<h3 class="content-title">Painel</h3>
<h6 class="info-con">Última atualização [ <span id="time-control"></span> ]</h6>
<h6 class="info-con-min"> Os registros são atualizados a cada 15 segundos!</h6>
<div id="all-count">
  <p class="info-count"> Atualizando em: <span id="gfTimeUsu">15</span> </p>
</div>

<hr>
<div class="d-flex flex-row justify-content-between">
  <h5 class='legend-control'>Usuários</h5>
    <!-- Chama o Formulário para adicionar Cursos -->
    <a class="btn btn-sm bt-padrao float-right" data-toggle='modal' data-target='#relGerUsu'><i class="bi bi-file-earmark-bar-graph-fill"></i> Relatório</a>
</div>
<div class="control-plataform">
    <div class="row justify-content-center align-items-center">
      
    </div>  
    <div class="row c1-row justify-content-center align-items-center">
        <div class="col-lg-8">
          <figure class="highcharts-figure">
              <div id="chart-3d-control-usu"></div>
            </figure>
        </div>
        <div class="col-lg-4 d-flex flex-column justify-content-center col-cons-control">
          <a href=""><button type="button" class="btn btn-secondary btn-lg btn-block bt-control-cons-alu" data-toggle='tooltip' data-placement='top' title='Consultar'><i class="fa fa-fw fa-graduation-cap" aria-hidden="true"></i> Alunos | <span id='num-control-alu'></span> |</button></a>
          <a href="?content_adm=consulta_adm"><button type="button" class="btn btn-primary btn-lg btn-block bt-control-cons-adm" data-toggle='tooltip' data-placement='top' title='Consultar'><i class="fa fa-fw fa-user" aria-hidden="true"></i> Administradores | <span id='num-control-adm'></span> |</button></a>
        </div>
    </div>
    <!--
    <hr>
    <div class="d-flex flex-row justify-content-between">
      <h5>Certificados</h5>
        <a href="?content_adm=lista_aula&add=aula" class="btn btn-sm bt-padrao float-right"><i class="bi bi-file-earmark-bar-graph-fill"></i> Relatório</a>
    </div>
    <div class="c2-row row">
      <div class="col-12">
    
    </div>-->
</div>
<?php
    echo "<!-- Modal -->
    <div class='modal fade' id='relGerUsu' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true' data-backdrop='static'>
        <div class='modal-dialog modal-dialog-centered' role='document'>
            <div class='modal-content'>
            <div class='modal-header bg-secondary text-white font-weight-bold'>
                <h5 class='modal-title' id='exampleModalCenterTitle'><i class='bi bi-file-earmark-bar-graph-fill'></i> Relatório de controle de usuários </h5>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
                </button>
            </div>
            <div class='modal-body'>
                <form action='' method='post'>
                    <div class='form-group'>
                        <label for='exampleFormControlInput1'>Selecione o tipo do usuário: </label>
                        <select class='custom-select custom-select-sm' id='filterUserDefault'>
                        <option disabled selected>Filtrar por usuário</option>
                        <option value='all'>Todos</option>
                        <option value='alu'>Alunos</option>
                        <option value='adm'>Administradores</option>
                        </select>
                    </div>
                    <div class='form-group'>
                        <label for='exampleFormControlInput1'>Selecione o período: </label>
                        <select class='custom-select custom-select-sm' id='filterUserDefaultPer'>
                        <option selected disabled>Filtrar por período (Ano)</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class='modal-footer'>
                <button type='button' class='btn btn-sm btn-secondary font-weight-bold' data-dismiss='modal'><i class='bi bi-x-circle-fill'></i> Fechar</button>
                <a id='linkRelUsuPainel' href=''><button class='btn btn-sm btn-success font-weight-bold text-white' id='btnRelUsuPainel' disabled><i class='bi bi-check-all'></i> Gerar relatório</button></a>
            </div>
            </div>
        </div>
    </div>";
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="crossorigin="anonymous"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
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

var size;

var altura = window.screen.height;
var largura = window.screen.width;

var sz;

if (largura < 631) {
  sz = 110;
}else if (largura < 681){
sz = 130;
}else{
  sz  = 150;
}
    
function gfUsu() {
  $.getJSON('base/dashboard/usu_content/adm/painel-control/control_usu.php', function(dados) {
    
    //COntrole de usuários por mes
        Highcharts.chart('chart-3d-control-usu', {
          colors: ['#0ea8a8', 'rgba(8, 8, 8, 0.923)'],
          chart: {
            type: 'column',
            options3d: {
              enabled: true,
              alpha: 10,
              beta: 0,
              depth: 100
            }
          },
          title: {
            text: 'Total de usuários: <strong>'+dados.total_usu+'</strong>'
          },
          subtitle: {
            text: 'N&#176; de <em>novos</em> usuários mensais | Período vigente: ' +
              '<strong>'+dados.ano_vigente+'</strong>'
          },
          plotOptions: {
            column: {
              depth: 30
            }
          },
          xAxis: {
            categories: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho',
              'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            labels: {
              skew3d: true,
              style: {
                fontSize: '16px'
              }
            }
          },
          yAxis: {
            title: {
              text: '',
              margin: 20
            }
          },
          series: [{
            name: 'Alunos',
            data: [dados.mes_usu.jan_alu, dados.mes_usu.fev_alu, dados.mes_usu.mar_alu, dados.mes_usu.abr_alu, dados.mes_usu.mai_alu,
            dados.mes_usu.jun_alu, dados.mes_usu.jul_alu, dados.mes_usu.ago_alu, dados.mes_usu.set_alu, dados.mes_usu.out_alu, dados.mes_usu.nov_alu, dados.mes_usu.dez_alu]
          },{
            name: 'Administradores',
            data: [dados.mes_usu.jan_adm, dados.mes_usu.fev_adm, dados.mes_usu.mar_adm, dados.mes_usu.abr_adm, dados.mes_usu.mai_adm,
            dados.mes_usu.jun_adm, dados.mes_usu.jul_adm, dados.mes_usu.ago_adm, dados.mes_usu.set_adm, dados.mes_usu.out_adm, dados.mes_usu.nov_adm, dados.mes_usu.dez_adm]
          }],credits: {
                  enabled: false
                }
        });  
    
        $('#time-control').html(dados.tempo); 
        $('#num-control-alu').html(dados.total_alu); 
        $('#num-control-adm').html(dados.total_adm); 
        
          
    });
}

    //executa a função ao carregar
    $(document).ready(gfUsu());
    //Executa a função a cada 1 seg
    setInterval(() => { gfUsu(); }, 15000);

    setInterval(() => {
        if ($("#filterUserDefaultPer").val() == null) {
          $("#btnRelUsuPainel").attr('disabled', true);
        }else{
          $("#btnRelUsuPainel").removeAttr('disabled');
          $("#linkRelUsuPainel").attr('href', '/tcc/relatorios/usuarios.php?user='+$('#filterUserDefault').val()+'&periodo='+$('#filterUserDefaultPer').val());
        }
    }, 0);

    $(document).ready(function(){
        $('#filterUserDefault').change(function(){
           $('#filterUserDefaultPer').load('/tcc/selects/select_periodo_user.php?filter_user='+$('#filterUserDefault').val());
        });
    });

  

  
</script>