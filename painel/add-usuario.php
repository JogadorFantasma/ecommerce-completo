<?php include "verifica.php";
$usuarios->add();
$cargos = $usuarios->Cargo();
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
    <title>Painel Hoogli - Adicionar Usuário</title>
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
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Adicionar Usuário</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="." class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page"><a href="usuarios.php" class="text-muted">Usuários</a></li>
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
    
                                            <div class="col-md-4 col-sm-12">
                                            <label  class="col-form-label">Foto</label>
                                                <input class="form-control" type="file" name="foto"  />
                                            </div>
                                            
                                            </div>
                                        <div class="row">
    
                                            <div class="col-md-6 col-sm-12">
                                            <label  class="col-form-label">Nome</label>
                                                <input class="form-control" type="text" name="nome"  />
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                            <label  class="col-form-label">E-mail</label>
                                                <input class="form-control" type="text" name="email"  />
                                            </div>

                                            </div>

                                            <div class="row">
                                            <div class="col-md-3 col-sm-12">
                                            <label  class="col-form-label">CPF</label>
                                                <input class="form-control" type="text" name="cpf" id="kt_inputmask_4"  />
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                            <label  class="col-form-label">Telefone</label>
                                                <input class="form-control" type="text" name="telefone" id="kt_inputmask_3"  />
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                            <label  class="col-form-label">Endereço</label>
                                                <input class="form-control" type="text" name="endereco"  />
                                            </div>
                                            </div>
                                            <div class="row">

                                            <div class="col-md-3 col-sm-12">
                                            <label  class="col-form-label">Cargo</label>
                                            <select name="id_cargo" id="" class="form-control">
                                                <?php foreach($cargos as $cargo){?>
                                                <option value="<?php echo $cargo->id;?>"><?php echo $cargo->cargo;?></option>
                                                <?php }?>
                                            </select>
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                            <label  class="col-form-label">Senha</label>
                                                <input class="form-control" type="text" name="senha"  />
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                            <label  class="col-form-label">Sexo</label>
                                                <select name="sexo" id="" class="form-control">
                                                <option value="M">Masculino</option>
                                                <option value="F">Feminino</option>
                                                </select>
                                            </div>
                                            </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-info">Salvar</button>
                                            <button type="reset" class="btn btn-dark">Resetar</button>
                                        </div>
                                    </div>
                                    <input type="hidden" name="acao" value="addUsuario">
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
    <script>
        var KTInputmask = function () {

// Private functions
var demos = function () {
 
 // phone number format
 $("#kt_inputmask_3").inputmask("mask", {
  "mask": "(99) 99999-9999"
 });

 // empty placeholder
 $("#kt_inputmask_4").inputmask({
  "mask": "999.999.999-99"
 });

}

return {
 // public functions
 init: function() {
  demos();
 }
};
}();

jQuery(document).ready(function() {
KTInputmask.init();
});
    </script>
</body>
</html>