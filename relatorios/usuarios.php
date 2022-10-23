<?php
    //Carrega o composer
    require '../vendor/autoload.php';

    date_default_timezone_set ("America/Sao_Paulo");
    $con = mysqli_connect('localhost', 'root', '', 'eadev') or trigger_error(mysqli_error()); 
    mysqli_set_charset($con, "utf8");

    use Dompdf\Dompdf;
    use Dompdf\Options;
    
    $options = new Options();
    $options->set('isRemoteEnabled', TRUE);
    $dompdf = new Dompdf($options);

    class Pdf extends Dompdf{

    public function __construct(){
    parent::__construct();
    }
    }

    if(isset($_POST["hidden_html"]) && $_POST["hidden_html"] != '')
    {
    $start = "
    <!DOCTYPE html>
    <html lang='pt-br'>
    <head>
        <meta charset='UTF-8'>
        <title>Relatório de usuários - EADEV</title>
        <link rel='stylesheet' href='http://localhost/tcc/assets/css/all-rel/usuarios.css'>
    </head>
    <body>";

    $head ="<div id='header'>
              <div class='div-hd'>
                <img class='icon-rel' src='http://localhost/tcc/arquivos/img/logo/logo1.png' alt=''>
                <span class='text-center emi-rel'>Data de emissão [ <span>".date('H:i:s | d-m-Y')."</span> ]</span>
                <span class='page'>Página </span>
                <hr style='margin-top: 4px;'>
              </div>
            </div>";
    
    
    $grafico = $_POST["hidden_html"];

    $footer ="<div id='footer'>
                  <hr>
                  <div id='div-ft'>
                    <span id='copy'> Criado por Tecnodev's | © Eadev - 2022 Todos os direitos reservados </span>
                    <img class='footer-icon' src='http://localhost/tcc/arquivos/img/icone/icone1.png' alt=''>
                  </div>
                  
                </div>";

    $end ="</body>
    </html>";

    $html = $start.$head.$grafico.$footer.$end;

    $pdf = new Pdf();
    $pdf->load_html($html);
    $pdf->render();
    $pdf->stream("usuariosEadev-".date('dmyHis'), ["Attachment" => 0]);
    }
?>