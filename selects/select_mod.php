
<?php
include "../base/config.php";
         
if (isset($_GET['filter_form'])) {
    if (isset($_GET['filter_cur'])) {
        $sqlForm = mysqli_query($con, "SELECT * FROM formacao WHERE id_formacao='".$_GET['filter_form']."';");
        $infoForm = mysqli_fetch_array($sqlForm);
            if (mysqli_num_rows($sqlForm)>0) {
                    $sqlCur = mysqli_query($con, "SELECT * FROM curso WHERE id_curso='".$_GET['filter_cur']."';");
                    $infoCur = mysqli_fetch_array($sqlCur);
                        if (mysqli_num_rows($sqlCur)>0) {
                            $form = $_GET['filter_form'];
                            $cur = $_GET['filter_cur'];
                                $datam = mysqli_query($con, "SELECT * FROM modulo as m INNER JOIN curso as c ON m.id_curso = c.id_curso and c.id_curso = ".$cur." INNER JOIN formacao as f ON c.id_formacao = f.id_formacao AND f.id_formacao = ".$form." ORDER BY m.id_mod ASC;") or die(mysqli_error("ERRO: ".$con));
                                    if (mysqli_num_rows($datam)>0) {
                                        echo "<option value='' title='Selecione' disabled selected>SELECIONE</option>";
                                        while($infom = mysqli_fetch_array($datam)) {
                                            switch ($infom['tipo_mod']) {
                                                case 1:
                                                    $tipoMod = "Básico";
                                                    break;
                                                
                                                case 2:
                                                    $tipoMod = "Intermediário";
                                                    break;
                                        
                                                case 3:
                                                    $tipoMod = "Avançado";
                                                    break;
                                            }
                                            
                                            echo "<option value='".$infom['id_mod']."'> " .$tipoMod." </option>";
                                        } 
                                    }else {
                                        echo "<option value='' disabled selected>Sem Registros!</option>";
                                    }
                        }
            }
    }
}               
?>