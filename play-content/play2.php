<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/all-play.css">
    <title> Conteúdo | Eadev</title>
</head>
<body>

<?php
    require "./base/config.php";
    //$id_usu = $_SESSION['UsuarioID'];


    if (isset($_GET['page']) && $_GET['page'] === "play_video") {
        if (isset($_GET['curso'])) {
            $sigla = $_GET['curso'];
            //Selecionando as informações do curso através da url
            $sqlCur = mysqli_query($con, "SELECT * FROM curso WHERE sigla_curso = '".$_GET['curso']."';");
            $infoCur = mysqli_fetch_array($sqlCur);
            $cur = (int) $infoCur['id_curso'];
            if (mysqli_num_rows($sqlCur) > 0) {
                //Selecionando as informações dos módulos através do curso
                $sqlMod = mysqli_query($con, "SELECT * from modulo where id_curso = ".$cur.";");
                if (isset($_GET['aula'])) {
                    $sqlAula = mysqli_query($con, "SELECT * FROM aula WHERE id_aula = '".$_GET['aula']."';");
                    $infoAula = mysqli_fetch_array($sqlAula);
                        if ((mysqli_num_rows($sqlAula) > 0)) {
                            echo "
                        <div class='d-flex flex-row background'>
                            <div class='div1'>
                                <iframe src='https://www.youtube-nocookie.com/embed/".$infoAula['id_video']."?&theme=dark&autohide=2&modestbranding=1&showinfo=0&rel=0&iv_load_policy=3&start=".$infoAula['start_aula']."&end=".$infoAula['end_aula']."' title='".$infoAula['tit_aula']." (Via Youtube)' frameborder='0' allow='accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>
                                <div class='d-flex flex-row group-down'>
                                    <div class='col'>
                                        <div class='d-flex flex-row group-cur'>
                                            <a href='?page=play_curso&curso=".$infoCur['sigla_curso']."'> <p class='sg-cur'>".$infoCur['sigla_curso']."</p> </a>
                                            <i class='bi bi-chevron-right'></i>
                                            <p class='int-cur'>".$infoCur['nome_curso']."</p>
                                        </div>
                                        <h4 class='name-video'>".$infoAula['tit_aula']."</h4>
                                    </div>
                                    <!--<form action='?page=play_video' method='POST'> 
                                        <button class='group-button'>Concluir</button>
                                    </form>-->
                                    <button class='group-button-1' disabled>Concluída <i class='bi bi-patch-check-fill'></i></button>
                                </div>
                            </div>
                            <div class='div2'>
                                <h4 class='title-view'>".$infoCur['nome_curso']."</h4>
                                <p class='subtitle-view'> Vídeo aula - ( Via Youtube )</p>
                                <p class='text-view'>".$infoCur['desc_curso']."</p>
                                <hr class='line-view'>
            
                                <div class='all-cur-view'> ";

                                //Selecionando as informações dos módulos através do curso
                                $sqlMod = mysqli_query($con, "SELECT * from modulo where id_curso = ".$cur.";");
                                while ($infoMod = mysqli_fetch_array($sqlMod)) {
                                    echo "
                                    <h4 class='subtitle-view2'>".$infoMod['nome_mod']."</h4> ";

                                     //Selecionando as informações das aulas através do módulo
                                    $sqlAula1 = mysqli_query($con, "SELECT * from aula where id_mod = ".$infoMod['id_mod'].";");
                                        while ($infoAula1 = mysqli_fetch_array($sqlAula1)) {
                                            echo "
                                            <div class='d-flex flex-row cur-view'>
                                                <i class='bi bi-camera-video cam-view'></i> ";
                                                 echo (strlen($infoAula1['tit_aula']) <= 31) ? "<p class='name-cur-view'> ".$infoAula1['tit_aula']."</p>" : 
                                                 "<p class='name-cur-view' data-bs-toggle='tooltip' data-bs-placement='top' data-bs-title='".$infoAula1['tit_aula']."'> ".substr($infoAula1['tit_aula'], 0, 25).'... </p>'; 
                                        echo "   
                                                <a href='?page=play_video&curso=".$infoCur['sigla_curso']."&aula=".$infoAula1['id_aula']."' class='play-view'><i class='bi bi-play-circle'></i></a>
                                            </div>";
                                        }
                                }
                        echo"
                                </div>
            
                            </div>
                        </div>
                    ";
                        }
                    }
            }
        }
        
    }
?>

