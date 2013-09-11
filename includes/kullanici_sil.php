<?php ob_start(); ?>
<?php
	$id = $_GET["c"];
	$kullanici_sil = mysql_query("DELETE FROM `fozel_blog`.`kullanicilar` WHERE `kullanicilar`.`user_id` = $id",$connection);
	if(isset($kullanici_sil)){
			header("Location:http://blog.farukozel.net/admin.php?a=kullanici");
			exit;
		}else{
			echo "Bir Hata Oluþtu : ".mysql_error();
		}

?>
<?php ob_end_flush(); ?>