<?php   
// Inclui o arquivo class.phpmailer.php localizado na mesma pasta do arquivo php 
require_once "PHPMailer-master/PHPMailerAutoload.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    // Test if is empty
    if (empty($_POST["company"])) {
        $email_err = "Digite seu email";
    } else {            
        //Aplicate Function Test Input
        $email = ($_POST["email"]);
        $name = ($_POST["name"]);
        $phone = ($_POST["phone"]);
        $company = ($_POST["company"]);
            
        // Inicia a classe PHPMailer 
        $mail = new PHPMailer(); 
        
        // M�todo de envio 
        $mail->IsSMTP();
        
        // Servidor SMTP
        $mail->Host = 'smtp.gmail.com';
        
        // Voc� pode alterar este parametro para o endere�o de SMTP do seu provedor 
        $mail->Port = 465; 
        
        // Tipo de encripta��o que ser� usado na conex�o SMTP
        $mail->SMTPSecure = 'ssl';
        
        // Usar autentica��o SMTP (obrigat�rio) 
        $mail->SMTPAuth = true; 
        
        // Usu�rio do servidor SMTP (endere�o de email) 
        // obs: Use a mesma senha da sua conta de email 
        $mail->Username = 'rafarcanjo0110@gmail.com'; 
        $mail->Password = 'Rafael0110';
        
        // Configura��es de compatibilidade para autentica��o em TLS 
        //$mail->SMTPOptions = array( 'ssl' => array( 'verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true ) ); 
        
        // Voc� pode habilitar esta op��o caso tenha problemas. Assim pode identificar mensagens de erro. 
        $mail->SMTPDebug = 2; 
        
        // Define o remetente 
        // Seu e-mail 
        $mail->From = "rafarcanjo0110@gmail.com"; 
        
        // Seu nome 
        $mail->FromName = "Conta Comigo"; 
        
        // Define o(s) destinat�rio(s) 
        $mail->AddAddress('rafarcanjoatos@gmail.com', 'Rafael Arcanjo'); 
        
        // Formato HTML . Use "false" para enviar em formato texto simples ou "true" para HTML.
        $mail->IsHTML(true); 
        
        // Charset (opcional) 
        $mail->CharSet = 'UTF-8'; 
        
        // Assunto da mensagem 
        $mail->Subject = "Assunto da mensagem"; 
        
        // Corpo do email 
        $mail->Body = 'O Hospital '.$company.' esqueceu a senha de acesso.<br/>Nome: '.$name.'<br/>Email: '.$email.'<br/>Telefone: '.$phone; 
        
        // Envia o e-mail 
        $enviado = $mail->Send(); 
        
        // Exibe uma mensagem de resultado 
        if ($enviado){ 
            header('location: ../../change_submitted.php');
        } else { 
            echo "Houve um erro enviando o email: ".$mail->ErrorInfo; 
        }
    }
}
?>