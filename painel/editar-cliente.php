<?php include "verifica.php";
$id = '';
if(isset($_GET['id'])){
    if(empty($_GET['id'])){
        header('Location: clientes.php');
    }else{
        $id = $_GET['id'];        
    }
}
$clientes->editar();
$editaCliente = $clientes->rsDados($id);
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
    <title>Painel Hoogli - Editar CLiente</title>
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
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Editar CLiente</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="." class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page"><a href="clientes.php" class="text-muted">CLientes</a></li>
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
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Nome</label>
                                                    <input type="text" class="form-control" name="nome" value="<?php if(isset($editaCliente->nome) && !empty($editaCliente->nome)){ echo $editaCliente->nome;}?>" >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">E-mail</label>
                                                    <input type="text" class="form-control" name="email" value="<?php if(isset($editaCliente->email) && !empty($editaCliente->email)){ echo $editaCliente->email;}?>" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Telefone</label>
                                                    <input type="text" class="form-control" name="telefone" value="<?php if(isset($editaCliente->telefone) && !empty($editaCliente->telefone)){ echo $editaCliente->telefone;}?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Sexo</label>
                                                    <select name="sexo" class="form-control" id="">
                                                        <option value="M" <?php if(isset($editaCliente->sexo) && $editaCliente->sexo == 'M'){ echo "selected";}?>>Masculino</option>
                                                        <option value="F" <?php if(isset($editaCliente->sexo) && $editaCliente->sexo == 'F'){ echo "selected";}?>>Feminino</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Senha</label>
                                                    <input type="text" class="form-control" name="senha" value="<?php if(isset($editaCliente->senha) && !empty($editaCliente->senha)){ echo $editaCliente->senha;}?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">CEP</label>
                                                    <input type="text" class="form-control" name="cep" value="<?php if(isset($editaCliente->cep) && !empty($editaCliente->cep)){ echo $editaCliente->cep;}?>">
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                               <label class="mr-sm-2" for="">Endereço</label>
                                                    <input type="text" class="form-control" name="endereco" value="<?php if(isset($editaCliente->endereco) && !empty($editaCliente->endereco)){ echo $editaCliente->endereco;}?>">
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Número</label>
                                                    <input type="text" class="form-control" name="numero" value="<?php if(isset($editaCliente->numero) && !empty($editaCliente->numero)){ echo $editaCliente->numero;}?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Estado</label>
                                                    <?php echo $estados->selectEstados('id_estado', '', $editaCliente->id_estado, '', 'S');?>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                               <label class="mr-sm-2" for="">Cidade</label>
                                                    <div id="janela_Cidades">
                                                    <?php 
                                                    $_GET['id_estado'] = $editaCliente->id_estado;
                                                    $_GET['id_cidade'] = $editaCliente->id_cidade;
                                                    include "cidades.php"; ?>
                                                        
                                                    </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Bairro</label>
                                                    <input type="text" class="form-control" name="bairro" value="<?php if(isset($editaCliente->bairro) && !empty($editaCliente->bairro)){ echo $editaCliente->bairro;}?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Complemento</label>
                                                    <input type="text" class="form-control" name="complemento" value="<?php if(isset($editaCliente->complemento) && !empty($editaCliente->complemento)){ echo $editaCliente->complemento;}?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-info">Salvar</button>
                                            <!-- <button type="reset" class="btn btn-dark">Resetar</button> -->
                                        </div>
                                    </div>
                                    <input type="hidden" name="acao" value="editaCliente">
                                    <input type="hidden" name="id" value="<?php if(isset($editaCliente->id) && !empty($editaCliente->id)){ echo $editaCliente->id;}?>">
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
    <script src="dist/js/script_loads.js"></script>
</body>
</html>