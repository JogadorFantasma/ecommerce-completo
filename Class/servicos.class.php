<?php
@ session_start();
$ServicosInstanciada = '';
if(empty($ServicosInstanciada)) {
	if(file_exists('Connection/conexao.php')) {
		require_once('Connection/con-pdo.php');
		require_once('funcoes.php');
	} else {
		require_once('../Connection/con-pdo.php');
		require_once('../funcoes.php');
	}
	
	class Servicos {
		
		private $pdo = null;  

		private static $Servicos = null; 

		private function __construct($conexao){  
			$this->pdo = $conexao;  
		}
	  
		public static function getInstance($conexao){   
			if (!isset(self::$Servicos)):    
				self::$Servicos = new Servicos($conexao);   
			endif;
			return self::$Servicos;    
		}
		
	
		function rsDados($id='', $orderBy='', $limite='', $idCat='') {
			
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
			if(!empty($idCat)) {
				$sql .= " and id_cat = ?"; 
				$nCampos++;
				$campo[$nCampos] = $idCat;
			}
		
			/// ORDEM		
			if(!empty($orderBy)) {
				$sqlOrdem = " order by {$orderBy}";
			}
			
			if(!empty($limite)) {
				$sqlLimite = " limit 0,{$limite}";
			}
			
			try{   
				$sql = "SELECT * FROM tbl_servicos where 1=1 $sql $sqlOrdem $sqlLimite";
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
			if(isset($_POST['acao']) && $_POST['acao'] == 'addServico') {
	
				$titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
				//$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
				$descricao = $_POST['descricao'];
				$id_cat = filter_input(INPUT_POST, 'id_cat', FILTER_SANITIZE_STRING);
				$meta_title = filter_input(INPUT_POST, 'meta_title', FILTER_SANITIZE_STRING);
				$meta_keywords = filter_input(INPUT_POST, 'meta_keywords', FILTER_SANITIZE_STRING);
				$meta_description = filter_input(INPUT_POST, 'meta_description', FILTER_SANITIZE_STRING);
				
					try{

						if(file_exists('Connection/conexao.php')) {
							$pastaArquivos = 'img';
						} else {
							$pastaArquivos = '../img';
						}
						
						$sql = "INSERT INTO tbl_servicos (foto, titulo, descricao, id_cat, meta_title, meta_keywords, meta_description) VALUES (?, ?, ?, ?, ?, ?, ?)";   
						$stm = $this->pdo->prepare($sql);   
						$stm->bindValue(1, upload('foto', $pastaArquivos, 'N'));   
						$stm->bindValue(2, $titulo);   
						$stm->bindValue(3, $descricao);
						$stm->bindValue(4, $id_cat);   
						$stm->bindValue(5, $meta_title);   
						$stm->bindValue(6, $meta_keywords);   
						$stm->bindValue(7, $meta_description);   
						$stm->execute(); 
						$idBanner = $this->pdo->lastInsertId();
						
						if($redireciona == '') {
							$redireciona = '.';
						}
						
						
					} catch(PDOException $erro){
						echo $erro->getMessage(); 
					}
					echo "	<script>
								window.location='servicos.php';
								</script>";
								exit;
				
			}
		}
		
		function editar($redireciona='servicos.php') {
			if(isset($_POST['acao']) && $_POST['acao'] == 'editaServico') {

				

				$titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
				//$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
				$descricao = $_POST['descricao'];
				$id_cat = filter_input(INPUT_POST, 'id_cat', FILTER_SANITIZE_STRING);
				$meta_title = filter_input(INPUT_POST, 'meta_title', FILTER_SANITIZE_STRING);
				$meta_keywords = filter_input(INPUT_POST, 'meta_keywords', FILTER_SANITIZE_STRING);
				$meta_description = filter_input(INPUT_POST, 'meta_description', FILTER_SANITIZE_STRING);
				$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);

				
				try { 

					if(file_exists('Connection/conexao.php')) {
							$pastaArquivos = 'img';
						} else {
							$pastaArquivos = '../img';
						}
				
					$sql = "UPDATE tbl_servicos SET foto=?, titulo=?, descricao=?, id_cat=?, meta_title=?, meta_keywords=?, meta_description=? WHERE id=?";   
					$stm = $this->pdo->prepare($sql);   
					$stm->bindValue(1, upload('foto', $pastaArquivos, 'N'));   
					$stm->bindValue(2, $titulo);   
					$stm->bindValue(3, $descricao);
					$stm->bindValue(4, $id_cat);   
					$stm->bindValue(5, $meta_title);   
					$stm->bindValue(6, $meta_keywords);   
					$stm->bindValue(7, $meta_description);
					$stm->bindValue(8, $id);   
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
			if(isset($_GET['acao']) && $_GET['acao'] == 'excluirServico') {
				
				try{   
					$sql = "DELETE FROM tbl_servicos WHERE id=? ";   
					$stm = $this->pdo->prepare($sql);   
					$stm->bindValue(1, $_GET['id']);   
					$stm->execute();
				} catch(PDOException $erro){
					echo $erro->getMessage(); 
				}

			}
		}

		function rsCatServicos($id='', $orderBy='', $limite='') {
			
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
		
			/// ORDEM		
			if(!empty($orderBy)) {
				$sqlOrdem = " order by {$orderBy}";
			}
			
			if(!empty($limite)) {
				$sqlLimite = " limit 0,{$limite}";
			}
			
			try{   
				$sql = "SELECT * FROM tbl_cat_servicos where 1=1 $sql $sqlOrdem $sqlLimite";
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

	}
	
	$ServicosInstanciada = 'S';
}