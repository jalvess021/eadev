<?php 
    date_default_timezone_set ("America/Sao_Paulo");
    require "../../../../../forma_pg/pix.php";
    
    use Mpdf\QrCode\QrCode;
    use Mpdf\QrCode\Output;
    require "../../../../../vendor/autoload.php";
    //Instancia principal do payload


    $codCert = $_GET['cert'];
    $obPayLoad = (new Payload) -> 
        setPixKey('f8f9f844-0ac9-477e-9192-27075bd3155e') -> 
        setDescription('COMPRA DE CERTIFICADO') ->
        setMerchantName('EADEV PLATAFORM') ->
        setMerchantCity('RIO DE JANEIRO') ->
        setAmount(39.99) ->
        setTxid($codCert);

    //Codigo de pagamento pix
    $payLoadQrcode = $obPayLoad-> getPayload();

    $qrCode = new Qrcode($payLoadQrcode);
    $output = new Output\Svg();
    $qrCodeGerado = $output->output($qrCode, 200, 'white', 'black');


   // Save black on white PNG image 100 px wide to filename.png. Colors are RGB arrays. (salva a imagem)
    /*
    $output = new Output\Png();
    $data = $output->output($qrCode, 100, [255, 255, 255], [0, 0, 0]);
    file_put_contents('filename.png', $data);

    // Echo a SVG file, 100 px wide, black on white.
    // Colors can be specified in SVG-compatible formats
    $output = new Output\Svg();
    echo $output->output($qrCode, 100, 'white', 'black');

    // Echo an HTML table
    $output = new Output\Html();
    echo $output->output($qrCode); */  

?>
<div class="row">
    <h3 class="content-title col-9 m-0">Pagamento</h3>
    <div class="col-3"><a class="float-right btn-back btn btn-sm bt-padrao" id='btnBackPgto'> <i class="bi bi-arrow-left"></i> Voltar </a></div>
</div>


    <div class="all-pgt ">
        <div class="group-data-end ">
            <div class="personal-data-pgt ">
                <h3 class="title-personal-data"><i class="bi bi-person-fill"></i>Dados do Comprador</h3>
                <div class="d-flex flex-column ml-1 mt-2">
                        <div class="d-flex flex-row">
                            <h6 class="perg-personal-data">Nome:</h6>
                            <h6 class="resp-personal-data">Mateus de Azevedo Correa de Mello</h6>
                        </div>
                        <div class="d-flex flex-row">
                            <h6 class="perg-personal-data">CPF:</h6>
                            <h6 class="resp-personal-data">111.111.111-09</h6>
                        </div>
                </div>
            </div>
            <div class="personal-data-end ">
                <h3 class="title-personal-end"><i class="bi bi-house-fill"></i>Endereço</h3>
                <div class=" group-end d-flex flex-row">
                    <div class="circle-loc-end">
                    <i class="bi bi-geo-alt-fill loc-end"></i>
                    </div>
                    <div class="d-flex flex-column ml-2 ">
                        <h6 class="resp-end"> Xavier Curado, (21) 33333-3333</h6>
                        <h6 class="resp-end">Rio de Janeiro - RJ - Marechal Hermes</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="group-rec-cert">
            <h3 class="title-personal-cert"></i>Certificado de HTML</h3>
            <div class="group-rec-cert1">
                <div class=" group-pricing-total ">
                    <div class="group-img">
                        <img src="arquivos/img/cert.png" alt="">
                    </div>
                    <div class="group-pricing ">
                        <div class="group-total-sub">
                            <h6 class="subtotal-cert">Cód. Produto:</h6>
                            <h6 class="subtotal-cert-pricing"><strong><?php echo $codCert;?></strong></h6>
                        </div>
                        <div class="group-total-sub">
                            <h6 class="subtotal-cert">Subtotal:</h6>
                            <h6 class="subtotal-cert-pricing">R$ 59,99</h6>
                        </div>
                        <div class="group-total-sub">
                            <h6 class="subtotal-cert">Desconto:</h6>
                            <h6 class="subtotal-cert-pricing">R$ 20,00</h6>
                        </div>
                        <hr class="line-pgt">
                        <div class="group-total-sub">
                            <h6 class="total-cert">Total:</h6>
                            <h6 class="total-cert-pricing ">R$ 39,99</h6>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center ">
                    <a data-toggle="modal" data-target="#exampleModal"><button class="btn-pgt">Finalizar Pagamento</button></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content ">
            <div class="modal-header header-pgt">
        
            </div>
                <div class="modal-body body-modal-pgt">
                    <div class="d-flex flex-row justify-content-between mt-3">
                        <h3 class="title-personal-pgt"></i>Pagamento via Pix</h3>
                        <button type="button" class="close close-pgt" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class=" all-modal-pgt">
                        <div class="view-pricing ">
                            <i class="bi bi-check-circle"></i>
                            <h6 class="subtotal-pgt">Valor para pagamento:</h6>
                            <h6 class="subtotal-pgt-pricing">R$ 39,99</h6>
                        </div>
                        <div class=" group-qrcode-instruction">
                            <div class="group-qrcode">
                                <div class="qrcode-pix">
                                    <?php echo $qrCodeGerado;?>
                                </div>
                                <button type="button" class="btn-pix">Código Pix</button>
                                <img class="pix-img" src="arquivos/img/pix.png" alt="">
                            </div>
                            <div class="instruction-pgt">
                                <h6 class="title-instruction">Instruções</h6>
                                <div class="d-flex flex-row">
                                    <p class="description-instruction"><b>1.</b></p>
                                    <p class="description-instruction2">Abra o Aplicativo do seu banco.</p>
                                </div>
                                <div class="d-flex flex-row">
                                    <p class="description-instruction"><b>2.</b></p>
                                    <p class="description-instruction2">Escolha a opção Pix e cole o código ou use a câmera do celular para ler o QR Code.</p>
                                </div>
                                <div class="d-flex flex-row">
                                    <p class="description-instruction"><b>3.</b></p>
                                    <p class="description-instruction2">Confirme as informações e finalize o pagamento.</p>
                                </div>
                                <div class="d-flex flex-row">
                                    <p class="description-instruction"><b>4.</b></p>
                                    <p class="description-instruction2">Caso tenha efetuado o pagamento, clique no botão Paguei com Pix e aguarde alguns minutos até a confirmação do pagamento.</p>
                                </div>
                                
                                <button type="button" class=" btn-pix-pgt">Paguei com Pix</button>
                            </div>

                        </div>
                    </div> 
                    
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script>        
    /*

                const btnPix = document.querySelector(".btn-pix");

                 btnPix.addEventListener('click', function copiarCodPix(){
                    copyTextToClipboard('Teste');
                }); 
                
                setTimeout(() => {
                                if (copyDescIcon.classList.contains("bi-check-all")) {
                                    copyDescIcon.classList.remove("bi-check-all");
                                } copyDescIcon.classList.add("bi-paperclip");
                        }, 2000); */
                
                $("#btnBackPgto").click(()=>{
                    window.location.reload();
                })
 
    </script>

    