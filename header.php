<div class="py-1 bg-primary">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
							<?php if(isset($infoSistema->telefone1) && !empty($infoSistema->telefone1)){?>
	                <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text"><?php echo $infoSistema->telefone1;?></span>
                    <?php }?>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
							<?php if(isset($infoSistema->email1) && !empty($infoSistema->email1)){?>
	                <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text"><?php echo $infoSistema->email1;?></span>
                    <?php }?>
					    </div>
					    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
						    <span class="text">Entrega de 3 a 5 dias úteis e Devoluções Gratuitas</span>
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="<?php echo SITE_URL;?>/.">Vegefoods</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="." class="nav-link">Home</a></li>
	         <!--  <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              	<a class="dropdown-item" href="shop.html">Shop</a>
              	<a class="dropdown-item" href="wishlist.html">Wishlist</a>
                <a class="dropdown-item" href="product-single.html">Single Product</a>
                <a class="dropdown-item" href="cart.html">Cart</a>
                <a class="dropdown-item" href="checkout.html">Checkout</a>
              </div>
            </li> -->
            <li class="nav-item"><a href="<?php echo SITE_URL;?>/produtos" class="nav-link">Produtos</a></li>
	          <li class="nav-item"><a href="<?php echo SITE_URL;?>/sobre" class="nav-link">Sobre</a></li>
	          <li class="nav-item"><a href="<?php echo SITE_URL;?>/blog" class="nav-link">Blog</a></li>
	          <li class="nav-item"><a href="<?php echo SITE_URL;?>/contato" class="nav-link">Contato</a></li>
	          <li class="nav-item cta cta-colored"><a data-toggle="modal" data-target="#cartModal" class="nav-link"><span class="icon-shopping_cart"></span>[<?php if(isset($_SESSION['shopping_cart']) && !empty($_SESSION['shopping_cart'])){ echo count($_SESSION['shopping_cart']);}else{ echo "0";}?>]</a></li>

	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
	
	<div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <h5 class="modal-title" id="exampleModalLabel">
          Detalhe Carrinho
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		  <?php if(!empty($_SESSION['shopping_cart'])){?>
		  <div class="container-fluid">
			<div class="row">
			<div class="col-md-6"><h6>Produto</h6></div>
			<div class="col-md-2"><h6>Preço</h6></div>
			<div class="col-md-1"><h6>Qtd</h6></div>
			<div class="col-md-2"><h6>Total</h6></div>
			<div class="col-md-1"><h6>Ação</h6></div>
			</div>
			<hr>
			<?php 
			  $total = 0;
			  foreach($_SESSION['shopping_cart'] as $key => $produto_modal){
			  ?>
			<div class="row">
			<div class="col-md-6"><?php echo $produto_modal['nome_produto'];?></div>
			<div class="col-md-2">R$ <?php echo number_format($produto_modal['valor_produto'],2,',','.');?></div>
			<div class="col-md-1"><?php echo $produto_modal['quantidade_produto'];?></div>
			<div class="col-md-2">R$ <?php echo number_format($produto_modal['quantidade_produto'] * $produto_modal['valor_produto'],2,',','.');?></div>
			<div class="col-md-1"><a href="?action=delete&id=<?php echo $produto_modal['id'];?>" class="btn btn-danger ">
                  <i class="icon icon-times"></i>
                </a></div>
			</div>
			<?php $total = $total + ($produto_modal['quantidade_produto'] * $produto_modal['valor_produto']);?>
			<?php }?>
			<hr>
		  </div>
        <div class="d-flex justify-content-end">
			
          <h5>Total: <span class="price text-success">R$ <?php echo number_format($total,2,',','.')?></span></h5>
        </div>
		<?php }else{?>
		<h3>Nenhum produto no carrinho!</h3>
		<?php }?>
      </div>
      <div class="modal-footer border-top-0 d-flex justify-content-between">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
		<?php if(!empty($_SESSION['shopping_cart'])){
			if(count($_SESSION['shopping_cart']) > 0){
			?>
        <button type="button" class="btn btn-success">Carrinho</button>
		<?php } }?>
      </div>
    </div>
  </div>
</div>