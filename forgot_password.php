<!DOCTYPE html>
<html>
<head>
	<!-- require_once Header -->
	<?php 
		require_once 'structure_files/link.php';	
	?>
</head>
	<body class="bg-purple bg-overlay-worldmap"> 
		<!-- Container 100% -->
		<div class="container">
			<div class="row">
				<div class="col-md-4 offset-md-4 col-sm-8 offset-sm-2">
					<div class="bg-white rounded shadow border mt-5 py-5 px-3 mb-4">

						<h1 class="text-center display-6 mb-4">Esquecimento de usuário e senha</h1>
						<hr>
						<div class="row align-items-center">
							<div class="col-2">
								<i class="fas fa-exclamation-triangle fs-3 text-danger m-3"></i>
							</div>
							<div class="col-10">
								<h2 class="fs-5 mb-4 text-danger text-center d-inline fw-light">Por questões de seguranca, não é permitido alterar sua senha.</h2>
							</div>
						</div>
						
						
						<hr>
						<p>Preencha o formulario abaixo e a equipe Conta Comigo entrará em contato pelo email / telefone, informado abaixo.</p>
						
						<!-- data for sending email -->
						<form method="post" action="php_files/mail/mail.php" class="d-grid gap-2">		
							<div>
								<label class="form-label" for="name">Nome</label>
								<input class="form-control" maxlength="50" type="text" name="name" id="name">
							</div>

							<div>
								<label class="form-label" for="email">E-mail</label>
								<input class="form-control" maxlength="40" type="text" name="email" id="email">
							</div>
							
							<div>
								<label class="form-label" for="phone">Telefone</label>
								<input class="form-control" type="number" name="phone" maxlength="15" id="phone">
							</div>	

							<div class="mb-3">
								<label class="form-label" for="phone">Empresa:</label>
								<input class="form-control" type="text" maxlength="50" placeholder="Nome do hospital, clínica, etc" name="company" id="company">
							</div>	
							
							<button type="submit" value="Enviar" name="btn_changepassword" class="btn btn-primary">Enviar solicitação</button>
						</form>

					</div>
					<div class="text-center">
						<a href="index.php" class="mb-3 d-block text-light"><i class="fas fa-angle-left"></i> Voltar para tela de login</a>						
					</div>
				</div>
				
			</div>
		</div>
	</body>
</html>