<?php 

if(isset($_GET['info'])) {
    
    switch($_GET['info']) { 

                case 'atv':
                    include "base/crud/admin/consulta/main_adm/lista_atv.php";
                    break;
                    
                case 'adm': 
                    include "base/crud/admin/consulta/main_adm/info_adm.php";
                    break;
}       
}  
else {
    include "base/crud/admin/consulta/main_adm/default.php"; 
}
 
?>