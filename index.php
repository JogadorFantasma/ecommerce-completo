<?php include "includes.php";
$puxaCategoriasL = $categorias->rsDados('', '', '0,2');
$puxaCategoriasR = $categorias->rsDados('', '', '2,2');
$puxaProdutosDestaques = $produtos->rsDados('', 'rand()', '', '', 'S', 'S');
$puxaTestemunhos = $testemunhos->rsDados('', 'rand()');
$puxaBanners = $banners->rsDados();
$puxaParceiros = $parceiros->rsDados();
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title><?php if(isset($infoSistema->meta_title_principal) && !empty($infoSistema->meta_title_principal)){echo $infoSistema->meta_title_principal;}?></title>
    <meta name="description" content="<?php if(isset($infoSistema->meta_description_principal) && !empty($infoSistema->meta_description_principal)){echo $infoSistema->meta_description_principal;}?>"/>
		<meta name="keywords" content="<?php if(isset($infoSistema->meta_keywords_principal) && !empty($infoSistema->meta_keywords_principal)){echo $infoSistema->meta_keywords_principal;}?>">
    <?php if(isset($infoSistema->favicon) && !empty($infoSistema->favicon)){?>
		<link rel="shortcut icon" href="img/<?php echo $infoSistema->favicon;?>" >
		<link rel="icon" href="img/<?php echo $infoSistema->favicon;?>" >
    <?php }?>
    <meta name="author" content="Adriano Monteiro">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body class="goto-here">
		<?php include "header.php";?>

    <section id="home-section" class="hero">
		  <div class="home-slider owl-carousel">
			  <?php foreach($puxaBanners as $puxaBanner){?>
	      <div class="slider-item" style="background-image: url(img/<?php echo $puxaBanner->foto;?>);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

	            <div class="col-md-12 ftco-animate text-center">
	              <h1 class="mb-2"><?php echo $puxaBanner->titulo1;?></h1>
	              <h2 class="subheading mb-4"><?php echo $puxaBanner->titulo2;?></h2>
				  <?php if(isset($puxaBanner->tem_botao) && $puxaBanner->tem_botao == 'S'){?>
	              <p><a href="<?php echo $puxaBanner->link_botao;?>" class="btn btn-primary"><?php echo $puxaBanner->nome_botao;?></a></p>
				  <?php }?>
	            </div>

	          </div>
	        </div>
	      </div>
			<?php }?>
	    </div>
    </section>

    <section class="ftco-section">
			<div class="container">
				<div class="row no-gutters ftco-services">
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-shipped"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Entrega Grátis</h3>
                <span>Em pedidos acima de R$ 100</span>
              </div>
            </div>      
          </div>
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-diet"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Sempre Frescos</h3>
                <span>Produtos bem Embalados</span>
              </div>
            </div>    
          </div>
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-award"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Qualidade Superior</h3>
                <span>Produtos de Qualidade</span>
              </div>
            </div>      
          </div>
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-customer-service"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Suporte</h3>
                <span>Suporte 24h</span>
              </div>
            </div>      
          </div>
        </div>
			</div>
		</section>

		<section class="ftco-section ftco-category ftco-no-pt">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<div class="row">
							<div class="col-md-6 order-md-last align-items-stretch d-flex">
								<div class="category-wrap-2 ftco-animate img align-self-stretch d-flex" style="background-image: url(images/category.jpg);">
									<div class="text text-center">
										<h2>Vegetais</h2>
										<p>Proteja a saúde de todos em sua casa</p>
										<p><a href="produtos" class="btn btn-primary">Compre Agora</a></p>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<?php foreach($puxaCategoriasL as $puxaCategoriaL){?>
								<div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url(img/<?php echo $puxaCategoriaL->foto;?>);">
									<div class="text px-3 py-1">
										<h2 class="mb-0"><a href="categoria/<?php echo $puxaCategoriaL->url_amigavel;?>"><?php echo $puxaCategoriaL->nome;?></a></h2>
									</div>
								</div>
								<?php }?>
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<?php foreach($puxaCategoriasR as $puxaCategoriaR){?>
								<div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url(img/<?php echo $puxaCategoriaR->foto;?>);">
									<div class="text px-3 py-1">
										<h2 class="mb-0"><a href="categoria/<?php echo $puxaCategoriaR->url_amigavel;?>"><?php echo $puxaCategoriaR->nome;?></a></h2>
									</div>
								</div>
								<?php }?>
					</div>
				</div>
			</div>
		</section>

    <section class="ftco-section">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
          	<span class="subheading">Produtos em Destaque</span>
            <h2 class="mb-4">Nossos Produtos</h2>
            <p>Muito longe, atrás da palavra montanhas, longe dos países Vokalia e Consonantia</p>
          </div>
        </div>   		
    	</div>
    	<div class="container">
    		<div class="row">
				<?php
				if(count($puxaProdutosDestaques) > 0){
					foreach($puxaProdutosDestaques as $puxaProdutoDestaque){
				?>
    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<a href="produto/<?php echo $puxaProdutoDestaque->url_amigavel;?>" class="img-prod"><img class="img-fluid" src="img/<?php echo $puxaProdutoDestaque->imagem;?>" alt="<?php echo $puxaProdutoDestaque->url_amigavel;?>" title="<?php echo $puxaProdutoDestaque->url_amigavel;?>">
    						<!-- <span class="status">30%</span> -->
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="produto/<?php echo $puxaProdutoDestaque->url_amigavel;?>"><?php echo $puxaProdutoDestaque->nome;?></a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><?php if(isset($puxaProdutoDestaque->preco_de) && !empty($puxaProdutoDestaque->preco_de)){?><span class="mr-2 price-dc">R$ <?php echo number_format($puxaProdutoDestaque->preco_de,2,',','.');?></span><?php }?><span class="price-sale">R$ <?php echo number_format($puxaProdutoDestaque->preco_por,2,',','.');?></span></p>
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
				<?php } }?>
    			
    		</div>
    	</div>
    </section>
		
	<!-- 	<section class="ftco-section img" style="background-image: url(images/bg_3.jpg);">
    	<div class="container">
				<div class="row justify-content-end">
          <div class="col-md-6 heading-section ftco-animate deal-of-the-day ftco-animate">
          	<span class="subheading">Best Price For You</span>
            <h2 class="mb-4">Deal of the day</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
            <h3><a href="#">Spinach</a></h3>
            <span class="price">$10 <a href="#">now $5 only</a></span>
            <div id="timer" class="d-flex mt-5">
						  <div class="time" id="days"></div>
						  <div class="time pl-3" id="hours"></div>
						  <div class="time pl-3" id="minutes"></div>
						  <div class="time pl-3" id="seconds"></div>
						</div>
          </div>
        </div>   		
    	</div>
    </section> -->

    <section class="ftco-section testimony-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
          	<span class="subheading">Testemunho</span>
            <h2 class="mb-4">Nossos clientes satisfeito</h2>
           <!--  <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p> -->
          </div>
        </div>
        <div class="row ftco-animate">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel">
				<?php foreach($puxaTestemunhos as $puxaTestemunho){?>
              <div class="item">
                <div class="testimony-wrap p-4 pb-5">
                  <div class="user-img mb-5" style="background-image: url(<?php if(isset($puxaTestemunho->foto) && !empty($puxaTestemunho->foto)){ echo "img/".$puxaTestemunho->foto;}else{ echo icone_genero_site($puxaTestemunho->sexo);}?>)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text text-center">
                    <p class="mb-5 pl-4 line"><?php echo $puxaTestemunho->testemunho;?></p>
                    <p class="name"><?php echo $puxaTestemunho->nome;?></p>
                  </div>
                </div>
              </div>
			  <?php }?>
            </div>
          </div>
        </div>
      </div>
    </section>

    <hr>

		<section class="ftco-section ftco-partner">
    	<div class="container">
    		<div class="row">
				<?php foreach($puxaParceiros as $parceiro){?>
    			<div class="col-sm ftco-animate">
    				<a class="partner"><img src="img/<?php echo $parceiro->foto;?>" class="img-fluid" alt="<?php echo $parceiro->nome;?>" title="<?php echo $parceiro->nome;?>"></a>
    			</div>
				<?php }?>
    		</div>
    	</div>
    </section>

	<!-- 	<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
      <div class="container py-4">
        <div class="row d-flex justify-content-center py-5">
          <div class="col-md-6">
          	<h2 style="font-size: 22px;" class="mb-0">Subcribe to our Newsletter</h2>
          	<span>Get e-mail updates about our latest shops and special offers</span>
          </div>
          <div class="col-md-6 d-flex align-items-center">
            <form action="#" class="subscribe-form">
              <div class="form-group d-flex">
                <input type="text" class="form-control" placeholder="Enter email address">
                <input type="submit" value="Subscribe" class="submit px-3">
              </div>
            </form>
          </div>
        </div>
      </div>
    </section> -->
   <?php include "footer.php";?>
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>