<?php
// Session Start
require_once '../../structure_files/connection.php';

	$update_err = "";

    //Aplicate Function Test Input
    $id_appointment_update = ($_POST["idAppointment"]);
    
    //Update Porstpone
    if ($result_isconfirmed = mysqli_query($mysqli, "UPDATE appointments SET is_confirmed = '2' WHERE appointments.id_appointment = '$id_appointment_update'")){
    }else{$update_err = "No Update 2";}
?>