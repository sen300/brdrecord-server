<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log</title>
    <style>
    body {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        text-align: center;
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

    table tr:nth-child(even){background-color: #f2f2f2;}

    table tr:hover {background-color: #ddd;}

    table th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: center;
    background-color: #1faddc;
    color: white;
    }

    .pagination {
    display: inline-block;
    margin-top: 10px;
    }

    .pagination a {
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
    }

    .pagination a.active {
    background-color: #4CAF50;
    color: white;
    }

    .pagination a:hover:not(.active) {background-color: #ddd;}

    </style>
</head>
<body>
    <?php include 'koneksi.php';
    ?>
    <h1 style="text-align:center;">Log Audio Broadcast</h1>
    <a class="button" href="/brdrecord-server" style="text-align:center;">&laquo; Kembali</a>
    <table >
    <tr>
        <th>No</th>
        <th>Audio Played</th>                         
        <th>Played at Time</th>
        <th>Location</th>
    </tr>
    <?php 
    $halaman = 10;
    $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
    $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
    $result = mysqli_query($koneksi,"SELECT * FROM brd_log order by timestamp DESC");
    $total = mysqli_num_rows($result);
    $pages = ceil($total/$halaman);            
    $query = mysqli_query($koneksi,"select * from brd_log order by timestamp DESC LIMIT $mulai, $halaman");
    $no =$mulai+1;
    
    
    while ($data = mysqli_fetch_assoc($query)) {
        ?>
        <tr>
        <td><?php echo $no++; ?></td>                  
        <td><?php echo $data['audio']; ?></td>
        <td>
        <?php 
            $wkt = date("D, d F Y | H:i", strtotime($data['timestamp']));
            echo $wkt . " WIB"; 
        ?>        
        </td>
        <td><?php echo $data['location']; ?></td>
        </tr>
    
        <?php               
    } 
    ?>
    
    
    </table>          
    
    <div class="pagination">
    <?php for ($i=1; $i<=$pages ; $i++){ ?>
    <a href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
    
    <?php } ?>
    
    </div>
</body>
</html>