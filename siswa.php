<?php
 include ('koneksi.php'); 
 ?>
<h1>Daftar Siswa SMK Negeri 1 Subang</h1>

<a href="add_siswa.php">(+) Tambah Data Siswa</a>
<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>NO</th>
            <th>NIS</th>
            <th>NAMA LENGKAP</th>
            <th>JK</th>
            <th>TEMPAT LAHIR</th>
            <th>TANGGAL LAHIR</th>
            <th>ALAMAT</th>
            <th>NO HP</th>
            <th>TANGGAL ENTRI</th>
            <th>AKSI</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM siswa ORDER BY nama_lengkap ASC"; //Query SQL
        $result = $db->query($sql); //Execute Query SQL
        $no = 1;
        while($row = $result->fetch_assoc() ) //menampilkan bentuk array
        {
            echo "
            <tr>
                <td>".$no."</td>
                <td>".$row["nis"]."</td>
                <td>".$row["nama_lengkap"]."</td>
                <td>".$row["jk"]."</td>
                <td>".$row["tmp_lahir"]."</td>
                <td>".$row["tgl_lahir"]."</td>
                <td>".$row["alamat"]."</td>
                <td>".$row["no_hp"]."</td>
                <td>".$row["tanggal_entri"]."</td>
                <td>
                    <a href= 'edit_siswa.php?id=".$row["id_siswa"]."'>Edit</a>
                    |
                    <a href= 'delete_siswa.php?id=".$row["id_siswa"]."'
                    onclick='return confirm (\"Are you sure want to delete?\");'>Delete</a>
                </td>
            </tr>
            "; 
            $no++;   

        }
        ?>
     </tbody>
</table>