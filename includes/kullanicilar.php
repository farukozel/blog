<?php
	$kullanici = mysql_query ("SELECT * FROM kullanicilar",$connection);
	if(!$kullanici){
		die ("Veritaban� Sorgu Hatas�: ".mysql_error());
	}
	echo "<table border=1 width=100%>";
		echo "<tr>";
			echo "<td align=center>Id</td>";  
			echo "<td align=center>Rol</td>"; 
			echo "<td align=center>Kullan�c� Ad�</td>";  
			echo "<td align=center>E-Posta</td>";  
			echo "<td>��lem</td>";
		echo "</tr>";
		while ($row = mysql_fetch_array($kullanici)) {
		$ID=$row["user_id"];
		echo "<tr>";
		//Y�netici - yazar Kontrol�
			echo "<td>".$row["user_id"]."</td>";
			if($row["user_rol"]==1){
				echo "<td >Y�netici</td>";
			}else{
				echo "<td>Yazar</td>";
			}
			echo "<td>".$row["user_name"]."</td>";  
			echo "<td>".$row["user_mail"]."</td>";
			
			echo "<td><a href=admin.php?a=duzenle&c=$ID >D�zenle</a> || <a href=admin.php?a=sil&c=$ID >Sil</a></td>";
		echo "</tr>";
		}
	echo "</table>";
?>