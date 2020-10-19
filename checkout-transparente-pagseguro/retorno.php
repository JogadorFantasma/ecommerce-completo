<?php
//Criamos uma função que recebe um texto como parâmetro.
function gravar($texto){
    //Variável arquivo armazena o nome e extensão do arquivo.
    $arquivo = "meu_arquivo.txt";
     
    //Variável $fp armazena a conexão com o arquivo e o tipo de ação.
    $fp = fopen($arquivo, "a+");
 
    //Escreve no arquivo aberto.
    fwrite($fp, $texto);
     
    //Fecha o arquivo.
    fclose($fp);
}

foreach($_GET as $key => $value){
	if(!is_array($_GET[$key])) {
		$msg = $key.': '.$value;
	}
}

foreach($_POST as $key => $value){
	if(!is_array($_POST[$key])) {
		$msg = $key.': '.$value;
	}
}

gravar($msg);