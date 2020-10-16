<?php
@ session_start();
$ProdutosInstanciada = '';
if(empty($ProdutosInstanciada)) {
	if(file_exists('Connection/conexao.php')) {
		require_once('Connection/con-pdo.php');
		require_once('funcoes.php');
	} else {
		require_once('../Connection/con-pdo.php');
		require_once('../funcoes.php');
	}
	
	class Produtos {
		
		private $pdo = null;  

		private static $Produtos = null; 

		private function __construct($conexao){  
			$this->pdo = $conexao;  
		}
	  
		public static function getInstance($conexao){   
			if (!isset(self::$Produtos)):    
				self::$Produtos = new Produtos($conexao);   
			endif;
			return self::$Produtos;    
		}
		
	
		function rsDados($id='', $orderBy='', $limite='', $url_amigavel='', $destaque='', $ativo='', $id_categoria='') {
			
			/// FILTROS
			$nCampos = 0;
			$sql = '';
			$sqlOrdem = ''; 
			$sqlLimite = '';
			if(!empty($id)) {
				$sql .= " and id = ?"; 
				$nCampos++;
				$campo[$nCampos] = $id;
			}
		
			if(!empty($url_amigavel)) {
				$sql .= " and url_amigavel = ?"; 
				$nCampos++;
				$campo[$nCampos] = $url_amigavel;
			}

			if(!empty($destaque)) {
				$sql .= " and destaque = ?"; 
				$nCampos++;
				$campo[$nCampos] = $destaque;
			}

			if(!empty($ativo)) {
				$sql .= " and ativo = ?"; 
				$nCampos++;
				$campo[$nCampos] = $ativo;
			}
			if(!empty($id_categoria)) {
				$sql .= " and id_categoria = ?"; 
				$nCampos++;
				$campo[$nCampos] = $id_categoria;
			}
			if(isset($_POST['id_cat']) && !empty($_POST['id_cat'])) {
				$sql .= " and id_categoria = '{$_POST['id_cat']}'"; 
			}

			/// ORDEM		
			if(!empty($orderBy)) {
				$sqlOrdem = " order by {$orderBy}";
			}
			
			if(!empty($limite)) {
				$sqlLimite = " limit 0,{$limite}";
			}
			
			try{   
				$sql = "SELECT * FROM tbl_produto where 1=1 $sql $sqlOrdem $sqlLimite";
				$stm = $this->pdo->prepare($sql);
				
				for($i=1; $i<=$nCampos; $i++) {
					$stm->bindValue($i, $campo[$i]);
				}
				
				$stm->execute();
				$rsDados = $stm->fetchAll(PDO::FETCH_OBJ);
				//print_r($rsDados);
				if($id <> '' or $limite == 1) {
					return($rsDados[0]);
				} else {
					return($rsDados);
				}
			} catch(PDOException $erro){   
				echo $erro->getMessage(); 
			}
		}

		function add($redireciona='') {
			if(isset($_POST['acao']) && $_POST['acao'] == 'addProduto') {

				
				$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
				$descricao = $_POST['descricao'];
				$preco_de = filter_input(INPUT_POST, 'preco_de', FILTER_SANITIZE_STRING);
				$preco_por = filter_input(INPUT_POST, 'preco_por', FILTER_SANITIZE_STRING);
				$ativo = filter_input(INPUT_POST, 'ativo', FILTER_SANITIZE_STRING);
				$id_categoria = filter_input(INPUT_POST, 'id_categoria', FILTER_SANITIZE_STRING);
				$id_subcategoria = filter_input(INPUT_POST, 'id_subcategoria', FILTER_SANITIZE_STRING);
				$meta_title = filter_input(INPUT_POST, 'meta_title', FILTER_SANITIZE_STRING);
				$meta_keywords = filter_input(INPUT_POST, 'meta_keywords', FILTER_SANITIZE_STRING);
				$meta_description = filter_input(INPUT_POST, 'meta_description', FILTER_SANITIZE_STRING);
				$urlAmigavel = gerarTituloSEO($nome);
				$quantidade_estoque = filter_input(INPUT_POST, 'quantidade_estoque', FILTER_SANITIZE_STRING);
				$avise_estoque = filter_input(INPUT_POST, 'avise_estoque', FILTER_SANITIZE_STRING);
				$destaque = filter_input(INPUT_POST, 'destaque', FILTER_SANITIZE_STRING);
					try{

						if(file_exists('Connection/conexao.php')) {
							$pastaArquivos = 'img';
						} else {
							$pastaArquivos = '../img';
						}
						
						$sql = "INSERT INTO tbl_produto (imagem, nome, descricao, preco_de, preco_por, ativo, id_categoria, id_subcategoria, url_amigavel, meta_title, meta_keywords, meta_description, quantidade_estoque, avise_estoque, destaque) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";   
						$stm = $this->pdo->prepare($sql);   
						$stm->bindValue(1, upload('imagem', $pastaArquivos, 'N'));   
						$stm->bindValue(2, $nome);   
						$stm->bindValue(3, $descricao);
						$stm->bindValue(4, valorCalculavel($preco_de));
						$stm->bindValue(5, valorCalculavel($preco_por));
						$stm->bindValue(6, $ativo);
						$stm->bindValue(7, $id_categoria);
						$stm->bindValue(8, $id_subcategoria);
						$stm->bindValue(9, $urlAmigavel);
						$stm->bindValue(10, $meta_title); 
						$stm->bindValue(11, $meta_keywords); 
						$stm->bindValue(12, $meta_description);
						$stm->bindValue(13, $quantidade_estoque);
						$stm->bindValue(14, $avise_estoque);
						$stm->bindValue(15, $destaque);
						$stm->execute(); 
						$idBanner = $this->pdo->lastInsertId();
						
						if($redireciona == '') {
							$redireciona = '.';
						}
						
						
					} catch(PDOException $erro){
						echo $erro->getMessage(); 
					}
					echo "	<script>
								window.location='produtos.php';
								</script>";
								exit;
				
			}
		}
		
		function editar($redireciona='produtos.php') {
			if(isset($_POST['acao']) && $_POST['acao'] == 'editaProduto') {

				$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
				$descricao = $_POST['descricao'];
				$preco_de = filter_input(INPUT_POST, 'preco_de', FILTER_SANITIZE_STRING);
				$preco_por = filter_input(INPUT_POST, 'preco_por', FILTER_SANITIZE_STRING);
				$ativo = filter_input(INPUT_POST, 'ativo', FILTER_SANITIZE_STRING);
				$id_categoria = filter_input(INPUT_POST, 'id_categoria', FILTER_SANITIZE_STRING);
				$id_subcategoria = filter_input(INPUT_POST, 'id_subcategoria', FILTER_SANITIZE_STRING);
				$meta_title = filter_input(INPUT_POST, 'meta_title', FILTER_SANITIZE_STRING);
				$meta_keywords = filter_input(INPUT_POST, 'meta_keywords', FILTER_SANITIZE_STRING);
				$meta_description = filter_input(INPUT_POST, 'meta_description', FILTER_SANITIZE_STRING);
				$urlAmigavel = gerarTituloSEO($nome);
				$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
				$quantidade_estoque = filter_input(INPUT_POST, 'quantidade_estoque', FILTER_SANITIZE_STRING);
				$avise_estoque = filter_input(INPUT_POST, 'avise_estoque', FILTER_SANITIZE_STRING);
				$destaque = filter_input(INPUT_POST, 'destaque', FILTER_SANITIZE_STRING);
				
				try { 

					if(file_exists('Connection/conexao.php')) {
							$pastaArquivos = 'img';
						} else {
							$pastaArquivos = '../img';
						}
				
					$sql = "UPDATE tbl_produto SET imagem=?, nome=?, descricao=?, preco_de=?, preco_por=?, ativo=?, id_categoria=?, id_subcategoria=?, url_amigavel=?, meta_title=?, meta_keywords=?, meta_description=?, quantidade_estoque=?, avise_estoque=?, destaque=? WHERE id=?";   
					$stm = $this->pdo->prepare($sql);   
					$stm->bindValue(1, upload('imagem', $pastaArquivos, 'N'));   
					$stm->bindValue(2, $nome);   
					$stm->bindValue(3, $descricao);
					$stm->bindValue(4, valorCalculavel($preco_de));
					$stm->bindValue(5, valorCalculavel($preco_por));
					$stm->bindValue(6, $ativo);
					$stm->bindValue(7, $id_categoria);
					$stm->bindValue(8, $id_subcategoria);
					$stm->bindValue(9, $urlAmigavel);
					$stm->bindValue(10, $meta_title); 
					$stm->bindValue(11, $meta_keywords); 
					$stm->bindValue(12, $meta_description);
					$stm->bindValue(13, $quantidade_estoque);
					$stm->bindValue(14, $avise_estoque);
					$stm->bindValue(15, $destaque); 
					$stm->bindValue(16, $id);   
					$stm->execute(); 
				} catch(PDOException $erro){
					echo $erro->getMessage(); 
				}
				echo "	<script>
							window.location='{$redireciona}';
							</script>";
							exit;
			}
		}
		function excluir() {
			if(isset($_GET['acao']) && $_GET['acao'] == 'excluirProduto') {
				
				try{   
					$sql = "DELETE FROM tbl_produto WHERE id=? ";   
					$stm = $this->pdo->prepare($sql);   
					$stm->bindValue(1, $_GET['id']);   
					$stm->execute();
				} catch(PDOException $erro){
					echo $erro->getMessage(); 
				}
				echo "	<script>
								window.location='produtos.php';
								</script>";
								exit;

			}
		}
	}
	
	$ProdutosInstanciada = 'S';
}