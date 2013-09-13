<?php
if($_SESSION["rol"] == 1){
?>
<div class="makale_eklesol">  
	<div class="makaleadi"> Kullanýcý Adý </div>
	<div class="makaleadi"> E-Posta </div>
	<div class="makaleadi"> Þifre </div>
	<div class="makaleadi"> Rol </div>
</div>
<div class="makale_eklesag">
	<form action="admin.php?b=kullanici_ekle" method="POST">
		<input class="kullaniciform" type="text"  name="kullanici_ad" value=" Kullanýcý Adýný Giriniz..."  onclick="this.value='';" > </input>
		<input class="kullaniciform" type="email"  name="eposta" value=" E-Posta Adresini Giriniz..."  onclick="this.value='';" > </input>
		<input class="kullaniciform" type="password"  name="sifre" > </input>
		<input class="radio" type="radio" name="rol" Value="1" >Yönetici</input>
		<input class="radio" type="radio" name="rol" Value="2" >Yazar</input>
		<input class="makale_buton" type="submit" value="Kaydet" />
	</form>											
</div>
<?php
}
?>