<?php
session_start();
include 'connect.php';
if(isset($_POST['submit'])){
  $email = $_POST['email'];
  $password = md5($_POST['password']);

  $sql=mysqli_query($koneksi,"SELECT * FROM `akun` WHERE email='$email' and password='$password'");
  $count=mysqli_num_rows($sql);
  
  if($count>0){
    $_SESSION['email']=$email;
    header("location: home.php");
    die;
    
  }

}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Login</title>
    <link href="css/style.css" rel="stylesheet" >
    <script src="https://kit.fontawesome.com/7aaf55906a.js" crossorigin="anonymous"></script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

  </head>
  <body>

    <div class="text-center" style="margin-top: 220px">
        <form  class="formulir" method="POST">
          <div class="rounded shadow p-3 mb-5 bg-body ">    
            <i class="fas fa-book-open mt-4 mb-4 main-color"></i>
            <h1 class="h3 mb-3 fw-normal">Hikmah<span class="fw-bold main-color">Lib</span></h1>
            <input type="email" name="email" class="form-control mb-3" placeholder="Email Address" required >
            <input type="password" name="password" class="form-control mb-3" placeholder="Password" required >
            <div class="d-grid gap-2">
                <input type="submit" name="submit" class="btn btn-lg bg text-white btn-solid" value="Login"> 
                <!--
                <button type="submit" class="btn btn-lg bg text-white btn-solid">Login</button>
                -->
                <a href ="register.php" class="btn bd btn-outline bd-outline">Daftar</a>
            </div>
          </div> 
        </form>

    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>
