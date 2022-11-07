<?php
// Session Start
require_once '../../structure_files/connection.php';
    
    $selectspecialty = $conexao->prepare("SELECT id_specialty,name FROM specialties WHERE id_company = '".$_POST['id1']."'");
    $selectspecialty->execute();
    
    $fetchAll = $selectspecialty->fetchAll();
    
        echo '<option value="0" selected disabled>Selecionar...</option>'; 
    foreach($fetchAll as $specialty){
        echo '<option value="'.$specialty['id_specialty'].'">'.$specialty['name'].'</option>';
    }
?>