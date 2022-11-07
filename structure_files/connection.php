<?php
    // connectiona Banco
    $server= "localhost";
    $bank = "bd_contacomigo";
    $user = "root";
    $passwordbd = "";
    
    // connectiona Banco - Mysqli
    //$server= "localhost";
    //$bank = "bd_contacomigo";
    //$user = "root";
    //$password = "Slaviero@123";

    $mysqli = new mysqli($server,$user,$passwordbd,$bank);
    
    $conexao = new PDO ("mysql:host=localhost;dbname=bd_contacomigo","root","");
    $conexao->exec('SET CHARACTER SET utf8');   
    
    // Valida Conex�o
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
?>