<!--
<div class="d-flex flex-row background">

        
            <div class="div1">
                <iframe src="https://www.youtube-nocookie.com/embed/DjOSM72cYac?&theme=dark&autohide=2&modestbranding=1&showinfo=0&rel=0&iv_load_policy=3&start=180" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            
                <div class="d-flex flex-row group-down">
            
                    <div class="col">
                        <div class="d-flex flex-row group-cur">
                            <p class="sg-cur">Html</p>
                            <i class="bi bi-chevron-right"></i>
                            <p class="int-cur">HiperText Markup Language</p>
                        </div>
                        <h4 class="name-video">Formatos de vídeo para o seu site</h4>
                    </div>
                    <button class="group-button">Concluir</button>
                </div>
            </div>
        

        <div class="div2">

            <h4 class="title-view">HiperText Markup Language</h4>

            <p class="subtitle-view">Com Gustavo Guanabara</p>

            <p class="text-view">TML (Linguagem de Marcação de HiperTexto) é o bloco de construção mais básico da web. Define o significado e a estrutura do conteúdo da web.</p>
            
            <hr class="line-view">

            <div class="all-cur-view">
                <h4 class="subtitle-view2">Módulo 1</h4>
                <div class=" d-flex flex-row cur-view">
                    <i class="bi bi-camera-video cam-view"></i>
                    <p class="name-cur-view">Formatos de vídeo para o seu site</p>
                    <a href="?page=play_video" class="play-view"><i class="bi bi-play-circle "></i></a>
                </div>

                <div class=" d-flex flex-row cur-view">
                    <i class="bi bi-camera-video cam-view"></i>
                    <p class="name-cur-view">Formatos de vídeo para o seu site</p>
                    <a href="?page=play_video" class="play-view"><i class="bi bi-play-circle "></i></a>
                </div>

                <div class=" d-flex flex-row cur-view">
                    <i class="bi bi-camera-video cam-view"></i>
                    <p class="name-cur-view">Formatos de vídeo para o seu site</p>
                    <a href="?page=play_video" class="play-view"><i class="bi bi-play-circle "></i></a>
                </div>

                <div class=" d-flex flex-row cur-view">
                    <i class="bi bi-camera-video cam-view"></i>
                    <p class="name-cur-view">Formatos de vídeo para o seu site</p>
                    <a href="?page=play_video" class="play-view"><i class="bi bi-play-circle "></i></a>
                </div>

                <h4 class="subtitle-view2">Módulo 2</h4>
                <div class=" d-flex flex-row cur-view">
                    <i class="bi bi-camera-video cam-view"></i>
                    <p class="name-cur-view">Formatos de vídeo para o seu site</p>
                    <a href="?page=play_video" class="play-view"><i class="bi bi-play-circle "></i></a>
                </div>

                <div class=" d-flex flex-row cur-view">
                    <i class="bi bi-camera-video cam-view"></i>
                    <p class="name-cur-view">Formatos de vídeo para o seu site</p>
                    <a href="?page=play_video" class="play-view"><i class="bi bi-play-circle "></i></a>
                </div>

                <div class=" d-flex flex-row cur-view">
                    <i class="bi bi-camera-video cam-view"></i>
                    <p class="name-cur-view">Formatos de vídeo para o seu site</p>
                    <a href="?page=play_video" class="play-view"><i class="bi bi-play-circle "></i></a>
                </div>

                <div class=" d-flex flex-row cur-view">
                    <i class="bi bi-camera-video cam-view"></i>
                    <p class="name-cur-view">Formatos de vídeo para o seu site</p>
                    <a href="?page=play_video" class="play-view"><i class="bi bi-play-circle "></i></a>
                </div>

                <h4 class="subtitle-view2">Módulo 3</h4>
                <div class=" d-flex flex-row cur-view">
                    <i class="bi bi-camera-video cam-view"></i>
                    <p class="name-cur-view">Formatos de vídeo para o seu site</p>
                    <a href="?page=play_video" class="play-view"><i class="bi bi-play-circle "></i></a>
                </div>

                <div class=" d-flex flex-row cur-view">
                    <i class="bi bi-camera-video cam-view"></i>
                    <p class="name-cur-view">Formatos de vídeo para o seu site</p>
                    <a href="?page=play_video" class="play-view"><i class="bi bi-play-circle "></i></a>
                </div>

                <div class=" d-flex flex-row cur-view">
                    <i class="bi bi-camera-video cam-view"></i>
                    <p class="name-cur-view">Formatos de vídeo para o seu site</p>
                    <a href="?page=play_video" class="play-view"><i class="bi bi-play-circle "></i></a>
                </div>

                <div class=" d-flex flex-row cur-view">
                    <i class="bi bi-camera-video cam-view"></i>
                    <p class="name-cur-view">Formatos de vídeo para o seu site</p>
                    <a href="?page=play_video" class="play-view"><i class="bi bi-play-circle "></i></a>
                </div>
            </div>

        </div>

</div> -->


































</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script> 
      const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
</script> 
</html>