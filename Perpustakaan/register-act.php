<?php
include "connect.php";
$username = $_POST['username'];
$password = md5($_POST['password']);
$repassword = md5($_POST['repassword']);
$tanggal = $_POST['tanggal'];
$email = $_POST['email'];
$level = $_POST['level'];

if($password == $repassword){
        $sql_akun="INSERT INTO `akun`(`username`, `email`, `password`, `level`) VALUES ('".$username."','".$email."','".$password."','$level')";
        $a=$koneksi->query($sql_akun);
        $sql_data="INSERT INTO `data_akun`(`id`, `nama`, `tanggal`, `email`, `rekening`, `level`) VALUES (NULL,'".$username."','".$tanggal."','".$email."',NULL,'".$level."')";     
        $b=$koneksi->query($sql_data);
                if($a==true && $b == true){
                        header('location:login.php');
                }else{
                        echo "erorrrrrrrrrr";
                }
}else{
        echo "ERROOR";
}
?>
