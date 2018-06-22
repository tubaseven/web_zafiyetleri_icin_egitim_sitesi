<?php

include("../tasarim/header.html");

echo "<h3><center><u>KOMUT ENJEKSIYONU</u></center></h3>";

// SAYFAYA PARAMETRE GONDERILMIS MI DIYE BAKILIYOR: (ELSE SATIR 10'DA)
if(isset($_GET["komut"])){

    // GELEN PARAMETRE DEGISKENE AKTARILIYOR:
	$komut = $_GET["komut"];

	echo $komut;
    // KOMUT SISTEMDE CALISTIRILIYOR VE SONUCLARI EKRANA BASILIYOR:
	// PING KOMUTU BIR BILGISAYARIN DIGER BILGISAYAR ILE ILETISIM TESTI ICIN KULLANILIR.
	// "-n 1" PARAMETRESI ILE SADECE 1 PAKET GONDERILECEGI BELIRTILIYOR.
	echo shell_exec('ping -n 1 ' . $komut);
}
else{
?>


<BR />
    <a href="#" onclick="PopupAc('ayrinti.php');">YARDIM</a>
<BR />
<CENTER>

<!-- KULLANICI BILGILERI ILE GIRIS YAPILABILMESI ICIN BIR FORM OLUSTURULUYOR -->
    
    <!-- ACTION ILE BU FORMUN NEREYE GONDERILECEGI BILDIRILIYOR-->
    <!-- METHOD ILE BU FORMUN GONDERME SEKLININ GET OLACAGI BILDIRILIYOR-->
    <form action="index.php" method="GET">
        IP veya Site Adresi:
		<br />
        <input type="text" name="komut" />
        <br /><br />
        <input type="submit" value="CALISTIR" />
    </form>

</CENTER>

<?php
}

include("../tasarim/footer.html");
?>