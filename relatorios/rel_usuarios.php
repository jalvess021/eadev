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
    <header class=''>
      <div class='d-flex flex-row justify-content-center'>
        <img class='icon-rel' src='http://localhost/tcc/arquivos/img/logo/logo1.png' alt=''>
      </div>
      <hr style='margin-top: 4px;'>
    </header>
    <main class='pt-4'>
      <div class='d-flex justify-content center'>
      <h1 class='title-rel'>Ficha Técnica</h1>
      <h1 class='title-rel'>Ficha Técnica</h1>
      </div>
      <table>
        <thead>
          <tr style='padding: 10px; background-color: rgba(19, 19, 19, 0.712);'>
              
                <td class='tdth'><img class='person-admin' src='http://localhost/tcc/arquivos/img/agnaldo.jfif' alt=''></td>
                <td class='tdth'>
                    <p class='perg-rel'>Nome Completo:</p>
                    <p class='resp-rel'>Mateus de Azevedo Correa de Mello</p>
                </td>
                <td class='tdth'>
                    <p class='perg-rel'>Nível:</p>
                    <p class='resp-rel2'>Administrador</p>
                </td>
             
            
          </tr>
        </thead>
        <tbody>
          <tr>
            <td style='width: 30px !important;' class='perg-rel2'>Usuário:</td>
            <td class='perg-rel2'>E-mail:</td>
            <td class='perg-rel2'>Telefone:</td>
          </tr>
          <tr>
            <td class='resp-rel3'>Teuzin</td>
            <td class='resp-rel3'>Mateuzinho.mello@gmail.com</td>
            <td class='resp-rel3'>(21)98696-5234</td>
          </tr>
          <tr>
            <td style='width: 200px;' class='perg-rel2'>Data de Nascimento</td>
            <td class='perg-rel2'>Sexo:</td>
            <td class='perg-rel2'>CEP:</td>
          </tr>
          <tr>
            <td class='resp-rel3'>26/02/2004</td>
            <td class='resp-rel3'>Masculino</td>
            <td class='resp-rel3'>21610-330</td>
          </tr>
          <tr>
            <td class='perg-rel2'>CPF:</td>
            <td class='perg-rel2'>RG:</td>
            <td class='perg-rel2'>UF:</td>
          </tr>
          <tr>
            <td class='resp-rel3'>111.111.111-11</td>
            <td class='resp-rel3'>11.111.111-1</td>
            <td class='resp-rel3'>RJ</td>
          </tr>
          <tr>
            <td class='perg-rel2'>Cidade:</td>
            <td class='perg-rel2'>Bairro:</td>
            <td class='perg-rel2'>Rua:</td>
          </tr>
          <tr>
            <td class='resp-rel3'>Rio de Janeiro</td>
            <td class='resp-rel3'>Marechal Hermes</td>
            <td class='resp-rel3'>Rua Xavier Curado</td>
          </tr>
          <tr>
          <td class='perg-rel2' colspan='3'>Atividades do Administrador:</td>
          </tr>
          <tr>
            <td class='perg-rel2'>Inserção</td>
            <td class='perg-rel2'>Edição</td>
            <td class='perg-rel2'>Exclusão</td>
          </tr>
          <tr>
            <td height='60' class='resp-rel3'>&nbsp;</td>
            <td class='resp-rel3'>&nbsp;</td>
            <td class='resp-rel3'>&nbsp;</td>
          </tr>
        </tbody>
      </table>
    </main>
    <footer class='' style='width: 100%;position: absolute; bottom: 0; left: 0;''>
      <hr style='margin-bottom: 4px;''>
      <div class='d-flex flex-row justify-content-between'>
        <img class='footer-icon' src='http://localhost/tcc/arquivos/img/icone/icone1.png' alt=''>
        <p class='footer-rel'>Data de Emissão: 19/10/2022</p>
      </div>
    </footer>
    </body>
    </html>  ";

    //Carregar o html;
    $dompdf->loadHtml($dados);

    //Formato do pdf
    $dompdf->setPaper('A4', 'portrait');

    //Renderizar pdf
    $dompdf->render();
    //Gerar pdf
    $dompdf->stream("relatorio_".date('dmyHis'));

?>