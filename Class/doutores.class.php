<?php
@ session_start();
$DoutoresInstanciada = '';
if(empty($DoutoresInstanciada)) {
	if(file_exists('Connection/conexao.php')) {
		require_once('Connection/con-pdo.php');
		require_once('funcoes.php');
	} else {
		require_once('../Connection/con-pdo.php');
		require_once('../funcoes.php');
	}
	
	class Doutores {
		
		private $pdo = null;  

		private static $Doutores = null; 

		private function __construct($conexao){  
			$this->pdo = $conexao;  
		}
	  
		public static function getInstance($conexao){   
			if (!isset(self::$Doutores)):    
				self::$Doutores = new Doutores($conexao);   
			endif;
			return self::$Doutores;    
		}
		
	
		function rsDados($id='', $orderBy='', $limite='', $veioDeOnde='', $idDiferente='') {
			
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
			if(!empty($idDiferente)) {
				$sql .= " and id != ?"; 
				$nCampos++;
				$campo[$nCampos] = $idDiferente;
			}
			if(!empty($veioDeOnde)) {
				$sql .= " and veio_de_onde = ?"; 
				$nCampos++;
				$campo[$nCampos] = $veioDeOnde;
			}


			if(isset($_POST['buscaNome']) && !empty($_POST['buscaNome'])) {
				$sql .= " and nome like '%{$_POST['buscaNome']}%'"; 
			}
			if(isset($_POST['buscaStatus']) && !empty($_POST['buscaStatus'])) {
				$sql .= " and status = '{$_POST['buscaStatus']}'"; 
			}

			// if(isset($_POST['buscaCampanha']) && !empty($_POST['buscaCampanha'])) {
			// 	$sql .= " and id_campanha = '{$_POST['buscaCampanha']}'"; 
			// }

			if(isset($_POST['dataDeContato']) && !empty($_POST['dataDeContato'])) {
				$sql .= " and data_registro >= '{$_POST['dataDeContato']}'"; 
			}
			if(isset($_POST['dataAteContato']) && !empty($_POST['dataAteContato'])) {
				$sql .= " and data_registro <= '{$_POST['dataAteContato']}'"; 
			}

			if(isset($_POST['dataDeCampanha']) && !empty($_POST['dataDeCampanha'])) {
				$sql .= " and data_registro >= '{$_POST['dataDeCampanha']}'"; 
			}
			if(isset($_POST['dataAteCampanha']) && !empty($_POST['dataAteCampanha'])) {
				$sql .= " and data_registro <= '{$_POST['dataAteCampanha']}'"; 
			}

			if(isset($_GET['dias']) && $_GET['dias'] == 7) {
				$sql .= " and data_registro >= NOW() + INTERVAL -7 DAY
				AND data_registro <  NOW() + INTERVAL  0 DAY"; 
			}
			if(isset($_GET['dias']) && $_GET['dias'] == 15) {
				$sql .= " and data_registro >= NOW() + INTERVAL -15 DAY
				AND data_registro <  NOW() + INTERVAL  0 DAY"; 
			}
			if(isset($_GET['dias']) && $_GET['dias'] == 30) {
				$sql .= " and data_registro >= NOW() + INTERVAL -30 DAY
				AND data_registro <  NOW() + INTERVAL  0 DAY"; 
			}

			/// ORDEM		
			if(!empty($orderBy)) {
				$sqlOrdem = " order by {$orderBy}";
			}
			
			if(!empty($limite)) {
				$sqlLimite = " limit 0,{$limite}";
			}
			
			try{   
				$sql = "SELECT * FROM tbl_doutores where 1=1 $sql $sqlOrdem $sqlLimite";
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
			if(isset($_POST['acao']) && $_POST['acao'] == 'addDoutor') {

				
				$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
				$especialidade = filter_input(INPUT_POST, 'especialidade', FILTER_SANITIZE_STRING);
				//$curriculo = filter_input(INPUT_POST, 'curriculo', FILTER_SANITIZE_STRING);
				$curriculo = $_POST['curriculo'];
				$sexo = filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_STRING);
				$meta_title = filter_input(INPUT_POST, 'meta_title', FILTER_SANITIZE_STRING);
				$meta_keywords = filter_input(INPUT_POST, 'meta_keywords', FILTER_SANITIZE_STRING);
				$meta_description = filter_input(INPUT_POST, 'meta_description', FILTER_SANITIZE_STRING);
				$graduacao = filter_input(INPUT_POST, 'graduacao', FILTER_SANITIZE_STRING);
				$linguagem = filter_input(INPUT_POST, 'linguagem', FILTER_SANITIZE_STRING);
				$dias_trabalho = filter_input(INPUT_POST, 'dias_trabalho', FILTER_SANITIZE_STRING);
				$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
				$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
				
					try{

						if(file_exists('Connection/conexao.php')) {
							$pastaArquivos = 'img';
						} else {
							$pastaArquivos = '../img';
						}
						
						$sql = "INSERT INTO tbl_doutores (foto, nome, especialidade, curriculo, sexo, meta_title, meta_keywords, meta_description, graduacao, linguagem, dias_trabalho, telefone, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";   
						$stm = $this->pdo->prepare($sql);   
						$stm->bindValue(1, upload('foto', $pastaArquivos, 'N'));   
						$stm->bindValue(2, $nome);   
						$stm->bindValue(3, $especialidade);
						$stm->bindValue(4, $curriculo);
						$stm->bindValue(5, $sexo);
						$stm->bindValue(6, $meta_title);
						$stm->bindValue(7, $meta_keywords);
						$stm->bindValue(8, $meta_description);
						$stm->bindValue(9, $graduacao);
						$stm->bindValue(10, $linguagem);
						$stm->bindValue(11, $dias_trabalho); 
						$stm->bindValue(12, $telefone); 
						$stm->bindValue(13, $email);   
						$stm->execute(); 
						$idBanner = $this->pdo->lastInsertId();
						
						if($redireciona == '') {
							$redireciona = '.';
						}
						
						
					} catch(PDOException $erro){
						echo $erro->getMessage(); 
					}
					echo "	<script>
								window.location='doutores.php';
								</script>";
								exit;
				
			}
		}
		
		function editar($redireciona='doutores.php') {
			if(isset($_POST['acao']) && $_POST['acao'] == 'editaDoutor') {

				$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
				$especialidade = filter_input(INPUT_POST, 'especialidade', FILTER_SANITIZE_STRING);
				//$curriculo = filter_input(INPUT_POST, 'curriculo', FILTER_SANITIZE_STRING);
				$curriculo = $_POST['curriculo'];
				$sexo = filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_STRING);
				$meta_title = filter_input(INPUT_POST, 'meta_title', FILTER_SANITIZE_STRING);
				$meta_keywords = filter_input(INPUT_POST, 'meta_keywords', FILTER_SANITIZE_STRING);
				$meta_description = filter_input(INPUT_POST, 'meta_description', FILTER_SANITIZE_STRING);
				$graduacao = filter_input(INPUT_POST, 'graduacao', FILTER_SANITIZE_STRING);
				$linguagem = filter_input(INPUT_POST, 'linguagem', FILTER_SANITIZE_STRING);
				$dias_trabalho = filter_input(INPUT_POST, 'dias_trabalho', FILTER_SANITIZE_STRING);
				$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
				$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
				$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
				
				try { 

					if(file_exists('Connection/conexao.php')) {
							$pastaArquivos = 'img';
						} else {
							$pastaArquivos = '../img';
						}
				
					$sql = "UPDATE tbl_doutores SET foto=?, nome=?, especialidade=?, curriculo=?, sexo=?, meta_title=?, meta_keywords=?, meta_description=?, graduacao=?, linguagem=?, dias_trabalho=?, telefone=?, email=? WHERE id=?";   
					$stm = $this->pdo->prepare($sql);   
					$stm->bindValue(1, upload('foto', $pastaArquivos, 'N'));   
					$stm->bindValue(2, $nome);   
					$stm->bindValue(3, $especialidade);   
					$stm->bindValue(4, $curriculo);
					$stm->bindValue(5, $sexo);
					$stm->bindValue(6, $meta_title);
					$stm->bindValue(7, $meta_keywords);
					$stm->bindValue(8, $meta_description);
					$stm->bindValue(9, $graduacao);
					$stm->bindValue(10, $linguagem);
					$stm->bindValue(11, $dias_trabalho);
					$stm->bindValue(12, $telefone);   
					$stm->bindValue(13, $email);   
					$stm->bindValue(14, $id);   
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
			if(isset($_GET['acao']) && $_GET['acao'] == 'excluirDoutor') {
				
				try{   
					$sql = "DELETE FROM tbl_doutores WHERE id=? ";   
					$stm = $this->pdo->prepare($sql);   
					$stm->bindValue(1, $_GET['id']);   
					$stm->execute();
				} catch(PDOException $erro){
					echo $erro->getMessage(); 
				}

			}
		}
	}
	
	$DoutoresInstanciada = 'S';
}