<?php include "includes.php";?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
	  <title><?php if(isset($metastags->meta_title_principal) && !empty($metastags->meta_title_principal)){echo $metastags->meta_title_principal;}?></title>
    <meta name="description" content="<?php if(isset($metastags->meta_description_principal) && !empty($metastags->meta_description_principal)){echo $metastags->meta_description_principal;}?>"/>
		<meta name="keywords" content="<?php if(isset($metastags->meta_keywords_principal) && !empty($metastags->meta_keywords_principal)){echo $metastags->meta_keywords_principal;}?>">
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
          	<p class="breadcrumbs"><span class="mr-2"><a href=".">Home</a></span> <span>Carrinho</span></p>
            <h1 class="mb-0 bread">Meu Carrinho</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
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
									$peso = 0;
									$altura = 0;
									$largura = 0;
									$comprimento = 0;
									$total_produtos=0;
									foreach($_SESSION['shopping_cart'] as $key => $produto_carrinho){
										$puxaProduto = $produtos->rsDados($produto_carrinho['id']);
										if($puxaProduto->peso < 5) {
											$puxaProduto->peso = $puxaProduto->peso*1000;
										}
			
										$peso += valorCalculavel($puxaProduto->peso) * $produto_carrinho['quantidade_produto'];
										$altura = str_replace(',','',$puxaProduto->altura) * $produto_carrinho['quantidade_produto'] + $altura;
										$largura = str_replace(',','',$puxaProduto->largura) * $produto_carrinho['quantidade_produto'] + $largura;
										$comprimento = str_replace(',','',$puxaProduto->comprimento) * $produto_carrinho['quantidade_produto'] + $comprimento;
									?>
						      <tr class="text-center">
						        <td class="product-remove"><a href="?action=delete&id=<?php echo $produto_carrinho['id'];?>"><span class="ion-ios-close"></span></a></td>
						        
						        <td class="image-prod"><div class="img" style="background-image:url(img/<?php echo $produto_carrinho['imagem_produto'];?>);"></div></td>
						        
						        <td class="product-name">
						        	<h3><?php echo $produto_carrinho['nome_produto'];?></h3>
						        	
						        </td>
						        
						        <td class="price">R$ <?php echo number_format($produto_carrinho['valor_produto'],2,',','.');?></td>
						        
						        <td class="quantity">
									 <p class="text-center"><?php echo $produto_carrinho['quantidade_produto'];?></p>
						        	<!-- <div class="input-group mb-3">
					             	<input type="text" name="quantity" class="quantity form-control input-number" value="<?php echo $produto_carrinho['quantidade_produto'];?>" min="1" max="100">
									
					          	</div> -->
					          </td>
						        
						        <td class="total"><?php echo number_format($produto_carrinho['quantidade_produto'] * $produto_carrinho['valor_produto'],2,',','.');?></td>
						      </tr><!-- END TR-->
							  <?php $totalcarrinho = $totalcarrinho + ($produto_carrinho['quantidade_produto'] * $produto_carrinho['valor_produto']);
							  		$total_produtos = $totalcarrinho+$total_produtos;
							  ?>
							  <?php } }else{?>
								 <tr class="text-center">
									 <td colspan="6"><h2>Nenhum produto adicionado no carrinho.</h2></td>
								 </tr>
							  <?php }?>

						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
    		<div class="row justify-content-end">
    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Código Cupom</h3>
    					<p>Entre com o código de cupom se você estiver um</p>
  						<form action="#" class="info">
	              <div class="form-group">
	              	<label for="">Código Cupom</label>
	                <input type="text" class="form-control text-left px-3" placeholder="">
	              </div>
	            </form>
    				</div>
    				<p><a href="checkout.html" class="btn btn-primary py-3 px-4">Aplicar Cupom</a></p>
    			</div>
				<?php if(isset($temFrete) && $temFrete = 'S'){?>
    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Calcular Frete</h3>
    					<p>Informe seu CEP abaixo</p>
  						<form action="calcula.php" name="form_frete" id="form_frete" class="info">
							  <input name="total_prods" type="hidden" id="total_prods" value="<?php echo str_replace(',','.',$total_prods);?>" />
	              <div class="form-group">
	                <input type="text" class="form-control text-left px-3" name="cep_destino" id="cep_destino" required>
					<input type="hidden" name="cep_origem" value="<?php echo $infoSistema->cep_loja; ?>">
                    <input type="hidden" name="peso" value="<?=$peso;?>">
	              </div>
	            </form>
    				</div>
    				<p><a href="checkout.html" class="btn btn-primary py-3 px-4">Estimativa</a></p>
    			</div>
				<?php }?>
    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Total Carrinho</h3>
    					<p class="d-flex">
    						<span>Subtotal</span>
    						<span>R$ <?php echo number_format($totalcarrinho,2,',','.');?></span>
    					</p>
    					<p class="d-flex">
    						<span>Entrega</span>
    						<span>R$ 0,00</span>
    					</p>
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
    		</div>
			</div>
		</section>

		
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
	<script>
	function fecha_pedido() {
		
		if(document.getElementById('retirada_loja').checked == true){
			$_SESSION['total_frete'] = "Grátis";
			$_SESSION['forma_envio'] = "Retirada Loja";
			parent.window.location='modo-pagamento';
		return false;
		}
		
		<?php if($temFrete == 'S') { ?>
		if(document.getElementById('cep_destino').value == '') {
			alert('Por favor. Preencha o CEP de destino e clique em calcular frete.');
		} else {
			parent.window.location='modo-pagamento';
			return false;
		}
		<?php 
		} else {
		?>
			parent.window.location='modo-pagamento';
			return false;
		<?php }?>
	}
	</script>
    
  </body>
</html>