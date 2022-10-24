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
        <title>Ficha Técnica Administrativa</title>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi' crossorigin='anonymous'>
        <link rel='stylesheet' href='http://localhost/tcc/assets/css/all-rel/info_admin.css'>
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
      <h1 class='title-rel'>Ficha Técnica</h1>
      <table class='tb-ftecnica'>
            <thead>
              <tr class='thead'>
                <th style='border-right:none;'>
                <img class='person-admin' src='http://localhost/tcc/arquivos/img/agnaldo.jfif' alt=''>
                </th>
                <th >
                  <p class='perg-rel'>Nome:</p>
                  <p class='resp-rel'>Mateus de Azevedo Correa de Mello</p>
                </th>
                <th>
                  <p class='perg-rel'>Nível:</p>
                  <p class='resp-rel'>Aluno</p>
                </th>
              </tr>
            </thead>
        <tbody>
          <tr>
            <td class='perg-rel2' style='border: 1px solid black;'>Mátricula:</td>
            <td class='perg-rel2' style='border: 1px solid black ;'>Data de Cadastro:</td>
            <td class='perg-rel2' style='border: 1px solid black ;'>Status:</td>
          </tr>
          <tr class='tr-rel'>
            <td class='resp-rel2' style='border: 1px solid black;'>255100</td>
            <td class='resp-rel2' style='border: 1px solid black ;'>12:17:01 / 15/02/2022</td>
            <td class='resp-rel2' style='border: 1px solid black ;'>Ativo</td>
          </tr>
          <tr>
            <td class='perg-rel2' style='border: 1px solid black;'>Usuário:</td>
            <td class='perg-rel2' style='border: 1px solid black ;'>Sexo:</td>
            <td class='perg-rel2' style='border: 1px solid black ;'>Data de Nascimento:</td>
          </tr>
          <tr class='tr-rel'>
            <td class='resp-rel2' style='border: 1px solid black;'>aluno</td>
            <td class='resp-rel2' style='border: 1px solid black ;'>Masculino</td>
            <td class='resp-rel2' style='border: 1px solid black ;'>26/02/2004</td>
          </tr>
          <tr>
            <td class='perg-rel2' style='border: 1px solid black;'>Telefone:</td>
            <td class='perg-rel2' style='border: 1px solid black;'>E-mail:</td>
            <td class='perg-rel2' style='border: 1px solid black;'>CPF:</td>
          </tr>
          <tr class='tr-rel'>
            <td class='resp-rel2' style='border: 1px solid black ;'>(21)33333-3333</td>
            <td class='resp-rel2' style='border: 1px solid black;'>alunoexemplo2012@gmail.com</td>
            <td class='resp-rel2' style='border: 1px solid black;'>111.111.111-11</td>
          </tr>
          <tr>
            <td class='perg-rel2' style='border: 1px solid black ;'>RG:</td>
            <td class='perg-rel2' style='border: 1px solid black ;'>CEP:</td>
            <td class='perg-rel2' style='border: 1px solid black ;'>UF:</td>
          </tr>
          <tr class='tr-rel'>
            <td class='resp-rel2' style='border: 1px solid black;'>11.111.111-1</td>
            <td class='resp-rel2' style='border: 1px solid black ;'>21610-330</td>
            <td class='resp-rel2' style='border: 1px solid black ;'>RJ</td>
          </tr>
          <tr>
            <td class='perg-rel2' style='border: 1px solid black;'>Cidade:</td>
            <td class='perg-rel2' style='border: 1px solid black ;'>Bairro:</td>
            <td class='perg-rel2' style='border: 1px solid black ;''>Logradouro:</td>
          </tr>
          <tr class='tr-rel'>
            <td class='resp-rel2' style='border: 1px solid black;'>Rio de Janeiro</td>
            <td class='resp-rel2' style='border: 1px solid black ;'>Marechal Hermes</td>
            <td class='resp-rel2' style='border: 1px solid black ;'>Xavier Curado</td>
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
