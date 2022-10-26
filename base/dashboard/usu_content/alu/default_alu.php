<?php
    $nivel_necessario = 2;
    include "base/testa_nivel.php";
/*
    $id_usu = $_SESSION['UsuarioID'];
    $resAlu = mysqli_query($con, "SELECT * from aluno where id_usu = ".$id_usu.";");
    $infoAlu = mysqli_fetch_array($resAlu);

    //Conta todas as aulas que o aluno está inserido
    $percentAll = mysqli_query($con, "SELECT aa.* from aula_alu aa INNER JOIN aula a ON aa.id_aula = a.id_aula INNER JOIN modulo m on a.id_mod = m.id_mod INNER JOIN curso c ON m.id_curso = c.id_curso AND c.sigla_curso = '".$_GET['curso']."' WHERE aa.id_aluno = ".$infoAlu['id_aluno'].";");
    $numPercentAll = mysqli_num_rows($percentAll);

    //Conta todas as aulas que o aluno concluiu
    $percentCon = mysqli_query($con, "SELECT aa.* from aula_alu aa INNER JOIN aula a ON aa.id_aula = a.id_aula INNER JOIN modulo m on a.id_mod = m.id_mod INNER JOIN curso c ON m.id_curso = c.id_curso AND c.sigla_curso = '".$_GET['curso']."' WHERE aa.id_aluno = ".$infoAlu['id_aluno']." AND aa.status_aula = 2;");
    $numPercentCon = mysqli_num_rows($percentCon);

    //Verifica o progresso em porcentagem
    if ($numPercentAll == 0) {
        $progresso = 0;
    } else {
        $progresso = ($numPercentCon * 100) / $numPercentAll;
    } */
?>
<style>
    /*Crescimento da barra de progressão*/
    @keyframes barprogress1{
        0%{
            width: 0%;
        }
        100%{
            width:25%;
        }
    }

    @keyframes barprogress2{
        0%{
            width: 0%;
        }
        100%{
            width:80%;
        }
    }

    @keyframes barprogress3{
        0%{
            width: 0%;
        }
        100%{
            width:0%;
        }
    }
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>
<h3 class="content-title">Painel</h3>
<div class="default-alu-container">
    <div class="default-alu-body">
        <div class="default-alu-info1">
            <div class="div-alu-col">
                <img src="/tcc/assets/images/users/default.png" alt="">
                <div class="div-alu-subcol">
                    <h1>Meu perfil</h1>
                    <p>5 aulas concluídas nos últimos 7 dias</p>
                    <a href='?content_alu=perfil' class='bt-perfil-alu'>Visualizar perfil</a>
                </div>
            </div>
            <div>
                <hr>
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div>
                                <h6>Progresso em Front-End:</h6>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped" id='barprogress1' role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"><span class='span-progress'>25%</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div>
                                <h6>Progresso em Back-end:</h6>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" id='barprogress2'><span class='span-progress'>80%</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <h6>Progresso em Conver:</h6>
                            <div class="progress" style='margin: 0px 12px 0px 12px !important;'>
                                <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" id='barprogress3'><span class='span-progress'>0%</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    
        <ul class="default-alu-info2">
            <li>
                <h3>Conteúdo verificado</h3>
                <p>Nossa equipe de desenvolvedores e profissionais atuantes na área de T.i indicam nosso sitema de ensino.</p>
            </li>
            <li>
                <h3>Estudo direcionado</h3>
                <p>Preparamos e organizamos todo o material para nossos alunos. </p>
            </li>
            <li>
                <h3>Capacitação exclusiva</h3>
                <p>Torne-se um dos melhores dev's explorando nossa plataforma rica em conteúdo. </p>
            </li>
        </ul>
    </div>
</div>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
  var swiper = new Swiper(".mySwiper", {
    spaceBetween: 30,
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    autoplay: {
    delay: 4000,
  }
  });
</script>
<!--
<div class="pag-alert">
    <div class="alert_view">
        <i class="bi bi-exclamation-triangle icon-alert"></i>
        <p class="text-alert">Atenção!!! Site em construção</p>
    </div>
</div> -->