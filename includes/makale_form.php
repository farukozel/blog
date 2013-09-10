<?php
//Makale Ekleme Sayfasýnýn Oluþturulmasý
?> 	<div class="makale_eklesol">  
		<div class="makaleadi"> Makale Adý </div>
		<div class="makaleadi"> Kategori </div>
		<div class="makaleadi"> Ýçerik </div>
	</div>
	<div class="makale_eklesag">
		<form action="admin.php?b=makale_ekle" id="usrform" method="POST">
			<input class="makaleform1" type="text"  name="makale_ad" value=" Makale Adýný Giriniz..."  onclick="this.value='';" >
<?php
				echo"<select name=kategori_sec class=option>";
					echo"<option value=Seçiniz.. selected> Seçiniz..</option>";
				$kategori = mysql_query ("SELECT * FROM kategori",$connection);
				if(!$kategori){
					die("Veritabaný Sorgu Hatasý: ".mysql_error());
				}
				while ($row2 = mysql_fetch_array($kategori)) {
					echo "<option value=\"".$row2["kategori_ad"]."\">".$row2["kategori_ad"]."</option>";
				}
				echo"</select>";
		echo"</input>";
	echo"</form>";
		echo"<textarea class=textarea name=makale_icerik onclick=this.value='' form=usrform> Makale Ýçeriðini Giriniz...</textarea>";
		echo"<input class=makale_buton type=submit form=usrform value=Kaydet />";
echo"</div>";
?>