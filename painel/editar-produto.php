<?php include "verifica.php";
$id = '';
if(isset($_GET['id'])){
    if(empty($_GET['id'])){
        header('Location: produtos.php');
    }else{
        $id = $_GET['id'];        
    }
}
$produtos->editar();
$editaProduto = $produtos->rsDados($id);
$puxaCategorias = $categorias->rsDados();
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
    <title>Painel Hoogli - Editar Produto</title>
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
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Editar Produto</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="." class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page"><a href="produtos.php" class="text-muted">Produtos</a></li>
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
                                            <div class="col-md-2">
                                                <div class="form-group">
                                               
                                        <label class="mr-sm-2" for="inlineFormCustomSelect">Ativo</label>
                                        <select class="custom-select mr-sm-2" name="ativo" id="inlineFormCustomSelect">
                                            <option value="S" <?php if(isset($editaProduto->ativo) && $editaProduto->ativo == 'S'){ echo "selected";}?>>Sim</option>
                                            <option value="N" <?php if(isset($editaProduto->ativo) && $editaProduto->ativo == 'N'){ echo "selected";}?>>Não</option>
                                        </select>                                  
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                               
                                        <label class="mr-sm-2" for="inlineFormCustomSelect">Destaque</label>
                                        <select class="custom-select mr-sm-2" name="destaque" id="inlineFormCustomSelect">
                                            <option value="S" <?php if(isset($editaProduto->destaque) && $editaProduto->destaque == 'S'){ echo "selected";}?>>Sim</option>
                                            <option value="N" <?php if(isset($editaProduto->destaque) && $editaProduto->destaque == 'N'){ echo "selected";}?>>Não</option>
                                        </select>                                  
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                               
                                        <label class="mr-sm-2" for="inlineFormCustomSelect">Categoria</label>
                                        <select class="custom-select mr-sm-2" name="id_categoria" id="inlineFormCustomSelect">
                                            <?php foreach($puxaCategorias as $categoria){ ?>
                                            <option value="<?php echo $categoria->id;?>" <?php if(isset($editaProduto->id_categoria) && $editaProduto->id_categoria == $categoria->id){ echo "selected";}?>><?php echo $categoria->nome;?></option>
                                            <?php }?>
                                        </select>                                  
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                          
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Nome</label>
                                                    <input type="text" class="form-control" name="nome" value="<?php if(isset($editaProduto->nome) && !empty($editaProduto->nome)){ echo $editaProduto->nome;}?>" >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Quantidade Estoque</label>
                                                    <input type="number" class="form-control" name="quantidade_estoque" value="<?php if(isset($editaProduto->quantidade_estoque) && !empty($editaProduto->quantidade_estoque)){ echo $editaProduto->quantidade_estoque;}?>" >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Avise Estoque Baixo</label>
                                                    <input type="number" class="form-control" name="avise_estoque" value="<?php if(isset($editaProduto->avise_estoque) && !empty($editaProduto->avise_estoque)){ echo $editaProduto->avise_estoque;}?>" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Preço de</label>
                                                    <input type="text" class="form-control" name="preco_de" value="<?php if(isset($editaProduto->preco_de) && !empty($editaProduto->preco_de)){ echo number_format($editaProduto->preco_de,2,',','.');}?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Preço por</label>
                                                    <input type="text" class="form-control" name="preco_por" value="<?php if(isset($editaProduto->preco_por) && !empty($editaProduto->preco_por)){ echo number_format($editaProduto->preco_por,2,',','.');}?>">
                                                </div>
                                            </div>
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="mr-sm-2" for="">Imagem Principal</label>
                                                    <input type="file" name="imagem" class="form-control" >
                                                </div>
                                            </div>
                                        </div>
                                      <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Descrição</label>
                                                   <textarea name="descricao" class="form-control" id="" cols="30" rows="4"><?php if(isset($editaProduto->descricao) && !empty($editaProduto->descricao)){ echo $editaProduto->descricao;}?></textarea>
                                                </div>
                                            </div>                                        
                                        </div>
                                        <br>
                                        <h4 class="card-title">Metas Tags</h4>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Meta Title</label>
                                                    <input type="text" class="form-control" name="meta_title" value="<?php if(isset($editaProduto->meta_title) && !empty($editaProduto->meta_title)){ echo $editaProduto->meta_title;}?>">
                                                </div>
                                            </div>                                        
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Meta Keywords</label>
                                                    <input type="text" class="form-control" name="meta_keywords" value="<?php if(isset($editaProduto->meta_keywords) && !empty($editaProduto->meta_keywords)){ echo $editaProduto->meta_keywords;}?>">
                                                </div>
                                            </div>                                        
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="">Meta Description</label>
                                                   <textarea name="meta_description" class="form-control" id="" cols="30" rows="4"><?php if(isset($editaProduto->meta_description) && !empty($editaProduto->meta_description)){ echo $editaProduto->meta_description;}?></textarea>
                                                </div>
                                            </div>                                        
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-info">Salvar</button>
                                            <button type="reset" class="btn btn-dark">Resetar</button>
                                        </div>
                                    </div>
                                    <input type="hidden" name="acao" value="editaProduto">
                                    <input type="hidden" name="imagem_Atual" value="<?php echo $editaProduto->imagem;?>">
                                    <input type="hidden" name="id" value="<?php echo $editaProduto->id;?>">
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