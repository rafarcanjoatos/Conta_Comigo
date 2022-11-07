<?php 
//Function Test input
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//Clean CPF
function limpa_cpf($valor){
    $valor = trim($valor);
    $valor = str_replace(".", "", $valor);
    $valor = str_replace(",", "", $valor);
    $valor = str_replace("-", "", $valor);
    $valor = str_replace("/", "", $valor);
    $valor = ltrim($valor, '0');
    return $valor;
}

//Acrescenta Zero a Esquerda
function acrescentaZero($valor){
    
    $valor = str_pad($valor, 11, "0", STR_PAD_LEFT);      
    return $valor;
}

function insertInPosition($str, $pos, $c){
    return substr($str, 0, $pos) . $c . substr($str, $pos);
}

//Acrescenta Pontuacao
function acrescentaPontuacao($valor){
    if (strlen($valor)<14){
        $str = $valor;
        
        $str = insertInPosition($str, 3, '.');
        $str = insertInPosition($str, 7, '.');
        $str = insertInPosition($str, 11, '-');
        
        $valor = $str;
        return $valor;
    }
    else {    return $valor;}
}
?>