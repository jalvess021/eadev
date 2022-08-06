
<?php
include "../base/config.php";
         
if (isset($_GET['filter_form'])) {

        $sqlForm = mysqli_query($con, "SELECT * FROM formacao WHERE id_formacao='".$_GET['filter_form']."';");
        $infoForm = mysqli_fetch_array($sqlForm);

            if (mysqli_num_rows($sqlForm)>0) {
                    $form = $_GET['filter_form'];
                    $datac = mysqli_query($con, "SELECT * FROM curso WHERE id_formacao = ".$form." order by id_curso asc;") or die(mysqli_error("ERRO: ".$con));
                        if (mysqli_num_rows($datac)>0) {
                            echo "<option value='' title='Selecione' disabled selected>SELECIONE</option>";
                            while($infoc = mysqli_fetch_array($datac)) {
                                echo "<option value='".$infoc['id_curso']."'> " .$infoc['sigla_curso'] ." </option>";
                            } 
                        }else {
                            echo "<option value='' disabled selected>Sem Registros!</option>";
                        }
            }
}                                        
?>          
              
