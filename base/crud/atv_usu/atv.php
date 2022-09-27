<?php
function atvAdm($adm, $atv, $id_usu){
	
	$log_atv  = "insert into atv_adm values ";
	$log_atv .= "('0', '$adm', '$atv', NOW(), '$id_usu');";
    return $log_atv;
}


function atvAlu($alu, $atv, $id_alu){
	
	$log_atv  = "insert into atv_aluno values ";
	$log_atv .= "('0', '$alu', '$atv', now(), '$id_alu');";
	
    return $log_atv;
}
?>