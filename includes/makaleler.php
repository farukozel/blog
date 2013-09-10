<?php
	//Ýçerik Sayfasý Makale Tablosu
	$makale = mysql_query ("SELECT * FROM makale",$connection);
	if(!$makale){
		die ("Veritabaný Sorgu Hatasý: ".mysql_error());
	}
	echo "<table border=1 width=100%>";
		echo "<tr>";
			echo "<td align=center>Id</td>";
			echo "<td>Makale Adý</td>";  
			echo "<td>Tarih</td>"; 
			echo "<td>Yazar</td>";  
			echo "<td>Ýþlem</td>";  
		echo "</tr>";
	while ($row1 = mysql_fetch_array($makale)) {
		echo "<tr>";
			echo "<td>".$row1["makale_id"]."</td>";
			echo "<td>".$row1["makale_ad"]."</td>";  
			echo "<td>".$row1["tarih"]."</td>";
			echo "<td>".$row1["yazar"]."</td>";
			echo "<td>Düzenle Sil</td>";
		echo "</tr>";
	}
	echo "</table>";
?>