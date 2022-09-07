<?php 
try {
	$db=new PDO("mysql:host=127.0.0.1;dbname=udemy_ders","root");
//echo "Bağlantı başarılı";
	
} catch (PDOException $e ) {
	echo $e->getmessage();
}


?>