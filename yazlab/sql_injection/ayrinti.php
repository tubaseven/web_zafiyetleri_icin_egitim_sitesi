<!DOCTYPE html>
<html>
<head>
	<title>SQL INJECTION YARDIM SAYFASI</title>

	<!-- TURKCE KARAKTER GOSTERME SORUNU OLMAMASI ICIN: -->	
	<META http-equiv=content-type content=text/html;charset=iso-8859-9>
	<META http-equiv=content-type content=text/html;charset=windows-1254>
	<META http-equiv=content-type content=text/html;charset=x-mac-turkish>

</head>
<body>

<center><h2>SQL INJECTION</h2></center>

<hr />

<u><h3>AÇIKLAMA:</h3></u>
<div>
	<p>
		
		Sql Injection; bir web uygulamasındaki sql komutuna normalde girilmesi gereken ifadeye ekstra ifadeler eklenerek yapılan bir saldırı türüdür. Genelde kullanıcıdan alınan bilgilerin denetlenmeden sql koduna eklenmesi sonucu oluşan bir açıktır. Bu açığı kullanan kötü niyetli kişiler veritanına müdahalelerde bulunabilir ve veritabanındaki bilgileri okuyabilirler.

	</p>
</div>

<br />
<hr />
<br />

<u><h3>AÇIK OLUŞMASININ NEDENİ:</h3></u>
<div>
	<img src="sql_kod.png" width="100%" />
	<p>
		20. ve 21. satırda kullanıcı tarafından sayfaya GET ile gönderilen parametreler alınmaktadır. Hatanın asıl oluştuğu kısım burasıdır. Çünkü parametreler hiçbir kontrolden geçirilmeksizin alınmıştır. Bu da parametrelerin içerisinde ne olduğunu bilmediğimiz anlamına gelmektedir. İçerisinde ne olduğunu bilmediğimiz bu parametreleri 24. satırda sql sorgusu oluşturuken kullanıyoruz. Eğer kullanıcı kötü niyetli biri ise muhtemelen sayfaya gelen parametrelerin içerisinde ekstra sql ifadeleri bulunmaktadır ve bu ifadeler 24. satırda çalıştırılacak olan sql ifadesine eklendiğinden veritabanı üzerinde zararlı bir sql kodu çalıştırılmış olacaktır. Bu zararlı sql kodu veritanına zarar verebileceği gibi, dışarı bilgi de aktarabilir veya web uygulamasındaki login gibi bir işlemi atlatmak için de kullanılailir.
	</p>
</div>


<br />
<hr />
<br />


<u><h3>SÖMÜRÜ:</h3></u>
<div>
	<p>
		
		Kullanıcı adını bildiğiniz birinin birinin şifresini bilmeseniz dahi ?kullanici_adi=mehmet&sifre=0123 şeklindeki url'nin sifre kısmına ' or 1=1 # yazarak sisteme login olabilirsiniz.
		<br /><br />
		Örneğin sisteme admin olarak giriş yapmak için bu url kullanılabilir:<br />
		Not: # işareti url'de gösterebilmenin tek yolu %23 ile ifade etmektir(url endcoding).
		<br /><br />
		http://localhost/yazlab/sql_injection/index.php?kullanici_adi=admin&sifre=' or 1=1 %23

	</p>
</div>


<br />
<hr />
<br />


<u><h3>AÇIĞI KAPATMA:</h3></u>
<div>
	<img src="sql_kod2.png" width="100%" />
	<p>
		20. ve 21. satırda kullanıcı tarafından sayfaya GET ile gönderilen parametreler artık direkt olarak alınmamaktadır. Gelen parametreler değişkenlere aktarılmadan önce ilk olarak "htmlspecialchars" fonksiyonu yardımıyla url ile kodlanmış karakterler orijinal hallerine çevrilmektedir(örn: %23'ün # işareti yapılması gibi). İkinci olarak ise "mysql_real_escape_string" adlı fonksiyon ile özel anlamlı karakterleri başına ters slash(backslash) getirilerek bu ifadelerin özel anlam taşımaları engelleniyor(örn: ' 1=1  ifadesi \' 1=1 oluyor). Böylece kötü niyetli kullanıcı eğer zararlı bir veri girişi yapacak olursa bu iki fonksiyon girilen zararlı ifadeyi veritabanı üzerinde iş yapamaz hale getirecektir.
	</p>
</div>


<br />
<hr />
<br />


</body>
</html>