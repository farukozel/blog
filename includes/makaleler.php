<?php
	//Ýçerik Sayfasý Makale Tablosu
	$makale = mysql_query ("SELECT * FROM makale",$connection);
	if(!$makale){
		die ("Veritabaný Sorgu Hatasý: ".mysql_error());
	}
	echo "<table border=1 width=100%>";
		echo "<tr>";
			echo "<td align=center>Id</td>";
			echo "<td>Tarih</td>"; 
			echo "<td>Makale Adý</td>";  
			echo "<td>Oluþturan</td>";  
			echo "<td>Ýþlem</td>";  
		echo "</tr>";
	while ($row1 = mysql_fetch_array($makale)) {
		$ID2=$row1["makale_id"];
		echo "<tr>";
			echo "<td>".$row1["makale_id"]."</td>";
			echo "<td>".$row1["tarih"]."</td>";
			echo "<td>".$row1["makale_ad"]."</td>";  
			echo "<td>".$row1["yazar"]."</td>";
			echo "<td><a href=admin.php?a=makale_duzenle&c=$ID2 >Düzenle</a> || <a href=admin.php?a=makale_sil&c=$ID2 >Sil</a></td>";
		echo "</tr>";
	}
	echo "</table>";
?>