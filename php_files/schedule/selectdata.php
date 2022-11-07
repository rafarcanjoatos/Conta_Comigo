<?php
// Session Start
require_once '../../structure_files/connection.php';

    $selectdata = $conexao->prepare("SELECT available_day FROM doctors WHERE id_doctor = '".$_POST['id4']."'");
    $selectdata->execute();
        
        $fetchAll = $selectdata->fetchAll();
        
            echo '<option value="0" selected disabled>Selecionar...</option>'; 
        foreach($fetchAll as $selectdata){
            
            // Zero
            if ($selectdata['available_day'] == 0){
                echo '<option value="'.$selectdata['available_day'].'" selected disabled>'.
                    "Sem datas dispon�veis"
                .'</option>';
            }
            
            // Monday
            if ($selectdata['available_day'] == 1){
                echo '<option value="'.$selectdata['available_day'].'">'.
                    date('d-m-Y', strtotime(('next Monday').('+1 week'))) ."<br>"
                .'</option>';
                echo '<option value="'.$selectdata['available_day'].'">'.
                    date('d-m-Y', strtotime(('next Monday').('+2 week'))) ."<br>"
                .'</option>';
            }
            
            // Tuesday
            if ($selectdata['available_day'] == 2){
                echo '<option value="'.$selectdata['available_day'].'">'.
                    date('d-m-Y', strtotime(('next Tuesday').('+1 week'))) ."<br>"
                .'</option>';
                echo '<option value="'.$selectdata['available_day'].'">'.
                    date('d-m-Y', strtotime(('next Tuesday').('+2 week'))) ."<br>"
                .'</option>';
            }
            
            // Wednesday
            if ($selectdata['available_day'] == 3){
                echo '<option value="'.$selectdata['available_day'].'">'.
                    date('d-m-Y', strtotime(('next Wednesday').('+1 week'))) ."<br>"
                .'</option>';
                echo '<option value="'.$selectdata['available_day'].'">'.
                    date('d-m-Y', strtotime(('next Wednesday').('+2 week'))) ."<br>"
                .'</option>';
            }
            
            // Thursday
            if ($selectdata['available_day'] == 4){
                echo '<option value="'.$selectdata['available_day'].'">'.
                    date('d-m-Y', strtotime(('next Thursday').('+1 week'))) ."<br>"
                .'</option>';
                echo '<option value="'.$selectdata['available_day'].'">'.
                    date('d-m-Y', strtotime(('next Thursday').('+2 week'))) ."<br>"
                .'</option>';
            }
            
            // Friday
            if ($selectdata['available_day'] == 5){
                echo '<option value="'.$selectdata['available_day'].'">'.
                    date('d-m-Y', strtotime(('next Friday').('+1 week'))) ."<br>"
                .'</option>';
                echo '<option value="'.$selectdata['available_day'].'">'.
                    date('d-m-Y', strtotime(('next Friday').('+2 week'))) ."<br>"
                .'</option>';
            }
            
            // All Days
            if ($selectdata['available_day'] == 6){
                echo '<option value="'.$selectdata['available_day'].'">'.
                    date('d-m-Y', strtotime(('next Monday').('+1 week'))) ."<br>"
                .'</option>';
                echo '<option value="'.$selectdata['available_day'].'">'.
                    date('d-m-Y', strtotime(('next Tuesday').('+1 week'))) ."<br>"
                .'</option>';
                echo '<option value="'.$selectdata['available_day'].'">'.
                    date('d-m-Y', strtotime(('next Wednesday').('+1 week'))) ."<br>"
                .'</option>';
                echo '<option value="'.$selectdata['available_day'].'">'.
                    date('d-m-Y', strtotime(('next Thursday').('+1 week'))) ."<br>"
                .'</option>';
                echo '<option value="'.$selectdata['available_day'].'">'.
                    date('d-m-Y', strtotime(('next Friday').('+1 week'))) ."<br>"
                .'</option>';
            }
        }  
?>