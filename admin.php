<?php
	session_start();
	if(!isset($_SESSION["giris"])){
		header("Location:http://blog.farukozel.net/index.php");
	}
?>
<?php include ("includes/connection.php");?>
<?php 
$icerik = $_GET["a"];
$kontrol = $_GET["b"];
	if($kontrol == "kullanici_ekle"){
		$kullanici_ad = $_POST["kullanici_ad"];
		$eposta =$_POST["eposta"];
		$sifre = $_POST["sifre"];
		$rol = $_POST["rol"];
		if (($kullanici_ad == "") or ($sifre == "") or ($rol == "")){ //kullan�c� ad�, �ifre ve rol alanlar� bo� girilirse hata mesaj� yay�nlar
			echo '<script type="text/javascript">alert("Bo� b�rakt���n�z alanlar var!");</script>';
			echo '<meta http-equiv="refresh" content="0;URL=http://blog.farukozel.net/admin.php?a=kullanici_ekle">';
		}else{
			$kullanici_sonuc = mysql_query("INSERT INTO kullanicilar(user_name,user_mail,user_pass,user_rol) VALUES ('$kullanici_ad','$eposta','$sifre','$rol')",$connection);
			if(isset($kullanici_sonuc)){
				header("Location:http://blog.farukozel.net/admin.php?a=kullanici");
			}else{
				echo "Bir Hata Olu�tu : ".mysql_error();
			}
		}
	}elseif($kontrol == "makale_ekle"){
		$gelen_yazar = $_SESSION["kullanici"];
		$makale_ad = $_POST["makale_ad"];
		$kategori_sec =$_POST["kategori_sec"];
		$makale_icerik = $_POST["makale_icerik"];
		if (($makale_ad == "") or ($kategori_sec == "") or ($makale_icerik == "")){ //kullan�c� ad�, �ifre ve rol alanlar� bo� girilirse hata mesaj� yay�nlar
			echo '<script type="text/javascript">alert("Bo� b�rakt���n�z alanlar var!");</script>';
			echo '<meta http-equiv="refresh" content="0;URL=http://blog.farukozel.net/admin.php?a=makale_ekle">';
		}else{
			$makale_sonuc = mysql_query("INSERT INTO makale(makale_ad,makale_icerik,yazar) VALUES ('$makale_ad','$makale_icerik','$gelen_yazar')",$connection);
			if(isset($makale_sonuc)){
				header("Location:http://blog.farukozel.net/admin.php?a=makale");
			}else{
				echo "Bir Hata Olu�tu : ".mysql_error();
			}
		}	
	}
?>
<?php include ("includes/header.php");?>
		<div id="orta">
			<div class="leftbar">
				<div class="menu">
				Men�ler
				</div>
				<div class="icerik">
					<?php
						if($icerik == "kullanici"){
							//��erik Sayfas� Kullan�c� Tablosu
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
								echo "<td>D�zenle Sil</td>";
								echo "</tr>";
							}
							echo "</table>";
