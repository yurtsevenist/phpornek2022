<?php
   include('connect.php');
   $name=$_POST["name"];
   $email=$_POST["email"];
   $password=$_POST["password"];
   $confirm_password=$_POST["confirm_password"];
   if(strlen($password)<6)
   {
    
    echo "<script>
    alert('Şifreniz 6 Karakterden Küçük Olamaz');
    window.location.href='../panel/register.php';
    </script>";
   }
   if($password!=$confirm_password)
   {
    echo "<script>
    alert('Şifreniz aynı olmak zorunda');
    window.location.href='../panel/register.php';
    </script>";
   }
   $sorgu=$conn->query("SELECT * FROM users where email='$email' ",PDO::FETCH_ASSOC);
   if($sorgu->rowCount()>0)
   {
    echo "<script>
    alert('Bu eposta daha önce kullanılmıştır');
    window.location.href='../panel/register.php';
    </script>";
   }
   $hashpass = password_hash($password, PASSWORD_DEFAULT);
   $kayit=$conn->prepare("INSERT INTO users SET name=?, email=?, password=?");
   $kayit->execute(array($name,$email,$hashpass));
   echo "<script>
   alert('Kayıdınız Tamamlanmıştır Kullanıcı adı ve Şifreniz ile giriş yapabilirsiniz');
   window.location.href='../panel/login.php';
   </script>";
?>