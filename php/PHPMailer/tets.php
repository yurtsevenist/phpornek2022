<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
function mailgonder(){
         require "inc/class.phpmailer.php"; // PHPMailer dosyamızı çağırıyoruz  
         $mail = new PHPMailer();   
         $mail->IsSMTP();
         $mail->From     = "deneme@mesutd.com"; //Gönderen kısmında yer alacak e-mail adresi  
         $mail->Sender   = "deneme@mesutd.com";  
         $mail->FromName = "Web Mesaj";  
         $mail->Host     = "mail.mesutd.com"; //SMTP server adresi  
         $mail->SMTPAuth = true;  
         $mail->Username = "deneme@mesutd.com"; //SMTP kullanıcı adı  
         $mail->Password = "*****"; //SMTP şifre  
		 $mail->SMTPSecure="";
         $mail->Port = "587";
         $mail->CharSet = "utf-8";
         $mail->WordWrap = 50;  
         $mail->IsHTML(true); //Mailin HTML formatında hazırlanacağını bildiriyoruz.  
         $mail->Subject  = "Konu";

         $mail->Body = "mesaj";  
         $mail->AltBody = strip_tags("mesaj");
         $mail->AddAddress("deneme@mesutd.com"); 
         return ($mail->Send())?true:false;      
         $mail->ClearAddresses();  
         $mail->ClearAttachments();
}

if(mailgonder()) echo "başarılı";
else echo "olmadı";


?>
</body>
</html>