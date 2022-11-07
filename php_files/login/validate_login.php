<?php
session_start();

// Session Start
require_once 'function.php';

// Defining Variables
$email_err = $password_err = "";
$email = $password = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        // Test if is empty
        if (empty($_POST["email"])) {
            $email_err = "Digite seu email";
        } else {
        if (empty($_POST["password"])) {
            $password_err = "Digite sua senha";
        } else {

            $password = $_POST["password"];
            $email = $_POST["email"];
    
            // Login Validation
            if (($result_email = mysqli_query($mysqli, "SELECT * FROM users WHERE `email` like '$email'"))&&($result_password = mysqli_query($mysqli, "SELECT * FROM users WHERE `password` like '$password'"))){
                
                //Email and Password = Invalid
                if((mysqli_num_rows ($result_email) < 1 )&&(mysqli_num_rows ($result_password) < 1 )){
                    unset ($_SESSION["email"]);
                    unset ($_SESSION["password"]);
                    $email_err = "Email Incorreto";
                    $password_err = "Senha Incorreta";
                    
                    //Cleaning mysqli
                    mysqli_free_result($result_email);
                    mysqli_free_result($result_password);
                }
                else{
                        //Validation of Email
                        if((mysqli_num_rows ($result_email) > 0)){
                            $_SESSION["email"] = $email;
                            
                                //Validation of Password
                                if(mysqli_num_rows ($result_password) > 0 ){
                                    $_SESSION["password"] = $password;
                                    $_SESSION["autenticado"] = 1;
                                    
                                    //Redirect to Home -> Login Success
                                    echo '<script>window.location.replace("index.php");</script>';
                                }
                                else{
                                    unset ($_SESSION['email']);
                                    unset ($_SESSION['password']);
                                    $password_err = "Senha Incorreta";
                                    
                                    // Cleaning mysqli
                                    mysqli_free_result($result_email);
                                    mysqli_free_result($result_password);
                                }                
                        }
                        else{
                            unset ($_SESSION['email']);
                            unset ($_SESSION['password']);
                            $email_err = "Email Incorreto";                  
                              
                            // Cleaning mysqli
                            mysqli_free_result($result_email);
                        }
                }
            }else{
                echo "Falha na consulta do banco"; exit();
            }
        }
        }
    }
?>