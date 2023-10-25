<?php
  try
  {
    include('connect.php');
    $name=$_POST["name"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $message=$_POST["message"];
    $kayit=$conn->prepare("INSERT INTO contact SET name=?, email=?, phone=?, message=?");
    $kayit->execute(array($name,$email,$phone,$message));
    echo "<script>
    alert('Mesajınız alınmıştır. En kısa sürede mesajınıza geri dönüş yapılacaktır. Teşşekkür ederiz.');
    window.location.href='../contact.php';
    </script>";
  }
  catch(Exception $e)
  {
    echo "<script>
    alert('Bir Hata meydana geldi Lütfen daha sonra tekrar deneyiniz.');
    window.location.href='../contact.php';
    </script>";
  } 
?>