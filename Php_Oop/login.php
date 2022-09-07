<?php 
require_once 'baglan.php';
date_default_timezone_set('Europe/Istanbul'); 
session_start();
ob_start();
$_SESSION['tarihsaat']=date("Y-m-d h:i:s");
class Kullanici{
public function kullanicisorgu($eposta,$db):int
{
 $giris=$db->prepare("Select * from proje where  eposta=:mail");

	$giris->execute(array(
		
		
		'mail'=>$eposta,

	));
	$bilgilercek=$giris->fetch(PDO::FETCH_ASSOC);
	$_SESSION['id']=$bilgilercek['id'];
	$say=$giris->rowCount();
return $say;
}

public function kullanicisorgulogin($eposta,$db,$sifre):int
{
 $giris=$db->prepare("Select * from proje where  eposta=:mail && sifre=:sifre");

	$giris->execute(array(
		
		
		'mail'=>$eposta,
'sifre'=>$sifre,

	));
	$bilgilercek=$giris->fetch(PDO::FETCH_ASSOC);
	$_SESSION['id']=$bilgilercek['id'];
	$say=$giris->rowCount();
return $say;
}

public function kayıtol($sifre,$eposta,$tarih,$db)
{
$kayde=$db->prepare("INSERT into proje set sifre=:sifre,eposta=:mail,tarih=:tarih");

	$insert= $kayde->execute(array(
		
		'sifre'=>$sifre,
		'mail'=>$eposta,
         'tarih'=>$tarih,

	));

	if ($insert) {
		header("Location:Deneme.php?$ıd");
		exit;
	}
	else {
			echo "Kullanıcı kayıtlı";
	}
}

}
if(isset($_POST['ekle']))
{
	$kayıt= new Kullanici();
	$say=$kayıt->kullanicisorgu($_POST['mail'],$db);
	if($say==1){
	
	$kayıt->kayıtol($_POST['sifre'],$_POST['mail'],$_SESSION['tarihsaat'],$db);

	if ($insert) {
		header("Location:Deneme.php?$ıd");
		exit;
	}
	}
	else {
			echo "Kullanıcı kayıtlı";
	}
}
if(isset($_POST['giris']))
{
$login=new Kullanici();
$say=$login->kullanicisorgulogin($_POST['mail'],$db,$_POST['sifre']);

	if ($say>0) {
		
		header("Location:Deneme.php?$ıd");
		exit;
	}
	else {
		header("Location:Giris_sayfa.php");
	}
}
if(isset($_POST['update']))
{

 $update=new Kullanici();
 $update->Update($_POST['ıd'],$_POST['mail'],$_POST['sifre'],$db);

}
?>