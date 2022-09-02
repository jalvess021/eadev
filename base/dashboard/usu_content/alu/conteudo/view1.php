<?php
        $sql1 = "SELECT * FROM formacao order by id_formacao;";
        $res = mysqli_query($con, $sql1);


?>
<h3 class="content-title">Conteúdo</h3>

    <div class="container">

            
            <ul class=" justify-content-center nav nav-pills row-form">
            <li class="nav-item">
                <a class="nav-link form-cur">Formações</a>
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
                <div class="tab-content" id="pills-tabContent">
                <?php
                $sql1 = "SELECT * FROM formacao order by id_formacao;";
                $res = mysqli_query($con, $sql1);
                 while ($info3 = mysqli_fetch_array($res)) {
        echo " <div class='tab-pane fade' id='".$info3['nome_formacao']."' role='tabpanel' aria-labelledby='pills-front-end-tab'>
            <main class='d-flex flex-row justify-content-center grid'>
                <article>
                    <img src='arquivos/img/ex3.gif' alt=''>
                    <i class='bi bi-star-fill ml-2 icon-card'></i>
                    <div class='text'>
                        <p>".$info3[0]."</p>
                        <a href='?page=play_curso'><button  class='btn-card-content'>Html</button></a>
                    </div>
                </article>     
            </main>
        </div>";
                } ?>
            </div>
    </div>

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