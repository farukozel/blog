<?php
	$kullanici_duzenle = mysql_query("SELECT * FROM kullanicilar WHERE user_id=$id",$connection);
	while($dongu=mysql_fetch_array($kullanici_duzenle)){
		$adi=$dongu["user_name"];
		$maili=$dongu["user_mail"];
		$rolu=$dongu["user_rol"];
		$sifresi=$dongu["user_pass"];
	}
	echo"
								<div class=makale_eklesol>  
									<div class=makaleadi> Kullanýcý Adý </div>
									<div class=makaleadi> E-Posta </div>
									<div class=makaleadi> Þifre </div>
									<div class=makaleadi> Rol </div>
								</div>
								<div class=makale_eklesag>
									<form action=admin.php?a=kullanici_guncelle&c=$id method=POST>
								 		<input class=kullaniciform type=text  name=kullanici_ad value=$adi > </input>
										<input class=kullaniciform type=email  name=eposta value=$maili > </input>
										<input class=kullaniciform type=text value=$sifresi  name=sifre > </input>
										<input class=radio type=radio name=rol Value=1 >Yönetici</input>
										<input class=radio type=radio name=rol Value=2 >Yazar</input>
										<input class=makale_buton type=submit value=Güncelle />
									</form>											
								</div>";
?>