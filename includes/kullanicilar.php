<?php
	$kullanici = mysql_query ("SELECT * FROM kullanicilar",$connection);
	if(!$kullanici){
		die ("Veritabaný Sorgu Hatasý: ".mysql_error());
	}
	echo "<table border=1 width=100%>";
		echo "<tr>";
			echo "<td align=center>Id</td>";  
			echo "<td align=center>Rol</td>"; 
			echo "<td align=center>Kullanýcý Adý</td>";  
			echo "<td align=center>E-Posta</td>";  
			echo "<td>Ýþlem</td>";
		echo "</tr>";
		while ($row = mysql_fetch_array($kullanici)) {
		$ID=$row["user_id"];
		echo "<tr>";
		//Yönetici - yazar Kontrolü
			echo "<td>".$row["user_id"]."</td>";
			if($row["user_rol"]==1){
				echo "<td >Yönetici</td>";
			}else{
				echo "<td>Yazar</td>";
			}
			echo "<td>".$row["user_name"]."</td>";  
			echo "<td>".$row["user_mail"]."</td>";
			
			echo "<td><a href=admin.php?a=duzenle&c=$ID >Düzenle</a> || <a href=admin.php?a=sil&c=$ID >Sil</a></td>";
		echo "</tr>";
		}
	echo "</table>";
?>