<?php
include ("connect.php");
$id=$_POST["id"];
$name=$_POST["name"];
$email=$_POST["email"];
$password=$_POST["password"];
$confirm_password=$_POST["confirm_password"];
$sorgu=$conn->query("SELECT * FROM users where id='$id'",PDO::FETCH_ASSOC);
if($sorgu->rowCount()>0)
{
    foreach($sorgu as $s)
    {
       
        $yemail=$s["email"];
        $yname=$s["name"];
    }
    if($yemail!=$email)
    {
        echo "<script>
        alert('E-Posta Adresinizi Değiştiremezsiniz');
        window.location.href='../panel/profile.php';
        </script>";

    }
    if($yname!=$name)
    {
        echo "<script>
        alert('Adınızı Soyadınızı Değiştiremezsiniz');
        window.location.href='../panel/profile.php';
        </script>";
    }
}
if(strlen($password)<6)
{ 
 echo "<script>
 alert('Şifreniz 6 Karakterden Küçük Olamaz');
 window.location.href='../panel/profile.php';
 </script>";
}
if($password!=$confirm_password)
{
 echo "<script>
 alert('Şifreniz aynı olmak zorunda');
 window.location.href='../panel/profile.php';
 </script>";
}
$hashpass = password_hash($password, PASSWORD_DEFAULT);
$kayit=$conn->prepare("UPDATE users SET password=? WHERE id = ?");
$kayit->execute(array($hashpass,$id));
echo "<script>
alert('Şifreniz Güncellenmiştir');
window.location.href='../panel/profile.php';
</script>";

?>