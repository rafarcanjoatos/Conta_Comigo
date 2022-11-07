<?php
// Session Start
require_once '../../structure_files/connection.php';

	$update_err = "";

    ///////// Confirm Schedule
    $id_appointment_update = ($_POST["idAppointment"]);
    
    //Update Confirm
    $result_isconfirmed = mysqli_query($mysqli, "UPDATE appointments SET is_confirmed = '1' WHERE appointments.id_appointment = '$id_appointment_update'");
?>