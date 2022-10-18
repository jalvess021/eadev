<?php
    require '../base/config.php';
    //Carrega o composer
    require '../vendor/autoload.php';

    // Referenciar o namespace dompdf
    use Dompdf\Dompdf;

    //Instanciar
    $dompdf = new Dompdf();
    
    $dados = "
        <!DOCTYPE html>
        <html lang='pt-br'>
        <head>
            <meta charset='UTF-8'>
            <title>Relátorio de </title>
            
        </head>
        <body>
        


        </body>
        </html>";

    //Carregar o html;
    $dompdf->loadHtml($dados);

    //Formato do pdf
    $dompdf->setPaper('A4', 'portrait');

    //Renderizar pdf
    $dompdf->render();
    //Gerar pdf
    $dompdf->stream("relatorio_".date('dmyHis'));

?>