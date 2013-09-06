<?php
	session_start();
	if(!isset($_SESSION["giris"])){
		header("Location:http://blog.farukozel.net/index.php");
	}
?>
<?php include ("includes/connection.php");?>
<?php $icerik = $_GET["a"];?>
<?php include ("includes/header.php");?>
		<div id="orta">
			<div class="leftbar">
				<div class="menu">
				Menüler
				</div>
				<div class="icerik">
					<?php
						if($icerik == "kullanici"){
							//Ýçerik Sayfasý Kullanýcý Tablosu
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
								echo "<td>Düzenle Sil</td>";
								echo "</tr>";
							}
							echo "</table>";
//--------------------------------------------------------------------------------------------------------------------------------------------------
						}elseif($icerik == "makale"){
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
//-------------------------------------------------------------------------------------------------------------------------------------------------------
						}elseif($icerik == "kategori"){
							//içerik sayfasý kategori tablosu
							$kategori = mysql_query ("SELECT * FROM kategori",$connection);
							if(!$kategori){
								die("Veritabaný Sorgu Hatasý: ".mysql_error());
							}
							echo "<table border=1 width=100%>";
							echo "<tr>";
								echo "<td align=center>Id</td>";
								echo "<td>Kategori Adý</td>";   
								echo "<td>Ýþlem</td>";  
								echo "</tr>";
							while ($row2 = mysql_fetch_array($kategori)) {
								echo "<tr>";
								echo "<td>".$row2["kategori_id"]."</td>";
								echo "<td>".$row2["kategori_ad"]."</td>";  
								echo "<td>Düzenle Sil</td>";
								echo "</tr>";
							}
							echo "</table>";
//---------------------------------------------------------------------------------------------------------------------------------------------------------
						}elseif($icerik == "sayfa"){
							//içerik sayfasý sayfalar tablosu
							$sayfa = mysql_query ("SELECT * FROM sayfalar",$connection);
							if(!$sayfa){
								die ("Veritabaný Sorgu Hatasý: ".mysql_error());
							}
							echo "<table border=1 width=100%>";
							echo "<tr>";
								echo "<td align=center>Id</td>";
								echo "<td>Kategori Adý</td>";   
								echo "<td>Ýþlem</td>";  
								echo "</tr>";
							while ($row3 = mysql_fetch_array($sayfa));{
								echo "<tr>";
								echo "<td>".$row3["kategori_id"]."</td>";
								echo "<td>".$row3["kategori_ad"]."</td>";  
								echo "<td>Düzenle Sil</td>";
								echo "</tr>";
							}
							echo "</table>";
//-------------------------------------------------------------------------------------------------------------------------------------------------------
						}elseif($icerik == "makale_ekle"){
							//Makale Ekleme Sayfasýnýn Oluþturulmasý
							echo" 	<div class=makale_eklesol>  
										<div class=makaleadi> Makale Adý </div>
										<div class=kategoriadi> kategori </div>
										<div class=icerikadi> Ýçerik </div>
									</div>
									<div class=makale_eklesag>
											<form action=includes/makale_ekle.php id=usrform method=POST>
												<input class=makaleform1 type=text  name=makale_ad value=MakaleAdýnýGiriniz.. onclick=this.value=''; >";
														
													echo"<select name=kategori_sec class=option>";
													echo"<option value=Seçiniz.. selected> Seçiniz..</option>";
														$kategori = mysql_query ("SELECT * FROM kategori",$connection);
														if(!$kategori){
															die("Veritabaný Sorgu Hatasý: ".mysql_error());
														}
														while ($row2 = mysql_fetch_array($kategori)) {
															echo "<option value=\"".$row2["kategori_ad"]."\">".$row2["kategori_ad"]."</option>";
														}
								echo"					</select>";
								echo"			</input>";
								echo"		</form>";
								echo"		<textarea class=textarea rows=15 cols=73 name=makale_icerik onclick=this.value='' form=usrform> Makale Ýçeriðini Giriniz...</textarea>";
								echo"		<input class=makale_buton type=submit form=usrform value=Kaydet />";
																				
								echo "</div>";
								
						} elseif($icerik == "hosgeldiniz"){
							//Karþýlama Ekraný
							echo "<h1>Hoþgeldiniz</h1>";
						}	
//---------------------------------------------------------------------------------------------------------------------------------------------------------
					?>										
				</div>
			</div>
			<div class="rightbar">
				<div class="arama">
				Arama Yap
				</div>
				<div class="makale">Yönetim
					<ul>
						<?php 
							echo "<a href=\"admin.php?a=kullanici\">".Kullanýcýlar."</a><br>";
							echo "<a href=\"admin.php?a=makale\">".Makaleler."</a><br>";
							echo "<a href=\"admin.php?a=kategori\">".Kategoriler."</a><br>";
							echo "<a href=\"admin.php?a=sayfa\">".Sayfalar."</a><br>";
						?>
					</ul>
				</div>
				<div class="login">
				Makaleler 
					<ul>
						<?php
							echo "<a href=\"admin.php?a=makale_ekle\">"."Yeni Makale Ekle"."</a><br>";
							echo "<a href=\"admin.php?a=kullanici_ekle\">"."Yeni Kullanýcý Ekle"."</a><br>";
						?>
					</ul>
				</div>
			</div>
		</div>
	
<?php include ("includes/footer.php");?>