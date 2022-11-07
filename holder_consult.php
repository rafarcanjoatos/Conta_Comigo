<!-- require_once Header -->
<?php 
	require_once 'structure_files/header.php';
	require_once 'structure_files/connection.php';
	require_once 'php_files/holder/validate_cpf.php';
	require_once 'structure_files/link.php';
?>

<!-- Container 100% -->
<div class="container">
	<div class="row my-5 my-sm-2 py-5">
	
		<div class="col-md-6">
			<h1 class="mb-3">Situação cadastral do Portador</h1>
			<p class="pe-3">Preencha o CPF do portador abaixo para consultar a situação cadastral dele no sistema da Conta Comigo.</p>
			<form method="post" id="form_holder" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
				
				<div class="row">
					<label class="col-form-label" for="cpf">Filtrar por Paciente:</label>
				</div>
				<div class="row">
					<div class="col-md-4">
						<input type="text" name="cpf_schedule" maxlength="14" autocomplete="off" class="form-control"  placeholder="000.000.000-00" id="cpf" onkeyup="validarCpf('cpf', document.getElementById('cpf').value);"/>
					</div>
					<div class="col-md-4">
						<div id="campo_cpf"> </div> <br />
					</div>
					
				</div>
    		</form>
			<!--<span><?php echo $cpf_err;?></span> -->
		</div>
	
		<div class="col-md-6">
<?php
	if(($_SERVER["REQUEST_METHOD"] == "POST")&&((!empty($_POST["cpf_schedule"])))){
	if((isset($contacomigo))&&($contacomigo=="1")){
	    echo "
		<!--CADASTRO HABILITADO--> 
		<h3 class='mb-3'>Status do Cadastro</h3>
		<div class='alert alert-success' role='alert'>
			<p class='fs-5 lead'><i class='fas fa-check'></i> Esse portador está habilitado.</p>
			<hr>
			Isso significa que ele poderá desfrutar de todos os benefícios da Conta Comigo.<br/>
            <hr>
    		<p class='fs-4 fs-bold'>SAC Conta Comigo</p>
            <p>
                <i class='fas fa-phone'></i>  0800-610-5665
        		<br>
                <i class='fas fa-phone'></i> TI  (47)9.9168-6307
        		<br>            
        		<i class='fas fa-envelope'></i>  contato@contacomigo.org
    		</p>
		</div>";
?>
		</div>
	</div>
</div>	
    <div class="container bg-light rounded border py-3 px-4 mb-5">
    	<div class="row">
    		<div class="col-md-12">
    			<h2 class="mb-3">Informações do Portador</h2>
    			<ul class="list-group list-group-horizontal-md mb-3">
    				<li class="list-group-item flex-fill">
    					<small class="fw-bold">Nome:</small><br>
    					<span class="text-uppercase"><?php echo $name_holder; ?></span>
    				</li>
    				<li class="list-group-item flex-fill">
    					<small class="fw-bold">CPF:</small><br>
    					<span class="text-uppercase"><?php echo $cpf_schedule; ?></span>
    				</li>
    				<!--  <li class="list-group-item flex-fill">
    					<small class="fw-bold">Telefone:</small><br>
    					<span class="text-uppercase"><?php /*echo $phone_holder; */?></span>
    				</li> -->
    			</ul>
    		</div>
    	</div>
    </div>
<?php
		    
    //Close IF CONTA COMIGO = 1
    }elseif((isset($contacomigo))&&($contacomigo=="0")){
        echo "
    	<!--CADASTRO DESABILITADO -->
    	<h3 class='mb-3'>Status do Cadastro</h3>
    	<div class='alert alert-danger' role='alert'>
    		<p class='fs-5 lead'><i class='fas fa-times'></i> Infelizmente o cadastro do paciente esta inativo. </p>
    		<hr>
    		<p>Isso significa que ele não pode desfrutar dos benefícios da Conta Comigo.<br>Informe para o paciente o contato do nosso SAC, para regularizarmos a situação.</p>
    		<p class='fs-4 fs-bold'>SAC Conta Comigo</p>

            <p>
                <i class='fas fa-phone'></i> SAC  0800-610-5665
        		<br>            
                <i class='fas fa-phone'></i> TI  (47)9.9168-6307
        		<br>
        		<i class='fas fa-envelope'></i> contato@contacomigo.org
    		</p>
    	</div>";
    }else{
        echo "
    	<!--CADASTRO DESABILITADO -->
    	<h3 class='mb-3'>Status do Cadastro</h3>
    	<div class='alert alert-danger' role='alert'>
    		<p class='fs-5 lead'><i class='fas fa-times'></i> CPF inválido. </p>
    		<hr>
    		<p>Isso significa que ele não pode desfrutar dos benefícios do Conta Comigo.<br>Informe para o paciente o contato do nosso SAC, para regularizarmos a situação.</p>
    		<hr>
    		<p class='fs-4 fs-bold'>SAC Conta Comigo</p>

            <p>
                <i class='fas fa-phone'></i> SAC  0800-610-5665
        		<br>            
                <i class='fas fa-phone'></i> TI  (47)9.9168-6307
        		<br>
        		<i class='fas fa-envelope'></i> contato@contacomigo.org
    		</p>
    	</div>";
    }
    
    //CLOSE IF HAVE POST
	}else { }
?>
    
<script>
	const cpf = document.querySelector("#cpf");
    cpf.addEventListener("keyup", () => {
      let value = cpf.value.replace(/[^0-9]/g, "").replace(/^([\d]{3})([\d]{3})?([\d]{3})?([\d]{2})?/, "$1.$2.$3-$4");
      cpf.value = value;
    });
</script>
	
<div class="row">
    <div class="col-12 position-fixed bottom-0 start-0">	
    <!-- require_once Footer -->
    <?php   require_once 'structure_files/footer.php'; ?>
    </div>
</div>