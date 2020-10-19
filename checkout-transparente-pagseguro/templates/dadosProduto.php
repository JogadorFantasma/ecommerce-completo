<?php
include('../funcoes.php');

function decodificar($id){
	if ($id == '1') {
		return json_encode(
			array(
				'id' => '1',
				'desc' => 'Produtos '.$_SERVER['HTTP_HOST'],
				'valor' => number_format(valorCalculavel($_POST['total_pagseguro']),2,',',''),
				'img' => 'https://www.estilofreda.com.br/site/img/logo.png',
				)
			);
	} 

}