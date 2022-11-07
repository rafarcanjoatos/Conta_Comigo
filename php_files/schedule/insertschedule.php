<?php

require_once '../../structure_files/connection.php';
require_once '../../structure_files/link.php';
require_once 'function.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $cpf = limpa_cpf($_POST['cpf']);
    $hospital = $_POST['hospital'];
    $doctor = $_POST['doctors'];
    $date = $_POST['date_text'];
    $hour = $_POST['hour'];
    $is_confirmed = "2";
    
    //echo $cpf." , ".$hospital." , ".$doctor." , ".$date." , ".$hour;
    
    //Update Confirm
    $stmt = $conexao->prepare("INSERT INTO appointments (cpf, id_company, id_doctor, date, start_hour, end_hour, is_confirmed) VALUES (?,?,?,?,?,?,?)");
    
    try {
        //passa as  vari�veis para preencher os pontos de interroga��o
        //o parametro 's' significa que voc� est� passando uma string. � como um printf...
        $stmt->bindParam(1, $cpf);
        $stmt->bindParam(2, $hospital);
        $stmt->bindParam(3, $doctor);
        $stmt->bindParam(4, $date);
        $stmt->bindParam(5, $hour);
        $stmt->bindParam(6, $hour);
        $stmt->bindParam(7, $is_confirmed);
        
        //executa o statement
        $stmt->execute();
        ?> <script>window.location.replace("../../schedule_confirmation.php");</script> <?php 
    }
    catch (PDOException $erro){
        echo "Não foi possivel inserir os dados no banco: ".$erro->getMessage();
    }
}
?>