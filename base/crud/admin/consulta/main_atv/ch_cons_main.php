<?php 

if(isset($_GET['info'])) {
    
    switch($_GET['info']) { 
        
                case 'atv':
                    include "base/crud/admin/consulta/main_atv/lista_atv.php";
                    break;
                    
                case 'adm': 
                    include "base/crud/admin/consulta/main_atv/lista_atv_adm.php";
                    break;
}       
}  
else {
    include "base/crud/admin/consulta/main_atv/default.php"; 
}
 
?>