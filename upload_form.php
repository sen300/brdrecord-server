<!DOCTYPE html>
<html>
<head>
    <title>Upload File</title> 
    <style>
    body {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        text-align: center;
        width: 50%;
        margin: 0 auto;
    }

    .button {
    text-decoration: none;
    display: inline-block;
    width: 96px;
    height: auto;
    background: #4E9CAF;
    padding: 10px;
    text-align: center;
    border-radius: 5px;
    color: white;
    font-weight: bold;
    
    margin-bottom: 10px;
    }

    .button:hover {
        background: #2f5f6b;
    }

    table {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
    }

    table td, table th {
    border: 1px solid #ddd;
    padding: 8px;
    
    }

    /*table td:nth-child(even){background-color: #f2f2f2;}

    table tr:hover {background-color: #ddd;}*/

    table th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: center;
    background-color: #1faddc;
    color: white;
    }

    table td {
        text-align: left;
    }

    </style>
</head>

<body>
    <h1>Form Upload Broadcast MP3</h1>
    <a class="button" href="/brdrecord-server" style="text-align:center;">&laquo; Kembali</a>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
            <td>Nama Broadcast: </td>
            <td><input type="text" name="nama_brd" id="" style="width: 99%;" maxlength="50" required></td>
            </tr>
            <tr>
            <td>Pilih file:</td>
            <td><input type="file" name="berkas" accept=".mp3,audio/*" required/> </td>
            </tr>
        </table>
        <input class="button" type="submit" name="upload" value="Upload Broadcast" style="margin-top:10px; width: auto;"/>
    </form> 

    <table >
    <tr>
        <th>No</th>
        <th>Broadcast Name</th>
        <th>File Name</th>
        <th>Action</th>
    </tr>

    <?php
            include('koneksi.php');
            $no = 1;   
            $result = mysqli_query($koneksi,"SELECT id, nama_br, nama_audio FROM brd_audio");
            while ($data = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                <td><?php echo $no++; ?></td>                  
                <td><?php echo $data['nama_br']; ?></td>
                <td>
                <?php 
                    echo $data['nama_audio'];
                ?>        
                </td>
                <td style="text-align:center;"><a href="delete_aud.php?id=<?php echo $data['id'];?>&nama=<?php echo $data['nama_audio'];?>" class="button" style="background: red; color: white;">Hapus</a></td>
                </tr>
            
                <?php
              //echo '<button type="button" class="brd" id="brd" value="'. $data['nama_audio'] .'" onclick="return disableButton();">'. $data['nama_br'] .'</button> ' ;
            }  
                      
            ?>
</body> 
</html>