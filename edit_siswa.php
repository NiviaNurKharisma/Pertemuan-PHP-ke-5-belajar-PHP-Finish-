<?php

include 'koneksi.php';

$id = $_GET["id"];

$sql = "SELECT * FROM siswa WHERE id_siswa = '".$id."';";
$result = mysqli_query($db,$sql);

$row = mysqli_fetch_assoc($result);
mysqli_free_result($result);

 $submit = isset($_POST['Siswa_submit'])?$_POST["Siswa_submit"]:"";
	if ($submit) {
		$nis = $_POST["nis"];
		$nama = $_POST["nama_lengkap"];
		$jk = $_POST["jk"];
		$tmp_lahir = $_POST["tmp_lahir"];
		$tgl_lahir = $_POST["tgl_lahir"];
		$alamat = $_POST["alamat"];
		$no_hp = $_POST["no_hp"];

	 	$sql ="
	 	   UPDATE siswa SET 
	 	   nis = '".$nis."',
	 	   nama_lengkap = '".$nama."',
	 	   jk = '".$jk."',
	 	   tmp_lahir = '".$tmp_lahir."',
	 	   tgl_lahir = '".$tgl_lahir."',
	 	   alamat = '".$alamat."',
	 	   no_hp = '".$no_hp."', 
	 	   tanggal_entri = '".$row["tanggal_entri"]."' 
	 	   WHERE id_siswa = '". $id ."'
	 	   ;";
	 	$result = $db->query($sql);
	 	if($result){
	 		echo "
	 		<script>
	 			alert('Data succesfully changed!');
	 			window.location = 'siswa.php';
	 		</script>
	 		";
	 	}
	 	else{
	 		echo $sql;
	 		// echo "
	 		// <script>
	 		// 	alert('Data gagal diubah!');
	 		// 	window.location = 'index.php';
	 		// </script>
	 		// ";
	 	}
	}
?>

<h1>Edit Siswa XI RPL 1</h1>

<form action="" method="POST">
<div>
	<label>NIS</label><br>
	<input type="text" name="nis" required="required" value="<?= $row['nis'] ?>"/>
</div>

<div>
	<label>Nama Lengkap</label><br>
	<input type="text" name="nama_lengkap" required="required" value="<?= $row['nama_lengkap'] ?>" />
</div>

<div>
	<label>JK</label><br>
	<?php
		if($row['jk'] == "L"){
			echo "
			<input type='radio' name='jk' value='L' checked> Laki-laki<br>
			<input type='radio' name='jk' value='P'> Perempuan
			";
		}elseif($row['jk'] == "P"){
			echo "
			<input type='radio' name='jk' value='L'> Laki-laki<br>
			<input type='radio' name='jk' value='P' checked> Perempuan
			";
		}
	?>
</div>

<div>
	<label>Tempat Lahir</label><br>
	<input type="text" name="tmp_lahir" required="required" value="<?= $row['tmp_lahir'] ?>"><br>
</div>

<div>
	<label>Tanggal Lahir</label><br>
	<input type="text" name="tgl_lahir" required="required" placeholder="YYYY-MM-DD" value="<?= $row['tgl_lahir'] ?>"><br>
</div>

<div>
	<label>Alamat</label><br>
	<textarea name="alamat"><?= $row['alamat'] ?></textarea><br>
</div>

<div>
	<label>Nomor HP</label><br>
	<input type="text" name="no_hp" required="required" value="<?= $row['no_hp'] ?>"><br><br>
</div>

<input type="submit" name="Siswa_submit" value="Edit">
</form>