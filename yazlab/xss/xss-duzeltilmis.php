<?php

setcookie("kullanici_adi", "admin");
setcookie("sessionId", "P5FE2TB586QEDG4TRH82XA2CS9C57");

// SAYFAYA PARAMETRE GONDERILMIS MI DIYE BAKILIYOR: (ELSE SATIR 12'DE)
if(isset($_GET["yorum"])){

    // GELEN PARAMETRE DEGISKENE AKTARILIYOR:
	$deger = $_GET["yorum"];
	
	// PARAMETRE OLARAK ALINAN KOMUT; İÇERİSİNDE BULUNAN ÖZEL ANLAMLI KELIMELERDEN ARINDIRILIYOR:
	$ozel_ifadeler = array("<script>", "</script>","<",">");
	$yorum = str_replace($ozel_ifadeler, "", $yorum);
	
    // YAZI ORTADA VE ÜSTTEN 2 SATIR AŞAĞIDA:
    echo "<center><br /><br />";
	// GELEN DEGER EKRANA BASILIYOR:
    echo "Kullanici Yorumu: ".$yorum;
    echo "</center>";
}
else{
?>


<BR /><BR />
<CENTER>

<!-- KULLANICI BILGILERI ILE GIRIS YAPILABILMESI ICIN BIR FORM OLUSTURULUYOR -->
    
    <!-- ACTION ILE BU FORMUN NEREYE GONDERILECEGI BILDIRILIYOR-->
    <!-- METHOD ILE BU FORMUN GONDERME SEKLININ GET OLACAGI BILDIRILIYOR-->
    <form action="xss-duzeltilmis.php" method="GET">
        <textarea name="yorum" rows="3" cols="40"></textarea>
        <br /><br />
        <input type="submit" value="YORUMU GONDER" />
    </form>

</CENTER>

<?php
}
?>