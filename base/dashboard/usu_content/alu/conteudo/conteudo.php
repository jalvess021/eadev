
<?php

$nivel_necessario = 2;
include "base/testa_nivel.php";

$sql1 = "SELECT * FROM formacao order by id_formacao;";
$res1 = mysqli_query($con, $sql1);

$sqlForm1 = mysqli_query($con, "SELECT * FROM formacao order by id_formacao;");
$sqlForm2 = mysqli_query($con, "SELECT * FROM formacao order by id_formacao;");

$sql3 = "SELECT * FROM formacao order by id_formacao;";
$res3 = mysqli_query($con, $sql3);

?>
<ul class=" justify-content-center nav nav-pills row-form">
<li class="nav-item">
    <a class="nav-link form-cur" href="?content_alu=conteudo">Formações</a>
</li>
<?php
    while ($info1 = mysqli_fetch_array($res1)) {
echo "<li class='nav-item'>
        <a class='name-cur' id='pills-home-tab' data-toggle='pill' href='#".$info1['nome_formacao']."' role='tab' aria-controls='pills-home' aria-selected='true'>".$info1['nome_formacao']."</a>
    </li>";
    }
?>
</ul>

<div class="tab-content" id="pills-tabContent">
  <!--ATIVO-->
  <div class='tab-pane fade show active' id='All-form-row' role='tabpanel' aria-labelledby='pills-front-end-tab'>
    <div class="group-cards">
<?php
while ($resForm1 = mysqli_fetch_array($sqlForm1)) {
        $sql2 = "SELECT * from curso where id_formacao = ".$resForm1['id_formacao']." order by id_curso;";      
        $res2 = mysqli_query($con, $sql2);
        echo "
        <div id='".$resForm1['id_formacao']."'>
            <h4 class='caption-card'>".$resForm1['nome_formacao']."</h4>
            <hr>
            <div class='row-card'>";
            while ($info2 = mysqli_fetch_array($res2)) {

                $queryAula1 = mysqli_query($con, "SELECT * FROM aula as a INNER JOIN modulo as m ON a.id_mod = m.id_mod INNER JOIN curso as c ON m.id_curso = c.id_curso AND c.id_curso = ".$info2['id_curso'].";");
                $infoAula1 = mysqli_num_rows($queryAula1);

                if ($infoAula1 > 0) {

                $queryMod1 = mysqli_query($con, "SELECT m.* FROM modulo as m INNER JOIN curso as c ON m.id_curso = c.id_curso AND c.id_curso = ".$info2['id_curso'].";");
                $infoMod1 = mysqli_num_rows($queryMod1);

                echo "
                <div class='card card-cur'>
                    <img class='card-img-top card-img' src='\\eadev/base/crud/admin/cursos/imagens/".md5($info2['id_curso']).".jpeg' alt='Curso ".$info2['sigla_curso'].")'>
                    <div class='card-cur-body'>
                        <h5 class='title-card'>".$info2['nome_curso']." | ".$info2['sigla_curso']."</h5>
                        <p class='text-card'>";
                        echo (strlen($info2['desc_curso']) <= 50) ? $info2['desc_curso'] : substr($info2['desc_curso'], 0, 47)."...";
                    echo "</p>
                        <div class='d-flex flex-row pt-3'>
                            <div class='d-flex flex-row'>
                                <p class='num-card'><i class='bi bi-layers-fill cam-card'></i>".$infoMod1." Módulos</p>
                                <p class='students-card'><i class='bi bi-camera-video-fill icon-mod-card'></i>".$infoAula1." aulas</p>
                            </div>
                            <div>
                                <a href='?page=play_curso&curso=".$info2['sigla_curso']."'><button type='button' class='btn card-btn'>Acessar</button></a>
                            </div>
                        </div>  
                    </div>
                </div>
                ";
                }
            }
        echo "
            </div>
        </div>";
    }
?>          
    </div>
  </div>

  <!--Alter-->
  <?php 
    while ($info3 = mysqli_fetch_array($res3)) {
  echo "
  <div class='tab-pane fade' id='".$info3['nome_formacao']."' role='tabpanel' aria-labelledby='pills-front-end-tab'>
        <div class='group-cards'>  
        <h4 class='caption-card'>".$info3['nome_formacao']."</h4>
        <hr>
            <div class='row-card'>";
              $sql4 = "SELECT * from curso where id_formacao = ".$info3['id_formacao'].";"; 
              $res4 = mysqli_query($con, $sql4);
              while ($info4 = mysqli_fetch_array($res4)) {
                $queryAula2 = mysqli_query($con, "SELECT * FROM aula as a INNER JOIN modulo as m ON a.id_mod = m.id_mod INNER JOIN curso as c ON m.id_curso = c.id_curso AND c.id_curso = ".$info4['id_curso'].";");
                $infoAula2 = mysqli_num_rows($queryAula2);
                if ($infoAula2 > 0) {

                    $queryMod2 = mysqli_query($con, "SELECT m.* FROM modulo as m INNER JOIN curso as c ON m.id_curso = c.id_curso AND c.id_curso = ".$info4['id_curso'].";");
                    $infoMod2 = mysqli_num_rows($queryMod2);

                  echo "
                  <div class='card card-cur'>
                    <img class='card-img-top card-img' src='\\eadev/base/crud/admin/cursos/imagens/".md5($info4['id_curso']).".jpeg' alt='Imagem do curso (".$info4['sigla_curso'].")'>
                    <div class='card-cur-body'>
                        <h5 class='title-card'>".$info4['nome_curso']." | ".$info4['sigla_curso']."</h5>
                        <p class='text-card'>";
                        echo (strlen($info4['desc_curso']) <= 50) ? $info4['desc_curso'] : substr($info4['desc_curso'], 0, 47)."...";
                        echo "
                            </p>
                        <div class='d-flex flex-row pt-3'>
                            <div class='d-flex flex-row '>
                                <p class='num-card'><i class='bi bi-camera-video-fill cam-card'></i>".$infoMod2." Módulos</p>
                                <p class='students-card'><i class='bi bi-layers-fill icon-mod-card'></i>".$infoAula2." aulas</p>
                            </div>
                            <div>
                                <a href='?page=play_curso&curso=".$info4['sigla_curso']."'><button type='button' class='btn btn-primary card-btn'>Acessar</button></a>
                            </div>
                        </div>  
                    </div>
                  </div>
                  ";
                }
              }
              
      echo"
            </div>
        </div>
  </div>
  ";
    }
  ?>
</div>







