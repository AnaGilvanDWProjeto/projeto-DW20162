<?php

require 'phpmailer/class.phpmailer.php';
require 'phpmailer/class.smtp.php';
require('phpmailer/PHPMailerAutoload.php');

#$dest_email = $_POST['dest_email'];
$mensagem = "";
$retorno = "";
$exibe = false;
 
    # Cria uma instância da classe
    $mail = new PHPMailer();
    # Define que a mensagem será enviada via servidor SMTP
    $mail->IsSMTP();
    # Aqui você deve informar o endereço do seu servidor SMTP
    $mail->Host = "smtp.live.com";
    # Ativa a autenticação
    $mail->SMTPAuth = true;
    # Aqui você deve informar o e-mail que será usado na autenticação
    $mail->Username = "rockera_rosa@hotmail.com";
    # Aqui você deve informar a senha que será usada na autenticação
    $mail->Password = "11129900aa";
    
    # Aqui você deve informar o número da porta (verifique as configurações do servidor SMTP informado)
    $mail->Port = 587;
    # E-mail do usuário que está enviando a mensagem 
    $mail->SMTPsecure= 'tls';
    $mail->From = 'rockera_rosa@hotmail.com';
    # Nome do usuário que está enviando a mensagem
    $mail->FromName = 'Gerenciador de usuários';
 
    # Adiciona o destinatário que receberá a mensagem (substitua pelo e-mail desejado)
    $mail->AddAddress($dest_email, 'principal');
    # Adiciona o destinatário que receberá uma cópia da mensagem (substitua pelo e-mail desejado)
    $mail->AddCC('rockera_rosa@hotmail.com', 'Contato'); 
    # Adiciona o destinatário oculto que receberá uma cópia da mensagem (substitua pelo e-mail desejado)
    $mail->AddBCC('rockera_rosa@hotmail.com', 'Contato');
 
    # Define que o e-mail será enviado no formato HTML
    $mail->IsHTML(true);
    # Define a codificação
    $mail->CharSet = 'utf-8';
 
    # Define o título da mensagem
    $mail->Subject  = "Backup Concluido";
    $mail->Body .= "Seu backup foi concluido com sucesso! ";
    $mail->Send();
    $mail->ClearAllRecipients();
    $mail->ClearAttachments();
?>
