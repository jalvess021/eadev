<?php 
    date_default_timezone_set ("America/Sao_Paulo");
    
    $nivel_necessario = 2;
    include "base/testa_nivel.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="arquivos/img/icone/icone1.png">
</head>
<body>
        <div class="all-plataform">
            <?php
                include "base/config.php";
                include "base/ch_plataforma.php";
            ?>
        </div>
</body>
</html>