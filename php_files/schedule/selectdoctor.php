<?php
// Session Start
require_once '../../structure_files/connection.php';

    $selectdoctor = $conexao->prepare("SELECT id_doctor,name,id_reg_consil,reg_consil_number,appointment_price FROM doctors WHERE id_specialty = '".$_POST['id3']."'");
    $selectdoctor->execute();
    
        $fetchAll = $selectdoctor->fetchAll();
        
            echo '<option value="0" selected disabled>Selecionar...</option>'; 
        foreach($fetchAll as $doctors){
            echo '<option value="'.$doctors['id_doctor'].'">'.$doctors['name'].'</option>';
        }
?>