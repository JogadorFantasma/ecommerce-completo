<?php
@ session_start();
$ClientesInstanciada = '';
if(empty($ClientesInstanciada)) {
	if(file_exists('Connection/conexao.php')) {
		require_once('Connection/con-pdo.php');
		require_once('funcoes.php');
	} else {
		require_once('../Connection/con-pdo.php');
		require_once('../funcoes.php');
	}
	
	class Clientes {
		
		private $pdo = null;  

		private static $Clientes = null; 

		private function __construct($conexao){  
			$this->pdo = $conexao;  
		}
	  
		public static function getInstance($conexao){   
			if (!isset(self::$Clientes)):    
				self::$Clientes = new Clientes($conexao);   
			endif;
			return self::$Clientes;    
		}
		
	
		function rsDados($id='', $orderBy='', $limite='') {
			
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
				$sql = "SELECT * FROM tbl_cliente where 1=1 $sql $sqlOrdem $sqlLimite";
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
			if(isset($_POST['acao']) && $_POST['acao'] == 'addCliente') {

				
				$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
				$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
				$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
				$sexo = filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_STRING);
				$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
					try{

						$sql = "INSERT INTO tbl_cliente (nome, email, telefone, sexo, senha) VALUES (?, ?, ?, ?, ?)";   
						$stm = $this->pdo->prepare($sql);   
						$stm->bindValue(1, $nome);   
						$stm->bindValue(2, $email);
						$stm->bindValue(3, $telefone);
						$stm->bindValue(4, $sexo);
						$stm->bindValue(5, $senha);
						$stm->execute(); 
						$idBanner = $this->pdo->lastInsertId();
						
						if($redireciona == '') {
							$redireciona = '.';
						}
						
						
					} catch(PDOException $erro){
						echo $erro->getMessage(); 
					}
					echo "	<script>
								window.location='Clientes.php';
								</script>";
								exit;
				
			}
		}
		
		function editar($redireciona='clientes.php') {
			if(isset($_POST['acao']) && $_POST['acao'] == 'editaCliente') {

				$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
				$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
				$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
				$sexo = filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_STRING);
				$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
				$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
				
				try { 
					$sql = "UPDATE tbl_cliente SET nome=?, email=?, telefone=?, sexo=?, senha=? WHERE id=?";   
					$stm = $this->pdo->prepare($sql);   
					$stm->bindValue(1, $nome);   
					$stm->bindValue(2, $email);
					$stm->bindValue(3, $telefone);
					$stm->bindValue(4, $sexo);
					$stm->bindValue(5, $senha);
					$stm->bindValue(6, $id);   
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
			if(isset($_GET['acao']) && $_GET['acao'] == 'excluirCliente') {
				
				try{   
					$sql = "DELETE FROM tbl_cliente WHERE id=? ";   
					$stm = $this->pdo->prepare($sql);   
					$stm->bindValue(1, $_GET['id']);   
					$stm->execute();
				} catch(PDOException $erro){
					echo $erro->getMessage(); 
				}

			}
		}
	}
	
	$ClientesInstanciada = 'S';
}