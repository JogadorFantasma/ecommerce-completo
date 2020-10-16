 <footer class="ftco-footer ftco-section">
      <div class="container">
      	<div class="row">
      		<div class="mouse">
						<a href="#" class="mouse-icon">
							<div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
						</a>
					</div>
      	</div>
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Vegefoods</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                          <?php if(isset($infoSistema->facebook) && !empty($infoSistema->facebook)){?>
                        <li class="ftco-animate">
                            <a href="<?php echo $infoSistema->facebook;?>" target="_blank" ><span class="icon-facebook"></span></a>
                        </li>
                      <?php }?>
                      <?php if(isset($infoSistema->twitter) && !empty($infoSistema->twitter)){?>
                      <li class="ftco-animate">
                            <a href="<?php echo $infoSistema->twitter;?>" target="_blank" ><span class="icon-twitter"></span></a>
                        </li>                    
                      <?php }?>
                      <?php if(isset($infoSistema->instagram) && !empty($infoSistema->instagram)){?>
                       <li class="ftco-animate">
                            <a href="<?php echo $infoSistema->instagram;?>" target="_blank" ><span class="icon-instagram"></span></a>
                        </li>                      
                      <?php }?>
                      <?php if(isset($infoSistema->youtube) && !empty($infoSistema->youtube)){?>
                      <li class="ftco-animate">
                            <a href="<?php echo $infoSistema->youtube;?>" target="_blank" ><span class="icon-youtube"></span></a>
                        </li>
                      <?php }?>
                     
              
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Menu</h2>
              <ul class="list-unstyled">
                <li><a href="<?php echo SITE_URL;?>/produtos" class="py-2 d-block">Produtos</a></li>
                <li><a href="<?php echo SITE_URL;?>/sobre" class="py-2 d-block">Sobre</a></li>
                <li><a href="<?php echo SITE_URL;?>/contato" class="py-2 d-block">Fale Conosco</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Ajuda</h2>
              <div class="d-flex">
	              <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
	                <li><a href="#" class="py-2 d-block">Shipping Information</a></li>
	                <li><a href="#" class="py-2 d-block">Returns &amp; Exchange</a></li>
	                <li><a href="#" class="py-2 d-block">Terms &amp; Conditions</a></li>
	                <li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
	              </ul>
	              <ul class="list-unstyled">
	                <li><a href="#" class="py-2 d-block">FAQs</a></li>
	                <li><a href="<?php echo SITE_URL;?>/contato" class="py-2 d-block">Contato</a></li>
	              </ul>
	            </div>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Tem dúvidas?</h2>
            	<div class="block-23 mb-3">
	              <ul>
                      <?php if(isset($infoSistema->endereco) && !empty($infoSistema->endereco)){?>
	                <li><span class="icon icon-map-marker"></span><span class="text"><?php echo $infoSistema->endereco;?></span></li>
                    <?php }?>
                    <?php if(isset($infoSistema->telefone1) && !empty($infoSistema->telefone1)){?>
	                <li><a ><span class="icon icon-phone"></span><span class="text"><?php echo $infoSistema->telefone1;?></span></a></li>
                    <?php }?>
                    <?php if(isset($infoSistema->telefone2) && !empty($infoSistema->telefone2)){?>
	                <li><a ><span class="icon icon-phone"></span><span class="text"><?php echo $infoSistema->telefone2;?></span></a></li>
                    <?php }?>
                    <?php if(isset($infoSistema->email1) && !empty($infoSistema->email1)){?>
	                <li><a ><span class="icon icon-envelope"></span><span class="text"><?php echo $infoSistema->email1;?></span></a></li>
                    <?php }?>
                    <?php if(isset($infoSistema->email2) && !empty($infoSistema->email2)){?>
	                <li><a ><span class="icon icon-envelope"></span><span class="text"><?php echo $infoSistema->email2;?></span></a></li>
                    <?php }?>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p>© 2009-<?php echo date('Y');?> Feito com <i class="icon icon-heart fa-beat" style="color: red;"></i> por <span><a href="http://hoogli.com.br/" target="_blank"><img src="<?php echo SITE_URL;?>/images/hoogli_logo.svg" width="60" alt="Hoogli-Marketing-Digital-Brasilia-(61)-3436-1999" style="margin-top: 3px;"></a></span>. Todos os direitos reservados.</p>
          </div>
        </div>
      </div>
    </footer>