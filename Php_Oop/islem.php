<?php 
require_once 'baglan.php';
session_start();
ob_start();

if(isset($_POST['update']))
{

	$ıd=$_POST['ıd'] ;
$kayde=$db->prepare("UPDATE  proje set eposta=:mail,sifre=:s1,Update_at=:tarih where id={$_POST['ıd']}");

	$insert= $kayde->execute(array(
		's1'=>$_POST['sifre'],
		'mail'=>$_POST['mail'],
    'tarih'=>$_SESSION['tarihsaat'],
	));

	if ($insert) {
		header("Location:duzenle.php?durum=ok&&ıd=$ıd");
		exit;
	}
}

?>
