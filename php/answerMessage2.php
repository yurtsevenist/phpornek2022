<?php
 try {
    include "connect.php";
$cevap=$_POST["cevap"];
$id=$_POST["id"];
$uemail=$_POST["uemail"];
$sorgu=$conn->query("SELECT * FROM users where email='$uemail'",PDO::FETCH_ASSOC);
if($sorgu->rowCount()>0)
{
   foreach($sorgu as $s)
   {
       $who=$s["who"];       
   }
   if($who==0)
   {
    echo "<script>
    alert('Mesaj Silme Yetkiniz bulunmamaktadır');
    window.location.href='../panel/messages.php';
    </script>";
   }
   else
   {
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
        $mail->Subject = "Mesajınıza Cevap Verilmiştir"; // Konu basligi
        $mail->Body = $cevap; // Mailin icerigi
        if(!$mail->Send()){
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
    $mail->ClearAddresses();
    $mail->ClearAttachments();
    }
   }
  

}
else
{
    echo "<script>
      alert('Böyle bir kullanıcı bulunamadı');
      window.location.href='../panel/messages.php';
      </script>";
}
 } catch (\Throwable $th) {
    echo "<script>
    alert('Beklenmedik bir hata meydana geldi');
    window.location.href='../panel/messages.php';
    </script>";
 }


?>
