<?php
	session_start();
	include ("includes/connection.php");
	if($_POST){ // Form Düðmesine týklanýnca alttaki iþlemleri yapan sorgu.
		$gelen_kullanici=$_POST["ad"];
		$gelen_sifre = $_POST["sifre"];
		if (($gelen_kullanici == "") or ($gelen_sifre == "")){ //kullanýcý adý ve þifre boþ girilirse hata mesajý yayýnlar
			echo '<script type="text/javascript">alert("Boþ býraktýðýnýz alanlar var!");</script>';
			echo '<meta http-equiv="refresh" content="0;URL=http://blog.farukozel.net/index.php">';
		}else{
			$giris = mysql_query ("SELECT * FROM kullanicilar WHERE user_name = '$gelen_kullanici' and user_pass = '$gelen_sifre' and user_rol",$connection);
			if(mysql_num_rows($giris)==1){
				$_SESSION["giris"] = "true";
				$_SESSION["kullanici"] = $gelen_kullanici;
				$_SESSION["sifre"] = $gelen_sifre;
				echo '<script type="text/javascript">alert("Baþarýyla giriþ yaptýnýz! Yönlendirileceksiniz...");</script>';
				echo '<meta http-equiv="refresh" content="0;URL=http://blog.farukozel.net/admin.php?a=hosgeldiniz">';
			}else{
				echo '<script type="text/javascript">alert("Kullanýcý adý veya þifreniz yanlýþ!");</script>';
				echo '<meta http-equiv="refresh" content="0;URL=index.php">';
			}
		}
	}
?>
<?php include ("includes/header.php");?>
		<div id="orta">
			<div class="leftbar">
				<div class="menu">
				Menüler
				</div>
				<div class="icerik"> Ýçerik
				</div>
			</div>
			<div class="rightbar">
				<div class="arama">
				Arama
				</div>
				<div class="sagorta">
				<div class="baslik"> Arþiv </div>
				</div>
				<div class="sagalt">	
					 <div class="baslik"> Oturum Aç </div>
					 <div class="login" >
								<form align="center" action="index.php"  method="POST">
								<p>
									<input type="text"  name="ad" value="Kullanýcý Adý" onclick="this.value='';" />
								</p>
								<p>
									<input type="password" name="sifre" value="Parola" onclick="this.value='';" />
								</p>
								<p>
									<input type="submit" value="Giriþ" id="submit" />
								</p>
								</form> 
					</div>		
				</div>	
			</div>
		</div>
<?php include ("includes/footer.php");?>