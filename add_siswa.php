<?php
include ('koneksi.php');

$submit = isset($_POST["siswa_submit"])?$_POST["siswa_submit"]:"";
if($submit){
    $sql = "
        INSERT INTO siswa  VALUES(
            NULL,
            '".$_POST["nis"]."',
            '".$_POST["nama_lengkap"]."',
            '".$_POST["jk"]."',
            '".$_POST["tmp_lahir"]."',
            '".$_POST["tgl_lahir"]."',
            '".$_POST["alamat"]."',
            '".$_POST["no_hp"]."',
            NOW()
        );
    ";
    $result = $db->query($sql); // Execute Query SQL
    
    if($result){
        echo "
            <script>
                alert('Data succesfully added !');
                window.location = 'siswa.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('Data gagal ditambahkan !');
                window.location = 'tambah_siswa.php';
            </script>
        ";
    }
        
}

?>

<h1>Tambah Data Siswa XI RPL 1</h1>

<form action="" method="POST">
    <div>
        <label>NIS</label><br>
        <input type="text" name="nis" required="required" /><br>
    </div>

    <div>
        <label>Nama Lengkap</label><br>
        <input type="text" name="nama_lengkap" required="required" /><br>
    </div>

    <div>
        <label>Jenis Kelamin</label><br>
        <select name="jk" required="required">
            <option value="">- Pilih Jenis Kelamin -</option>
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
            <option value="-">Lainnya</option>
        </select><br>
    </div>

    <div>
        <label>Tempat Lahir</label><br>
        <input type="text" name="tmp_lahir" required="required" /><br>
    </div>

    <div>
        <label>Tanggal Lahir</label><br>
        <input type="text" name="tgl_lahir" required="required" placeholder="YYYY-MM-DD"/><br>
    </div>

    <div>
        <label>Alamat</label><br>
        <textarea name="alamat" required="required"></textarea><br>
    </div>

    <div>
        <label>Nomor HP</label><br>
        <input type="text" name="no_hp" required="required" /><br>
    </div>
    <br>
    <input type="submit" name="siswa_submit" value="Simpan"/>

</form>

