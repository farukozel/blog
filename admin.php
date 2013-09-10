<?php
	session_start();
	if(!isset($_SESSION["giris"])){
		header("Location:http://blog.farukozel.net/index.php");
	}

include ("includes/connection.php"); //Veritabaný baðlantýsýnýn aktarýlmasý
 
$kontrol = $_GET["b"];
	switch($kontrol){
		case "kullanici_ekle":
			include ("includes/kullanici_ekle.php");
		break;
		case "makale_ekle":
			include ("includes/makale_ekle.php");
		break;
	}
$icerik = $_GET["a"];
$id = $_GET["c"];
include ("includes/header.php"); //header.php sayfasýnýn aktarýlmasý
 
 ?>
		<div id="orta">
			<div class="leftbar">
				<div class="menu">
				Menüler
				</div>
				<div class="icerik">
					<?php
						switch ($icerik){
							case "kullanici":
								include ("includes/kullanicilar.php");
							break;
							case "makale":
								include ("includes/makaleler.php");
							break;
							case "kategori":
								include ("includes/kategoriler.php");
							break;
							case "sayfa":
								include ("includes/sayfalar.php");
							break;
							case "makale_ekle":
								include ("includes/makale_form.php");
							break;
							case "kullanici_ekle":
								include ("includes/kullanici_form.php");
							break;
							case "hosgeldiniz":
								include ("includes/karsilama.php");
							break;
							case "duzenle":
								include ("includes/kullanici_duzenle.php");
							break;
							case "kullanici_guncelle":
								include ("includes/kullanici_guncelle.php");
							break;
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
					<div class="baslik">Yönetim</div>
					<ul>
						<?php 
							echo "<li>";
							echo "<a href=\"admin.php?a=kullanici\">"."<h3>".Kullanýcýlar."</h3>"."</a>";
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
							echo "<a href=\"admin.php?a=cikis\">"."<h3>". Çýkýþ."</h3>"."</a>";
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
							echo "<a href=\"admin.php?a=kullanici_ekle\">"."<h3>Yeni Kullanýcý Ekle</h3>"."</a><br>";
							echo "</li>";
						?>
					</ul>
				</div>
			</div>
		</div>
	
<?php include ("includes/footer.php");?>