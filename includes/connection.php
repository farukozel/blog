<?php
	$connection =mysql_connect("localhost","fozel_blog","Fo98@*11");
	if(!$connection){
		die("Veritabanýna Baðlanýlamadý: ".mysql_error());
	}
	$db_select = mysql_select_db("fozel_blog",$connection);
	if(!$db_select){
		die("Veritabaný Tablo Seçim Hatasý: ".mysql_error());
	}
?>