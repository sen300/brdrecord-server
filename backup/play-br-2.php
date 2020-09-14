<?php
    $audio_brd = "br-peringatan2.mp3";
    
    exec('E:\XAMPP\htdocs\brdrecord-server\sWavPlayer\sWavPlayer.exe "E:\XAMPP\htdocs\brdrecord-server\audio\/'. $audio_brd .'" ', $output, $return);
    header("Location: /brdrecord-server");
?>