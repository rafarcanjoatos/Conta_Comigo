<?php 

session_start();
require_once 'link.php';
$password = $_SESSION["password"];
$email = $_SESSION["email"];
$autenticado = $_SESSION["autenticado"];

    if(!isset($autenticado)){
        unset ($email);
        unset ($password);
        echo '<script>window.location.replace("login.php")</script>';
    }
    else{
        $logado = $email;
    }   
    //and (!isset ($_SESSION['password']) == true)
?>
<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="img_files/fav-contacomigo.png" type="image/x-icon">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light shadow border-bottom">
		<div class="container">
		  	<a class="navbar-brand" href="index.php"><img id="logo_contacomigo" src="img_files/Logo-Conta-Comigo-Horizontal@0.5x.png"></a>
		  	<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
		  	</button>
		  	<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<div class="navbar-nav me-auto mb-2 mb-lg-0">
				</div>
				<div class="d-flex">
					<!-- Corporation name -->
					<div class="d-inline pt-1">
						<span class="me-2 text-muted"><?php echo $logado; ?></span>
					</div>

					<!-- Health logo -->
					<div class="d-inline">
						<a href="php_files/login/logout.php"><i class="fas fa-briefcase fa-2x text-muted"></i></a>
					</div>
				</div>
		  	</div>
		</div>
	</nav>