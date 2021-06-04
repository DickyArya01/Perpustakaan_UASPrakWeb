<?php
include 'connect.php';



if(isset($_POST["submit_auth"])){
    $sql_author="INSERT INTO `data_autor`(`nama_autor`, `jenis`) VALUES ('".$_POST["autor_up"]."','".$_POST["jenis_up"]."')";
    $insert=$koneksi->query($sql_author);
    header('location: home.php');
}else{
    echo "erorrrr";
}


?>