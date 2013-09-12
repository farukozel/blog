<?php ob_start(); ?>
<?php
	$id2 = $_GET["c"];
	$makale_sil = mysql_query("DELETE FROM `fozel_blog`.`makale` WHERE `makale`.`makale_id` = $id2",$connection);
	if(isset($makale_sil)){
			header("Location:http://blog.farukozel.net/admin.php?a=makale");
			exit;
		}else{
			echo "Bir Hata Oluþtu : ".mysql_error();
		}

?>
<?php ob_end_flush(); ?>