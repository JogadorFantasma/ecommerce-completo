<div class="col-md-4">

  <div class="groupData" id="buyerData">

    <div>
      <h1 style="font-weight:bold">Dados do comprador</h1>
      <div style="margin-top:-20px; text-align:right;">
        <font color="red" style="font-size:9px;">* Campos de preenchimento obrigatório</font>
      </div>
    </div>

    <div class="field" style="margin-top:-5px;">
      <label for="senderEmail">E-mail <font color="red">*</font></label>
      <input type="text" name="senderEmail" value="<?php echo $_SESSION['dadosClienteLogado']->email;?>" id="senderEmail" required="required" />
    </div>

    <div class="field" style="margin-top:-5px">
      <label for="senderName">Nome completo <font color="red">*</font></label>
      <input type="text" name="senderName" id="senderName" required="required" value="<?php echo $_SESSION['dadosClienteLogado']->nome;?>"/>
    </div>

    <div class="field" style="margin-top:-5px">
      <label for="senderCPF">CPF (somente números) <font color="red">*</font></label>
      <input type="text" name="senderCPF" id="senderCPF" maxlength="14" required="required" value="<?php if(isset($_SESSION['dadosClienteLogado']->cpf) && !empty($_SESSION['dadosClienteLogado']->cpf)){echo $_SESSION['dadosClienteLogado']->cpf;}?>"/>
    </div>

    <div class="field" style="margin-top:-5px">
      <label for="senderAreaCode">Telefone <font color="red">*</font></label>
      <?php
	  $telefone = str_replace(array('-', '(', ')', ' '), array('', '', '', ''), $_SESSION['dadosClienteLogado']->telefone);
	  ?>
      <input type="text" name="senderAreaCode" id="senderAreaCode" value="<?=substr($telefone,0,2);?>" class="areaCode" maxlength="2" required="required"/>
      <input type="text" name="senderPhone" id="senderPhone" value="<?=substr($telefone,2);?>" class="phone" maxlength="9" required="required" />
    </div>

    <h2>Endereço Residencial</h2>

    <div class="field" style="margin-top: -10px;">
      <label for="shippingAddressPostalCode">CEP (somente números) <font color="red">*</font></label>
      <?php
      if(isset($_SESSION['dadosClienteLogado']->cep) && !empty($_SESSION['dadosClienteLogado']->cep)){
	  $cep = str_replace(array('-', '.', ',', ' '), array('', '', '', ''), $_SESSION['dadosClienteLogado']->cep);
      }else{
        $cep = '';
      }
	  ?>
      <input type="text" name="shippingAddressPostalCode" value="<?=substr($cep,0,5).'-'.substr($cep,5);?>" id="shippingAddressPostalCode" maxlength="9" required="required"/>
    </div>

    <div style="margin-top:-10px;">

      <div class="field">
        <label for="shippingAddressStreet">Endereço <font color="red">*</font></label>
        <input type="text" name="shippingAddressStreet" id="shippingAddressStreet" required="required" value="<?php if(isset($_SESSION['dadosClienteLogado']->endereco) && !empty($_SESSION['dadosClienteLogado']->endereco)){echo $_SESSION['dadosClienteLogado']->endereco;}?>"/>
      </div>

      <div class="field">
        <label for="shippingAddressNumber">Número <font color="red">*</font></label>
        <input type="text" name="shippingAddressNumber" id="shippingAddressNumber" size="5" required="required" value="<?php if(isset($_SESSION['dadosClienteLogado']->numero) && !empty($_SESSION['dadosClienteLogado']->numero)){echo $_SESSION['dadosClienteLogado']->numero;}else{ echo "s/n";}?>"/>  
      </div>
    
    </div>

    <div class="field" style="margin-top: 0px;">
      <label for="shippingAddressComplement">Complemento</label>
      <input type="text" name="shippingAddressComplement" id="shippingAddressComplement" value="<?php if(isset($_SESSION['dadosClienteLogado']->complemento) && !empty($_SESSION['dadosClienteLogado']->complemento)){echo $_SESSION['dadosClienteLogado']->complemento;}?>" />
    </div>

    <div class="field" style="margin-top:-5px;">
      <label for="shippingAddressDistrict">Bairro <font color="red">*</font></label>
      <input type="text" name="shippingAddressDistrict" id="shippingAddressDistrict" required="required" value="<?php if(isset($_SESSION['dadosClienteLogado']->bairro) && !empty($_SESSION['dadosClienteLogado']->bairro)){echo $_SESSION['dadosClienteLogado']->bairro;}?>"/>
    </div>

    <div class="field" style="margin-top:-5px;">
      <label for="shippingAddressCity">Cidade <font color="red">*</font></label>
      <input type="text" name="shippingAddressCity" id="shippingAddressCity" value="<?php if(isset($dadoCidade->nome) && !empty($dadoCidade->nome)){echo $dadoCidade->nome;}?>" required="required"/>
    </div>

    <div class="field" style="margin-top:-5px;">
      <label for="shippingAddressState">Estado <font color="red">*</font></label>
      <input type="text" name="shippingAddressState" id="shippingAddressState" class="addressState" maxlength="2" style="text-transform: uppercase;" onBlur="this.value=this.value.toUpperCase()" value="<?php if(isset($dadoCidade->uf) && !empty($dadoCidade->uf)){echo $dadoCidade->uf;}?>" required="required"/>
    </div>
    
    <div class="field" style="display: none">
      <label for="shippingAddressCountry">País</label>
      <input type="text" name="shippingAddressCountry" id="shippingAddressCountry" value="Brasil" readonly />
    </div>

    <p style="float: left"><b>Esta compra está sendo feita no Brasil</b> <img src="checkout-transparente-pagseguro/images/Brasil.png" alt="Bandeira do Brasil" title="Bandeira do Brasil" style="width: 64px;"/> </p>

    <p style="clear: both"></p>

  </div>
</div>