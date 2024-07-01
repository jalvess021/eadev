
<?php
include "../base/config.php";

    $anoAnteriorAnterior = date('Y', strtotime('-2 year'));
    $anoAnterior = date('Y', strtotime('-1 year'));
    $anoAtual = date('Y');

    $optAnteriorAnterior;
    $optAnterior;
    $optAtual;

    echo "<option selected disabled>SELECIONE</option>";
if (isset($_GET['filter_user'])) {

    if ($_GET['filter_user'] === 'all') {

        $queryAntAnt = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '".$anoAnteriorAnterior."-01-01 00:00:00' and '".$anoAnteriorAnterior."-12-31 23:59:59'");
        $rowAntAnt = mysqli_num_rows($queryAntAnt);

        $queryAnt = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '".$anoAnterior."-01-01 00:00:00' and '".$anoAnterior."-12-31 23:59:59'");
        $rowAnt = mysqli_num_rows($queryAnt);

        $queryAtu = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '".$anoAtual."-01-01 00:00:00' and '".$anoAtual."-12-31 23:59:59'");
        $rowAtu = mysqli_num_rows($queryAtu);

            if ($rowAntAnt > 0) {
                $optAnteriorAnterior = "<option value='".$anoAnteriorAnterior."'>".$anoAnteriorAnterior."</option>";
            }else {
                $optAnteriorAnterior = "<option disabled>". $anoAnteriorAnterior." - Sem registros!</option>";
            }

            if ($rowAnt > 0) {
                $optAnterior = "<option value='".$anoAnterior."'>".$anoAnterior."</option>";
            }else {
                $optAnterior = "<option disabled>". $anoAnterior." - Sem registros!</option>";
            }
      
            if ($rowAtu > 0) {
                $optAtual = "<option value='".$anoAtual."'>".$anoAtual."</option>";
            }else {
                $optAtual = "<option disabled>".$anoAtual." - Sem registros!</option>";
            }
        
    } elseif ($_GET['filter_user'] === 'alu') {

        $queryAntAnt = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '".$anoAnteriorAnterior."-01-01 00:00:00' and '".$anoAnteriorAnterior."-12-31 23:59:59' AND nvl_acesso = 2;");
        $rowAntAnt = mysqli_num_rows($queryAntAnt);

        $queryAnt = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '".$anoAnterior."-01-01 00:00:00' and '".$anoAnterior."-12-31 23:59:59' AND nvl_acesso = 2;");
        $rowAnt = mysqli_num_rows($queryAnt);

        $queryAtu = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '".$anoAtual."-01-01 00:00:00' and '".$anoAtual."-12-31 23:59:59' AND nvl_acesso = 2;");
        $rowAtu = mysqli_num_rows($queryAtu);

            if ($rowAntAnt > 0) {
                $optAnteriorAnterior = "<option value='".$anoAnteriorAnterior."'>".$anoAnteriorAnterior."</option>";
            }else {
                $optAnteriorAnterior = "<option value='".$anoAnteriorAnterior."' disabled>". $anoAnteriorAnterior." - Sem registros!</option>";
            }

            if ($rowAnt > 0) {
                $optAnterior = "<option value='".$anoAnterior."'>".$anoAnterior."</option>";
            }else {
                $optAnterior = "<option disabled>". $anoAnterior." - Sem registros!</option>";
            }
      
            if ($rowAtu > 0) {
                $optAtual = "<option value='".$anoAtual."'>".$anoAtual."</option>";
            }else {
                $optAtual = "<option disabled>".$anoAtual." - Sem registros!</option>";
            }
        
    }elseif ($_GET['filter_user'] === 'adm') {

        $queryAntAnt = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '".$anoAnteriorAnterior."-01-01 00:00:00' and '".$anoAnteriorAnterior."-12-31 23:59:59' AND nvl_acesso = 3;");
        $rowAntAnt = mysqli_num_rows($queryAntAnt);

        $queryAnt = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '".$anoAnterior."-01-01 00:00:00' and '".$anoAnterior."-12-31 23:59:59' AND nvl_acesso = 3;");
        $rowAnt = mysqli_num_rows($queryAnt);

        $queryAtu = mysqli_query($con, "SELECT * from usuario where dt_cadastro between '".$anoAtual."-01-01 00:00:00' and '".$anoAtual."-12-31 23:59:59' AND nvl_acesso = 3;");
        $rowAtu = mysqli_num_rows($queryAtu);

            if ($rowAntAnt > 0) {
                $optAnteriorAnterior = "<option value='".$anoAnteriorAnterior."'>".$anoAnteriorAnterior."</option>";
            }else {
                $optAnteriorAnterior = "<option disabled>". $anoAnteriorAnterior." - Sem registros!</option>";
            }

            if ($rowAnt > 0) {
                $optAnterior = "<option value='".$anoAnterior."'>".$anoAnterior."</option>";
            }else {
                $optAnterior = "<option disabled>". $anoAnterior." - Sem registros!</option>";
            }
      
            if ($rowAtu > 0) {
                $optAtual = "<option value='".$anoAtual."'>".$anoAtual."</option>";
            }else {
                $optAtual = "<option disabled>".$anoAtual." - Sem registros!</option>";
            }
    }
    // Verifica se o ano '2022' não está presente em nenhuma das variáveis
    if (strpos($optAnteriorAnterior, '2022') === false && strpos($optAnterior, '2022') === false && strpos($optAtual, '2022') === false) {
        // Se nenhuma variável contém '2022', imprime o <option> e as variáveis concatenadas
        echo "<option value='2022'>2022 - (Período padrão com dados)</option>";
    }

    echo $optAnteriorAnterior . $optAnterior . $optAtual;
}       


?>   
