<?php
include('koneksi.php');

$id = $_GET['id'];
$nama_audio = $_GET['nama'];

echo $id . " " . $nama_audio;
if (file_exists('audio/' . $nama_audio)) {
    unlink('audio/' . $nama_audio);
}
mysqli_query($koneksi, "DELETE FROM brd_audio WHERE id='$id'")or die(mysql_error());
 
header("location:upload_form.php");

?>