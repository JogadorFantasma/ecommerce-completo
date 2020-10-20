<?php
include "verifica.php";
$metastags->editarMetaTag();
$editaConfig = $metastags->rsDados(1);
?>
<!DOCTYPE html>
<html dir="ltr" lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Adriano Monteiro">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/hoogli_logo.svg">
    <title>Painel Hoogli - Metas Tags</title>
    <link href="dist/css/style.min.css" rel="stylesheet">
</head>
<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
       <?php include "header.php";?>
       <?php include "inc-menu-lateral.php";?>
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Metas Tags</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="." class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page"><a href="metas-tags.php" class="text-muted">Metas Tags</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-5 align-self-center">
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="form-body">
                                      
                                           <div class="form-group row">
<div class="col-md-12">	   
   <h5 class="card-title">Principal</h5>
</div>
</div>
   <div class="form-group row">
    <div class="col-md-12 col-sm-12">
    <label  class="col-form-label">Meta Title</label>
     <input class="form-control" type="text" name="meta_title_principal" value="<?php if(isset($editaConfig->meta_title_principal) && !empty($editaConfig->meta_title_principal)){ echo $editaConfig->meta_title_principal;}?>" />
    </div>   
   </div>
   <div class="form-group row">
    <div class="col-md-12 col-sm-12">
    <label  class="col-form-label">Meta Keywords</label>
     <input class="form-control" type="text" name="meta_keywords_principal" value="<?php if(isset($editaConfig->meta_keywords_principal) && !empty($editaConfig->meta_keywords_principal)){ echo $editaConfig->meta_keywords_principal;}?>" />
    </div>   
   </div>
   <div class="form-group row">
    <div class="col-md-12 col-sm-12">
    <label  class="col-form-label">Meta Description</label>
	<textarea name="meta_description_principal" class="form-control" id="" cols="30" rows="4"><?php if(isset($editaConfig->meta_description_principal) && !empty($editaConfig->meta_description_principal)){ echo $editaConfig->meta_description_principal;}?></textarea> 
    </div>   
   </div>

   <div class="clearfix"></div>

   <div class="form-group row">
<div class="col-md-12">	   
   <h5 class="card-title">Blog</h5>
</div>
</div>
   <div class="form-group row">
    <div class="col-md-12 col-sm-12">
    <label  class="col-form-label">Meta Title</label>
     <input class="form-control" type="text" name="meta_title_blog" value="<?php if(isset($editaConfig->meta_title_blog) && !empty($editaConfig->meta_title_blog)){ echo $editaConfig->meta_title_blog;}?>" />
    </div>   
   </div>
   <div class="form-group row">
    <div class="col-md-12 col-sm-12">
    <label  class="col-form-label">Meta Keywords</label>
     <input class="form-control" type="text" name="meta_keywords_blog" value="<?php if(isset($editaConfig->meta_keywords_blog) && !empty($editaConfig->meta_keywords_blog)){ echo $editaConfig->meta_keywords_blog;}?>" />
    </div>   
   </div>
   <div class="form-group row">
    <div class="col-md-12 col-sm-12">
    <label  class="col-form-label">Meta Description</label>
	<textarea name="meta_description_blog" class="form-control" id="" cols="30" rows="4"><?php if(isset($editaConfig->meta_description_blog) && !empty($editaConfig->meta_description_blog)){ echo $editaConfig->meta_description_blog;}?></textarea> 
    </div>   
   </div>

   <div class="clearfix"></div>
  
       <div class="form-group row">
<div class="col-md-12">	   
   <h5 class="card-title">Contato</h5>
</div>
</div>
   <div class="form-group row">
    <div class="col-md-12 col-sm-12">
    <label  class="col-form-label">Meta Title</label>
     <input class="form-control" type="text" name="meta_title_contato" value="<?php if(isset($editaConfig->meta_title_contato) && !empty($editaConfig->meta_title_contato)){ echo $editaConfig->meta_title_contato;}?>" />
    </div>   
   </div>
   <div class="form-group row">
    <div class="col-md-12 col-sm-12">
    <label  class="col-form-label">Meta Keywords</label>
     <input class="form-control" type="text" name="meta_keywords_contato" value="<?php if(isset($editaConfig->meta_keywords_contato) && !empty($editaConfig->meta_keywords_contato)){ echo $editaConfig->meta_keywords_contato;}?>" />
    </div>   
   </div>
   <div class="form-group row">
    <div class="col-md-12 col-sm-12">
    <label  class="col-form-label">Meta Description</label>
	<textarea name="meta_description_contato" class="form-control" id="" cols="30" rows="4"><?php if(isset($editaConfig->meta_description_contato) && !empty($editaConfig->meta_description_contato)){ echo $editaConfig->meta_description_contato;}?></textarea> 
    </div>   
   </div>

   <div class="clearfix"></div>

        <div class="form-group row">
<div class="col-md-12">	   
   <h5 class="card-title">Parceria</h5>
