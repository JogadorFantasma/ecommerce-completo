<?php include "includes.php";
$id = '';
if(isset($_GET['id'])){
    if(empty($_GET['id'])){
        header('Location: produtos');
    }else{
        $id = $_GET['id'];        
    }
}
$descProduto = $produtos->rsDados('', '', '', $id);
$produtosRelacionados = $produtos->rsDados('', 'rand()', '4', '', '', '', $descProduto[0]->id_categoria);
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title><?php if(isset($descProduto[0]->meta_title) && !empty($descProduto[0]->meta_title)){echo $descProduto[0]->meta_title;}?></title>
    <meta name="description" content="<?php if(isset($descProduto[0]->meta_description) && !empty($descProduto[0]->meta_description_)){echo $descProduto[0]->meta_description;}?>"/>
		<meta name="keywords" content="<?php if(isset($descProduto[0]->meta_keywords) && !empty($descProduto[0]->meta_keywords)){echo $descProduto[0]->meta_keywords;}?>">
    <?php if(isset($infoSistema->favicon) && !empty($infoSistema->favicon)){?>
		<link rel="shortcut icon" href="<?php echo SITE_URL;?>/img/<?php echo $infoSistema->favicon;?>" >
		<link rel="icon" href="<?php echo SITE_URL;?>/img/<?php echo $infoSistema->favicon;?>" >
    <?php }?>
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
          	<p class="breadcrumbs"><span class="mr-2"><a href="<?php echo SITE_URL;?>/.">Home</a></span> <span class="mr-2"><a href="<?php echo SITE_URL;?>/produtos">Produtos</a></span> <h1 class="mb-0 bread"><?php echo $descProduto[0]->nome;?></h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-6 mb-5 ftco-animate">
    				<a href="<?php echo SITE_URL;?>/img/<?php echo $descProduto[0]->imagem;?>" class="image-popup"><img src="<?php echo SITE_URL;?>/img/<?php echo $descProduto[0]->imagem;?>" class="img-fluid" alt="<?php echo $descProduto[0]->url_amivagel;?>" title="<?php echo $descProduto[0]->imagem;?>"></a>
    			</div>
    			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
    				<h3><?php echo $descProduto[0]->nome;?></h3>
    				<!-- <div class="rating d-flex">
							<p class="text-left mr-4">
								<a href="#" class="mr-2">5.0</a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
							</p>
							<p class="text-left mr-4">
								<a href="#" class="mr-2" style="color: #000;">100 <span style="color: #bbb;">Rating</span></a>
							</p>
							<p class="text-left">
								<a href="#" class="mr-2" style="color: #000;">500 <span style="color: #bbb;">Sold</span></a>
							</p>
						</div> -->
    				<p class="price"><span>R$ <?php echo number_format($descProduto[0]->preco_por,2,',','.');?></span></p>
    				<p><?php echo $descProduto[0]->descricao;?></p>
						<div class="row mt-4">
						<!-- 	<div class="col-md-6">
								<div class="form-group d-flex">
		              <div class="select-wrap">
	                  <div class="icon"><span class="ion-ios-arrow-down"></span></div>
	                  <select name="" id="" class="form-control">
	                  	<option value="">Small</option>
	                    <option value="">Medium</option>
	                    <option value="">Large</option>
	                    <option value="">Extra Large</option>
	                  </select>
	                </div>
		            </div>
							</div> -->
							<div class="w-100"></div>
							<div class="input-group col-md-6 d-flex mb-3">
	             	<span class="input-group-btn mr-2">
	                	<button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
	                   <i class="ion-ios-remove"></i>
	                	</button>
	            		</span>
	             	<input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
	             	<span class="input-group-btn ml-2">
	                	<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
	                     <i class="ion-ios-add"></i>
	                 </button>
	             	</span>
	          	</div>
	          	<div class="w-100"></div>
	          	<div class="col-md-12">
	          		<p style="color: #000;">600 kg available</p>
	          	</div>
          	</div>
          	<p><a href="#" class="btn btn-black py-3 px-5">Adicionar ao Carrinho</a></p>
    			</div>
    		</div>
    	</div>
    </section>

    <section class="ftco-section">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
          	<span class="subheading">Produtos</span>
            <h2 class="mb-4">Produtos Relacionados</h2>
            <p>Muito longe, atrás da palavra montanhas, longe dos países Vokalia e Consonantia</p>
          </div>
        </div>   		
    	</div>
    	<div class="container">
    		<div class="row">
                <?php foreach($produtosRelacionados as $produtoRelacionado){?>
    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<a href="<?php echo SITE_URL;?>/produto/<?php echo $produtoRelacionado->url_amigavel;?>" class="img-prod"><img class="img-fluid" src="<?php echo SITE_URL;?>/img/<?php echo $produtoRelacionado->imagem;?>" alt="<?php echo $produtoRelacionado->url_amigavel;?>" title="<?php echo $produtoRelacionado->url_amigavel;?>">
    						<!-- <span class="status">30%</span> -->
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="<?php echo SITE_URL;?>/produto/<?php echo $produtoRelacionado->url_amigavel;?>"><?php echo $produtoRelacionado->nome;?></a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span class="mr-2 price-dc">R$ <?php echo number_format($produtoRelacionado->preco_de,2,',','.');?></span><span class="price-sale">$<?php echo number_format($produtoRelacionado->preco_por,2,',','.');?></span></p>
		    					</div>
	    					</div>
	    					<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
	    							<a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
	    								<span><i class="ion-ios-menu"></i></span>
	    							</a>
                                    
	    							<a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
	    								<span><i class="ion-ios-cart"></i></span>
	    							</a>
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

  <script>
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){
		        
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		            
		            $('#quantity').val(quantity + 1);

		          
		            // Increment
		        
		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });
		    
		});
	</script>
    
  </body>
</html>