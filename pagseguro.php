<?php include "includes.php";?>
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
          	<p class="breadcrumbs"><span class="mr-2"><a href=".">Home</a></span> <span>Pagamento</span></p>
            <h1 class="mb-0 bread">Pagamento</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				
	    			<?php include "pagseguro-transparente.php";?>
					 
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