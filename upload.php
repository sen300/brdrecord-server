<?php	
 
include('koneksi.php');
if(isset($_POST['upload']))
{
    //print_r($_FILES['berkas']);
    $temp = $_FILES['berkas']['tmp_name'];
    $name = rand(0000,9999).time() . "_" . $_FILES['berkas']['name'];
    $size = $_FILES['berkas']['size'];
    $type = $_FILES['berkas']['type'];
    $nama_brd = $_POST['nama_brd'];
    $folder = "audio/";
    
    if ($size < 2048000 and ($type =='audio/mpeg')) {
        move_uploaded_file($temp, $folder . $name);
        mysqli_query($koneksi, "insert into brd_audio (nama_br, nama_audio , tipe_audio, size_audio) values ( '$nama_brd', '$name', '$type', '$size')");
        header('location:upload_form.php');
    }else{
        echo "<b>Gagal Upload File</b>";
    }
}






//echo "<pre>";
    //print_r($_FILES);
//echo "</pre>";
?>