<?php 
require_once 'baglan.php';
require_once 'islem.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>	Crud İŞLEMLER</title>
</head>
<body>
 <h1>Veri Tabanı Düzenleme İslemleri</h1>
 <hr>
 <?php
$bilgilersor=$db->prepare("Select * from proje where id=:id ");
$bilgilersor->execute(array(
  'id' => $_GET['ıd']
));
$bilgilercek=$bilgilersor->fetch(PDO::FETCH_ASSOC);
?>
<form action="login.php" required="" method="POST">
  Mail: <input type="email" name="mail" required=""value="<?php echo $bilgilercek['eposta']; ?>">
  Sifre: <input type="text" name="sifre" required=""value="<?php echo $bilgilercek['sifre']; ?>">
  <input type="hidden" value="<?php echo $bilgilercek['id'];?>" name="ıd" >
  <button type="submit" name="update">Formu Gönder</button>
</form>
<br>