<?php

    $nivel_necessario = 3;
    include "../base/testa_nivel.php";
    //Carrega o composer
    require '../vendor/autoload.php';

    date_default_timezone_set ("America/Sao_Paulo");
    $con = mysqli_connect('localhost:3307', 'root', '', 'eadev') or trigger_error(mysqli_error()); 
    mysqli_set_charset($con, "utf8");

    $ano = $_GET['periodo'];

    switch ($_GET['user']) {
      case 'all':
            $user = "usuários";
            break;

      case 'alu':
            $user = "alunos";
            break;

      case 'adm':
            $user = "administradores";
            break;
    }

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
        <title>Relatório de usuários mensais | EADEV</title>    
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi' crossorigin='anonymous'>
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
    
    
    $grafico = "<main>".$_POST["hidden_html"]."</main>";

    $caption = " <div class='caption-rel'>
                    <h4> A plataforma de Ensino à Distância para Desenvolvedores (EADev) Informa:<h4>
                    <p> O relatório acima exibe todos os dados mensais de usuários cadastrados, visto que os dados não são cumulativos e reúnem informações individuais até o mês vigente do período (ano) selecionado.</p>
                </div>";

    $footer ="<div id='footer'>
                  <hr>
                  <div id='div-ft'>
                    <span id='copy'> Criado por Tecnodev's | © Eadev - 2022 Todos os direitos reservados </span>
                    <img class='footer-icon' src='http://localhost/tcc/arquivos/img/icone/icone1.png' alt=''>
                  </div>
                </div>";

    $end ="</body>
    </html>";

    $html = $start.$head.$grafico.$caption.$footer.$end;

 
    $dompdf->load_html($html);
    $dompdf->render();
    $dompdf->stream("controle_".$user."_Eadev-".date('dmyHis'), ["Attachment" => 0]);
    }
?>