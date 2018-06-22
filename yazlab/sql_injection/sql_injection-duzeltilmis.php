<?php 

// SAYFAYA BILGI GONDERILMIS MI DIYE BAKILIYOR: (ELSE SATIR 43'DE)
if( isset( $_GET[ 'kullanici_adi' ] ) ) { 

    //GENEL HATALARI EKRANA BASMASI ENGELLENIYOR:
    error_reporting(0);

    // VERITABANI BAGLANTILARI YAPILIYOR:
    $baglanti = @mysql_connect('localhost', 'root', '');
    $veritabani = @mysql_select_db('yazlab');
    // VERITABANI BAGLANTILARI YAPILMIS MI DIYE KONTROL EDILIYOR:
    if($baglanti && $veritabani) {
       echo "";
    } else {
       echo 'Veritabani Baglantisi kurulamadi.';
    }

    // BU SAYFAYA GONDERILMIS OLAN PARAMETRELER ALINIYOR:
    $kullanici_adi = mysql_real_escape_string(htmlspecialchars($_GET[ 'kullanici_adi' ]));
    $sifre = mysql_real_escape_string(htmlspecialchars($_GET[ 'sifre' ])); 
 
    // SQL SORGUSU HAZIRLANIYOR:
    $sorgu  = "SELECT * FROM kullanicilar WHERE kullanici_adi = '$kullanici_adi' AND sifre='$sifre'"; 
    
    // SQL SORGUSU CALISTIRILIYOR:
    $sonuc = mysql_query( $sorgu ) or die( '<pre>' . mysql_error() . '</pre>' );
 
    // CALISTIRILMIS OLAN SORGU SONUCUNUN SATIR SAYISI ELDE EDILIYOR: 
    $num = mysql_numrows( $sonuc );

    // EGER BIR SATIR VARSA; YANI BU BILGILERE AIT BIR KULLANICI VARSA 
    if( $num  > 0) { 
        echo "<BR /><BR /><CENTER><h1>Hosgeldiniz Sayin <u>".$kullanici_adi."</u></h1></CENTER>"; 
    } else{
        echo "<BR /><BR /><CENTER><h1>GIRIS BASARISIZ</h1></CENTER>";
    }

    // VERITABANI BAGLANTISI SONLANDIRILIYOR:
    mysql_close(); 
} 

// EGER SAYFAYA ISTEK YAPILMAMIS ISE:
else{

// HTML ETIKETLERI KULLANABILMEK ICIN PHP TAG'INDAN CIKILIYOR:
?>

<BR /><BR />
<CENTER>

<!-- KULLANICI BILGILERI ILE GIRIS YAPILABILMESI ICIN BIR FORM OLUSTURULUYOR -->
    
    <!-- ACTION ILE BU FORMUN NEREYE GONDERILECEGI BILDIRILIYOR-->
    <!-- METHOD ILE BU FORMUN GONDERME SEKLININ GET OLACAGI BILDIRILIYOR-->
    <form action="sql_injection-duzeltilmis.php" method="GET">
		Kullanici Adi:<br />
        <input type="text" name="kullanici_adi" />
        <br /><br />
		Sifre:<br />
        <input type="text" name="sifre" /> 
        <br /><br />
        <input type="submit" value="GIRIS YAP" />
    </form>

</CENTER>
 
<!-- ELSE'E AIT OLAN SUSLU PARANTEZ KAPATILIYOR: -->
<?PHP
    }
?>