<?php
$ConfigSistemaInstanciada = '';
if(empty($ConfigSistemaInstanciada)) {
	if(file_exists('Connection/conexao.php')) {
		require_once('Connection/con-pdo.php');
		require_once('funcoes.php');
	} else {
		require_once('../Connection/con-pdo.php');
		require_once('../funcoes.php');
	}
	
	class ConfigSistema {

		private $pdo = null;  

		private static $ConfigSistema = null; 
	
		private function __construct($conexao){  
			$this->pdo = $conexao;  
		}
		
		public static function getInstance($conexao){   
			if (!isset(self::$ConfigSistema)):    
				self::$ConfigSistema = new ConfigSistema($conexao);   
			endif;
			return self::$ConfigSistema;    
		}
		
		var $id_campanha;
				
		function rsDados() {
			
			try{   
				$sql = "SELECT * FROM tbl_config ";
				$stm = $this->pdo->prepare($sql);
				$stm->execute();   
				$rsDados = $stm->fetchAll(PDO::FETCH_OBJ);
											
				$this->id_campanha = $rsDados[0]->id_campanha;
				$this->favicon = $rsDados[0]->favicon;
				$this->meta_title_principal = $rsDados[0]->meta_title_principal;
				$this->meta_keywords_principal = $rsDados[0]->meta_keywords_principal;
				$this->meta_description_principal = $rsDados[0]->meta_description_principal;
				$this->meta_title_convenio = $rsDados[0]->meta_title_convenio;
				$this->meta_keywords_convenio = $rsDados[0]->meta_keywords_convenio;
				$this->meta_description_convenio = $rsDados[0]->meta_description_convenio;
				$this->meta_title_blog = $rsDados[0]->meta_title_blog;
				$this->meta_keywords_blog = $rsDados[0]->meta_keywords_blog;
				$this->meta_description_blog = $rsDados[0]->meta_description_blog;
				$this->meta_title_contato = $rsDados[0]->meta_title_contato;
				$this->meta_keywords_contato = $rsDados[0]->meta_keywords_contato;
				$this->meta_description_contato = $rsDados[0]->meta_description_contato;
				$this->meta_title_parceria = $rsDados[0]->meta_title_parceria;
				$this->meta_keywords_parceria = $rsDados[0]->meta_keywords_parceria;
				$this->meta_description_parceria = $rsDados[0]->meta_description_parceria;
				$this->meta_title_servico = $rsDados[0]->meta_title_servico;
				$this->meta_keywords_servico = $rsDados[0]->meta_keywords_servico;
				$this->meta_description_servico = $rsDados[0]->meta_description_servico;
				$this->meta_title_sobre = $rsDados[0]->meta_title_sobre;
				$this->meta_keywords_sobre = $rsDados[0]->meta_keywords_sobre;
				$this->meta_description_sobre = $rsDados[0]->meta_description_sobre;
				$this->meta_title_produtos = $rsDados[0]->meta_title_produtos;
				$this->meta_keywords_produtos = $rsDados[0]->meta_keywords_produtos;
				$this->meta_description_produtos = $rsDados[0]->meta_description_produtos;
				$this->facebook = $rsDados[0]->facebook;
				$this->twitter = $rsDados[0]->twitter;
				$this->instagram = $rsDados[0]->instagram;
				$this->youtube = $rsDados[0]->youtube;
				$this->linkedln = $rsDados[0]->linkedln;
				$this->nome_empresa = $rsDados[0]->nome_empresa;
				$this->endereco = $rsDados[0]->endereco;
				$this->telefone1 = $rsDados[0]->telefone1;
				$this->telefone2 = $rsDados[0]->telefone2;
				$this->email1 = $rsDados[0]->email1;
				$this->email2 = $rsDados[0]->email2;
				
			} catch(PDOException $erro){   
				echo $erro->getLine(); 
			}
			
			return($this);
		}

		

		function acessosSite($id='', $orderBy='', $limite='', $idCampanha='', $veioDeOnde='') {
			
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
			
			if(!empty($idCampanha)) {
				$sql .= " and id_campanha = ?"; 
				$nCampos++;
				$campo[$nCampos] = $idCampanha;
			}
			if(!empty($veioDeOnde)) {
				$sql .= " and veio_de_onde = ?"; 
				$nCampos++;
				$campo[$nCampos] = $veioDeOnde;
			}
			if(isset($_POST['dataDeCampanha']) && !empty($_POST['dataDeCampanha'])) {
				$sql .= " and data >= '{$_POST['dataDeCampanha']}'"; 
			}
			if(isset($_POST['dataAteCampanha']) && !empty($_POST['dataAteCampanha'])) {
				$sql .= " and data <= '{$_POST['dataAteCampanha']}'"; 
			}
			if(isset($_GET['dias']) && $_GET['dias'] == 7) {
				$sql .= " and data >= NOW() + INTERVAL -7 DAY
				AND data <  NOW() + INTERVAL  0 DAY"; 
			}
			if(isset($_GET['dias']) && $_GET['dias'] == 15) {
				$sql .= " and data >= NOW() + INTERVAL -15 DAY
				AND data <  NOW() + INTERVAL  0 DAY"; 
			}
			if(isset($_GET['dias']) && $_GET['dias'] == 30) {
				$sql .= " and data >= NOW() + INTERVAL -30 DAY
				AND data <  NOW() + INTERVAL  0 DAY"; 
			}
			
			/// ORDEM		
			if(!empty($orderBy)) {
				$sqlOrdem = " order by {$orderBy}";
			}
			if(!empty($limite)) {
				$sqlLimite = " limit 0,{$limite}";
			}
			try{   
				$sql = "SELECT * FROM contadores_paginas where 1=1 $sql $sqlOrdem $sqlLimite";
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

		
		function statusFrase($id_usuario, $status) {
		

				try{   
					$sql = "UPDATE tbl_usuarios SET frase_lida=? WHERE id=?";   
					$stm = $this->pdo->prepare($sql);   
					$stm->bindValue(1, $status);   
					$stm->bindValue(2, $id_usuario);   
					$stm->execute();  
					
					
				} catch(PDOException $erro){   
					echo $erro->getMessage();
				}
				echo "	<script>
							window.location='.';
							</script>";
							exit;
			
		}
		
		
		function editar() {
			if(isset($_POST['acao']) && $_POST['acao'] == 'editarConfig') {
				$id_campanha = filter_input(INPUT_POST, 'id_campanha', FILTER_SANITIZE_STRING);
				$facebook = filter_input(INPUT_POST, 'facebook', FILTER_SANITIZE_STRING);
				$twitter = filter_input(INPUT_POST, 'twitter', FILTER_SANITIZE_STRING);
				$instagram = filter_input(INPUT_POST, 'instagram', FILTER_SANITIZE_STRING);
				$youtube = filter_input(INPUT_POST, 'youtube', FILTER_SANITIZE_STRING);
				$nome_empresa = filter_input(INPUT_POST, 'nome_empresa', FILTER_SANITIZE_STRING);
				$endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
				$telefone1 = filter_input(INPUT_POST, 'telefone1', FILTER_SANITIZE_STRING);
				$telefone2 = filter_input(INPUT_POST, 'telefone2', FILTER_SANITIZE_STRING);
				$email1 = filter_input(INPUT_POST, 'email1', FILTER_SANITIZE_STRING);
				$email2 = filter_input(INPUT_POST, 'email2', FILTER_SANITIZE_STRING);
				try{   
					if(file_exists('Connection/conexao.php')) {
							$pastaArquivos = 'img';
						} else {
							$pastaArquivos = '../img';
						}
					$sql = "UPDATE tbl_config SET id_campanha=?, facebook=?, twitter=?, instagram=?, youtube=?, favicon=?, nome_empresa=?, endereco=?, telefone1=?, telefone2=?, email1=?, email2=? WHERE id=? ";   
					$stm = $this->pdo->prepare($sql);  
					$stm->bindValue(1, $id_campanha);
					$stm->bindValue(2, $facebook);
					$stm->bindValue(3, $twitter);
					$stm->bindValue(4, $instagram);
					$stm->bindValue(5, $youtube);
					$stm->bindValue(6, upload('favicon', $pastaArquivos, 'N'));
					$stm->bindValue(7, $nome_empresa);
					$stm->bindValue(8, $endereco);
					$stm->bindValue(9, $telefone1);
					$stm->bindValue(10, $telefone2);
					$stm->bindValue(11, $email1);
					$stm->bindValue(12, $email2);
					$stm->bindValue(13, 1);
					$stm->execute();  
					
					echo "	<script>
							alert('Modificado com sucesso!');
							window.location='configuracoes.php';
							</script>";
							exit;
				} catch(PDOException $erro){   
					echo $erro->getMessage();
				}
			}
		}

		function rsFrases($id='', $orderBy='', $limite='') {
			
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
				$sql = "SELECT * FROM tbl_frases where 1=1 $sql $sqlOrdem $sqlLimite";
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

		function addFrase($redireciona='') {
			if(isset($_POST['acao']) && $_POST['acao'] == 'addFrase') {
				$frase = filter_input(INPUT_POST, 'frase', FILTER_SANITIZE_STRING);
			
					try{
						
						$sql = "INSERT INTO tbl_frases (frase) VALUES (?)";   
						$stm = $this->pdo->prepare($sql);   
						$stm->bindValue(1, $frase);   
						$stm->execute(); 
						//$idTratamento = $this->pdo->lastInsertId();
						
						
					} catch(PDOException $erro){
						echo $erro->getMessage(); 
					}
					if($redireciona == '') {
						$redireciona = '.';
					}
					
					echo "	<script>
							window.location='frases.php';
							</script>";
							exit;
				
			}
		}

		function editarFrase() {
			if(isset($_POST['acao']) && $_POST['acao'] == 'editaFrase') {
				$frase = filter_input(INPUT_POST, 'frase', FILTER_SANITIZE_STRING);
				$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
				try{   
					$sql = "UPDATE tbl_frases SET frase=? WHERE id=? ";   
					$stm = $this->pdo->prepare($sql);  
					$stm->bindValue(1, $frase);
					$stm->bindValue(2, $id);
					$stm->execute();  
					
				} catch(PDOException $erro){   
					echo $erro->getMessage();
				}
				echo "	<script>
				window.location='frases.php';
				</script>";
				exit;
			}
		}

		function excluirFrase() {
			if(isset($_GET['acao']) && $_GET['acao'] == 'excluirFrase') {
				
				try{   
					$sql = "DELETE FROM tbl_frases WHERE id=? ";   
					$stm = $this->pdo->prepare($sql);   
					$stm->bindValue(1, $_GET['id']);   
					$stm->execute();
				} catch(PDOException $erro){
					echo $erro->getMessage(); 
				}

			}
		}

		function rsCampanha($id='', $orderBy='', $limite='') {
			
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
				$sql = "SELECT * FROM tbl_campanha where 1=1 $sql $sqlOrdem $sqlLimite";
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

		function addCampanha($redireciona='') {
			if(isset($_POST['acao']) && $_POST['acao'] == 'addCampanha') {
				$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
			
					try{
						
						$sql = "INSERT INTO tbl_campanha (nome) VALUES (?)";   
						$stm = $this->pdo->prepare($sql);   
						$stm->bindValue(1, $nome);   
						$stm->execute(); 
						//$idTratamento = $this->pdo->lastInsertId();
						
						
					} catch(PDOException $erro){
						echo $erro->getMessage(); 
					}
					if($redireciona == '') {
						$redireciona = '.';
					}
					
					echo "	<script>
							window.location='campanhas.php';
							</script>";
							exit;
				
			}
		}

		function editarCampanha() {
			if(isset($_POST['acao']) && $_POST['acao'] == 'editaCampanha') {
				$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
				$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
				try{   
					$sql = "UPDATE tbl_campanha SET nome=? WHERE id=? ";   
					$stm = $this->pdo->prepare($sql);  
					$stm->bindValue(1, $nome);
					$stm->bindValue(2, $id);
					$stm->execute();  
					
				} catch(PDOException $erro){   
					echo $erro->getMessage();
				}
				echo "	<script>
				window.location='campanhas.php';
				</script>";
				exit;
			}
		}

		function excluirCampanha() {
			if(isset($_GET['acao']) && $_GET['acao'] == 'excluirCampanha') {
				
				try{   
					$sql = "DELETE FROM tbl_campanha WHERE id=? ";   
					$stm = $this->pdo->prepare($sql);   
					$stm->bindValue(1, $_GET['id']);   
					$stm->execute();
				} catch(PDOException $erro){
					echo $erro->getMessage(); 
				}

			}
		}

	function editarMetaTag() {
			if(isset($_POST['acao']) && $_POST['acao'] == 'editarMetaTag') {
				$meta_title_principal = filter_input(INPUT_POST, 'meta_title_principal', FILTER_SANITIZE_STRING);
				$meta_keywords_principal = filter_input(INPUT_POST, 'meta_keywords_principal', FILTER_SANITIZE_STRING);
				$meta_description_principal = filter_input(INPUT_POST, 'meta_description_principal', FILTER_SANITIZE_STRING);
				$meta_title_blog = filter_input(INPUT_POST, 'meta_title_blog', FILTER_SANITIZE_STRING);
				$meta_keywords_blog = filter_input(INPUT_POST, 'meta_keywords_blog', FILTER_SANITIZE_STRING);
				$meta_description_blog = filter_input(INPUT_POST, 'meta_description_blog', FILTER_SANITIZE_STRING);
				$meta_title_contato = filter_input(INPUT_POST, 'meta_title_contato', FILTER_SANITIZE_STRING);
				$meta_keywords_contato = filter_input(INPUT_POST, 'meta_keywords_contato', FILTER_SANITIZE_STRING);
				$meta_description_contato = filter_input(INPUT_POST, 'meta_description_contato', FILTER_SANITIZE_STRING);
				$meta_title_parceria = filter_input(INPUT_POST, 'meta_title_parceria', FILTER_SANITIZE_STRING);
				$meta_keywords_parceria = filter_input(INPUT_POST, 'meta_keywords_parceria', FILTER_SANITIZE_STRING);
				$meta_description_parceria = filter_input(INPUT_POST, 'meta_description_parceria', FILTER_SANITIZE_STRING);
				$meta_title_servico = filter_input(INPUT_POST, 'meta_title_servico', FILTER_SANITIZE_STRING);
				$meta_keywords_servico = filter_input(INPUT_POST, 'meta_keywords_servico', FILTER_SANITIZE_STRING);
				$meta_description_servico = filter_input(INPUT_POST, 'meta_description_servico', FILTER_SANITIZE_STRING);
				$meta_title_sobre = filter_input(INPUT_POST, 'meta_title_sobre', FILTER_SANITIZE_STRING);
				$meta_keywords_sobre = filter_input(INPUT_POST, 'meta_keywords_sobre', FILTER_SANITIZE_STRING);
				$meta_description_sobre = filter_input(INPUT_POST, 'meta_description_sobre', FILTER_SANITIZE_STRING);
				$meta_title_produtos = filter_input(INPUT_POST, 'meta_title_produtos', FILTER_SANITIZE_STRING);
				$meta_keywords_produtos = filter_input(INPUT_POST, 'meta_keywords_produtos', FILTER_SANITIZE_STRING);
				$meta_description_produtos = filter_input(INPUT_POST, 'meta_description_produtos', FILTER_SANITIZE_STRING);
				
				try{   
					$sql = "UPDATE tbl_config SET meta_title_principal=?, meta_keywords_principal=?, meta_description_principal=?,meta_title_blog=?, meta_keywords_blog=?, meta_description_blog=?, meta_title_contato=?, meta_keywords_contato=?, meta_description_contato=?, meta_title_parceria=?, meta_keywords_parceria=?, meta_description_parceria=?, meta_title_servico=?, meta_keywords_servico=?, meta_description_servico=?, meta_title_sobre=?, meta_keywords_sobre=?, meta_description_sobre=?, meta_title_produtos=?, meta_keywords_produtos=?, meta_description_produtos=? WHERE id=? ";
					$stm = $this->pdo->prepare($sql);  
					$stm->bindValue(1, $meta_title_principal);
					$stm->bindValue(2, $meta_keywords_principal);
					$stm->bindValue(3, $meta_description_principal);
					$stm->bindValue(4, $meta_title_blog);
					$stm->bindValue(5, $meta_keywords_blog);
					$stm->bindValue(6, $meta_description_blog);
					$stm->bindValue(7, $meta_title_contato);
					$stm->bindValue(8, $meta_keywords_contato);
					$stm->bindValue(9, $meta_description_contato);
					$stm->bindValue(10, $meta_title_parceria);
					$stm->bindValue(11, $meta_keywords_parceria);
					$stm->bindValue(12, $meta_description_parceria);
					$stm->bindValue(13, $meta_title_servico);
					$stm->bindValue(14, $meta_keywords_servico);
					$stm->bindValue(15, $meta_description_servico);
					$stm->bindValue(16, $meta_title_sobre);
					$stm->bindValue(17, $meta_keywords_sobre);
					$stm->bindValue(18, $meta_description_sobre);
					$stm->bindValue(19, $meta_title_produtos);
					$stm->bindValue(20, $meta_keywords_produtos);
					$stm->bindValue(21, $meta_description_produtos);
					$stm->bindValue(22, 1);
					$stm->execute();  
					echo "	<script>
							alert('Modificado com sucesso!');
							window.location='metas-tags.php';
							</script>";
							exit;
				} catch(PDOException $erro){   
					echo $erro->getMessage();
				}
			}
		}
	}
	
	$ConfigSistemaInstanciada = 'S';
}