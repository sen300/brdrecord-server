<?php
    $audio_brd = "br-corona3M.mp3";
    
    exec('E:\XAMPP\htdocs\brdrecord-server\sWavPlayer\sWavPlayer.exe "E:\XAMPP\htdocs\brdrecord-server\audio\/'. $audio_brd .'" ', $output, $return);
    header("Location: /brdrecord-server");
?>