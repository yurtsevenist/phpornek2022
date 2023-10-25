<?php
include("connect.php");
$email=$_POST["email"];
$password=$_POST["password"];
$sorgu=$conn->query("SELECT * FROM users where email='$email'",PDO::FETCH_ASSOC);
if($sorgu->rowCount()>0)
{
     
    foreach($sorgu as $s)
    {
        $id=$s["id"];
        $name=$s["name"];
        $pass=$s["password"];
        $email=$s["email"];
        $who=$s["who"];
    }
    if (password_verify($password, $pass))
    {
        session_start();
        $_SESSION["id"]=$id;
        $_SESSION["name"]=$name;
        $_SESSION["email"]=$email;
        $_SESSION["who"]=$who;
        $_SESSION["access_key"]="abcd1234";   
        echo "<script>
        alert('Hoşgeldiniz');
        window.location.href='../panel/index.php';
        </script>";
    }
    else
    {
        echo "<script>
        alert('Şifreniz Hatalı');
        window.location.href='../panel/login.php';
        </script>";
    }
  
}
else
{
    echo "<script>
    alert('E-Posta veya Şifreniz Hatalı');
    window.location.href='../panel/login.php';
    </script>";
}
?>