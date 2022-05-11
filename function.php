<?php

session_start();

$conn = mysqli_connect("localhost", "root", "", "db_trans");
if (isset($_POST['insert_mobil'])){
	$merk = $_POST['merk'];
	$tipe = $_POST['tipe'];
	$harga_mobil = $_POST['harga_mobil'];
	$stock_mobil = $_POST['stock_mobil'];
	$spesifikasi = $_POST['spek'];
	// print_r($merk);

	$tambahkb = mysqli_query($conn, "insert into barang (merk, tipe, harga_mobil, stock_mobil, spesifikasi) values ('$merk','$tipe','$harga_mobil','$stock_mobil','$spesifikasi')");
	if ($tambahkb){
		header('location:penjualan.php');
			} else {
				echo "gagal";
				header ('location:index.php');

			}

}
if (isset($_POST['update_mobil'])){
	$merk = $_POST['merk'];
	$tipe = $_POST['tipe'];
	$harga_mobil = $_POST['harga_mobil'];
	$stock_mobil = $_POST['stock_mobil'];
	$spesifikasi = $_POST['spesifikasi'];
	$id_mobil = $_POST['id_mobil'];

	$updatemobil = mysqli_query($conn, "update barang set merk='$merk', tipe='$tipe', harga_mobil='$harga_mobil', stock_mobil='$stock_mobil', spesifikasi='$spesifikasi' where barang.id_mobil='$id_mobil' ");
	if ($updatemobil) {
		header('location:penjualan.php');
			} else {
				echo "gagal";
				header ('location:index.php');

			}

}

//delete Barang
if(isset($_POST['delete_mobil'])){
	$id_mobil = $_POST['idmobil'];
	$deletemobil = mysqli_query($conn, "delete from barang where id_mobil= '$id_mobil'");
	if ($deletemobil) {
		header('location:penjualan.php');
	} else{
		echo "gagal";
		header('location:index.php');
	}

}

if (isset($_POST['insert_pegawai'])){
	$nama = $_POST['nama'];
	$no_tlp = $_POST['no_tlp'];
	$alamat = $_POST['alamat'];
	$jenis_kelamin = $_POST['jenis_kelamin'];

	$tambahkb = mysqli_query($conn, "insert into pegawai (nama, no_tlp, alamat, jenis_kelamin) values ('$nama','$no_tlp','$alamat','$jenis_kelamin')");
	if ($tambahkb){
		header('location:pegawai.php');
			} else {
				echo "gagal";
				header ('location:index.php');

			}

}


if (isset($_POST['update_pegawai'])){
	$nama = $_POST['nama'];
	$no_tlp = $_POST['no_tlp'];
	$alamat = $_POST['alamat'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$id_pegawai = $_POST['id_pegawai'];

	$updatepegawai = mysqli_query($conn, "update pegawai set nama='$nama', no_tlp='$no_tlp', alamat='$alamat', jenis_kelamin='$jenis_kelamin' where pegawai.id_pegawai='$id_pegawai'");
	if ($updatepegawai){
		header('location:pegawai.php');
			} else {
				echo "gagal";
				header ('location:index.php');

			}

}

if(isset($_POST['delete_pegawai'])){
	$id_pegawai = $_POST['id_pegawai'];
	$deletepegawai = mysqli_query($conn, "delete from pegawai where id_pegawai= '$id_pegawai'");
	if ($deletepegawai) {
		header('location:pegawai.php');
	} else{
		echo "gagal";
		header('location:index.php');
	}

}
?>