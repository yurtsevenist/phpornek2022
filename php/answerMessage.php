<?php

include "connect.php";
$cevap=$_POST["cevap"];
$id=$_POST["id"];
$sorgu=$conn->prepare("SELECT * FROM contact WHERE id=?");
$sorgu->execute(array($id));
if($sorgu->rowCount()>0)
{
    foreach($sorgu as $satir)
    {       
        $email=$satir["email"];   
                   
    }
    $status=2;
    $kayit=$conn->prepare('UPDATE contact SET status = ? WHERE id = ?');
    $kayit->execute(array($status,$id));     
    require "PHPMailer/inc/class.phpmailer.php"; // PHPMailer dosyamızı çağırıyoruz     
    $phpmailer = new PHPMailer();
    $phpmailer->isSMTP();
    $phpmailer->Host = 'smtp.mailtrap.io';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = 2525;
    $phpmailer->Username = '1b6de7406b831c';
    $phpmailer->Password = '813c1cc4dbe19b'; 
    $phpmailer->SMTPDebug = 1; // hata ayiklama: 1 = hata ve mesaj, 2 = sadece mesaj    
    $phpmailer->IsHTML(true);
    $phpmailer->SetLanguage("tr", "phpmailer/language");
    $phpmailer->CharSet  ="utf-8";    
    $phpmailer->SetFrom("info@ihmtal.com", "İhsan Mermerci Web Grubu"); // Mail attigimizda gorulecek ismimiz
    $phpmailer->AddAddress($email); // Maili gonderecegimiz kisi yani alici
    $phpmailer->Subject = "Mesajınıza Cevap Verilmiştir"; // Konu basligi
    $phpmailer->Body = $cevap; // Mailin icerigi
        if(!$phpmailer->Send()){
            echo "<script>
                alert('$mail->ErrorInfo');
                window.location.href='../panel/messages.php';
                </script>";
        
        } else {
            echo "<script>
                alert('E-Posta Gönderildi');
                window.location.href='../panel/messages.php';
                </script>";
        }
    $phpmailer->ClearAddresses();
    $phpmailer->ClearAttachments();
    }

?>