<?php 
date_default_timezone_set ("America/Sao_Paulo");
$con = mysqli_connect('localhost:3307', 'root', '', 'eadev') or trigger_error(mysqli_error()); 
mysqli_set_charset($con, "utf8");
?>