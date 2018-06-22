<?php


// SAYFAYA PARAMETRE GONDERILMIS MI DIYE BAKILIYOR: (ELSE SATIR 10'DA)
if(isset($_GET["komut"])){

    // GELEN PARAMETRE DEGISKENE AKTARILIYOR:
	$komut = $_GET["komut"];

	// PARAMETRE OLARAK ALINAN KOMUT; ÝÇERÝSÝNDE BULUNAN ÖZEL ANLAMLI KARAKTERLERDEN ARINDIRILIYOR:
	$karakterler = array("&&", ";", "||", "&", "|");
	$komut = str_replace($karakterler, "", $komut);
	
    // KOMUT SISTEMDE CALISTIRILIYOR VE SONUCLARI EKRANA BASILIYOR:
	// PING KOMUTU BIR BILGISAYARIN DIGER BILGISAYAR ILE ILETISIM TESTI ICIN KULLANILIR.
	// "-n 1" PARAMETRESI ILE SADECE 1 PAKET GONDERILECEGI BELIRTILIYOR.
	echo shell_exec('ping -n 1 ' . $komut);
}
else{
?>


<BR /><BR />
<CENTER>

<!-- KULLANICI BILGILERI ILE GIRIS YAPILABILMESI ICIN BIR FORM OLUSTURULUYOR -->
    
    <!-- ACTION ILE BU FORMUN NEREYE GONDERILECEGI BILDIRILIYOR-->
    <!-- METHOD ILE BU FORMUN GONDERME SEKLININ GET OLACAGI BILDIRILIYOR-->
    <form action="command_injection-duzeltilmis.php" method="GET">
        
        <input type="text" name="komut" />
        <br /><br />
        <input type="submit" value="CALISTIR" />
    </form>

</CENTER>

<?php
}
?>