
<?php
	//��erik Sayfas� Makale Tablosu
	$makale = mysql_query ("SELECT * FROM makale ORDER BY makale_id ASC, tarih ASC",$connection);
	if(!$makale){
		die ("Veritaban� Sorgu Hatas�: ".mysql_error());
	}
	echo "<table border=1 width=100%>";
		echo "<tr>";
			echo "<td>"?> <form id="faruk" action="admin.php?a=makale_sil&c=<?php echo $ID2 ;?>"> <input type="checkbox" id="selectall"/> <?php "</td>";
			echo "<td align=center>Makale Id</td>";
			echo "<td>Tarih</td>"; 
			echo "<td>Kategori</td>"; 
			echo "<td>Makale Ad�</td>";  
			echo "<td>Olu�turan</td>";  
			echo "<td>��lem</td>";  
		echo "</tr>";
	while ($row1 = mysql_fetch_array($makale)) {
		$ID2=$row1["makale_id"];
		echo "<tr>";
			echo "<td>"?> <input type="checkbox" class="case" name="case" value="<?php echo $ID2 ;?>"/> <?php "</td>";
			echo "<td>".$row1["makale_id"]."</td>";
			echo "<td>".$row1["tarih"]."</td>";
			echo "<td> </td>";
			echo "<td>".$row1["makale_ad"]."</td>";  
			echo "<td>".$row1["yazar"]."</td>";
			echo "<td><a href=admin.php?a=makale_duzenle&c=$ID2 >D�zenle</a> || <a href=admin.php?a=makale_sil&c=$ID2 >Sil</a></td>";
		echo "</tr>";
	}
	echo "</table>";
?>
<input class="makale_buton" form="faruk" type="submit"  value="Se�ilileri Sil" /></form>
