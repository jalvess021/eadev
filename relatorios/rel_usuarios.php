<?php
    require '../base/config.php';
    //Carrega o composer
    require '../vendor/autoload.php';

    // Referenciar o namespace dompdf
    use Dompdf\Dompdf;

    //Instanciar
    $dompdf = new Dompdf(['enable_remote' => true]);
    
    $dados = "
    <!DOCTYPE html>
    <html lang='pt-br'>
    <head>
        <meta charset='UTF-8'>
        <title>Pdf Teste</title>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi' crossorigin='anonymous'>
        <link rel='stylesheet' href='http://localhost/tcc/assets/css/all-rel/info_admin.css'>
    </head>
    <body>
    <header >
          <img class='icon-rel' src='http://localhost/tcc/arquivos/img/logo/logo1.png' alt=''>
        <hr style='margin-top: -10px;'>
      </header>
      <main>
          <h1 class='title-rel'>Ficha Técnica</h1>
        <table class='tb-ftecnica'>
              <thead style='background-color: #343a40;'>
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
                    <p class='resp-rel'>Administrador</p>
                  </th>
                </tr>
              </thead>
          <tbody>
            <tr>
              <td class='perg-rel2' style='border: 1px solid black;'>Id:</td>
              <td class='perg-rel2' style='border: 1px solid black ;'>Data de Cadastro:</td>
              <td class='perg-rel2' style='border: 1px solid black ;'>Status:</td>
            </tr>
            <tr class='tr-rel'>
              <td class='resp-rel2' style='border: 1px solid black;'>3</td>
              <td class='resp-rel2' style='border: 1px solid black ;'> 12:03:33 | 03-05-2021</td>
              <td class='resp-rel2' style='border: 1px solid black ;'>Ativo</td>
            </tr>
            <tr>
              <td class='perg-rel2' style='border: 1px solid black;'>Usuário:</td>
              <td class='perg-rel2' style='border: 1px solid black ;'>Sexo:</td>
              <td class='perg-rel2' style='border: 1px solid black ;'>Data de Nascimento:</td>
            </tr>
            <tr class='tr-rel'>
              <td class='resp-rel2' style='border: 1px solid black;'>Teuzin</td>
              <td class='resp-rel2' style='border: 1px solid black ;'>Masculino</td>
              <td class='resp-rel2' style='border: 1px solid black ;'>26/02/2004</td>
            </tr>
            <tr>
              <td class='perg-rel2' style='border: 1px solid black;'>Telefone</td>
              <td class='perg-rel2' style='border: 1px solid black;'>E-mail:</td>
              <td class='perg-rel2' style='border: 1px solid black;'>CPF:</td>
            </tr>
            <tr class='tr-rel'>
              <td class='resp-rel2' style='border: 1px solid black ;'>(21) 98696-5234</td>
              <td class='resp-rel2' style='border: 1px solid black;'>mariaeduarda38841@gmail.com</td>
              <td class='resp-rel2' style='border: 1px solid black;'>xxx.xxx.xxx-xx</td>
            </tr>
            <tr>
              <td class='perg-rel2' style='border: 1px solid black ;'>RG:</td>
              <td class='perg-rel2' style='border: 1px solid black ;'>CEP:</td>
              <td class='perg-rel2' style='border: 1px solid black ;'>UF:</td>
            </tr>
            <tr class='tr-rel'>
              <td class='resp-rel2' style='border: 1px solid black;'>xx.xxx.xxx-x</td>
              <td class='resp-rel2' style='border: 1px solid black ;'>21610-330</td>
              <td class='resp-rel2' style='border: 1px solid black ;'>RJ</td>
            </tr>
            <tr>
              <td class='perg-rel2' style='border: 1px solid black;'>Cidade:</td>
              <td class='perg-rel2' style='border: 1px solid black ;'>Bairro:</td>
              <td class='perg-rel2' style='border: 1px solid black ;''>Rua:</td>
            </tr>
            <tr class='tr-rel'>
              <td class='resp-rel2' style='border: 1px solid black;'>Rio de Janeiro</td>
              <td class='resp-rel2' style='border: 1px solid black ;'>Marechal Hermes</td>
              <td class='resp-rel2' style='border: 1px solid black ;'>Rua Xavier Curado</td>
            </tr>
              <tr>
                <td class='perg-rel2' style='border: 1px solid black;' colspan='3'>Atividades do Administrador:</td>
              </tr>
              <tr class='tr-rel'>
                <td  class='perg-rel2' style='border: 1px solid black;'>Inserção:</td>
                <td class='perg-rel2' style='border: 1px solid black;'>Edição:</td>
                <td class='perg-rel2' style='border: 1px solid black;'>Exclusão:</td>
              </tr>
              <tr>
                <td style='border-right: 1px solid black;' class='resp-rel3'>333 atividades</td>
                <td style='border-right: 1px solid black;' class='resp-rel3'>32 atividades</td>
                <td style='border-right: 1px solid black;' class='resp-rel3'>902 atividades</td>
              </tr>
          </tbody>
        </table>
      </main>
      <footer>
        <hr style='margin-top:80px;'>
          <img class='footer-icon' src='http://localhost/tcc/arquivos/img/icone/icone1.png' alt=''>
          <p class='footer-rel'>Data de Emissão: 19/10/2022</p>
      </footer>
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