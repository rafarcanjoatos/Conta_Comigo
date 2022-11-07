<?php
// Session Start
require_once '../../structure_files/connection.php';

$selecthour = array();
$hour = array();

if ($_POST['id6'] == 1){
    $selecthour = $conexao->prepare("SELECT monday FROM doctors WHERE id_doctor ='".$_POST['id5']."'");
    $selecthour->execute();
    $fetchAll = $selecthour->fetchAll();
    foreach($fetchAll as $selecthour){
        $hour = unserialize($selecthour ['monday']);
        var_dump($hour);
    }
    $num_array = count($hour);
}
elseif ($_POST['id6'] == 2){
    $selecthour = $conexao->prepare("SELECT tuesday FROM doctors WHERE id_doctor ='".$_POST['id5']."'");
    $selecthour->execute();
    $fetchAll = $selecthour->fetchAll();
    foreach($fetchAll as $selecthour){
        $hour = unserialize($selecthour ['tuesday']);
        var_dump($hour);
    }
    $num_array = count($hour);
}
elseif ($_POST['id6'] == 3){
    $selecthour = $conexao->prepare("SELECT wednesday FROM doctors WHERE id_doctor ='".$_POST['id5']."'");
    $selecthour->execute();
    $fetchAll = $selecthour->fetchAll();
    foreach($fetchAll as $selecthour){
        $hour = unserialize($selecthour ['wednesday']);
        var_dump($hour);
    }
    $num_array = count($hour);
}
elseif ($_POST['id6'] == 4){
    $selecthour = $conexao->prepare("SELECT thursday FROM doctors WHERE id_doctor ='".$_POST['id5']."'");
    $selecthour->execute();
    $fetchAll = $selecthour->fetchAll();
    foreach($fetchAll as $selecthour){
        $hour = unserialize($selecthour ['thursday']);
        var_dump($hour);
    }
    $num_array = count($hour);
}
elseif ($_POST['id6'] == 5){
    $selecthour = $conexao->prepare("SELECT friday FROM doctors WHERE id_doctor ='".$_POST['id5']."'");
    $selecthour->execute();
    $fetchAll = $selecthour->fetchAll();
    foreach($fetchAll as $selecthour){
        $hour = unserialize($selecthour ['friday']);
        var_dump($hour);
    }
    $num_array = count($hour);
}
elseif ($_POST['id6'] == 6){
    $selecthour = $conexao->prepare("SELECT monday FROM doctors WHERE id_doctor ='".$_POST['id5']."'");
    $selecthour->execute();
    $fetchAll = $selecthour->fetchAll();
    foreach($fetchAll as $selecthour){
        $hour = unserialize($selecthour ['monday']);
        var_dump($hour);
    }
    $num_array = count($hour);
}
else {
    echo '<option value="0" selected disabled>N�o Possui Agenda 1</option>';
}

    if ($num_array > 0){
        echo '<option value="0" selected disabled>Selecionar...</option>';
        
        $count=0;
        while($count < $num_array){
        // Zero
        
            echo '<option value="'.$hour[$count].'">'.$hour[$count].'</option>';
            $count++;
        }
    } else { echo '<option value="0" selected disabled>N�o Possui Agenda 2</option>';}
?>