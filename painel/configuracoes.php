<?php
include "verifica.php";
$infoSistema->editar();
$editaConfig = $infoSistema->rsDados(1);
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
    <title>Painel Hoogli - Configurações Gerais</title>
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
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Configurações Gerais</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="." class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page"><a href="configuracoes.php" class="text-muted">Configurações Gerais</a></li>
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
                                      
                                        <div class="row">
                                          
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Nome Empresa</label>
                                                    <input type="text" class="form-control" name="nome_empresa" value="<?php if(isset($editaConfig->nome_empresa) && !empty($editaConfig->nome_empresa)){ echo $editaConfig->nome_empresa;}?>" >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Email</label>
                                                    <input type="text" class="form-control" name="email1" value="<?php if(isset($editaConfig->email1) && !empty($editaConfig->email1)){ echo $editaConfig->email1;}?>" >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Email 2</label>
                                                    <input type="text" class="form-control" name="email2" value="<?php if(isset($editaConfig->email2) && !empty($editaConfig->email2)){ echo $editaConfig->email2;}?>" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Telefone</label>
                                                    <input type="text" class="form-control" name="telefone1" value="<?php if(isset($editaConfig->telefone1) && !empty($editaConfig->telefone1)){ echo $editaConfig->telefone1;}?>" >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Telefone 2</label>
                                                    <input type="text" class="form-control" name="telefone2" value="<?php if(isset($editaConfig->telefone2) && !empty($editaConfig->telefone2)){ echo $editaConfig->telefone2;}?>" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">CEP</label>
                                                    <input type="text" class="form-control" name="cep_loja" value="<?php if(isset($editaConfig->cep_loja) && !empty($editaConfig->cep_loja)){ echo $editaConfig->cep_loja;}?>" >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Endereço</label>
                                                    <input type="text" class="form-control" name="endereco" value="<?php if(isset($editaConfig->endereco) && !empty($editaConfig->endereco)){ echo $editaConfig->endereco;}?>" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6 col-sm-12">
                                            <label  class="col-form-label">Facebook</label>
                                            <input class="form-control" type="text" name="facebook" value="<?php if(isset($editaConfig->facebook) && !empty($editaConfig->facebook)){ echo $editaConfig->facebook;}?>" />
                                            </div> 
                                            <div class="col-md-6 col-sm-12">
                                            <label  class="col-form-label">Twitter</label>
                                            <input class="form-control" type="text" name="twitter" value="<?php if(isset($editaConfig->twitter) && !empty($editaConfig->twitter)){ echo $editaConfig->twitter;}?>" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6 col-sm-12">
                                            <label  class="col-form-label">Instagran</label>
                                            <input class="form-control" type="text" name="instagram" value="<?php if(isset($editaConfig->instagram) && !empty($editaConfig->instagram)){ echo $editaConfig->instagram;}?>" />
                                            </div> 
                                            <div class="col-md-6 col-sm-12">
                                            <label  class="col-form-label">Youtube</label>
                                            <input class="form-control" type="text" name="youtube" value="<?php if(isset($editaConfig->youtube) && !empty($editaConfig->youtube)){ echo $editaConfig->youtube;}?>" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6 col-sm-12">
                                            <label  class="col-form-label">Favicon</label>
                                            <input class="form-control" type="file" name="favicon"/>
                                            </div> 
                                            <div class="col-md-6 col-sm-12">
                                        <?php if(isset($editaConfig->favicon) && !empty($editaConfig->favicon)){?>
                                            <label  class="col-form-label">&nbsp;</label>
                                            <img src="../img/<?php echo $editaConfig->favicon;?>" width="100" alt="">
                                            <?php }?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-info">Salvar</button>
                                            <button type="reset" class="btn btn-dark">Resetar</button>
                                        </div>
                                    </div>
                                    <input type="hidden" name="acao" value="editarConfig">
	                                <input type="hidden" name="favicon_Atual" value="<?php echo $editaConfig->favicon;?>">
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