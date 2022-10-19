<?php 

if(isset($_GET['info'])) {
    
    switch($_GET['info']) { 
                    
                case 'view': 
                    include "base/crud/admin/consulta/main_adm/info_adm.php";
                    break;
}       
}  
else {
    include "base/crud/admin/consulta/main_adm/default.php"; 
}
 
?>