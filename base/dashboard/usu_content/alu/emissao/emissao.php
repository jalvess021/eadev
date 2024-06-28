<?php
        $nivel_necessario = 2;
        include "base/testa_nivel.php";
        include "base/config.php";
        include "base/crud/aluno/msg_alu.php";

        $id_usu = $_SESSION['UsuarioID'];
        $sql_alu = mysqli_query($con, "SELECT id_aluno from aluno where id_usu = ".$id_usu.";");
        $res_alu = mysqli_fetch_array($sql_alu);
        $id_alu = $res_alu[0];

        $queryCert = mysqli_query($con, "SELECT * FROM avaliacoes where id_aluno = ".$id_alu." order by cod_cert desc, id_curso asc;");
        
        
?>



<div class="group-cert">
        <h4 class='caption-card'>Emissão de certificados</h4>
        <div class="container-cert ">
            <?php
                while ($infoCert = mysqli_fetch_array($queryCert)) {

                    $queryCur = mysqli_query($con, "SELECT * from curso where id_curso = ".$infoCert['id_curso'].";");
                    $infoCur = mysqli_fetch_array($queryCur);
                    if (is_null($infoCert['cod_cert'])) {

                        //Verififica se nao tem o certificado 
                        echo "
                            <div class='card-cert-bloq'>
                                <h3> Certificado de ".$infoCur['sigla_curso']."</h3>
                                <div class='face face1'>
                                    <div class='content-cert-bloq'>
                                        <img src='arquivos/img/cert.png' alt=''>
                                        <i class='bi bi-lock-fill'></i>
                                        <h6>Bloqueado</h6>
                                    </div>
                                </div>
                            </div>
                        ";
                    }
                    //Se tiver o certificado executa isso:
                    else {

                        $queryVerifyCert = mysqli_query($con, "SELECT * FROM pagamento where id_av = ".$infoCert['id_av'].";");
                        $infoVerifyCert = mysqli_fetch_array($queryVerifyCert);

                            //Concluido
                            if ($infoVerifyCert['status_pgto'] == 2) {

                                echo "
                                <div class='card-cert'>
                                    <h3> Certificado de ".$infoCur['sigla_curso']."</h3>
                                    <div class='face face1'>
                                        <div class='content-cert'>
                                            <img src='arquivos/img/cert.png' alt=''>
                                        </div>
                                    </div>
                                    <div class='face face2'>
                                        <div class='content-cert'>
                                        <p class='subtitle-cert1'><b>".$infoCur['nome_curso']."</b></p>
                                        <p class='subtitle-cert2'><i>Certificado ".$infoCert['cod_cert']." adquirido. Clique no botão abaixo para emiti-lo!</i></p>
                                            <button class='btn-cert'>Emitir certificado</button>
                                        </div>
                                    </div>
                                </div>
                                ";
                                
                            }
                            //Pendente
                            
                            elseif ($infoVerifyCert['status_pgto'] == 0 || $infoVerifyCert['status_pgto'] == 1){

                                $verifyDadosComp = mysqli_query($con, "SELECT d.* from dados_complementares as d inner join usuario as u on d.id_usu = u.id_usu inner join aluno as a on u.id_usu = a.id_usu inner join avaliacoes as av on a.id_aluno = av.id_aluno and av.id_av = ".$infoCert['id_av'].";");

                                if (mysqli_num_rows($verifyDadosComp) == 1) {
                                //Se tiver dados complementares redireciona p pagamento
                                    echo "
                                    <div class='card-cert'>
                                        <h3> Certificado de ".$infoCur['sigla_curso']."</h3>
                                        <div class='face face1'>
                                            <div class='content-cert'>
                                                <img src='arquivos/img/cert.png' alt=''>
                                            </div>
                                        </div>
                                        <div class='face face2'>
                                            <div class='content-cert'>
                                                <p class='subtitle-cert1'><b>HYPERTEXT PREPROCESSOR</b></p>
                                                <p class='subtitle-cert2'><i> O certificado encontra-se <strong>Pendente</strong>.</i></p>
                                                <button class='btn-cert pgtoCert' data-codCert='".$infoCert['cod_cert']."'>Realizar Pagamento</button>
                                            </div>
                                        </div>
                                    </div>
                                    ";
                                   
                                }elseif (mysqli_num_rows($verifyDadosComp) == 0) {

                                    //Se nao tiver dados complementares ele redireciona para cadastrar
                                    echo "
                                    <div class='card-cert'>
                                        <h3> Certificado de ".$infoCur['sigla_curso']."</h3>
                                        <div class='face face1'>
                                            <div class='content-cert'>
                                                <img src='arquivos/img/cert.png' alt=''>
                                            </div>
                                        </div>
                                        <div class='face face2'>
                                            <div class='content-cert'>
                                                <p class='subtitle-cert1'><b>HYPERTEXT PREPROCESSOR</b></p>
                                                <p class='subtitle-cert2'><i> O certificado encontra-se <strong>Pendente</strong>.</i></p>
                                                <button class='btn-cert' data-toggle='modal' data-target='#curso".$infoCur['id_curso']."'>Realizar Pagamento</button>
                                            </div>
                                        </div>
                                    </div>

                                

                                    
                                    <div class='modal fade' id='curso".$infoCur['id_curso']."' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
                                        <div class='modal-dialog modal-dialog-centered' role='document'>
                                            <div class='modal-content'>
                                            <div class='modal-header bg-info'>
                                                <h5 class='modal-title text-white font-weight-bold text-uppercase' id='exampleModalCenterTitle'>Eadev informa:</h5>
                                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                <span aria-hidden='true'>&times;</span>
                                                </button>
                                            </div>
                                            <div class='modal-body'>
                                                <p>Para efetuar o pagamento, você precisa cadastrar os dados complementares!</p>
                                                <p class='text-muted font-weight-bold'> Instruções:</p>
                                                <ul>
                                                    <li>
                                                        Clique em configurações > Perfil > Dados Complementares
                                                    </li>
                                                    <li>
                                                         Logo após informar os dados nos campos requisitados, clique em salvar dados.
                                                    </li>
                                                    
                                                </ul>
                                            </div>
                                            <div class='modal-footer'>
                                                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cadastrar depois</button>
                                                <a href='?content_alu=perfil'><button type='button' class='btn btn-info'>Cadastrar agora</button></a>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    ";
                                } 
                                
                            }
                        
                        }
                    
                     
                }
            ?>
           
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>

        codigo = $(".pgtoCert").attr("data-codCert");
        $(".pgtoCert").click(()=>{
            $(".group-cert").load("/eadev/base/dashboard/usu_content/alu/pagamento/pagamento.php?cert="+codigo);
        })
            
        
     

</script>

