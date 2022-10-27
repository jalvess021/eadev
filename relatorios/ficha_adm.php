<?php

    $nivel_necessario = 3;
    include "../base/testa_nivel.php";
    //Carrega o composer
    require '../vendor/autoload.php';

    date_default_timezone_set ("America/Sao_Paulo");
    $con = mysqli_connect('localhost:3307', 'root', '', 'eadev') or trigger_error(mysqli_error()); 
    mysqli_set_charset($con, "utf8");

    $id = $_GET['user'];
    $verifyAdm = mysqli_query($con, "SELECT * FROM usuario where id_usu = ".$id.";");
    $resAdm = mysqli_fetch_array($verifyAdm);

    $queryComp = mysqli_query($con, "SELECT * FROM dados_complementares where id_usu = ".$id.";");
    $resComp = mysqli_fetch_array($queryComp);

    $queryLoc = mysqli_query($con, "SELECT * FROM localidade where cep = '".$resComp['cep']."';");
    $resLoc =   mysqli_fetch_array($queryLoc);

    $queryAdd = mysqli_query($con, "SELECT * FROM atv_adm where atv like '%insert%' and id_adm = ".$id.";");
    $resAdd = mysqli_num_rows($queryAdd);

    $queryAtt = mysqli_query($con, "SELECT * FROM atv_adm where atv like '%update%' and id_adm = ".$id.";");
    $resAtt = mysqli_num_rows($queryAtt);

    $queryDel = mysqli_query($con, "SELECT * FROM atv_adm where atv like '%delete%' and id_adm = ".$id.";");
    $resDel = mysqli_num_rows($queryDel);

    if (file_exists($_SERVER['DOCUMENT_ROOT']."/tcc/assets/images/users/".md5($id).".jpeg")) {
      $img = "http://localhost/tcc/assets/images/users/".md5($id).".jpeg";
   }else {
       $img = "http://localhost/tcc/assets/images/users/default.png";
   }

    switch ($resAdm['status']) {
      case 1:
          $status = 'Ativo';
          break;
      case 2:
          $status = 'Bloqueado';
          break;
      case 3:
          $status = 'Desativado';
          break;
    }
    switch ($resAdm['sexo']) {
      case 1:
          $sexo = 'Masculino';
          break;

      case 2:
          $sexo = 'Feminino';
          break;
      case 3:
          $sexo = 'Outros';
          break;

      default:
      $sexo = 'Não Informado';
          break;
    }
    //Registros de inserção
    if ($resAdd === 0) {
      $r1 = "Sem registros!";
    }elseif ($resAdd === 1) {
      $r1 = "1 atividade";
    }elseif ($resAdd > 1) {
      $r1 = $resAdd." atividades";
    }
    //Registros de atualização
    if ($resAtt === 0) {
      $r2 = "Sem registros!";
    }elseif ($resAtt === 1) {
      $r2 = "1 atividade";
    }elseif ($resAtt > 1) {
      $r2 = $resAtt." atividades";
    }
    //Registros de exclusão
    if ($resDel === 0) {
      $r3 = "Sem registros!";
    }elseif ($resDel === 1) {
      $r3 = "1 atividade";
    }elseif ($resDel > 1) {
      $r3 = $resDel." atividades";
    }
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
                <span class='text-center emi-rel'>Data de emissão [ <span>".date('H:i:s | d-m-Y')."</span> ]</span>
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
                    <img class='person-admin' src='".$img."' alt=''>
                  </th>
                  <th >
                    <p class='perg-rel'>Nome:</p>
                    <p class='resp-rel'>".$resAdm['nome']."</p>
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
              <td class='resp-rel2' style='border: 1px solid black;'>".$resAdm['id_usu']."</td>
              <td class='resp-rel2' style='border: 1px solid black ;'>".date('H:i:s | d/m/Y  ', strtotime($resAdm['dt_cadastro']))."</td>
              <td class='resp-rel2' style='border: 1px solid black ;'>".$status."</td>
            </tr>
            <tr>
              <td class='perg-rel2' style='border: 1px solid black;'>Usuário:</td>
              <td class='perg-rel2' style='border: 1px solid black ;'>Sexo:</td>
              <td class='perg-rel2' style='border: 1px solid black ;'>Data de Nascimento:</td>
            </tr>
            <tr class='tr-rel'>
              <td class='resp-rel2' style='border: 1px solid black;'>".$resAdm['usuario']."</td>
              <td class='resp-rel2' style='border: 1px solid black ;'>".$sexo."</td>
              <td class='resp-rel2' style='border: 1px solid black ;'>".date('d/m/Y', strtotime($resComp['dt_nasc']))."</td>
            </tr>
            <tr>
              <td class='perg-rel2' style='border: 1px solid black;'>Telefone</td>
              <td class='perg-rel2' style='border: 1px solid black;'>E-mail:</td>
              <td class='perg-rel2' style='border: 1px solid black;'>CPF:</td>
            </tr>
            <tr class='tr-rel'>
              <td class='resp-rel2' style='border: 1px solid black ;'>".$resAdm['telefone']."</td>
              <td class='resp-rel2' style='border: 1px solid black;'>".$resAdm['email']."</td>
              <td class='resp-rel2' style='border: 1px solid black;'>".$resComp['cpf']."</td>
            </tr>
            <tr>
              <td class='perg-rel2' style='border: 1px solid black ;'>RG:</td>
              <td class='perg-rel2' style='border: 1px solid black ;'>CEP:</td>
              <td class='perg-rel2' style='border: 1px solid black ;'>UF:</td>
            </tr>
            <tr class='tr-rel'>
              <td class='resp-rel2' style='border: 1px solid black;'>".$resComp['rg']."</td>
              <td class='resp-rel2' style='border: 1px solid black ;'>".$resComp['cep']."</td>
              <td class='resp-rel2' style='border: 1px solid black ;'>".$resLoc['uf']."</td>
            </tr>
            <tr>
              <td class='perg-rel2' style='border: 1px solid black;'>Cidade:</td>
              <td class='perg-rel2' style='border: 1px solid black ;'>Bairro:</td>
              <td class='perg-rel2' style='border: 1px solid black ;''>Logradouro:</td>
            </tr>
            <tr class='tr-rel'>
              <td class='resp-rel2' style='border: 1px solid black;'>".$resLoc['cidade']."</td>
              <td class='resp-rel2' style='border: 1px solid black ;'>".$resLoc['bairro']."</td>
              <td class='resp-rel2' style='border: 1px solid black ;'>".$resLoc['logradouro']."</td>
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
                <td style='border-right: 1px solid black;' class='resp-rel3'>".$r1."</td>
                <td style='border-right: 1px solid black;' class='resp-rel3'>".$r2."</td>
                <td style='border-right: 1px solid black;' class='resp-rel3'>".$r3."</td>
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
    $dompdf->stream("ficha_tec_user".$id."-".date('dmyHis'), ["Attachment" => 0]);

?>