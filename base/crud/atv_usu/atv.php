<?php
function AtvAdm($adm, $atv, $id_usu){
	
	$log_atv  = "insert into logatv_usuario values ";
	$log_atv .= "('0','$usu', '$atv', now(), '$id_usu');";
	
    return $log_atv;
}

function AtvAlu($alu, $atv, $id_alu){
	
	$log_atv  = "insert into logatv_usuario values ";
	$log_atv .= "('0','$usu', '$atv', now(), '$id_usu');";
	
    return $log_atv;
}
?>