</div>
</div>
   <div class="form-group row">
    <div class="col-md-12 col-sm-12">
    <label  class="col-form-label">Meta Title</label>
     <input class="form-control" type="text" name="meta_title_parceria" value="<?php if(isset($editaConfig->meta_title_parceria) && !empty($editaConfig->meta_title_parceria)){ echo $editaConfig->meta_title_parceria;}?>" />
    </div>   
   </div>
   <div class="form-group row">
    <div class="col-md-12 col-sm-12">
    <label  class="col-form-label">Meta Keywords</label>
     <input class="form-control" type="text" name="meta_keywords_parceria" value="<?php if(isset($editaConfig->meta_keywords_parceria) && !empty($editaConfig->meta_keywords_parceria)){ echo $editaConfig->meta_keywords_parceria;}?>" />
    </div>   
   </div>
   <div class="form-group row">
    <div class="col-md-12 col-sm-12">
    <label  class="col-form-label">Meta Description</label>
	<textarea name="meta_description_parceria" class="form-control" id="" cols="30" rows="4"><?php if(isset($editaConfig->meta_description_parceria) && !empty($editaConfig->meta_description_parceria)){ echo $editaConfig->meta_description_parceria;}?></textarea> 
    </div>   
   </div>

   <div class="clearfix"></div>

        <div class="form-group row">
<div class="col-md-12">	   
   <h5 class="card-title">Sobre</h5>
</div>
</div>
   <div class="form-group row">
    <div class="col-md-12 col-sm-12">
    <label  class="col-form-label">Meta Title</label>
     <input class="form-control" type="text" name="meta_title_sobre" value="<?php if(isset($editaConfig->meta_title_sobre) && !empty($editaConfig->meta_title_sobre)){ echo $editaConfig->meta_title_sobre;}?>" />
    </div>   
   </div>
   <div class="form-group row">
    <div class="col-md-12 col-sm-12">
    <label  class="col-form-label">Meta Keywords</label>
     <input class="form-control" type="text" name="meta_keywords_sobre" value="<?php if(isset($editaConfig->meta_keywords_sobre) && !empty($editaConfig->meta_keywords_sobre)){ echo $editaConfig->meta_keywords_sobre;}?>" />
    </div>   
   </div>
   <div class="form-group row">
    <div class="col-md-12 col-sm-12">
    <label  class="col-form-label">Meta Description</label>
	<textarea name="meta_description_sobre" class="form-control" id="" cols="30" rows="4"><?php if(isset($editaConfig->meta_description_sobre) && !empty($editaConfig->meta_description_sobre)){ echo $editaConfig->meta_description_sobre;}?></textarea> 
    </div>   
   </div>

  
   <div class="clearfix"></div>

    

        <div class="form-group row">
<div class="col-md-12">	   
   <h5 class="card-title">Serviços</h5>
</div>
</div>
   <div class="form-group row">
    <div class="col-md-12 col-sm-12">
    <label  class="col-form-label">Meta Title</label>
     <input class="form-control" type="text" name="meta_title_servico" value="<?php if(isset($editaConfig->meta_title_servico) && !empty($editaConfig->meta_title_servico)){ echo $editaConfig->meta_title_servico;}?>" />
    </div>   
   </div>
   <div class="form-group row">
    <div class="col-md-12 col-sm-12">
    <label  class="col-form-label">Meta Keywords</label>
     <input class="form-control" type="text" name="meta_keywords_servico" value="<?php if(isset($editaConfig->meta_keywords_servico) && !empty($editaConfig->meta_keywords_servico)){ echo $editaConfig->meta_keywords_servico;}?>" />
    </div>   
   </div>
   <div class="form-group row">
    <div class="col-md-12 col-sm-12">
    <label  class="col-form-label">Meta Description</label>
	<textarea name="meta_description_servico" class="form-control" id="" cols="30" rows="4"><?php if(isset($editaConfig->meta_description_servico) && !empty($editaConfig->meta_description_servico)){ echo $editaConfig->meta_description_servico;}?></textarea> 
    </div>   
   </div>

   <div class="clearfix"></div> 
      <div class="form-group row">
<div class="col-md-12">	   
   <h5 class="card-title">Produtos</h5>
</div>
</div>
   <div class="form-group row">
    <div class="col-md-12 col-sm-12">
    <label  class="col-form-label">Meta Title</label>
     <input class="form-control" type="text" name="meta_title_produtos" value="<?php if(isset($editaConfig->meta_title_produtos) && !empty($editaConfig->meta_title_produtos)){ echo $editaConfig->meta_title_produtos;}?>" />
    </div>   
   </div>
   <div class="form-group row">
    <div class="col-md-12 col-sm-12">
    <label  class="col-form-label">Meta Keywords</label>
     <input class="form-control" type="text" name="meta_keywords_produtos" value="<?php if(isset($editaConfig->meta_keywords_produtos) && !empty($editaConfig->meta_keywords_produtos)){ echo $editaConfig->meta_keywords_produtos;}?>" />
    </div>   
   </div>
   <div class="form-group row">
    <div class="col-md-12 col-sm-12">
    <label  class="col-form-label">Meta Description</label>
	<textarea name="meta_description_produtos" class="form-control" id="" cols="30" rows="4"><?php if(isset($editaConfig->meta_description_produtos) && !empty($editaConfig->meta_description_produtos)){ echo $editaConfig->meta_description_produtos;}?></textarea> 
    </div>   
   </div>

   <div class="clearfix"></div> 
                                    </div>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-info">Salvar</button>
                                           <!--  <button type="reset" class="btn btn-dark">Resetar</button> -->
                                        </div>
                                    </div>
                                    <input type="hidden" name="acao" value="editarMetaTag">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
           <?php include "footer.php";?>
        </div>
    </div>
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="dist/js/app-style-switcher.js"></script>
    <script src="dist/js/feather.min.js"></script>
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <script src="dist/js/sidebarmenu.js"></script>
    <script src="dist/js/custom.min.js"></script>
</body>
</html>