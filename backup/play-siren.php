<?php
    exec('E:\XAMPP\htdocs\brdrecord-server\sWavPlayer\sWavPlayer.exe "E:\XAMPP\htdocs\brdrecord-server\audio\siren.mp3" ', $output, $return);
    header("Location: /brdrecord-server");
?>