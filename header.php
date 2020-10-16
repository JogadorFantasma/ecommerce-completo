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
	          <li class="nav-item cta cta-colored"><a data-toggle="modal" data-target="#cartModal" class="nav-link"><span class="icon-shopping_cart"></span>[0]</a></li>

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
          Your Shopping Cart
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-image">
          <thead>
            <tr>
              <th scope="col"></th>
              <th scope="col">Produto</th>
              <th scope="col">Preço</th>
              <th scope="col">Qtd</th>
              <th scope="col">Total</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="w-25">
                <img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/vans.png" class="img-fluid img-thumbnail" alt="Sheep">
              </td>
              <td>Vans Sk8-Hi MTE Shoes</td>
              <td>89$</td>
              <td class="qty"><input type="text" class="form-control" id="input1" value="2"></td>
              <td>178$</td>
              <td>
                <a href="#" class="btn btn-danger btn-sm">
                  <i class="fa fa-times"></i>
                </a>
              </td>
            </tr>
          </tbody>
        </table> 
        <div class="d-flex justify-content-end">
          <h5>Total: <span class="price text-success">89$</span></h5>
        </div>
      </div>
      <div class="modal-footer border-top-0 d-flex justify-content-between">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success">Checkout</button>
      </div>
    </div>
  </div>
</div>