<?php

  //Carrega o composer
  require '../vendor/autoload.php';
    
    // Referenciar o namespace dompdf
    use Dompdf\Dompdf;
    use Dompdf\Options;
    
    $options = new Options();
    $options->set('isRemoteEnabled', TRUE);
    $dompdf = new Dompdf($options);
    
    $start = "
    <!DOCTYPE html>
    <html lang='pt-br'>
    <head>
        <meta charset='UTF-8'>
        <title>Relatório de atividades</title>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi' crossorigin='anonymous'>
        <link rel='stylesheet' href='http://localhost/tcc/assets/css/all-rel/atv.css'>
    </head>
    <body>";

    $head ="<div id='header'>
              <div class='div-hd'>
                <img class='icon-rel' src='http://localhost/tcc/arquivos/img/logo/logo1.png' alt=''>
                <span class='text-center emi-rel'>Data de emissão [ <span>'.date('H:i:s | d-m-Y').'</span> ]</span>
                <span class='page'>Página </span>
                <hr style='margin-top: 4px;'>
              </div>
            </div>";

    

      $body ="<main>
      <h1 class='title-rel'>Relatório de Atividades</h1>
      <table class='tb-ftecnica'>
        <thead>
            <tr class='thead'>
              <th colspan='4'>
              <h3 class='subtitle-rel'>Inserção | 2022</h3>
              </th>
            </tr>
        </thead>
        <tbody>
          <tr>
            <td class='perg-rel2' style='border: 1px solid black;'>ID:</td>
            <td class='perg-rel2' style='border: 1px solid black ;'>Atividade:</td>
            <td class='perg-rel2' style='border: 1px solid black ;'>Nome do Administrador {ID}:</td>
            <td class='perg-rel2' style='border: 1px solid black ;'>Data:</td>
          </tr>
          <tr>
            <td class='resp-rel2' style='border: 1px solid black;'>2140</td>
            <td class='resp-rel2' style='border: 1px solid black ;'>Inserção do curso <b>SQL</b> na formação {Back-end}</td>
            <td class='resp-rel2' style='border: 1px solid black ;'>Mateus de Azevedo Correa de Mello {3}</td>
            <td class='resp-rel2' style='border: 1px solid black ;'>21:11 | 12-10-2022</td>
          </tr>
        </tbody>
      </table>
      <div class='caption-rel'>
        <h4> A plataforma de Ensino à Distância para Desenvolvedores (EADev) Informa:<h4>
        <p> O relatório acima exibe todas as informações necessárias para a realização de uma eventual consulta deste usuário.</p>
      </div>
    </main>";


      $footer ="<div id='footer'>
                  <hr>
                  <div id='div-ft'>
                    <span id='copy'> Criado por Tecnodev's | © Eadev - 2022 Todos os direitos reservados </span>
                    <img class='footer-icon' src='http://localhost/tcc/arquivos/img/icone/icone1.png' alt=''>
                  </div>
                  
                </div>";

    $end ="</body>
    </html>";

    //concatenando as variáveis
    $html=$start.$head.$body.$footer.$end;


    //Carregar o html;
    $dompdf->loadHtml($html);

    //Formato do pdf
    $dompdf->setPaper('A4', 'portrait');

    //Renderizar pdf
    $dompdf->render();
    //Gerar pdf
    $dompdf->stream('ficha_tec_user'.date('dmyHis'), ['Attachment' => 0]);