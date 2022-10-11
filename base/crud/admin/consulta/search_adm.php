<?php
    include "../../../config.php";
 $sqlAll = mysqli_query($con, "SELECT nome, id_usu from usuario where nvl_acesso = 3;");
 $rowAll = mysqli_fetch_all($sqlAll, MYSQLI_ASSOC);

 echo json_encode($rowAll);

 if (isset($_POST['search-adm-input'])) {
    $id_adm = base64_decode($_POST['search-adm-input']);
    $sqlAdm = mysqli_query($con, "SELECT * from usuario where nvl_acesso = 3 and id_usu = ".$id_adm.";");
    $rowAdm = mysqli_num_rows($sqlAdm);
    if ($rowAdm === 1) {
        $infoId = $sqlAdm->fetch_array(MYSQLI_BOTH); //Num ou assoc
        $rowAdm = mysqli_num_rows($sqlAdm);
        $infoAdm = array (
            'id_search_adm' => $infoId[0]
        );
        echo json_encode($infoAdm);
    }
 }
?>