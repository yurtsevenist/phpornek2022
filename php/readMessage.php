<?php
try
{
    include ("connect.php");
    $id=$_POST["id"];
    $status=1;
    $kayit=$conn->prepare("UPDATE contact SET status=? WHERE id = ?");
    $kayit->execute(array($status,$id));
    echo "<script>
    alert('Mesaj Okundu olarak güncellenmiştir');
    window.location.href='../panel/messages.php';
    </script>";
}
catch(Exception $e)
{
    echo "<script>
    alert('Beklenmedik bir hata meydana geldi');
    window.location.href='../panel/messages.php';
    </script>";
}
?>