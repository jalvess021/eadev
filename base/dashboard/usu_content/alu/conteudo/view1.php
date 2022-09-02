<?php
        $sql1 = "SELECT * FROM formacao order by id_formacao;";
        $res = mysqli_query($con, $sql1);


?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>

<h3 class="content-title">Conteúdo</h3>

    <div class="container">

            
            <ul class=" justify-content-center nav nav-pills row-form">
            <li class="nav-item">
                <a class="nav-link form-cur" href="?content_alu=conteudo">Formações</a>
            </li>
            <?php
                while ($info = mysqli_fetch_array($res)) {
                    echo "<li class='nav-item'>
                    <a class='name-cur' id='pills-home-tab' data-toggle='pill' href='#".$info['nome_formacao']."' role='tab' aria-controls='pills-home' aria-selected='true'>".$info['nome_formacao']."</a>
                </li>
                
                ";
                }
            ?>
            </ul>
                <div class="tab-content swiper mySwiper" id="pills-tabContent">
                <?php
                $sql1 = "SELECT * FROM formacao order by id_formacao;";
                $res = mysqli_query($con, $sql1);
                
                 while ($info3 = mysqli_fetch_array($res)) {
                    echo " <div class='tab-pane fade' id='".$info3['nome_formacao']."' role='tabpanel' aria-labelledby='pills-front-end-tab'>
                    <h4 class='caption-card'>".$info3['nome_formacao']."</h4>
                    <hr>
                        <main class='grid'>";
                            $sql4 = "SELECT * from curso where id_formacao = ".$info3['id_formacao'].";"; 
                            $res4 = mysqli_query($con, $sql4);
                            while ($info4 = mysqli_fetch_array($res4)) {
                                echo "<article>
                                <img src='arquivos/img/ex3.gif' alt='Imagem do curso (".$info4['sigla_curso'].")'>
                                <i class='bi bi-star-fill ml-2 icon-card'></i>
                                <div class='text'>
                                    <p>".$info4['nome_curso']."</p>
                                    <a href='?page=play_curso&curso=".$info4['id_curso']."'><button  class='btn-card-content'>".$info4['sigla_curso']."</button></a>
                                </div>
                            </article> ";          
                            }    
                            echo"
                        </main>
                        <hr>
                    </div>";
                } 
                
                $sqlf = "SELECT * FROM formacao order by id_formacao;";
                $resf = mysqli_query($con, $sqlf);
                $infof = mysqli_fetch_array($resf);
                
                 
                    echo " <div class='tab-pane fade show active' id='All-form-row' role='tabpanel' aria-labelledby='pills-front-end-tab'>
                    <h4 class='caption-card'>Todas as formações</h4>
                    <hr>
                        <main class='grid'>";
                            $sqlff = "SELECT * from curso where id_formacao;";      
                            $resff = mysqli_query($con, $sqlff);
                            while ($infoff = mysqli_fetch_array($resff)) {
                                echo "<article>
                                <img src='arquivos/img/ex3.gif' alt='Imagem do curso (".$infoff['sigla_curso'].")'>
                                <i class='bi bi-star-fill ml-2 icon-card'></i>
                                <div class='text'>
                                    <p>".$infoff['nome_curso']."</p>
                                    <a href='?page=play_curso&curso=".$infoff['id_curso']."'><button  class='btn-card-content'>".$infoff['sigla_curso']."</button></a>
                                </div>
                            </article> ";          
                            }    
                            echo"
                        </main>
                        <hr>
                    </div>";
         
                
                
                ?>
                      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
                
            </div>
    </div>

    <script>
       const rightButtons = Array.from(document.getElementsByClassName('swiper-button-next'));
        const leftButtons = Array.from(document.getElementsByClassName('swiper-button-prev'));
        const containers = Array.from(document.getElementsByClassName('grid'));

        /* array.forEach(element => {
        }); */
        let index = 0;
        for (const rightButton of rightButtons) {
            const container = containers[index];
            rightButton.addEventListener("click", function () {
                container.scrollLeft += 380;
            });
            index++;
        }

        index = 0;
        for (const leftButton of leftButtons) {
            const container = containers[index];
            leftButton.addEventListener("click", function () {
                container.scrollLeft -= 380;
            });
            index++;
        }
    </script>

<!-- <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-back-end-tab">
                    <main class=" d-flex flex-row justify-content-center grid">
                            <article>
                                <img src="arquivos/img/ex3.gif" alt="">
                                <i class="bi bi-star-fill ml-2 icon-card "></i>
                                <div class="text">
                                    <p>Hypertext Preprocessor</p>
                                    <button class="btn-card-content" href="?page=play_curso">Php</button>
                                </div>
                            </article>    

                            <article>
                                <img src="arquivos/img/ex2.gif" alt="">
                                <i class="bi bi-star-fill ml-2 icon-card "></i>
                                <div class="text">
                                    <p>Standard Query Language</p>
                                    <button class="btn-card-content" id="">Sql</button>
                                </div>
                            </article>      
                    </main>
                </div>

                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <main class=" d-flex flex-row justify-content-center grid" >
                            <article>
                                <img src="arquivos/img/ex3.gif" alt="">
                                <i class="bi bi-star-fill ml-2 icon-card "></i>
                                <div class="text">
                                    <p>Git | Concurrent Version System</p>
                                    <button class="btn-card-content" href="?page=play_curso"> Git</button>
                                </div>
                            </article>    

                            <article>
                                <img src="arquivos/img/ex2.gif" alt="">
                                <i class="bi bi-star-fill ml-2 icon-card "></i>
                                <div class="text">
                                    <p>Github | Concurrent Version System</p>
                                    <button class="btn-card-content" id=""> gitHub</button>
                                </div>
                            </article>    
                    </main>
                </div> -->