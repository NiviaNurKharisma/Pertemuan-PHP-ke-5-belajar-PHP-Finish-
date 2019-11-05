<?php
include 'koneksi.php';
$id = $_GET["id"];

$sql = "DELETE FROM siswa WHERE id_siswa='".$id."'";
$result = $db-> query ($sql);
if($result){
      echo"
      <script>
      alert('Data successfully deleted!');
      window.location = 'siswa.php';
      </script>
      ";
}
else{
      echo"
      <scripit>
      alert('Error!');
      window.location = 'siswa.php';
      </script>
      ";
}
?>