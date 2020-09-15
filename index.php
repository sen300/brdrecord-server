<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Broadcast</title>
    
</head>
<style>
#content {
    font-family: sans-serif;
    margin: 0 auto;
    text-align: center;
}

.button, .dropbtn, #brd, #chime-up, #chime-down {
    text-decoration: none;
    display: inline-block;
    width: 115px;
    height: auto;
    background: #4E9CAF;
    padding: 10px;
    text-align: center;
    border-radius: 5px;
    color: white;
    font-weight: bold;
    
    margin: 10px;
}

.button:hover, #brd:hover, #chime-up:hover, #chime-down:hover {
    background: #2f5f6b;
}

.siren {
  text-decoration: none;
    display: inline-block;
    width: 115px;
    height: auto;
    padding: 10px;
    text-align: center;
    border-radius: 5px;
    color: white;
    font-weight: bold;
    
    margin: 10px;
    background: #E21A1A;
}

.siren:hover {
    background: #9E2A2A;
}

 /* Dropdown Button */
 .dropbtn {
    text-decoration: none;
    display: inline-block;
    width: 115px;
    height: auto;
    background: #4E9CAF;
    padding: 10px;
    text-align: center;
    border-radius: 5px;
    color: white;
    font-weight: bold;
    
    margin: 10px;
}

/* Dropdown button on hover & focus */
.dropbtn:hover, .dropbtn:focus {
    background: #2f5f6b;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: none;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content #brd {
  text-align:center;
  width:150px;
  height:auto
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  margin: 0 auto;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd}

/* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
.show {display:block;} 

</style>
<body>
<?php include 'koneksi.php';
    ?>
    <div id="content">
        <!--isi dari $lokasi ada di file koneksi.php, cek jika berbeda.-->
        <h1>Broadcast</h1>
        <a class="button" href="log.php" style="margin-top:0px; font-size: 15px; width: 96px;">&raquo; Log</a>
        <a class="button" href="upload_form.php" style="margin-top:0px; font-size: 15px; width: auto;">Upload File Broadcast</a>
        <!--Menampilkan Loader (Gambar Gif sebagai indikator audio)-->
        <div id="loader-on" style="display:none;">
        <img src="img/equalizer.gif" alt="" width="150" height="150">
        </div>
        <div id="loader-off" style="display:block;">
        <img src="img/equalizer.png" alt="" width="150" height="150">
        </div>
        <!--Menampilkan status sebagai indikator audio yang berupa teks-->
        <h4 id="status">Audio belum Berjalan. Tekan tombol untuk menjalankan</h4>
        <button type="button" class="brd" id="chime-up" value="chime.mp3" onclick="return disableButton();">Chime Up</button> 
        <div class="dropdown">
        <button onclick="myFunction()" class="dropbtn" id="brd">Broadcast &#10225;</button>
        <div id="myDropdown" class="dropdown-content">
            <!--Jika ingin menambahkan rekaman broadcast, bisa ditambahkan disini dengan value nya adalah file broadcast .mp3 nya-->
            <!--Jangan lupa untuk menambahkan filenya di folder audio-->
            <?php
            include('koneksi.php');
            
            $result = mysqli_query($koneksi,"SELECT nama_br, nama_audio FROM brd_audio");
            while ($data = mysqli_fetch_assoc($result)) {
              echo '<button type="button" class="brd" id="brd" value="'. $data['nama_audio'] .'" onclick="return disableButton();">'. $data['nama_br'] .'</button> ' ;
            }            
            ?>
        </div>
        </div> 
        <button type="button" class="brd" id="chime-down" value="chime.mp3" onclick="return disableButton();">Chime Down</button> 
        <button type="button" class="brd siren" id="siren" value="siren.mp3" onclick="return disableButton();">Siren</button> 
        <h4>Tunggu Hingga Selesai Apabila Ingin Memainkan Audio Baru</h4>
    </div>

    <script>
    /* When the user clicks on the button,
    toggle between hiding and showing the dropdown content */
    function myFunction() {
      document.getElementById("myDropdown").classList.toggle("show");
    }
    //untuk disable semua button
    function disableButton() {
      document.getElementById("status").innerHTML="Audio Berjalan, Harap Tunggu...";
      document.getElementById("chime-up").style.pointerEvents = "none";
      document.getElementById("brd").disabled = true;
      document.getElementById("chime-down").style.pointerEvents = "none";
      document.getElementById("siren").style.pointerEvents = "none";
      document.getElementById("loader-on").style.display = "block";
      document.getElementById("loader-off").style.display = "none";
    }
    
    // Close the dropdown menu if the user clicks outside of it
    window.onclick = function(event) {
      if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
          }
        }
      }
    }
    </script>
    <script src="js/jquery-3.5.1.min.js">    </script>
    <script>
    //fungsi untuk mengirim nama file untuk di play di file php
      $(document).ready(function(){ 
        $('button.brd').click(function() {
            var audio_brd= this.value;
            //console.log (audio_brd);
            $.ajax({
                type: 'POST',
                url: 'play-br-1.php',
                data: {audio: audio_brd},
                //dataType: 'json',
                //encode: true
                
            })
            .done(function(data) {
                console.log(data);
                //fungsi untuk meng-enable tombol-tombol yang ada
                document.getElementById("status").innerHTML="Audio belum Berjalan. Tekan tombol untuk menjalankan";
                document.getElementById("chime-up").style.pointerEvents = "auto";
                document.getElementById("brd").disabled = false;
                document.getElementById("chime-down").style.pointerEvents = "auto";
                document.getElementById("siren").style.pointerEvents = "auto";
                document.getElementById("loader-on").style.display = "none";
                document.getElementById("loader-off").style.display = "block";
            })
        });
      });
    </script>

</body>
</html>