<?php 
    if(isset($_GET['page'] )){
        switch($_GET['page']){
    
            case 'play_curso':
                include "play-content/play1.php";           
                break;

            case 'play_video':
                include "play-content/play2.php";           
                break;

            case 'rel_certificado':
            include "relatorios/cert.php";           
            break;

    }
} 

    //Se não houver valor no page, ele inclui a tela inicial.
    else {
        include "dashboard.php";
}

?>