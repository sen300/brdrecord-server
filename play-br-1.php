<?php
    include 'koneksi.php';
    $audio_brd = $_POST['audio'];
    $partisi = "E";
    exec($partisi . ':\XAMPP\htdocs\brdrecord-server\sWavPlayer\sWavPlayer.exe "'.$partisi.':\XAMPP\htdocs\brdrecord-server\audio\/'. $audio_brd .'" ', $output, $return);
    //isi dari $lokasi ada di file koneksi.php, cek jika berbeda.
    $query = "INSERT INTO brd_log(audio, location) VALUE ('$audio_brd','$lokasi') ";
    //echo $query;

    if (mysqli_query($koneksi, $query)) {
        echo "Success Insert\n";
    } else {
        echo "Failed Insert\n";
    }

    echo ("success");
?>