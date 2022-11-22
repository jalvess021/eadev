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
    <div class="group-alu ">
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
            </div>
        </div>
        <div class=" group-progress d-flex flex-row ">
                <div class=" group-progress1 d-flex flex-column justify-content-center ">
                    <div class="circular-progress"> 
                        <div class="value-container">
                            0%
                        </div>
                    </div>
                    <h4 class="text-progress ">Questionários</h4>
                </div>
                <div class=" group-progress2 d-flex flex-column">
                    <div class="circular-progress2"> 
                        <div class="value-container2">
                            0%
                        </div>
                    </div>
                    <h4 class="text-progress ">Certificado</h4>
                </div>
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
<script>
    
    //Questionario
        let progressBar = document.querySelector(".circular-progress");
        let valueContainer = document.querySelector(".value-container");

        let progressValue = 0;
        let progressEndValue = 60;

            if (progressEndValue >= 2) {
                let progress = setInterval(() => {
                        
                        progressValue++;
                        valueContainer.textContent = `${progressValue}%`;
                        progressBar.style.background = `conic-gradient(
                        #10a3a3 ${progressValue * 3.6}deg,
                        rgb(247, 247, 247) ${progressValue * 3.6}deg
                        )`;
                        if (progressValue == progressEndValue) {
                        clearInterval(progress);
                        }
                    },30);
            }
        
    //Certificado
        let progressBar2 = document.querySelector(".circular-progress2");
        let valueContainer2 = document.querySelector(".value-container2");

        let progressValue2 = 0;
        let progressEndValue2 = 25;

            if (progressEndValue2 >= 2) {
                    let progress2 = setInterval(() => {
                    progressValue2++;
                    valueContainer2.textContent = `${progressValue2}%`;
                    progressBar2.style.background = `conic-gradient(
                        #10a3a3 ${progressValue2 * 3.6}deg,
                        rgb(247, 247, 247) ${progressValue2 * 3.6}deg
                    )`;
                    if (progressValue2 == progressEndValue2) {
                        clearInterval(progress2);
                    }
                    },30);
            }
</script>

<!--
<div class="pag-alert">
    <div class="alert_view">
        <i class="bi bi-exclamation-triangle icon-alert"></i>
        <p class="text-alert">Atenção!!! Site em construção</p>
    </div>
</div> -->