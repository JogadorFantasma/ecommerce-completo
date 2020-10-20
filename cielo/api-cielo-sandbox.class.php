<?php 
$ApisSandboxesCieloInstanciada = '';
if(empty($ApisSandboxesCieloInstanciada)) {
	if(file_exists('Connection/conexao.php')) {
		require_once('Connection/con-pdo.php');
		require_once('funcoes.php');
	} else {
		require_once('../Connection/con-pdo.php');
		require_once('../funcoes.php');
	}
	
	class ApisSandboxesCielo {
        private $pdo = null;  

		private static $ApisSandboxesCielo = null; 
	
		private function __construct($conexao){  
			$this->pdo = $conexao;  
		}
		
		public static function getInstance($conexao){   
			if (!isset(self::$ApisSandboxesCielo)):    
				self::$ApisSandboxesCielo = new ApisSandboxesCielo($conexao);   
			endif;
			return self::$ApisSandboxesCielo;    
		}

        function crediCardMinimo(){
    //Puxa as chaves gravadas no banco
    try{   
        $sql = "SELECT * FROM tbl_config where 1=1 and id = 1 ";
        $stm = $this->pdo->prepare($sql);
        $stm->execute();   
        $rsConfig = $stm->fetchAll(PDO::FETCH_OBJ);

    } catch(PDOException $erro){   
        echo $erro->getLine(); 
    }

    $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://apisandbox.cieloecommerce.cielo.com.br/1/sales",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS =>"{\r\n   \"MerchantOrderId\":\"2014111703\",\r\n   \"Payment\":{\r\n     \"Type\":\"CreditCard\",\r\n     \"Amount\":15700,\r\n     \"Installments\":1,\r\n     \"SoftDescriptor\":\"123456789ABCD\",\r\n     \"CreditCard\":{\r\n         \"CardNumber\":\"4551870000000183\",\r\n         \"Holder\":\"Teste Holder\",\r\n         \"ExpirationDate\":\"12/2021\",\r\n         \"SecurityCode\":\"123\",\r\n         \"Brand\":\"Visa\"\r\n     }\r\n   }\r\n}",
  CURLOPT_HTTPHEADER => array(
    "MerchantId: {$rsConfig[0]->merchant_id_cielo}",
    "Content-Type: application/json",
    "MerchantKey: {$rsConfig[0]->merchant_key_cielo}"
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
}

function credCardAutenticado(){
    //Puxa as chaves gravadas no banco
    try{   
        $sql = "SELECT * FROM tbl_config where 1=1 and id = 1 ";
        $stm = $this->pdo->prepare($sql);
        $stm->execute();   
        $rsConfig = $stm->fetchAll(PDO::FETCH_OBJ);

    } catch(PDOException $erro){   
        echo $erro->getLine(); 
    }

    $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://apisandbox.cieloecommerce.cielo.com.br/1/sales",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS =>"{ \n  \"MerchantOrderId\":\"2014111903\", \n  \"Customer\":\n  { \n    \"Name\":\"Comprador Teste\" \n  }, \n  \"Payment\":\n  { \n      \"Type\":\"CreditCard\", \n      \"Amount\":15700, \n      \"Provider\":\"Cielo\",\n      \"ReturnUrl\":\"https://www.google.com.br\",\n      \"Installments\":1, \n      \"Authenticate\":true,\n      \"CreditCard\":\n      { \n        \"CardNumber\":\"1234123412341231\", \n        \"Holder\":\"Teste Holder\", \n        \"ExpirationDate\":\"12/2018\", \n        \"SecurityCode\":\"123\", \n        \"Brand\":\"Visa\" \n      } \n  } \n}",
  CURLOPT_HTTPHEADER => array(
    "MerchantId: {$rsConfig[0]->merchant_id_cielo}",
    "Content-Type: application/json",
    "MerchantKey: {$rsConfig[0]->merchant_key_cielo}"
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
}

function credCardCompleto(){
    //Puxa as chaves gravadas no banco
    try{   
        $sql = "SELECT * FROM tbl_config where 1=1 and id = 1 ";
        $stm = $this->pdo->prepare($sql);
        $stm->execute();   
        $rsConfig = $stm->fetchAll(PDO::FETCH_OBJ);

    } catch(PDOException $erro){   
        echo $erro->getLine(); 
    }

    $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://apisandbox.cieloecommerce.cielo.com.br/1/sales",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS =>"{  \r\n   \"MerchantOrderId\":\"2014111701\",\r\n    \"Customer\":{  \r\n      \"Name\":\"Comprador Teste\",\r\n      \"Identity\":\"11225468954\",\r\n      \"IdentityType\":\"CPF\",\r\n      \"Email\":\"compradorteste@teste.com\",\r\n      \"Birthdate\":\"1991-01-02\",\r\n      \"Address\":{  \r\n         \"Street\":\"Rua Teste\",\r\n         \"Number\":\"123\",\r\n         \"Complement\":\"AP 123\",\r\n         \"ZipCode\":\"12345987\",\r\n         \"City\":\"Rio de Janeiro\",\r\n         \"State\":\"RJ\",\r\n         \"Country\":\"BRA\"\r\n      },\r\n        \"DeliveryAddress\": {\r\n            \"Street\": \"Rua Teste\",\r\n            \"Number\": \"123\",\r\n            \"Complement\": \"AP 123\",\r\n            \"ZipCode\": \"12345987\",\r\n            \"City\": \"Rio de Janeiro\",\r\n            \"State\": \"RJ\",\r\n            \"Country\": \"BRA\"\r\n        }\r\n   },\r\n   \"Payment\":{  \r\n     \"Type\":\"CreditCard\",\r\n     \"Amount\":15700,\r\n     \"Currency\":\"BRL\",\r\n     \"Country\":\"BRA\",\r\n     \"Provider\":\"Simulado\",\r\n     \"ServiceTaxAmount\":0,\r\n     \"Installments\":1,\r\n     \"Interest\":\"ByMerchant\",\r\n     \"Capture\":false,\r\n     \"Authenticate\":false,    \r\n     \"Recurrent\": false,\r\n     \"SoftDescriptor\":\"123456789ABCD\",\r\n     \"CreditCard\":{  \r\n         \"CardNumber\":\"4024007197692931\",\r\n         \"Holder\":\"Teste Holder\",\r\n         \"ExpirationDate\":\"12/2021\",\r\n         \"SecurityCode\":\"123\",\r\n         \"SaveCard\":\"false\",\r\n         \"Brand\":\"Visa\"\r\n     }\r\n   }\r\n}",
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json",
    "MerchantId: {$rsConfig[0]->merchant_id_cielo}",
    "MerchantKey: {$rsConfig[0]->merchant_key_cielo}"
  ),
));

$response = json_decode(curl_exec($curl), true);

curl_close($curl);
return($response);
//echo $response;
echo "aqui2: ".$response['Payment'];
}

function debitoCard(){
    //Puxa as chaves gravadas no banco
    try{   
        $sql = "SELECT * FROM tbl_config where 1=1 and id = 1 ";
        $stm = $this->pdo->prepare($sql);
        $stm->execute();   
        $rsConfig = $stm->fetchAll(PDO::FETCH_OBJ);

    } catch(PDOException $erro){   
        echo $erro->getLine(); 
    }

    $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://apisandbox.cieloecommerce.cielo.com.br/1/sales",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS =>"{  \n   \"MerchantOrderId\":\"2014121201\",\n   \"Customer\":{  \n      \"Name\":\"Paulo Henrique\"     \n   },\n   \"Payment\":{  \n     \"Type\":\"DebitCard\",\n     \"Amount\":15700,\n     \"Provider\":\"Simulado\",\n     \"ReturnUrl\":\"http://www.google.com.br\",\n     \"DebitCard\":{  \n         \"CardNumber\":\"4532117080573703\",\n         \"Holder\":\"Teste Holder\",\n         \"ExpirationDate\":\"12/2019\",\n         \"SecurityCode\":\"023\",\n         \"Brand\":\"Visa\"\n     }\n   }\n}",
  CURLOPT_HTTPHEADER => array(
    "MerchantId: {$rsConfig[0]->merchant_id_cielo}",
    "Content-Type: application/json",
    "MerchantKey: {$rsConfig[0]->merchant_key_cielo}"
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo json_encode($response);
}

function capturaTransacaoPorId($id_pagamento){
    //Puxa as chaves gravadas no banco
    try{   
        $sql = "SELECT * FROM tbl_config where 1=1 and id = 1 ";
        $stm = $this->pdo->prepare($sql);
        $stm->execute();   
        $rsConfig = $stm->fetchAll(PDO::FETCH_OBJ);

    } catch(PDOException $erro){   
        echo $erro->getLine(); 
    }
    $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://apisandbox.cieloecommerce.cielo.com.br/1/sales/{$id_pagamento}/capture",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "PUT",
  CURLOPT_HTTPHEADER => array(
    "MerchantId: {$rsConfig[0]->merchant_id_cielo}",
    "Content-Type: application/json",
    "MerchantKey: {$rsConfig[0]->merchant_key_cielo}"
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
}

    }

}
 
?>

