<?php 
include ("connection.php");
$makale_ad = $_POST["makale_ad"];
$kategori_sec =$_POST["kategori_sec"];
$makale_icerik = $_POST["makale_icerik"];
$makale_sonuc = mysql_query("INSERT INTO makale(makale_ad,makale_icerik) VALUES ('$makale_ad','$makale_icerik')",$connection);
if(isset($makale_sonuc)){
	header("Location:http://blog.farukozel.net/admin.php?a=makale");
}else{
	echo "Bir Hata Oluştu : ".mysql_error();
}
?>