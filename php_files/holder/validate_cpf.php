<?php
// Defining Variables
$cpf_err = "";

require_once 'function.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){    
    
    // Test if is not empty
    if (!empty($_POST["cpf_schedule"])) {
            //Aplicate Function Test Input
            $cpf_schedule = $_POST["cpf_schedule"];
            
            $data = $cpf_schedule;
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            $data = trim($data);
            $data = str_replace(".", "", $data);
            $data = str_replace(",", "", $data);
            $data = str_replace("-", "", $data);
            $data = str_replace("/", "", $data);
            $data = ltrim($data, '0');
          
            $cpf_schedule = $data;
        
            // Importa dados do portador
            if ($result_cpf = mysqli_query($mysqli, "SELECT * FROM holder WHERE `cpf` like '$cpf_schedule'")){
                
                    //Email and Password = Invalid
                    if((mysqli_num_rows ($result_cpf) < 0 )){
                        $date_err2 = "Nenhum Portador Encontrado";
                        mysqli_free_result($result_cpf);
                    }else{
                        $linha_holder = mysqli_fetch_assoc($result_cpf);
                        $name_holder = $linha_holder["name"];
                        $phone_holder = $linha_holder["phone"];
                        $contacomigo = $linha_holder["contacomigo"];
                    }
                    mysqli_free_result($result_cpf);
                    
            //Close Search in database
            }else{  echo "Falha na consulta do Portador"; exit();}
      
    //Close "IF VOID POST"
    }else { $cpf_err = "Digite o CPF";}

//Close "IF HAVE POST"
}else{}
?>