//--------------------------------------------------------------------------------------------------------------------------------------------------
						}elseif($icerik == "makale"){
							//��erik Sayfas� Makale Tablosu
							$makale = mysql_query ("SELECT * FROM makale",$connection);
							if(!$makale){
								die ("Veritaban� Sorgu Hatas�: ".mysql_error());
							}
							echo "<table border=1 width=100%>";
							echo "<tr>";
								echo "<td align=center>Id</td>";
								echo "<td>Makale Ad�</td>";  
								echo "<td>Tarih</td>"; 
								echo "<td>Yazar</td>";  
								echo "<td>��lem</td>";  
								echo "</tr>";
							while ($row1 = mysql_fetch_array($makale)) {
								echo "<tr>";
								echo "<td>".$row1["makale_id"]."</td>";
								echo "<td>".$row1["makale_ad"]."</td>";  
								echo "<td>".$row1["tarih"]."</td>";
								echo "<td>".$row1["yazar"]."</td>";
								echo "<td>D�zenle Sil</td>";
								echo "</tr>";
							}
							echo "</table>";
//-------------------------------------------------------------------------------------------------------------------------------------------------------
						}elseif($icerik == "kategori"){
							//i�erik sayfas� kategori tablosu
							$kategori = mysql_query ("SELECT * FROM kategori",$connection);
							if(!$kategori){
								die("Veritaban� Sorgu Hatas�: ".mysql_error());
							}
							echo "<table border=1 width=100%>";
							echo "<tr>";
								echo "<td align=center>Id</td>";
								echo "<td>Kategori Ad�</td>";   
								echo "<td>��lem</td>";  
								echo "</tr>";
							while ($row2 = mysql_fetch_array($kategori)) {
								echo "<tr>";
								echo "<td>".$row2["kategori_id"]."</td>";
								echo "<td>".$row2["kategori_ad"]."</td>";  
								echo "<td>D�zenle Sil</td>";
								echo "</tr>";
							}
							echo "</table>";
//---------------------------------------------------------------------------------------------------------------------------------------------------------
						}elseif($icerik == "sayfa"){
							//i�erik sayfas� sayfalar tablosu
							$sayfa = mysql_query ("SELECT * FROM sayfalar",$connection);
							if(!$sayfa){
								die ("Veritaban� Sorgu Hatas�: ".mysql_error());
							}
							echo "<table border=1 width=100%>";
							echo "<tr>";
								echo "<td align=center>Id</td>";
								echo "<td>Kategori Ad�</td>"; 								
								echo "<td>��lem</td>";  
								echo "</tr>";
							while ($row3 = mysql_fetch_array($sayfa));{
								echo "<tr>";
								echo "<td>".$row3["kategori_id"]."</td>";
								echo "<td>".$row3["kategori_ad"]."</td>";
								echo "<td>D�zenle Sil</td>";
								echo "</tr>";
							}
							echo "</table>";
//-------------------------------------------------------------------------------------------------------------------------------------------------------
						}elseif($icerik == "makale_ekle"){
							//Makale Ekleme Sayfas�n�n Olu�turulmas�
							?> 	<div class="makale_eklesol">  
										<div class="makaleadi"> Makale Ad� </div>
										<div class="makaleadi"> Kategori </div>
										<div class="makaleadi"> ��erik </div>
								</div>
									<div class="makale_eklesag">
											<form action="admin.php?b=makale_ekle" id="usrform" method="POST">
												<input class="makaleform1" type="text"  name="makale_ad" value=" Makale Ad�n� Giriniz..."  onclick="this.value='';" >
														<?php
													echo"<select name=kategori_sec class=option>";
													echo"<option value=Se�iniz.. selected> Se�iniz..</option>";
														$kategori = mysql_query ("SELECT * FROM kategori",$connection);
														if(!$kategori){
															die("Veritaban� Sorgu Hatas�: ".mysql_error());
														}
														while ($row2 = mysql_fetch_array($kategori)) {
															echo "<option value=\"".$row2["kategori_ad"]."\">".$row2["kategori_ad"]."</option>";
														}
								echo"					</select>";
								echo"			</input>";
								echo"		</form>";
								echo"		<textarea class=textarea name=makale_icerik onclick=this.value='' form=usrform> Makale ��eri�ini Giriniz...</textarea>";
								echo"		<input class=makale_buton type=submit form=usrform value=Kaydet />";
																				
								echo "</div>";
								
						} elseif($icerik == "hosgeldiniz"){
							//Kar��lama Ekran�
							echo "<center>Ho�geldiniz</center>";
						}elseif ($icerik == "kullanici_ekle"){
							//Kullan�c� ekleme sayfas�
							?>
								<div class="makale_eklesol">  
									<div class="makaleadi"> Kullan�c� Ad� </div>
									<div class="makaleadi"> E-Posta </div>
									<div class="makaleadi"> �ifre </div>
									<div class="makaleadi"> Rol </div>
								</div>
								<div class="makale_eklesag">
									<form action="admin.php?b=kullanici_ekle" method="POST">
										<input class="kullaniciform" type="text"  name="kullanici_ad" value=" Kullan�c� Ad�n� Giriniz..."  onclick="this.value='';" > </input>
										<input class="kullaniciform" type="email"  name="eposta" value=" E-Posta Adresini Giriniz..."  onclick="this.value='';" > </input>
										<input class="kullaniciform" type="password"  name="sifre" > </input>
										<input class="radio" type="radio" name="rol" Value="1" >Y�netici</input>
										<input class="radio" type="radio" name="rol" Value="2" >Yazar</input>
										<input class="makale_buton" type="submit" value="Kaydet" />
									</form>											
								</div>
								<?php
						}
//---------------------------------------------------------------------------------------------------------------------------------------------------------
					?>
				</div>
			</div>
			<div class="rightbar">
				<div class="arama">
				Arama Yap
				</div>
				<div class="sagorta">
					<div class="baslik">Y�netim</div>
					<ul>
						<?php 
							echo "<li>";
							echo "<a href=\"admin.php?a=kullanici\">"."<h3>".Kullan�c�lar."</h3>"."</a>";
							echo "</li>";
							echo "<li>";
							echo "<a href=\"admin.php?a=makale\">"."<h3>".Makaleler."</h3>"."</a>";
							echo "</li>";
							echo "<li>";
							echo "<a href=\"admin.php?a=kategori\">"."<h3>".Kategoriler."</h3>"."</a>";
							echo "</li>";
							echo "<li>";
							echo "<a href=\"admin.php?a=sayfa\">"."<h3>".Sayfalar."</h3>"."</a>";
							echo "</li>";
							echo "<li>";
							echo "<a href=\"admin.php?a=ayar\">"."<h3>".Ayarlar."</h3>"."</a>";
							echo "</li>";
							echo "<li>";
							echo "<a href=\"admin.php?a=cikis\">"."<h3>". ��k��."</h3>"."</a>";
							echo "</li>";
						?>
					</ul>
				</div>
				<div class="sagalt">
				<div class="baslik"> Makaleler </div>
					<ul>
						<?php
							echo "<li>";
							echo "<a href=\"admin.php?a=makale_ekle\">"."<h3>Yeni Makale Ekle</h3>"."</a><br>";
							echo "</li>";
							echo "<li>";
							echo "<a href=\"admin.php?a=kullanici_ekle\">"."<h3>Yeni Kullan�c� Ekle</h3>"."</a><br>";
							echo "</li>";
						?>
					</ul>
				</div>
			</div>
		</div>
	
<?php include ("includes/footer.php");?>