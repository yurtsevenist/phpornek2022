<?php
 try{
    include ("connect.php");
    $id=$_POST["id"];
    $email=$_POST['email'];
    $sorgu=$conn->query("SELECT * FROM users where email='$email'",PDO::FETCH_ASSOC);
   if($sorgu->rowCount()>0)
   {
      foreach($sorgu as $s)
      {
          $who=$s["who"];       
      }
      if($who==1)
      {
         $kayit=$conn->prepare("DELETE FROM contact WHERE id=?");
         $kayit->execute(array($id));
         echo "<script>
         alert('Seçilen Mesaj Silinmiştir');
         window.location.href='../panel/messages.php';
         </script>";
      }
      else
      {
         echo "<script>
         alert('Mesaj Silme Yetkiniz bulunmamaktadır');
         window.location.href='../panel/messages.php';
         </script>";
      }
   }
   else
   {
      echo "<script>
      alert('Böyle bir kullanıcı bulunamadı');
      window.location.href='../panel/messages.php';
      </script>";
   }
   
 }
 catch(Exception $e)
 {
    echo "<script>
    alert('Beklenmedik bir hata meydana geldi');
    window.location.href='../panel/messages.php';
    </script>";
 }
?>