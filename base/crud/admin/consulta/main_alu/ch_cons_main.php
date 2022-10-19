<?php 

if(isset($_GET['info'])) {
    
    switch($_GET['info']) { 
                    
                case 'view': 
                    include "base/crud/admin/consulta/main_alu/info_alu.php";
                    break;
}       
}  
else {
    include "base/crud/admin/consulta/main_alu/default.php"; 
}
 
?>