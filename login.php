<?php include "includes.php";
$clientes->add();
$login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
$clientes->login($login, $senha);
$clientes->logout();
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
          	<p class="breadcrumbs"><span class="mr-2"><a href=".">Home</a></span> <span>Cadastro / Login</span></p>
            <h1 class="mb-0 bread">Cadastro / Login</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
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
										<button type="submit" class="btn btn-primary py-3 px-4">Cadastrar</button>
									</div>
                </div>
	            </div>
                <input type="hidden" name="acao" value="addCliente">
				<input type="hidden" name="veio_de" value="login">
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
				  <input type="hidden" name="volta" value="<?php if(isset($_GET['volta']) && !empty($_GET['volta'])){ echo $_GET['volta'];}?>">
                          </form>
								
									
								</div>
	          	</div>
	          </div>
          </div> <!-- .col-md-8 -->
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