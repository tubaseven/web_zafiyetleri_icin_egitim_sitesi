<!DOCTYPE html>
<html>
<head>
	<title>COMMAND INJECTION YARDIM SAYFASI</title>

	<!-- TURKCE KARAKTER GOSTERME SORUNU OLMAMASI ICIN: -->	
	<META http-equiv=content-type content=text/html;charset=iso-8859-9>
	<META http-equiv=content-type content=text/html;charset=windows-1254>
	<META http-equiv=content-type content=text/html;charset=x-mac-turkish>

</head>
<body>

<center><h2>COMMAND INJECTION</h2></center>

<hr />

<u><h3>AÇIKLAMA:</h3></u>
<div>
	<p>
		
		Command Injection; bir web uygulamasındaki sistemde çalıştırılacak olan komuta normalde girilmesi gereken ifadeye ekstra ifadeler eklenerek yapılan bir saldırı türüdür. Genelde kullanıcıdan alınan bilgilerin denetlenmeden çalıştırılacak olan koda eklenmesi sonucu oluşan bir açıktır. Bu açığı kullanan kötü niyetli kişiler sistemde ciddi sorunlara yol açacak komutlar çalıştırabilir veya sistemden bilgi çalabilirler.

	</p>
</div>

<br />
<hr />
<br />

<u><h3>AÇIK OLUŞMASININ NEDENİ:</h3></u>
<div>
	<img src="command_1.png" width="100%" />
	<p>
		7. satırda kullanıcı tarafından sayfaya GET ile gönderilen parametreler alınmaktadır. Hatanın asıl oluştuğu kısım burasıdır. Çünkü parametreler hiçbir kontrolden geçirilmeksizin alınmıştır. Bu da parametrelerin içerisinde ne olduğunu bilmediğimiz anlamına gelmektedir. İçerisinde ne olduğunu bilmediğimiz bu parametreleri 12. satırda çalıştırılacak olan komutu oluşturuken kullanıyoruz. Eğer kullanıcı kötü niyetli biri ise muhtemelen sayfaya gelen parametrelerin içerisinde girilmesi gerekenin dışında başka zararlı sistem komutları da bulunmaktadır ve bu komutlar 12. satırda çalıştırılmış olacaktır. Bu zararlı sistem kodu; sistemde hasara neden olacak bir işlem yapabilir veya sisteme ait bilgilere ulaşabilir.
	</p>
</div>


<br />
<hr />
<br />


<u><h3>SÖMÜRÜ:</h3></u>
<div>
	<p>
		
		Ping atılması için ip veya url istenen kutucuğa noktalı & işaretinden sonra istenen ikinci bir kodu girmek mümkündür.
		<br /><br />
		Örneğin sistemde oturum açmış kullanıcının oturumunu kilitlemek için aşağıdaki url kullanılabilir:
		<br>
		Not: & işareti url'de gösterebilmenin tek yolu %26 ile ifade etmektir(url endcoding).
		<br /><br />
		http://localhost/yazlab/command_injection/index.php?komut=127.0.0.1 %26 rundll32.exe user32.dll LockWorkStation

	</p>
</div>


<br />
<hr />
<br />


<u><h3>AÇIĞI KAPATMA:</h3></u>
<div>
	<img src="command_2.png" width="100%" />
	<p>
		11. satırda tanımlanan harfler ve harf grupları sistem komutları için özel anlamı vardır. Normalde sistemde bir sistem kodu çalıştırılacakken bunların yardımı ile 2 veya daha fazla kodu çalıştırmak mümkün olmaktadır. Sayfaya parametre olarak gelen komut 12. satırda bu özel anlamlı harf ve harf gruplarından arındırılmaktadır. Bu işlem değiştirme(replace) olarak bilinmektedir. Kötü niyetli kullanıcı zararlı bir kod girmek için bu özel anlamlı karakterlere ihtiyaç duymaktadır. Ama bu karakterler komuttan temizlendiği için böyle bir ihtimal kalmamaktadır(imkansız değildir!).
	</p>
</div>


<br />
<hr />
<br />


</body>
</html>