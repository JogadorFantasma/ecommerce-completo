<?php
//Formatando data que vem do banco mysql
function formataData($data){
    return date("d/m/Y", strtotime($data));
}

//Formatar palavras maiusculas e com espaços
function editaSemEspaco($texto){
  return retiraAcentos(strtolower(str_replace(' ', '-', $texto)));
}

//Mostrar opções do para ligar
function exibe_status_ligar($exibe_status_ligar) {
    switch ($exibe_status_ligar) {
      case "O": return "Ocupado"; break;
      case "NA": return "Esperando Atendimento"; break;
      case "A": return "Atendido"; break;
      case "LN": return "Ligar Novamente"; break;
      default: return "";
    }
  }

  //Mostrar status contato
function exibe_status_contato($exibe_status_contato) {
  switch ($exibe_status_contato) {
    case "NQ": return "<span class='label label-inline label-danger font-weight-bold'>Não Qualificado</span>"; break;
    case "EA": return "<span class='label label-inline label-primary font-weight-bold'>Esp. Atendimento</span>"; break;
    case "NA": return "<span class='label label-inline label-warning font-weight-bold'>Não Atendeu</span>"; break;
    case "LN": return "<span class='label label-inline label-info font-weight-bold'>Ligar Novamente</span>"; break;
    case "PE": return "<span class='label label-inline label-light-primary font-weight-bold'>Proposta Enviada</span>"; break;
    case "I": return "<span class='label label-inline label-success font-weight-bold'>Interesse</span>"; break;
    case "NF": return "<span class='label label-inline label-secondary font-weight-bold'>Negócio Fechado</span>"; break;
    default: return "";
  }
}
//Opçao de escolha do aluno
  function exibe_opcao_aluno($exibe_opcao_aluno) {
    switch ($exibe_opcao_aluno) {
      case "1": return "Aceite"; break;
      case "2": return "Trancamento"; break;
      default: return "";
    }
  }

  //Opçao de escolha do aluno
  function exibe_rede_social($exibe_rede_social) {
    switch ($exibe_rede_social) {
      case "I": return "Instagram"; break;
      case "F": return "Facebook"; break;
      case "G": return "Google"; break;
      case "NI": return "Não Informado"; break;
      default: return "";
    }
  }

  function exibe_ativo($exibe_ativo) {
    switch ($exibe_ativo) {
      case "S": return "<a class='btn waves-effect waves-light btn-rounded btn-outline-success'>Ativo</a>"; break;
      case "N": return "<a class='btn waves-effect waves-light btn-rounded btn-outline-danger'>Inativo</a>"; break;
      default: return "";
    }
  }

  //Opçao de escolha do aluno
  function icone_genero($genero) {
    switch ($genero) {
      case "M": return "assets/images/avatars/boy.svg"; break;
      case "F": return "assets/images/avatars/girl.svg"; break;
      default: return "";
    }
  }
  function icone_genero_site($genero) {
    switch ($genero) {
      case "M": return "images/avatars/boy.svg"; break;
      case "F": return "images/avatars/girl.svg"; break;
      default: return "";
    }
  }

  function upload($campo, $pasta, $array) {
    list($usec, $sec) = explode(" ", microtime());
    $tmp = (float)$usec + (float)$sec;	
    
    if($array == 'N' and $array != '0') {
      if(isset($_FILES[$campo]['name']) && !empty($_FILES[$campo]['name'])) {
        $file = $_FILES[$campo];
        $file['name'];
        $ext = substr($file['name'],strrpos($file['name'],"."));
        copy($file['tmp_name'],$pasta."/$tmp-$campo-$array$ext");
        
        return("$tmp-$campo-$array$ext"); 
      } else { 
        if(isset($_POST[$campo.'_Atual'])){
          return($_POST[$campo.'_Atual']); 
        }
        
      } // hidden com a foto _Atual.
    } else {
      if(isset($_FILES[$campo]['name'][$array]) && !empty($_FILES[$campo]['name'][$array])) {
        $file = $_FILES[$campo];
        $file['name'][$array];
        $ext = substr($file['name'][$array],strrpos($file['name'][$array],"."));
        copy($file['tmp_name'][$array],$pasta."/$tmp-$campo-$array$ext");
        return("$tmp-$campo-$array$ext"); 
      } else { 
        return($_POST[$campo.'_Atual'][$array]); 
      } // hidden com a foto _Atual.
    }
  }

  function mudaCor() {
    global $cor;
    if($cor/2 == 0) { 
      $cor=1; 
      return('background-color:#FFF4DE !important;');
    } else { 
      $cor=0; 
      return('background-color:#FFE2E5 !important;');
    }
  }
  function corAleatoriaClasse() {
    static $corAnterior = 0;
    static $cor = array( 'bg-light-warning', 'bg-light-success', 'bg-light-danger', 'bg-light-info' );

    $aleatorio = rand( $corAnterior?1:0, count( $cor ) - 1 );
    if( $aleatorio >= $corAnterior ) $aleatorio++;
    $corAnterior = $aleatorio;
    return $cor[$aleatorio - 1];
 }

 function retiraAcentos($string){
    $acentos  =  array('à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ü', 'ú', 'ÿ', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ù', 'Ü', 'Ú');
    $sem_acentos  = array('a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'y', 'A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U');
    //$string = strtr($string, $acentos, $sem_acentos);
    $string = str_replace($acentos,$sem_acentos,$string);
    return $string;
 }
 function gerarTituloSEO( $strTitulo )
{

    /* Remove pontos e underlines */
    $arrEncontrar = array(".", "_");
    $arrSubstituir = null;
    $strTitulo = str_replace( $arrEncontrar, $arrSubstituir, $strTitulo );


    /* Caracteres minúsculos */
    $strTitulo = strtolower( $strTitulo );
    
    
    /* Remove os acentos */
    $acentos = array("á", "Á", "ã", "Ã", "â", "Â", "à", "À", "é", "É", "ê", "Ê", "è", "È", "í", "Í", "ó", "Ó", "õ", "Õ", "ò", "Ò", "ô", "Ô", "ú", "Ú", "ù", "Ù", "û", "Û", "ç", "Ç", "º", "ª");
    $letras = array("a", "A", "a", "A", "a", "A", "a", "A", "e", "E", "e", "E", "e", "E", "i", "I", "o", "O", "o", "O", "o", "O", "o", "O", "u", "U", "u", "U", "u", "U", "c", "C", "o", "a");

    $strTitulo = str_replace( $acentos, $letras, $strTitulo );
    $strTitulo = preg_replace( "/[^a-zA-Z0-9._$, ]/", "", $strTitulo );
    $strTitulo = iconv( "UTF-8", "UTF-8//TRANSLIT", $strTitulo );
    
    
    /* Remove espaços em branco */
    $strTitulo = str_replace( " ", "-", $strTitulo );


    /* Remove preposições */
    $strCaracterSeparador = "-";
    
    $arrEncontrar = array("-a-", "-e-", "-i-", "-o-", "-u-", "-p-", "-em-", "-de-", "-do-", "-da-", "-dos-", "-das-", "-com-", "-um-", "-uma-", "-para-");
    $arrSubstituir = $strCaracterSeparador;
    $strTitulo = str_ireplace( $arrEncontrar, $arrSubstituir, $strTitulo );


    return $strTitulo;


}
function valorCalculavel($valor) {
$formatado = str_replace('.','',$valor);
$formatado = str_replace(',','.',$formatado);
$formatado = str_replace('R$ ','',$formatado);
$formatado = str_replace('U$ ','',$formatado);

if(strpos(strrev($valor),',')) {
return(floatval($formatado));
} else {
return(floatval($valor)); }
}
?>