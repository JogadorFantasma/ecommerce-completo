<?php
include "../Class/acesso.class.php";
$verificaRestrito = Acesso::getInstance(Conexao::getInstance());
$usuarios = Acesso::getInstance(Conexao::getInstance());

include "../Class/config.class.php";
$infoSistema = ConfigSistema::getInstance(Conexao::getInstance())->rsDados();
$acessosSite = ConfigSistema::getInstance(Conexao::getInstance());

include "../Class/produtos.class.php";
$produtos = Produtos::getInstance(Conexao::getInstance());

include "../Class/clientes.class.php";
$clientes = Clientes::getInstance(Conexao::getInstance());

include "../Class/categorias.class.php";
$categorias = Categorias::getInstance(Conexao::getInstance());

include "../Class/testemunhos.class.php";
$testemunhos = Testemunhos::getInstance(Conexao::getInstance());

include "../Class/banners.class.php";
$banners = Banners::getInstance(Conexao::getInstance());

include "../Class/parceiros.class.php";
$parceiros = Parceiros::getInstance(Conexao::getInstance());

$verificaRestrito->restritoAdmin();
$dadosUsuarioLogado = $verificaRestrito->rsDados($_SESSION['dadosLogado']->id);

function get_url(){ 
    return $_SERVER['SCRIPT_NAME'].$_SERVER['REQUEST_URI'];
  }

?>
