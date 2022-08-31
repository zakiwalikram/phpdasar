<?php
session_start();

if (!isset($_SESSION["login"]))
{
	header("Location: login.php");
	exit;
} 


require 'functions.php';

//ambil data di URL
$id = $_GET["id"];

//query data mahasiswa berdasarkan id
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];


//koneksi ke DBMS
$conn = mysqli_connect("localhost", "root", "", "phpdasar"); 

//cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"]))
{
	//cek apakah data berhasil diubah atau tidak
	if(ubah($_POST) >0)
	{
		echo "
				<script>
					alert('data berhasil diubah!');
					document.location.href='index.php';
				</script>
		";
	}
	else
	{
		echo "
				<script>
					alert('data gagal diubah!');
					document.location.href='index.php';
				</script>
		";	}
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Ubah data mahasiswa</title>
</head>
<body>

	<h1>Ubah data mahasiswa</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?=$mhs["id"]; ?>">
		<input type="hidden" name="gambarLama" value="<?=$mhs["gambar"]; ?>">
		<ul>
			<li>
				<label for="nobp">Nobp : </label>
				<input type="text" name="nobp" id="nobp" required value="<?= $mhs["nobp"]; ?>">
			</li>
			<br>
			<li>
				<label for="nama">Nama : </label>
				<input type="text" name="nama" id="nama" required value="<?= $mhs["nama"]; ?>">	
			</li>
			<br>
			<li>
				<label for="email">Email :</label>
				<input type="text" name="email" id="email" required value="<?= $mhs["email"]; ?>">
			</li>
			<br>
			<li>
				<label for="jurusan">Jurusan :</label>
				<input type="text" name="jurusan" id="jurusan" required value="<?= $mhs["jurusan"]; ?>">

			</li>
			<br>
			<li>
				<label for="gambar">Gambar :</label><br>
				<img src="img/<?= $mhs['gambar']; ?>" width="40"><br>
				<input type="file" name="gambar" id="gambar">

			</li>
			<br>
			<li>
				<button type="submit" name="submit">Ubah Data!</button>

			</li>


		</ul>
		


	</form>

</body>
</html>