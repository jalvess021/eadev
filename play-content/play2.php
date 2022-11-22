<?php 
    $nivel_necessario = 2;
    include "base/testa_nivel.php";
?>

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
    include "./base/crud/atv_usu/atv.php";
    $id_usu = $_SESSION['UsuarioID'];
    $resAlu = mysqli_query($con, "SELECT * from aluno where id_usu = ".$id_usu.";");
    $infoAlu = mysqli_fetch_array($resAlu);

    $resAula = mysqli_query($con, "SELECT * from aula_alu where id_aluno = ".$infoAlu['id_aluno'].";");
    $infoAula2 = mysqli_fetch_array($resAula);

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
                        <div class='background'>
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
                                    <div id='area-con'>
                                    </div>
                                </div>
                            </div>
                            <div class='div2'>
                                <a href='?page=play_curso&curso=".$infoCur['sigla_curso']."' class='back-cur' data-bs-toggle='tooltip' data-bs-placement='top' data-bs-title='Voltar p/ área do curso'>
                                    <h4 class='title-view'>
                                    <i class='bi bi-reply-all-fill'></i> ".$infoCur['nome_curso']."</h4>
                                </a>
                                <p class='subtitle-view'> Vídeo aula - ( Via Youtube )</p>
                                <p class='text-view'>".$infoCur['desc_curso']."</p>
                                <hr class='line-view'>
            
                                <div class='all-cur-view'> ";

                                //Selecionando as informações dos módulos através do curso
                                $sqlMod = mysqli_query($con, "SELECT * from modulo where id_curso = ".$cur.";");
                                while ($infoMod = mysqli_fetch_array($sqlMod)) {

                                    $sqlIsset = mysqli_query($con, "SELECT COUNT(id_aula) FROM aula a inner join modulo m ON a.id_mod = m.id_mod AND m.id_mod = ".$infoMod['id_mod'].";");
                                    $resIsset = mysqli_fetch_array($sqlIsset);

                                    if ($resIsset[0] > 0) {
                                        switch ($infoMod['tipo_mod']) {
                                            case 1:
                                                $tipoMod = "Básico";
                                                break;
                                            
                                            case 2:
                                                $tipoMod = "Intermediário";
                                                break;
                                    
                                            case 3:
                                                $tipoMod = "Avançado";
                                                break;
                                        }
                                        echo "
                                    <h4 class='subtitle-view2'>".$tipoMod."</h4> ";

                                     //Selecionando as informações das aulas através do módulo
                                    $sqlAula1 = mysqli_query($con, "SELECT * from aula where id_mod = ".$infoMod['id_mod'].";");
                                        while ($infoAula1 = mysqli_fetch_array($sqlAula1)) {
                                            echo "
                                            <div class='d-flex flex-row justify-content-between cur-view'>
                                                <i class='bi bi-camera-video cam-view'></i> ";
                                                 echo (strlen($infoAula1['tit_aula']) <= 31) ? "<p class='name-cur-view'> ".$infoAula1['tit_aula']."</p>" : 
                                                 "<p class='name-cur-view' data-bs-toggle='tooltip' data-bs-placement='top' data-bs-title='".$infoAula1['tit_aula']."'> ".substr($infoAula1['tit_aula'], 0, 25).'... </p>'; 
                                        echo "   
                                                <a href='?page=play_video&curso=".$infoCur['sigla_curso']."&aula=".$infoAula1['id_aula']."' class='play-view'><i class='bi bi-play-circle'></i></a>
                                            </div>";
                                        }
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

    $aulaAlu = mysqli_query($con, "SELECT * from aula_alu where id_aluno = ".$infoAlu['id_aluno']." and id_aula= ".$_GET['aula'].";");
    $infoAulaAlu = mysqli_fetch_array($aulaAlu);

?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="crossorigin="anonymous"></script>
<script> 
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
        setInterval(() => {
            if (<?php echo $infoAulaAlu['status_aula'];?> === 1 && $("#form-concluir").html() == null) {
                $('#area-con').html("<form id='form-concluir'><button type='submit' form='form-concluir' class='group-button' id='bt-concluir'>Concluir</button></form>");
                $('#form-concluir').submit((e) => {
                    e.preventDefault();
                    location.reload();
                $.ajax({
                        url: '/tcc/play-content/aula_alu/control.php',
                        method: 'POST',
                        data: { 
                                usuario: <?php echo $id_usu;?>,
                                aluno: <?php echo $infoAlu['id_aluno'];?>,
                                aula: <?php echo $_GET['aula'];?>
                        },
                        dataType: 'json'
                    })
        }); 
            } else if (<?php echo $infoAulaAlu['status_aula'];?> === 2 && $("#bt-concluido").html() == null){
                $('#area-con').html("<button class='group-button-1' id='bt-concluido' disabled>Concluída <i class='bi bi-patch-check-fill'></i></button>");
            }
        }, 0); 
</script> 
</html>