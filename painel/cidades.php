<?php
include "../Class/cidades.class.php";
$puxacidades = Cidades::getInstance(Conexao::getInstance());
if(isset($_GET['id_estado']) && !empty($_GET['id_estado'])){
    $id_estado = $_GET['id_estado'];
}else{
    $id_estado= '';
}
if(isset($_GET['id_cidade']) && !empty($_GET['id_cidade'])){
    $id_cidade = $_GET['id_cidade'];
}else{
    $id_cidade= '';
}
$puxacidades->selectCidades('', $id_estado, 'id_cidade', $id_cidade, 'nome', '', 'form-control', 'Selecione');
?>