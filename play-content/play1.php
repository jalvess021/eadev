
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
include "./base/config.php";
if (isset($_GET['page']) && $_GET['page'] === 'play_curso') {
    if (isset($_GET['curso'])) {

        
        //Selecionando as informações do curso através da url
        $sqlCur = mysqli_query($con, "SELECT * FROM curso WHERE sigla_curso = '".$_GET['curso']."';");
        $infoCur = mysqli_fetch_array($sqlCur);
        $cur = $infoCur['id_curso'];

        if (mysqli_num_rows($sqlCur) > 0) {

            //Selecionando as informações dos módulos através do curso
            $sqlMod = mysqli_query($con, "SELECT * modulo where id_curso = '".$cur."';");
            $infoMod = mysqli_fetch_array($sqlMod);

            //Selecionando a qntde. de módulos através do curso
            $sql1 = mysqli_query($con, "SELECT COUNT(id_mod) FROM modulo m WHERE m.id_curso = '".$infoCur['id_curso']."';");
            $row1 = mysqli_fetch_array($sql1);

            //Selecionando a qntde. de aulas através do curso e do módulo
            $sql2 = mysqli_query($con, "SELECT COUNT(id_aula) FROM aula a INNER JOIN modulo AS m ON a.id_mod = m.id_mod AND m.id_curso = '".$infoCur['id_curso']."' ;");
            $row2 = mysqli_fetch_array($sql2);
            
    echo "
            <div class='d-flex flex-row view-overall'>
                <div class='gradient'>
                    <div class='zoom'>
                        <a href='?content_alu=conteudo'><button type='button' class='back'><i class='bi bi-arrow-left'></i> Voltar</button></a>
                        <br>
                        <button type='button' class='info-cur'>".$infoCur['sigla_curso']."</button>
                        <h2 class='title-cur'>".$infoCur['nome_curso']."</h2>
                        <p class='description-cur'>".$infoCur['desc_curso']."</p>
                        <p class='person-cur'>Preparado por: Eadev</p>
                        <div class='d-flex flex-row'>
                            <p class='number-cur'><i class='bi bi-layers-fill'></i>".$row1[0]; echo mysqli_num_rows($sql1) > 1 ? "Módulos" : "Módulo"; echo "</p>";

                            echo "
                            <p class='quant-cur'><i class='bi bi-collection-play-fill '></i> ".$row2[0]; 
                            echo mysqli_num_rows($sql2) > 1 ? "Aulas" : "Aula"; echo "</p>
                        
                        </div>

                        <hr noshade='noshade' class='line'>
                        <div class='d-flex flex-row'>
                            <div class='icon-cur'>
                                <i class='bi bi-star icon-star'></i>
                                <i class='bi bi-star icon-star'></i>
                                <i class='bi bi-star icon-star'></i>
                                <i class='bi bi-star icon-star'></i>
                                <i class='bi bi-star icon-star'></i>
                            </div>
                            <p class='av-cur'>Deixe sua avaliação</p>
                        </div>
                    </div>
                </div>
                <div class='all-class'>
                        <h4 class='title-class1'>Seu progresso</h4>
                        <div class='d-flex flex-row procent-class'>
                            <div class='progress-bar-cur'>
                                    <div class='view-class'></div>
                            </div>
                            <p class='porcent-class'>75%</p>
                        </div>
                        <h3 class='content-title-class'>Aulas</h3>

                        <div class='all-aula'>
                            <div class='all-aula1'> ";

                    while ($infoMod1 = mysqli_fetch_array($sqlMod)){
                        echo "<h4 class='title-class2'>Módulo 1</h4>";
                                
                            //Selecionando as informações da aula através do módulo
                           // $sqlAula = ($con, "SELECT * FROM aula where id_mod = '".$infoMod1['id_mod']."';");
                            while ($infoAula = mysqli_fetch_array($sqlAula)){

                                // Duração da aula
                                $start = $info['start_aula'];
                                $end = $info['end_aula'];
                                $total = $end - $start;

                                // Datas da aula
                                $s1 = $info['dt_criacao'];
                                $date1 = strtotime($s1);
                                $s = $info['dt_alteracao'];
                                $date = strtotime($s);
                                
                                echo "
                                <a class='d-flex flex-row view-lesson' href='?page=play_video&Aula=".$infoAula['id_aula']."'>
                                    <i class='bi bi-camera-video cam'></i>
                                    <p class='name-class'>".$infoAula['tit_aula']."</p>
                                    <p class='time-class'>".gmdate("i", $total).":".gmdate("s", $total)."</p>
                                    <span class='play'><i class='bi bi-play-circle'></i></span>
                                </a>";
                            }

                                echo "<hr class='line-class'>";
                            }
                            
                            

                            echo "
                            </div>
                        </div>

                </div>
            </div>
            ";
            
        }
    }
}
?>

   <!-- <div class="d-flex flex-row view-overall">
        <div class="gradient">
            <div class="zoom">
                <a href="?content_alu=conteudo"><button type="button" class="back"><i class="bi bi-arrow-left"></i> Voltar</button></a>
                <br>
                <button type="button" class="info-cur">Html</button>
                <h2 class="title-cur">HiperText Markup Language</h2>
                <p class="description-cur">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam a augue purus. Morbi vel urna.</p>
                <p class="person-cur">Com Gustavo Guanabara</p>
                <div class=" d-flex flex-row ">
                    <p class="number-cur"><i class='bi bi-layers-fill ' ></i>   3 Módulo</p>
                    <p class="quant-cur"><i class='bi bi-collection-play-fill '></i>     20 Aulas</p>
                </div>
        
                <hr noshade=”noshade” class="line">
                <div class=" d-flex flex-row">
                    <div class="icon-cur">
                        <i class="bi bi-star icon-star"></i>
                        <i class="bi bi-star icon-star"></i>
                        <i class="bi bi-star icon-star"></i>
                        <i class="bi bi-star icon-star"></i>
                        <i class="bi bi-star icon-star"></i>
                    </div>
                    <p class="av-cur">Deixe sua avaliação</p>
                </div>
            </div>
        </div>

        <div class="all-class">
            <h4 class="title-class1">Seu progresso</h4>
                <div class=" d-flex flex-row procent-class">
                    <div class=" progress-bar-cur">
                            <div class="view-class"></div>
                    </div>
                    <p class="porcent-class">75%</p>
                </div>
            <h3 class="content-title-class">Aulas</h3>

            <div class="all-aula">
                <div class="all-aula1">
                    <h4 class="title-class2">Módulo 1</h4>
                    <a class="d-flex flex-row view-lesson" href="?page=play_video">
                        <i class="bi bi-camera-video cam"></i>
                        <p class="name-class">O que é o HiperText Markup Language?</p>
                        <p class="time-class">00:13:04</p>
                        <span class="play"><i class="bi bi-play-circle "></i></span>
                    </a>
                    <a class=" d-flex flex-row view-lesson">
                        <i class="bi bi-camera-video cam"></i>
                        <p class="name-class">O que é o HiperText Markup Language?</p>
                        <p class="time-class">00:13:04</p>
                        <i class="bi bi-play-circle play"></i>
                    </a>
                    <hr class="line-class">
                    <h4 class="title-class2">Módulo 2</h4>
                    <a class=" d-flex flex-row view-lesson">
                        <i class="bi bi-camera-video cam"></i>
                        <p class="name-class">O que é o HiperText Markup Language?</p>
                        <p class="time-class">00:13:04</p>
                        <i class="bi bi-play-circle play"></i>
                    </a>
                    <a class=" d-flex flex-row view-lesson">
                        <i class="bi bi-camera-video cam"></i>
                        <p class="name-class">O que é o HiperText Markup Language?</p>
                        <p class="time-class">00:13:04</p>
                        <i class="bi bi-play-circle play"></i>
                    </a>
                    <hr class="line-class">

                    <h4 class="title-class2">Módulo 3</h4>
                    <a class=" d-flex flex-row view-lesson">
                        <i class="bi bi-camera-video cam"></i>
                        <p class="name-class">O que é o HiperText Markup Language?</p>
                        <p class="time-class">00:13:04</p>
                        <i class="bi bi-play-circle play"></i>
                    </a>
                    <a class=" d-flex flex-row view-lesson">
                        <i class="bi bi-camera-video cam"></i>
                        <p class="name-class">O que é o HiperText Markup Language?</p>
                        <p class="time-class">00:13:04</p>
                        <i class="bi bi-play-circle play"></i>
                    </a>
                    <hr class="line-class">
                </div>
            </div>

        </div>

    </div> -->

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</html>