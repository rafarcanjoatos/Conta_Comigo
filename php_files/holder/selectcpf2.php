<?php
// Session Start
require_once '../../structure_files/connection.php';
require_once 'function.php';

// Campo que fez requisição
$campo = test_input($_GET['campo']);
// Valor do campo que fez requisição
$valor = test_input($_GET['valor']);

if ($valor == "") {
    echo "Preencha o campo com seu CPF";
} elseif (strlen($valor) > 14) {
    echo "O CPF deve ter no máximo 14 caracteres";
} elseif (strlen($valor) < 14) {
    echo "O CPF deve ter no mínimo 14 caracteres";
} else if ($campo == "cpf") {
    // Campo que fez requisição
    $campo = limpa_cpf($_GET['campo']);
    // Valor do campo que fez requisição
    $valor = limpa_cpf($_GET['valor']);
    
    
    if ($testcpf = mysqli_query($mysqli,"SELECT cpf,contacomigo FROM holder WHERE cpf = '$valor'")){
        if((mysqli_num_rows ($testcpf) < 1 )){
            echo "".'<button type="submit" class="btn btn-outline-primary" ><i class="fas fa-search"></i> Pesquisar</button><br />'."Portador não cadastrado no Conta Comigo";
            //Cleaning mysqli
            mysqli_free_result($testcpf);
            
        }else{
            $linha = mysqli_fetch_assoc($testcpf);
            $cpf = $linha["cpf"];
            $contacomigo = $linha["contacomigo"];
            
            if (($cpf == $valor)&&($contacomigo==1)) {
                echo "".'<button type="submit" class="btn btn-outline-primary" ><i class="fas fa-search"></i> Pesquisar</button><br />'."CPF Correto";
            } elseif ($cpf != $valor){
                echo "".'<button type="submit" class="btn btn-outline-primary" ><i class="fas fa-search"></i> Pesquisar</button><br />'."CPF Incorreto";
            } elseif (($cpf == $valor)&&($contacomigo==0)){
                echo "".'<button type="submit" class="btn btn-outline-primary" ><i class="fas fa-search"></i> Pesquisar</button><br />'."CPF Correto";
            }
        }
    } else { echo "CPF Incorreto";}
}
?>