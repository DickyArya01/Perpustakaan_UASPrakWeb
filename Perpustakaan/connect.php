<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <title></title>
</head>
<body>
        <?php
        $host = "localhost";
        $user = "root";
        $pass = "";
        $databases = "perpustakaan";
        $koneksi = mysqli_connect($host, $user, $pass, $databases);
        if($koneksi){
               echo "";
        }else{
                echo "Server not connected";
        }
        ?>
</body>
</html>
