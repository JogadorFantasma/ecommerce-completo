<?php include "includes.php";
if(isset($_GET['cat']) && !empty($_GET['cat'])){
	$puxanumeroCategoria = $categorias->rsDados('', '', '', $_GET['cat']);
	$_POST['id_cat'] = $puxanumeroCategoria[0]->id;
}
$puxaCategorias = $categorias->rsDados();
$puxaProdutos = $produtos->rsDados();
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title><?php if(isset($metastags->meta_title_produtos) && !empty($metastags->meta_title_produtos)){echo $metastags->meta_title_produtos;}?></title>
    <meta name="description" content="<?php if(isset($metastags->meta_description_produtos) && !empty($metastags->meta_description_produtos)){echo $metastags->meta_description_produtos;}?>"/>
		<meta name="keywords" content="<?php if(isset($metastags->meta_keywords_produtos) && !empty($metastags->meta_keywords_produtos)){echo $metastags->meta_keywords_produtos;}?>">
    <?php if(isset($infoSistema->favicon) && !empty($infoSistema->favicon)){?>
		<link rel="shortcut icon" href="<?php echo SITE_URL;?>/img/<?php echo $infoSistema->favicon;?>" >
		<link rel="icon" href="<?php echo SITE_URL;?>/img/<?php echo $infoSistema->favicon;?>" >
    <?php }?>
    <meta name="author" content="Adriano Monteiro">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo SITE_URL;?>/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo SITE_URL;?>/css/animate.css">
    <link rel="stylesheet" href="<?php echo SITE_URL;?>/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo SITE_URL;?>/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo SITE_URL;?>/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo SITE_URL;?>/css/aos.css">
    <link rel="stylesheet" href="<?php echo SITE_URL;?>/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo SITE_URL;?>/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?php echo SITE_URL;?>/css/jquery.timepicker.css">
    <link rel="stylesheet" href="<?php echo SITE_URL;?>/css/flaticon.css">
    <link rel="stylesheet" href="<?php echo SITE_URL;?>/css/icomoon.css">
    <link rel="stylesheet" href="<?php echo SITE_URL;?>/css/style.css">
  </head>
  <body class="goto-here">
	<?php include "header.php";?>
    <div class="hero-wrap hero-bread" style="background-image: url('<?php echo SITE_URL;?>/images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="<?php echo SITE_URL;?>/.">Home</a></span> <span>Produtos</span></p>
            <h1 class="mb-0 bread">Produtos</h1>
          </div>
        </div>
      </div>
    </div>
    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-10 mb-5 text-center">
    				<ul class="product-category">
    					<li><a href="<?php echo SITE_URL;?>/produtos" <?php if(empty($_GET['cat'])){ echo "class='active'";}?>>Todos</a></li>
						<?php foreach($puxaCategorias as $categoria){?>
    					<li><a href="<?php echo SITE_URL;?>/categoria/<?php echo $categoria->url_amigavel;?>" <?php if(isset($_GET['cat']) && $_GET['cat'] == $categoria->url_amigavel){ echo "class='active'";}?>><?php echo $categoria->nome;?></a></li>
						<?php }?>
    				</ul>
    			</div>
    		</div>
    		<div class="row">
				<?php foreach($puxaProdutos as $produto){?>
    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<a href="<?php echo SITE_URL;?>/produto/<?php echo $produto->url_amigavel;?>" class="img-prod"><img class="img-fluid" src="<?php echo SITE_URL;?>/img/<?php echo $produto->imagem;?>" alt="<?php echo $produto->url_amigavel;?>" title="<?php echo $produto->url_amigavel;?>">
    						<!-- <span class="status">30%</span> -->
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="<?php echo SITE_URL;?>/produto/<?php echo $produto->url_amigavel;?>"><?php echo $produto->nome;?></a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span class="mr-2 price-dc">R$ <?php echo number_format($produto->preco_de,2,',','.');?></span><span class="price-sale">R$ <?php echo number_format($produto->preco_por,2,',','.');?></span></p>
		    					</div>
	    					</div>
	    					<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
	    							<!-- <a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
	    								<span><i class="ion-ios-menu"></i></span>
	    							</a> -->
									<form method="post" action="?action=add&id=<?php echo $produto->id;?>" id="add_cart_<?php echo $produto->id;?>">
									<input type="hidden" name="nome_produto" value="<?php echo $produto->nome;?>">
									<input type="hidden" name="valor_produto" value="<?php echo $produto->preco_por;?>">
                  <input type="hidden" name="imagem_produto" value="<?php echo $produto->imagem;?>">
									<input type="hidden" name="quantidade_produto" value="1">
									<input type="hidden" name="addCarrinho" value="S">
									<a href="javascript:;" onclick="document.getElementById('add_cart_<?php echo $produto->id;?>').submit();" class="buy-now d-flex justify-content-center align-items-center mx-1">
	    								<span><i class="ion-ios-cart"></i></span>
	    							</a>
									</form>
	    							
	    							<a href="#" class="heart d-flex justify-content-center align-items-center ">
	    								<span><i class="ion-ios-heart"></i></span>
	    							</a>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
				<?php }?>
    		</div>
    		<!-- <div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <li><a href="#">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>
            </div>
          </div>
        </div> -->
    	</div>
    </section>

<?php include "footer.php";?>
  <script src="<?php echo SITE_URL;?>/js/jquery.min.js"></script>
  <script src="<?php echo SITE_URL;?>/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="<?php echo SITE_URL;?>/js/popper.min.js"></script>
  <script src="<?php echo SITE_URL;?>/js/bootstrap.min.js"></script>
  <script src="<?php echo SITE_URL;?>/js/jquery.easing.1.3.js"></script>
  <script src="<?php echo SITE_URL;?>/js/jquery.waypoints.min.js"></script>
  <script src="<?php echo SITE_URL;?>/js/jquery.stellar.min.js"></script>
  <script src="<?php echo SITE_URL;?>/js/owl.carousel.min.js"></script>
  <script src="<?php echo SITE_URL;?>/js/jquery.magnific-popup.min.js"></script>
  <script src="<?php echo SITE_URL;?>/js/aos.js"></script>
  <script src="<?php echo SITE_URL;?>/js/jquery.animateNumber.min.js"></script>
  <script src="<?php echo SITE_URL;?>/js/bootstrap-datepicker.js"></script>
  <script src="<?php echo SITE_URL;?>/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="<?php echo SITE_URL;?>/js/google-map.js"></script>
  <script src="<?php echo SITE_URL;?>/js/main.js"></script>
    
  </body>
</html>