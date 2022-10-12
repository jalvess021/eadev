<?php
    include "../../../config.php";
    
    if (isset($_POST['searchAdmInput'])) {
        $id_adm = $_POST['searchAdmInput'];
        $sqlAdm = mysqli_query($con, "SELECT id_usu from usuario where nvl_acesso = 3 and id_usu = '".$id_adm."';");
        $rowAdm = mysqli_num_rows($sqlAdm);
        if ($rowAdm === 1) {
            $infoAdm = mysqli_fetch_all($sqlAdm, MYSQLI_ASSOC); //Num ou assoc
            echo json_encode($infoAdm);
        }
     }
?>