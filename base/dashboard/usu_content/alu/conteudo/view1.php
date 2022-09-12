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
                                <div class='text'>
                                    <p>".$info4['nome_curso']."</p>
                                    <a href='?page=play_curso&curso=".$info4['sigla_curso']."'><button  class='btn-card-content'>".$info4['sigla_curso']."</button></a>
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
                    <h4 class='caption-card'>Cursos</h4>
                    <hr>
                        <main class='grid'>";
                            $sqlff = "SELECT * from curso;";      
                            $resff = mysqli_query($con, $sqlff);
                            while ($infoff = mysqli_fetch_array($resff)) {
                                echo "<article>
                                <img src='arquivos/img/ex3.gif' alt='Imagem do curso (".$infoff['sigla_curso'].")'>
                                <div class='text'>
                                    <p>".$infoff['nome_curso']."</p>
                                    <a href='?page=play_curso&curso=".$infoff['sigla_curso']."'><button  class='btn-card-content'>".$infoff['sigla_curso']."</button></a>
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
       const rightButtons = document.querySelectorAll('.swiper-button-next');
        const leftButtons = document.querySelectorAll('.swiper-button-prev');
        const rowScroll = document.querySelectorAll('.grid');

        /* array.forEach(element => {
        }); */

        for (let n = 0; n < rowScroll.length; n++) {
            const sc = rowScroll[n];

            for (let r = 0; r < rightButtons.length; r++) {
                const rightBtn = rightButtons[r];
                rightBtn.addEventListener("click", function() {
                    sc.scrollLeft  += 380;
                })
            }

            for (let l = 0; l < leftButtons.length; l++) {
                const leftBtn = leftButtons[l];
                leftBtn.addEventListener("click", function(){
                    sc.scrollLeft -= 380;
                });
            }            
        }
        /*
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
        } */
    </script>