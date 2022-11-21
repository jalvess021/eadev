
    <?php

$nivel_necessario = 2;
include "base/testa_nivel.php";

$sql1 = "SELECT * FROM formacao order by id_formacao;";
$res1 = mysqli_query($con, $sql1);
$sql2 = "SELECT * from curso order by id_formacao;";      
$res2 = mysqli_query($con, $sql2);

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
        <div id='front'>
            <h4 class='caption-card'>Front-End</h4>
            <hr>
            <div class="d-flex flex-row justify-content-around ">
                <div class="card card-cur2">
                    <img class="card-img-top card-img2" src="assets/images/MATEUS.png" alt="Card image cap">
                    <div class="card-body2">
                        <h5 class="card-title title-card">Cascading Style Sheets</h5>
                        <p class="card-text text-card">Estilizações, animações e venha descobrir mais...</p>
                        <div class="d-flex flex-row pt-3">
                            <div class="d-flex flex-row ">
                                <p class="num-card"><i class="bi bi-camera-video-fill cam-card"></i>21 aulas</p>
                                <p class="students-card"><i class='bi bi-layers-fill icon-mod-card'></i>3 Módulos</p>
                            </div>
                            <div>
                                <a href=""><button type="button" class="btn btn-primary card-btn">Acessar</button></a>
                            </div>
                        </div>  
                    </div>
                </div>
                <div class="card card-cur2">
                    <img class="card-img-top card-img2" src="assets/images/MATEUS.png" alt="Card image cap">
                    <div class="card-body2">
                        <h5 class="card-title title-card">Cascading Style Sheets</h5>
                        <p class="card-text text-card">Estilizações, animações e venha descobrir mais...</p>
                        <div class="d-flex flex-row pt-3">
                            <div class="d-flex flex-row ">
                                <p class="num-card"><i class="bi bi-camera-video-fill cam-card"></i>21 aulas</p>
                                <p class="students-card"><i class='bi bi-layers-fill icon-mod-card'></i>3 Módulos</p>
                            </div>
                            <div>
                                <a href=""><button type="button" class="btn btn-primary card-btn">Acessar</button></a>
                            </div>
                        </div>  
                    </div>
                </div>
                <div class="card card-cur2">
                    <img class="card-img-top card-img2" src="assets/images/MATEUS.png" alt="Card image cap">
                    <div class="card-body2">
                        <h5 class="card-title title-card">Cascading Style Sheets</h5>
                        <p class="card-text text-card">Estilizações, animações e venha descobrir mais...</p>
                        <div class="d-flex flex-row pt-3">
                            <div class="d-flex flex-row ">
                                <p class="num-card"><i class="bi bi-camera-video-fill cam-card"></i>21 aulas</p>
                                <p class="students-card"><i class='bi bi-layers-fill icon-mod-card'></i>3 Módulos</p>
                            </div>
                            <div>
                                <a href=""><button type="button" class="btn btn-primary card-btn">Acessar</button></a>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>    
        
        <div id="back">
            <h4 class='caption-card'>Back-End</h4>
            <hr>
            <div class="d-flex flex-row justify-content-around ">
                <div class="card card-cur2">
                    <img class="card-img-top card-img2" src="assets/images/MATEUS.png" alt="Card image cap">
                    <div class="card-body2">
                        <h5 class="card-title title-card">Cascading Style Sheets</h5>
                        <p class="card-text text-card">Estilizações, animações e venha descobrir mais...</p>
                        <div class="d-flex flex-row pt-3">
                            <div class="d-flex flex-row ">
                                <p class="num-card"><i class="bi bi-camera-video-fill cam-card"></i>21 aulas</p>
                                <p class="students-card"><i class='bi bi-layers-fill icon-mod-card'></i>3 Módulos</p>
                            </div>
                            <div>
                                <a href=""><button type="button" class="btn btn-primary card-btn">Acessar</button></a>
                            </div>
                        </div>  
                    </div>
                </div>
                <div class="card card-cur2">
                    <img class="card-img-top card-img2" src="assets/images/MATEUS.png" alt="Card image cap">
                    <div class="card-body2">
                        <h5 class="card-title title-card">Cascading Style Sheets</h5>
                        <p class="card-text text-card">Estilizações, animações e venha descobrir mais...</p>
                        <div class="d-flex flex-row pt-3">
                            <div class="d-flex flex-row ">
                                <p class="num-card"><i class="bi bi-camera-video-fill cam-card"></i>21 aulas</p>
                                <p class="students-card"><i class='bi bi-layers-fill icon-mod-card'></i>3 Módulos</p>
                            </div>
                            <div>
                                <a href=""><button type="button" class="btn btn-primary card-btn">Acessar</button></a>
                            </div>
                        </div>  
                    </div>
                </div>
                <div class="card card-cur2">
                    <img class="card-img-top card-img2" src="assets/images/MATEUS.png" alt="Card image cap">
                    <div class="card-body2">
                        <h5 class="card-title title-card">Cascading Style Sheets</h5>
                        <p class="card-text text-card">Estilizações, animações e venha descobrir mais...</p>
                        <div class="d-flex flex-row pt-3">
                            <div class="d-flex flex-row ">
                                <p class="num-card"><i class="bi bi-camera-video-fill cam-card"></i>21 aulas</p>
                                <p class="students-card"><i class='bi bi-layers-fill icon-mod-card'></i>3 Módulos</p>
                            </div>
                            <div>
                                <a href=""><button type="button" class="btn btn-primary card-btn">Acessar</button></a>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>

        
        <div id='conver'>
            <h4 class='caption-card'>Conver</h4>
            <hr>
            <div class="d-flex flex-row justify-content-around ">
                <div class="card card-cur2">
                    <img class="card-img-top card-img2" src="assets/images/MATEUS.png" alt="Card image cap">
                    <div class="card-body2">
                        <h5 class="card-title title-card">Cascading Style Sheets</h5>
                        <p class="card-text text-card">Estilizações, animações e venha descobrir mais...</p>
                        <div class="d-flex flex-row pt-3">
                            <div class="d-flex flex-row ">
                                <p class="num-card"><i class="bi bi-camera-video-fill cam-card"></i>21 aulas</p>
                                <p class="students-card"><i class='bi bi-layers-fill icon-mod-card'></i>3 Módulos</p>
                            </div>
                            <div>
                                <a href=""><button type="button" class="btn btn-primary card-btn">Acessar</button></a>
                            </div>
                        </div>  
                    </div>
                </div>
                <div class="card card-cur2">
                    <img class="card-img-top card-img2" src="assets/images/MATEUS.png" alt="Card image cap">
                    <div class="card-body2">
                        <h5 class="card-title title-card">Cascading Style Sheets</h5>
                        <p class="card-text text-card">Estilizações, animações e venha descobrir mais...</p>
                        <div class="d-flex flex-row pt-3">
                            <div class="d-flex flex-row ">
                                <p class="num-card"><i class="bi bi-camera-video-fill cam-card"></i>21 aulas</p>
                                <p class="students-card"><i class='bi bi-layers-fill icon-mod-card'></i>3 Módulos</p>
                            </div>
                            <div>
                                <a href=""><button type="button" class="btn btn-primary card-btn">Acessar</button></a>
                            </div>
                        </div>  
                    </div>
                </div>
                <div class="card card-cur2">
                    <img class="card-img-top card-img3" src="assets/images/MATEUS.png" alt="Card image cap">
                    <div class="card-body2">
                        <h5 class="card-title title-card">Cascading Style Sheets</h5>
                        <p class="card-text text-card">Estilizações, animações e venha descobrir mais...</p>
                        <div class="d-flex flex-row pt-3">
                            <div class="d-flex flex-row ">
                                <p class="num-card"><i class="bi bi-camera-video-fill cam-card"></i>21 aulas</p>
                                <p class="students-card"><i class='bi bi-layers-fill icon-mod-card'></i>3 Módulos</p>
                            </div>
                            <div>
                                <a href=""><button type="button" class="btn btn-primary card-btn">Acessar</button></a>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>

  <!--Alter-->
  <?php 
    while ($info3 = mysqli_fetch_array($res3)) {
  echo "
  <div class='tab-pane fade' id='".$info3['nome_formacao']."' role='tabpanel' aria-labelledby='pills-front-end-tab'>
    <h4 class='caption-card'>".$info3['nome_formacao']."</h4>
    <hr>
        <div class='group-cards'>  
            <div class='d-flex flex-row justify-content-around'>";
              $sql4 = "SELECT * from curso where id_formacao = ".$info3['id_formacao'].";"; 
              $res4 = mysqli_query($con, $sql4);
              while ($info4 = mysqli_fetch_array($res4)) {
                $queryAula2 = mysqli_query($con, "SELECT * FROM aula a INNER JOIN modulo m ON a.id_mod = m.id_mod INNER JOIN curso c ON m.id_curso = c.id_curso AND c.id_curso = ".$info4['id_curso'].";");
                $infoAula2 = mysqli_num_rows($queryAula2);
                if ($infoAula2 > 0) {
                  echo "
                  <div class='card card-cur3'>
                    <img class='card-img-top card-img2' src='\\tcc/base/crud/admin/cursos/imagens/".md5($info4['id_curso']).".jpeg' alt='Imagem do curso (".$info4['sigla_curso'].")'>
                    <div class='card-body3'>
                        <h5 class='card-title title-card2'>Cascading Style Sheets</h5>
                        <p class='card-text text-card2'>Estilizações, animações e venha descobrir mais...</p>
                        <div class='d-flex flex-row pt-3'>
                            <div class='d-flex flex-row '>
                                <p class='num-card2'><i class='bi bi-camera-video-fill cam-card'></i>".$infoAula2." aulas</p>
                                <p class='students-card2'><i class='bi bi-layers-fill icon-mod-card'></i>3 Módulos</p>
                            </div>
                            <div>
                                <a href=''><button type='button' class='btn btn-primary card-btn2'>Acessar</button></a>
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







