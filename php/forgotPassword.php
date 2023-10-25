<?php
try {
   include ("connect.php");
   $email=$_POST["email"];
   $sorgu=$conn->query("SELECT * FROM users where email='$email'",PDO::FETCH_ASSOC);
  if($sorgu->rowCount()>0)
  {
     $newpassword=rand(100000,999999);
     require "PHPMailer/inc/class.phpmailer.php"; // PHPMailer dosyamızı çağırıyoruz 
    
     $mail = new PHPMailer();   
     $mail->SMTPKeepAlive = true;   
     $mail->Mailer = "smtp"; // don't change the quotes!
     $mail->IsSMTP();
     $mail->SMTPDebug = 1; // hata ayiklama: 1 = hata ve mesaj, 2 = sadece mesaj
     $mail->SMTPAuth = true;
     $mail->SMTPSecure = 'ssl'; // Güvenli baglanti icin ssl normal baglanti icin tls
     $mail->Host = "mail.ihmtal.com"; // Mail sunucusuna ismi
     $mail->Port = 465; // Gucenli baglanti icin 465 Normal baglanti icin 587
     $mail->IsHTML(true);
     $mail->SetLanguage("tr", "phpmailer/language");
     $mail->CharSet  ="utf-8";
     $mail->Username = "sinav@ihmtal.com"; // Mail adresimizin kullanicı adi
     $mail->Password = "websinav2022"; // Mail adresimizin sifresi
     $mail->SetFrom("sinav@ihmtal.com", "İhsan Mermerci 11-B Sınıfı Web Grubu"); // Mail attigimizda gorulecek ismimiz
     $mail->AddAddress($email); // Maili gonderecegimiz kisi yani alici
     $mail->Subject = "Yeni Şifreniz :"; // Konu basligi
     $mail->Body = $newpassword; // Mailin icerigi
     if(!$mail->Send()){
         echo "<script>
             alert('$mail->ErrorInfo');
             window.location.href='../panel/forgot-password.php';
             </script>";
     
     } else {
        $hashpass = password_hash($newpassword, PASSWORD_DEFAULT);
        $kayit=$conn->prepare('UPDATE users SET password = ? WHERE email = ?');
        $kayit->execute(array($hashpass,$email));
         echo "<script>
             alert('Yeni Şifreniz E-Posta olarak gönderildi');
             window.location.href='../panel/login.php';
             </script>";
     }
  $mail->ClearAddresses();
  $mail->ClearAttachments();
  }
  else
  {
    echo "<script>
    alert('Bu E-Posta adresi sistemde kayıtlı değil');
    window.location.href='../panel/register.php';
    </script>";
  }
    
} catch (Exception $e) {
    echo "<script>
    alert('Beklenmedik bir hata meydana geldi');
    window.location.href='../panel/forgot-password.php';
    </script>";
}


?>