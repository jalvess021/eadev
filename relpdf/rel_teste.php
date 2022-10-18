<?php 
 include("libpdf/mpdf.php"); 

$rec = '5454';
$nomeforn = 'DISTRIBUIDORA DE GÊNEROS CAMPEÃO Ltda.';

$h = "<div style='text-align:right;'>Página {PAGENO} de {nbpg}</div>";

$html1 = "
<fieldset>
	<div class='cabecalho'>
		<div class='imgcab'><img src='\loja/img/logoloja.png'></div>
		<div class='titcab'>
			SCL — Sistema de Controle de Loja
		</div>
	</div>
"; 

$html1 .= "
	<h2>
		<div class='titulorel'>Relatório de Entrada de produtos na Loja</div>
	</h2>
"; 

$html1 .= "
	<div class='referencia'>
		<h4>
			<div class='ref1'>Recibo: ".$rec." </div>
			<div class='ref2'>Fornecedor: ".$nomeforn."</div>
		</h4>
	</div>
	<hr /> 
";

$html1 .= "
	<div class='dados'>
		<table class='fontedados' cellspacing='2' cellpadding='2' width='100%'>
			<tr>
				<td width='10%'><strong>CÓDIGO</strong></td>
				<td width='30%'><strong>PRODUTO</strong></td>
				<td width='20%'><strong>QTDE ENTRADA</strong></td>
				<td width='20%'><strong>VALOR ENTRADA</strong></td>
				<td width='20%'><strong>QTDE ESTOQUE</strong></td>
			</tr>
"; 

$cont = 1; 
while($cont <= 100){ 
	if($cont % 2 == 0){ 
		$html1 .= "
			<tr style='background:#eee;'>
				<td>".$cont."</td>
				<td> Bananada </td>
				<td>".$cont."</td>
				<td> R$ 5,00 </td>
				<td> 20 </td>
			</tr>
		";
	}else{ 
		$html1 .= "
			<tr>
				<td>".$cont."</td>
				<td>Bananada</td>
				<td>".$cont."</td>
				<td> R$ 5,00 </td>
				<td> 20 </td>
			</tr>
		";
	} 
	$cont++; 
} 

$html1 .= "</table></div><br>"; 

$htmlfooter = "
	<hr>
	<div class='rodape'>Emissão: ".date('d/m/Y - H:i:s')." </div>
</fieldset>
"; 

//$mpdf=new mPDF('utf-8', 'A4-L',size,fonte,10,10,10,10); 
$mpdf=new mPDF('utf-8', 'A4-L',0,'',10,10,15,15); 
$mpdf->SetDisplayMode('fullpage'); 
$css = file_get_contents('css/stylerel.css'); 
$mpdf->WriteHTML($css,1);
$mpdf->SetHTMLHeader($h);
$mpdf->SetHTMLFooter($htmlfooter);
$mpdf->WriteHTML($html1); 
$mpdf->Output(); 

exit; ?>