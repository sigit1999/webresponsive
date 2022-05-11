<html>
<head>
		<title>latihan bahasa pemrograman php</title>
</head>
<body>
	<h1>tugas pertemuan 2 web programming I Sigit Priatno 17207166</h1>
<?php
echo "Diketahui = SISI : 15, PANJANG : 10, LEBAR : 5, TINGGI : 8<br>";
echo "<br>";
echo "<hr>";
		$sisi=15;
		$panjang=10;
		$lebar=5;
		$tinggi=8;
		$phie=3.14;
		$jarijari=1/2*10;
		//rumus rumus luas
		$luaskubus=6*$sisi*$sisi;
		$luassegitiga=1/2*$panjang*$tinggi;
		$luaspersegipanjang=$panjang*$lebar;
		$luaslingkaran=$phie*$jarijari*$jarijari;

		//menghitung luas sisi kubus

		echo "1. Menghitung Sisi Kubus <br> ";
		echo "Ditanyakan :Luas sisi kubus... <br>";
		echo "jawab :6*sisi*sisi <br>";
		echo "jawab :6*$sisi*$sisi = $luaskubus <br>";
		echo "<hr>";

		//menghitung luas segitiga

		echo "2. Menghitung Luas Segitiga <br> ";
		echo "Ditanyakan :Luas segitiga...<br>";
		echo "jawab :1/2*panjang*tinggi <br>";
		echo "jawab :1/2*$panjang*$tinggi = $luassegitiga <br>";
		echo "<hr>";

		//menghitung luas persegi panjang

		echo "3. Menghitung Luas Persegi Panjang <br> ";
		echo "Ditanyakan :Luas Persegi Panjang... <br>";
		echo "jawab :Panjang*Lebar <br>";
		echo "jawab :$panjang*$lebar = $luaspersegipanjang <br>";
		echo "<hr>";

		//menghitung luas lingkaran

		echo "4. Menghitung Luas Lingkaran <br> ";
		echo "Ditanyakan :Luas Lingkaran ...<br>";
		echo "jawab :$phie*jarijari*jarijari <br>";
		echo "jawab :$phie*$jarijari*$jarijari = $luaslingkaran <br>";
		echo "<hr>";
?>




</body>
</html>