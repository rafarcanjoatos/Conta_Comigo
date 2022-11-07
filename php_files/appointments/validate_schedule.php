<?php
// Session Start
require_once 'function.php';

// Defining Variables
$cpf_err = $date_err = $date_err2 = "";


if ($_SERVER["REQUEST_METHOD"] == "POST"){
    
    // Test if isnt empty
    if (!empty($_POST["cpf_schedule"])) {
        //Aplicate Function Test Input
        $cpf_schedule = test_input($_POST["cpf_schedule"]);
        $cpf_schedule = limpa_cpf($_POST["cpf_schedule"]);
        
        /////////// Search CPF in the database
        if ($result_cpf = mysqli_query($mysqli, "SELECT * FROM appointments WHERE `cpf` like '$cpf_schedule'")){
            $total_schedule = mysqli_num_rows($result_cpf);              
            
            //Email and Password = Invalid
            if($total_schedule == 0 ){
                $cpf_err = "CPF n�o cadastrado";
                //Cleaning mysqli
                mysqli_free_result($result_cpf);
            }else{
                //Defining Count
                $count = mysqli_num_rows($result_cpf);
                $count7 = $count8 = $count9 = $count10 = $count11 = $count12 = $count;
                
                while($linha = mysqli_fetch_assoc($result_cpf)){
                    $id_appointment[$count7] = ($linha["id_appointment"]);
                    $cpf_bd[$count7] = $linha["cpf"];
                    $id_hospital[$count7] = $linha["id_company"];
                    $id_doctor[$count7] = $linha["id_doctor"];
                    $date[$count7] = $linha["date"];
                    $start_hour[$count7] = $linha["start_hour"];
                    $end_hour[$count7] = $linha["end_hour"];
                    $is_confirmed[$count7] = $linha["is_confirmed"];
                    
                    $count7--;
                }
                //Cleaning mysqli
                mysqli_free_result($result_cpf);
            
            /////////// Search USER
            while ($count8>0){
                if ($result_user = mysqli_query($mysqli, "SELECT name, phone FROM holder WHERE `cpf` like '$cpf_bd[$count8]'")){
                    //Email and Password = Invalid
                    if((mysqli_num_rows ($result_user) < 1 )){
                        $date_err2 = "Nenhum Portador Encontrado";
                        //Cleaning mysqli
                        mysqli_free_result($result_user);
                    }else{
                        $linha_holder = mysqli_fetch_assoc($result_user);
                        $name_holder[$count8] = $linha_holder["name"];
                        $phone_holder[$count8] = $linha_holder["phone"];
                    }
                    //Cleaning mysqli
                    mysqli_free_result($result_user);
                }else{  echo "Falha na consulta do Portador"; exit();}
                $count8--;
            }
            
            
            /////////// Search Doctor
            while($count9>0){
                if ($result_doctor = mysqli_query($mysqli, "SELECT name,id_specialty FROM doctors WHERE `id_doctor` like '$id_doctor[$count9]'")){
                    //Email and Password = Invalid
                    if((mysqli_num_rows ($result_doctor) < 1 )){
                        $date_err2 = "Nenhum Doutor Encontrado";
                        //Cleaning mysqli
                        mysqli_free_result($result_doctor);
                    }else{
                        $linha_doctor = mysqli_fetch_assoc($result_doctor);
                        $name_doctor[$count9] = $linha_doctor["name"];
                        $id_specialty[$count9] = $linha_doctor["id_specialty"];
                    }
                    //Cleaning mysqli
                    mysqli_free_result($result_doctor);
                }else{  echo "Falha na consulta do Doutor"; exit();}
                $count9--;}
                
                
                /////////// Search Company
                while($count10>0){
                    if ($result_hospital = mysqli_query($mysqli, "SELECT company_name FROM company WHERE `id_company` like '$id_hospital[$count10]'")){
                        //Email and Password = Invalid
                        if((mysqli_num_rows ($result_hospital) < 1 )){
                            $date_err2 = "Nenhum Hospital Encontrado";
                            //Cleaning mysqli
                            mysqli_free_result($result_hospital);   
                        }else{
                            $linha_hospital = mysqli_fetch_assoc($result_hospital);
                            $name_hospital[$count10] = $linha_hospital["company_name"];
                        }
                        //Cleaning mysqli
                        mysqli_free_result($result_hospital);    
                    }else{  echo "Falha na consulta do Hospital"; exit();}
                    $count10--;}
                    
                    
                    /////////// Search Specialty
                    while($count11>0){
                        if ($result_specialty = mysqli_query($mysqli, "SELECT name FROM specialties WHERE `id_specialty` like '$id_specialty[$count11]'")){
                            //Email and Password = Invalid
                            if((mysqli_num_rows ($result_specialty) < 1 )){
                                $date_err2 = "Nenhuma Especialidade Encontrada";
                                //Cleaning mysqli
                                mysqli_free_result($result_specialty);
                            }else{
                                $linha_specialty = mysqli_fetch_assoc($result_specialty);
                                $specialty[$count11] = $linha_specialty["name"];
                            }
                            //Cleaning mysqli
                            mysqli_free_result($result_specialty);
                        }else{  echo "Falha na consulta da Especialidade"; exit();}
                        $count11--;}
                                                
                //Close Search in database
                }
                
            //Close Search in database
            }else{  echo "Falha na consulta do Banco"; exit();}
            
        //Close Else "Not Empty Consult in database"
        }else {
            $date_err = "Selecione a Data";
        }
        
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        
    // Test if isnt empty
    if (!empty($_POST["date_schedule"])) {
        
        
        //Aplicate Function Test Input
        $date_schedule = test_input($_POST["date_schedule"]);
        
        /////////// Search Date in the database
        if ($result_date = mysqli_query($mysqli, "SELECT * FROM appointments WHERE `date` like '$date_schedule'")){
            $total_schedule = mysqli_num_rows($result_date);
            
            //Email and Password = Invalid
            if($total_schedule == 0 ){
                $date_err2 = "Nenhum Registro Encontrado";
                //header('location: /../Sistema_ContaComigo/appointment_consult.php');
                //Cleaning mysqli
                mysqli_free_result($result_date);
                
            }else{
                //Defining Count
                $count = mysqli_num_rows($result_date);
                $count1 = $count2 = $count3 = $count4 = $count5 = $count6 = $count;
                while($linha = mysqli_fetch_assoc($result_date)){
                    $id_appointment[$count1] = ($linha["id_appointment"]);
                    $cpf_bd[$count1] = $linha["cpf"];
                    $id_hospital[$count1] = $linha["id_company"];
                    $id_doctor[$count1] = $linha["id_doctor"];
                    $date[$count1] = $linha["date"];
                    $start_hour[$count1] = $linha["start_hour"];
                    $end_hour[$count1] = $linha["end_hour"];
                    $is_confirmed[$count1] = $linha["is_confirmed"];
                    
                    $count1--;
                }
                
                //Cleaning mysqli
                mysqli_free_result($result_date);
                $x = 0;
            
            /////////// Search CPF
            while ($count2>0){
                if ($result_cpf = mysqli_query($mysqli, "SELECT name, phone FROM holder WHERE `cpf` like '$cpf_bd[$count2]'")){
                    //Email and Password = Invalid
                    if((mysqli_num_rows ($result_cpf) < 1 )){
                        $date_err2 = "Nenhum Portador Encontrado";
                        //Cleaning mysqli
                        mysqli_free_result($result_cpf);
                    }else{
                        $linha_holder = mysqli_fetch_assoc($result_cpf);
                        $name_holder[$count2] = $linha_holder["name"];
                        $phone_holder[$count2] = $linha_holder["phone"];
                    }
                    //Cleaning mysqli
                    mysqli_free_result($result_cpf);
                    }else{  echo "Falha na consulta do Portador"; exit();}
                $count2--;
            }
            
            
            /////////// Search Doctor
            while($count3>0){
                if ($result_doctor = mysqli_query($mysqli, "SELECT name,id_specialty FROM doctors WHERE `id_doctor` like '$id_doctor[$count3]'")){
                    //Email and Password = Invalid
                    if((mysqli_num_rows ($result_doctor) < 1 )){
                        $date_err2 = "Nenhum Doutor Encontrado";
                        //Cleaning mysqli
                        mysqli_free_result($result_doctor);
                    }else{
                        $linha_doctor = mysqli_fetch_assoc($result_doctor);
                        $name_doctor[$count3] = $linha_doctor["name"];
                        $id_specialty[$count3] = $linha_doctor["id_specialty"];                            
                    }
                    //Cleaning mysqli
                    mysqli_free_result($result_doctor);
                    }else{  echo "Falha na consulta do Doutor"; exit();}
                $count3--;}
                
                
            /////////// Search Company
            while($count4>0){
                if ($result_hospital = mysqli_query($mysqli, "SELECT company_name FROM company WHERE `id_company` like '$id_hospital[$count4]'")){
                    //Email and Password = Invalid
                    if((mysqli_num_rows ($result_hospital) < 1 )){
                        $date_err2 = "Nenhum Hospital Encontrado";
                        //Cleaning mysqli
                        mysqli_free_result($result_hospital);
                        
                    }else{
                        $linha_hospital = mysqli_fetch_assoc($result_hospital);
                        $name_hospital[$count4] = $linha_hospital["company_name"];
                    }
                    //Cleaning mysqli
                    mysqli_free_result($result_hospital);
                }else{  echo "Falha na consulta do Hospital"; exit();}
                $count4--;}
                

            /////////// Search Specialty
            while($count5>0){
                if ($result_specialty = mysqli_query($mysqli, "SELECT name FROM specialties WHERE `id_specialty` like '$id_specialty[$count5]'")){
                    //Email and Password = Invalid
                    if((mysqli_num_rows ($result_specialty) < 1 )){
                        $date_err2 = "Nenhuma Especialidade Encontrada";
                        //Cleaning mysqli
                        mysqli_free_result($result_specialty);
                    }else{
                        $linha_specialty = mysqli_fetch_assoc($result_specialty);
                        $specialty[$count5] = $linha_specialty["name"];
                    }
                    //Cleaning mysqli
                    mysqli_free_result($result_specialty);
                }else{  echo "Falha na consulta da Especialidade"; exit();}
                $count5--;
            }
            
        //Close Else
        }
                
        //Close Search in database
        }else{  echo "Falha na consulta do Banco"; exit();}
        
    //Close Else "Not Empty Consult in database"
    }else {
        $date_err = "Selecione a Data";
    }

//Close "IF HAVE POST"
}
?>