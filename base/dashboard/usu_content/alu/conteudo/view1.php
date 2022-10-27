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
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css'/>
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
    <h4 class='caption-card'>Cursos</h4>
    <hr>
        <div class='bodyslider'>  
          <div class='swiper mySwiper'>
            <div class='swiper-wrapper'>
            <?php
            while ($info2 = mysqli_fetch_array($res2)) {
              $queryAula1 = mysqli_query($con, "SELECT COUNT(a.id_aula) FROM aula a INNER JOIN modulo m ON a.id_mod = m.id_mod INNER JOIN curso c ON m.id_curso = c.id_curso AND c.id_curso = ".$info2['id_curso'].";");
              $infoAula1 = mysqli_fetch_array($queryAula1);
              echo "
              <div class='swiper-slide'>
              <h4>".$info2['sigla_curso']."</h4>
                <a href='?page=play_curso&curso=".$info2['sigla_curso']."' class='img-link-cur'>
                  <span class='num-aula'>".$infoAula1[0]." aulas </span>
                  <div class='bar-cur1'></div>
                  <div class='bar-cur2'></div>
                  <div class='opt-box1'></div>
                  <div class='opt-box2'></div>
                  <div class='opt-box3'></div>
                  <div class='ball-cur1'></div>
                  <div class='ball-cur2'></div>
                  <img src='\\tcc/base/crud/admin/cursos/imagens/".md5($info2['id_curso']).".jpeg' alt='Curso ".$info2['sigla_curso'].")'>
                </a>
                <p>".$info2['nome_curso']."</p>
              </div>
              ";
            }
            ?>
            </div>
            <div class='swiper-button-next'></div>
            <div class='swiper-button-prev'></div>
            <div class='swiper-pagination'></div>
          </div>
        </div>
    <hr>
  </div>

  <!--Alter-->
  <?php 
    while ($info3 = mysqli_fetch_array($res3)) {
  echo "
  <div class='tab-pane fade' id='".$info3['nome_formacao']."' role='tabpanel' aria-labelledby='pills-front-end-tab'>
    <h4 class='caption-card'>".$info3['nome_formacao']."</h4>
    <hr>
        <div class='bodyslider'>  
          <div class='swiper mySwiper'>
            <div class='swiper-wrapper'>";
              $sql4 = "SELECT * from curso where id_formacao = ".$info3['id_formacao'].";"; 
              $res4 = mysqli_query($con, $sql4);
              while ($info4 = mysqli_fetch_array($res4)) {
                $queryAula2 = mysqli_query($con, "SELECT COUNT(a.id_aula) FROM aula a INNER JOIN modulo m ON a.id_mod = m.id_mod INNER JOIN curso c ON m.id_curso = c.id_curso AND c.id_curso = ".$info4['id_curso'].";");
                $infoAula2 = mysqli_fetch_array($queryAula2);
              echo "
              <div class='swiper-slide'>
                <h4>".$info4['sigla_curso']."</h4>
                <a href='?page=play_curso&curso=".$info4['sigla_curso']."' class='img-link-cur'>
                  <span class='num-aula'>".$infoAula2[0]." aulas </span>
                  <div class='bar-cur1'></div>
                  <div class='bar-cur2'></div>
                  <div class='opt-box1'></div>
                  <div class='opt-box2'></div>
                  <div class='opt-box3'></div>
                  <div class='ball-cur1'></div>
                  <div class='ball-cur2'></div>
                  <img src='\\tcc/base/crud/admin/cursos/imagens/".md5($info4['id_curso']).".jpeg' alt='Imagem do curso (".$info4['sigla_curso'].")'>
                </a>
                <p>".$info4['nome_curso']."</p>
              </div>
              ";
              }
              
      echo"
            </div>
            <div class='swiper-button-next'></div>
            <div class='swiper-button-prev'></div>
            <div class='swiper-pagination'></div>
          </div>
        </div>
    <hr>
  </div>
  ";
    }
  ?>
</div>

 
    

<!-- Swiper JS -->
<script src='https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js'></script>

<!-- Initialize Swiper -->
<script>
  var swiper = new Swiper('.mySwiper', {
    slidesPerView: 2,
    spaceBetween: 30,
    autoplay: {
    delay: 4000,
  }, loop: true,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    }
  });
</script>