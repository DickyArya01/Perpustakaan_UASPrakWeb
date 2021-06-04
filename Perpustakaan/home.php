<?php
session_start();
include 'connect.php';
// include 'json.php';
$email = $_SESSION['email'];
$sql = mysqli_query($koneksi, "SELECT * FROM `akun` WHERE `email`='$email' ");
$count= mysqli_num_rows($sql);
if($email == NULL){
    header('location: login.php');
}
if($count>0){
    $db=mysqli_fetch_assoc($sql);
    if($db['level']=="1"){
        $_SESSION['email']=$db['email'];
        $_SESSION['level']=$db['level'];
        $admin = "display:none";

    }elseif($db['level']=="2"){
        $_SESSION['email']=$db['email'];
        $_SESSION['level']=$db['level'];
        $admin = "";
    }
}

$sql_novel = mysqli_query($koneksi,"SELECT * FROM `genre` WHERE `jenis`= 1");
$sql_pd = mysqli_query($koneksi, "SELECT * FROM `genre` WHERE `jenis`= 2");
$sql_bp= mysqli_query($koneksi, "SELECT * FROM `genre` WHERE `jenis`= 3");
// 
$data1 = mysqli_num_rows($sql_novel);
$data2 = mysqli_num_rows($sql_pd);
$data3 = mysqli_num_rows($sql_bp);

// echo $json;
// $data_buku = json_decode($json, true);
// $data_buku = $data_buku["book"];

$data_buku = mysqli_query($koneksi, "SELECT * FROM `data_buku`, `genre` where genre.id=data_buku.id_buku");
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/style.css" rel="stylesheet" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/7aaf55906a.js" crossorigin="anonymous"></script> 
    <title>Home</title>
  </head>
  <body>

    <!-- nav -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow p-3 mb-5 bg-body rounded ">
        <div class="container-fluid mx-3">
            <a class="navbar-brand fw-normal" href="home.php" style="font-size: 30px" >
                <i class="fas fa-book-open mt-4 mb-4 main-color" style="font-size: 30px"></i>
                Hikmah<span class="main-color fw-bold" style="font-size: 30px">Lib</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link " href="#" id="indikator" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <p class="nav-sub">All Books</p>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle to-add " id="novel" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                           Novel 
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php 
                                if($data1>0){
                                    while($genre_novel = mysqli_fetch_assoc($sql_novel)){                                    
                            ?>
                                <li><a class="dropdown-item nav-sub" href="#"><?php echo $genre_novel['genre'] ?></a></li>
                            
                               
                            <?php
                                    }
                                }
                            ?>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle to-add" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Pengembangan Diri 
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php 
                                if($data2>0){
                                    while($genre_pd = mysqli_fetch_assoc($sql_pd)){                                    
                            ?>
                                <li><a class="dropdown-item nav-sub"  href="#"><?php echo $genre_pd['genre'] ?></a></li>
                            
                               
                            <?php
                                    }
                                }
                            ?>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle to-add" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Buku Pendidikan
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php 
                                if($data3>0){
                                    while($genre_bp = mysqli_fetch_assoc($sql_bp)){                                    
                            ?>
                                <li><a class="dropdown-item nav-sub" href="#"><?php echo $genre_bp['genre'] ?></a></li>
                            
                               
                            <?php
                                    }
                                }
                            ?>
                        </ul>
                    </li> 
                </ul>
                <ul class="navbar-nav me-4 mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          <?php echo $db['username'];?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li style="<?php echo $admin?>">
                                <form action="admin.php"method='POST'>
                                    <input type='text' name='admin' style='display: none'value='<?php echo $db['username']?>' />
                                    <input type='text' name='admin-pass' style='display: none'value='<?php echo $db['password']?>' />
                                    <button type="submit" name="submit" class="button" style="width: 100%; padding: 0.25rem 1rem <?php echo $admin?>">Admin</button>
                                </form>
                                </li>
                                <li><a class="dropdown-item text-center" href="logout.php">Log out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- body -->
    <div class="container-md ">
            <form class="d-flex mx-2 ">
                <input class="form-control me-2 ms-auto" type="search" placeholder="Search" aria-label="Search" style="max-width: 600px">
                <button class="btn btn-outline-success me-auto" type="submit">Search</button>
            </form>
    </div>
   <div class="container-xl ">
        <div class="row my-5">
            <div class="col">
                <h2>All Books</h2> 
            </div>
        </div>

        <div class="row mt-3" id="buku">
            <?php foreach ($data_buku as $row): ?>
            <div class="col-md-3 mb-3">
               <div class="card" style="width: 18rem;">
                    <img src="<?php echo $row['cover']?>"class="card-img-top" >
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['judul']?></h5>
                        <p class="card-text"><?php echo $row['sinopsis']?></p>
                        <a href="#" class="btn " style="background: #98ded9; color: #fff">Baca Sekarang</a>
                    </div>
                </div> 
            </div>
            <?php endforeach;?>
        </div>

   </div>     

    
    <footer class="main-footer" style="margin-top: 120px">
        <hr />
        <div class="row">
           <p class="text-center">&copy; 2021 <span class="fw-bold"> Hikmah</span><span class="main-color fw-bold" >Lib</span></p> 
        </div>
    </footer>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->

  </body>
</html>
