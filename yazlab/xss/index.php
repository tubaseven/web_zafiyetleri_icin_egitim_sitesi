<?php

include("../tasarim/header.html");

echo "<h3><center><u>XSS</u></center></h3>";

// CALINMASI ICIN KULLANICIYA COOKIE TANIMLANIYOR:
setcookie("kullanici_adi", "admin");
setcookie("sessionId", "P5FE2TB586QEDG4TRH82XA2CS9C57");

// SAYFAYA PARAMETRE GONDERILMIS MI DIYE BAKILIYOR: (ELSE SATIR 12'DE)
if(isset($_GET["yorum"])){

    // GELEN PARAMETRE DEGISKENE AKTARILIYOR:
	$yorum = $_GET["yorum"];
	
    // YAZI ORTADA VE ÜSTTEN 2 SATIR AŞAĞIDA:
    echo "<center><br /><br />";
	// GELEN DEGER EKRANA BASILIYOR:
    echo "<h3>Kullanici Yorumu: ".$yorum;
    echo "</h3></center>";
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
        <textarea name="yorum" rows="3" cols="40"></textarea>
        <br /><br />
        <input type="submit" value="YORUMU GONDER" />
    </form>

</CENTER>

<?php
}

include("../tasarim/footer.html");
?>