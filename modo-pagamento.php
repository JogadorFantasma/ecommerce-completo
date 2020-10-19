<?php include "includes.php";
/* if(empty($_SESSION['dadosClienteLogado'])){
    echo '<script>';
	echo "window.location='login/?volta=modo-pagamento'";
	echo "</script>";
	exit;
} */
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

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href=".">Home</a></span> <span>Modo Pagamento</span></p>
            <h1 class="mb-0 bread">Modo Pagamento</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
      <div class="container">
       <!--    <table class="table">
						    <thead class="thead-secondary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
						        <th>Produto</th>
						        <th>Preço</th>
						        <th>Quantidade</th>
						        <th>Total</th>
						      </tr>
						    </thead>
						    <tbody>
								<?php if(count($_SESSION['shopping_cart']) > 0){
									$totalcarrinho = 0;
                                    $total_produtos = 0;
									foreach($_SESSION['shopping_cart'] as $key => $produto_carrinho){
									?>
						      <tr class="text-center">
						        <td class="image-prod"><div class="img" style="background-image:url(img/<?php echo $produto_carrinho['imagem_produto'];?>);"></div></td>
						        
						        <td class="product-name">
						        	<h3><?php echo $produto_carrinho['nome_produto'];?></h3>
						        	
						        </td>
						        
						        <td class="price">R$ <?php echo number_format($produto_carrinho['valor_produto'],2,',','.');?></td>
						        
						        <td class="quantity">
									 <p class="text-center"><?php echo $produto_carrinho['quantidade_produto'];?></p>
						        	
					          </td>
						        
						        <td class="total"><?php echo number_format($produto_carrinho['quantidade_produto'] * $produto_carrinho['valor_produto'],2,',','.');?></td>
						      </tr>
							  <?php $totalcarrinho = $totalcarrinho + ($produto_carrinho['quantidade_produto'] * $produto_carrinho['valor_produto']);
							  		$total_produtos = $totalcarrinho+$total_produtos;
							  ?>
							  <?php } }else{?>
								 <tr class="text-center">
									 <td colspan="6"><h2>Nenhum produto adicionado no carrinho.</h2></td>
								 </tr>
							  <?php }?>

						    </tbody>
						  </table> -->
        <div class="row justify-content-center">
           <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Total Compras</h3>
    					<p class="d-flex">
    						<span>Subtotal</span>
    						<span>R$ <?php echo number_format($totalcarrinho,2,',','.');?></span>
    					</p>
    					<!-- <p class="d-flex">
    						<span>Entrega</span>
    						<span>R$ 0,00</span>
    					</p> -->
    					<!-- <p class="d-flex">
    						<span>Discount</span>
    						<span>$3.00</span>
    					</p> -->
    					<hr>
    					<p class="d-flex total-price">
    						<span>Total</span>
    						<span>R$ <?php echo number_format($totalcarrinho,2,',','.');?></span>
    					</p>
    				</div>
    				<p><a href="javascript:;" onclick="finalizar_pedido()" class="btn btn-primary py-3 px-4">Finalizar Pedido</a></p>
    			</div>
                <div class="col-lg-8 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Total Compras</h3>
    					<p class="d-flex">
    						<span>Subtotal</span>
    						<span>R$ <?php echo number_format($totalcarrinho,2,',','.');?></span>
    					</p>
    					<!-- <p class="d-flex">
    						<span>Entrega</span>
    						<span>R$ 0,00</span>
    					</p> -->
    					<!-- <p class="d-flex">
    						<span>Discount</span>
    						<span>$3.00</span>
    					</p> -->
    					<hr>
    					<p class="d-flex total-price">
    						<span>Total</span>
    						<span>R$ <?php echo number_format($totalcarrinho,2,',','.');?></span>
    					</p>
    				</div>
    				<p><a href="javascript:;" onclick="finalizar_pedido()" class="btn btn-primary py-3 px-4">Finalizar Pedido</a></p>
    			</div>
          <div class="col-xl-7 ftco-animate">
						<form  class="billing-form" method="POST">
							<h3 class="mb-4 billing-heading">Cadastrar Cliente</h3>
	          	<div class="row align-items-end">
	          		<div class="col-md-12">
	                <div class="form-group">
	                	<label for="firstname">Nome</label>
	                  <input type="text" class="form-control" name="nome" placeholder="">
	                </div>
	              </div>
	              <div class="w-100"></div>
                  <div class="col-md-12">
	                <div class="form-group">
	                	<label for="firstname">Email</label>
	                  <input type="text" class="form-control" name="email" placeholder="">
	                </div>
	              </div>
	              <div class="w-100"></div>
                <div class="col-md-6">
	                <div class="form-group">
	                	<label for="firstname">Telefone</label>
	                  <input type="text" class="form-control" name="telefone" placeholder="">
	                </div>
	              </div>
                  <div class="col-md-6">
	                <div class="form-group">
	                	<label for="firstname">Senha</label>
	                  <input type="password" class="form-control" name="senha" placeholder="">
	                </div>
	              </div>
		            
		            <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="streetaddress">CEP</label>
	                  <input type="text" class="form-control" name="cep">
	                </div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-12">
		            	<div class="form-group">
	                	<label for="towncity">Endereço</label>
	                  <input type="text" class="form-control" name="endereco" placeholder="">
	                </div>
		            </div>
		            <div class="w-100"></div>
		         <div class="col-md-12">
                	<div class="form-group mt-4">
										<a href="#"class="btn btn-primary py-3 px-4">Cadastrar</a>
									</div>
                </div>
	            </div>
                <input type="hidden" name="acao" value="addCliente">
	          </form><!-- END -->
					</div>
					<div class="col-xl-5">
	          <div class="row mt-5 pt-3">
	          	
	          	<div class="col-md-12">
	          		<div class="cart-detail p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Login</h3>
                          <form action="" method="POST">
                              <div class="col-md-12">
	                <div class="form-group">
	                	<label for="firstname">Login</label>
	                  <input type="text" class="form-control" name="login" placeholder="">
	                </div>
                    
	              </div>
                  <div class="col-md-12">
	                <div class="form-group">
	                	<label for="firstname">Senha</label>
	                  <input type="password" class="form-control" name="senha" placeholder="">
	                </div>
	              </div>
                  <p><button type="submit" class="btn btn-primary py-3 px-4">Acessar</button></p>
                          </form>
								
									
								</div>
	          	</div>
	          </div>
          </div> 
        </div>
      </div>
    </section> <!-- .section -->
 <?php include "footer.php";?>
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