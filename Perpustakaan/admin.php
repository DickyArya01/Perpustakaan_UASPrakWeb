<?php
session_start();
include "connect.php";
$username = $_POST['admin'];
$email = $_SESSION['email'];

if($email == NULL){
    header('location: login.php');
}

$sql=mysqli_query($koneksi,"SELECT * FROM `akun` WHERE email='$email'");
$count=mysqli_num_rows($sql);
if($count>0){
        $db=mysqli_fetch_assoc($sql);
}else{
        echo "errrrrrr";
}

$sql_book=mysqli_query($koneksi,"SELECT * FROM `jenis_buku`");

$query = $koneksi->query("SELECT * FROM `jenis_buku`");
$query_1 = $koneksi->query("SELECT * FROM `jenis_buku`");

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
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> 
    <script type="text/javascript">
        $(document).ready(function(){
            $('#jenis').change(function(){
                var jenis_id = $(this).val();
                $.ajax({
                    url: "ajaxData.php?id="+jenis_id,
                    method: "GET",
                    success:function(result){
                        $('#buku').html(result);
                    }
                });
            });
            $('#jenis').change(function(){
                var jenis_id = $(this).val();
                $.ajax({
                    url: "ajaxData2.php?id="+jenis_id,
                    method: "GET",
                    success:function(result){
                        $('#autor').html(result);
                    }
                });
            });
        });
    </script>

    <title>Admin</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow p-3 mb-5 bg-body rounded">
            <div class="container-fluid">
                <a class="navbar-brand fw-normal" href="home.php" style="font-size: 30px" >
                    <i class="fas fa-book-open mt-4 mb-4 main-color " style="font-size: 30px"></i>
                    Hikmah<span class="main-color fw-bold" style="font-size: 30px">Lib</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto me-4 mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $username;?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item text-center" href="logout.php">Log out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>      
        <div class="formulir-upload text-center" style="margin-top: 80px" >
            <div class="align-items-center">
                <form action="admin-act.php" class="core-form " method="POST">
                    <div class="mb-3">
                        <h1 class="h3 mb-5 fw">Update<span class="fw-bolder main-color"> Author</span></h1>
                    </div>
                    <select class="form-select mb-3" aria-label=".form-select-sm example" id="jenis_up" name="jenis_up">
                        <option value="" selected disabled>--PILIH JENIS BUKU--</option>
                    <?php
                    if($count>0){
                        while($row_1 = $query_1->fetch_assoc()){
                            echo ' <option value="'.$row_1['id'].'">'.$row_1['jenis'].'</option>'; 
                        }
                    }else{
                            echo ' <option value="">ERROR</option>'; 

                    }
                    ?>
                    </select>
                    <input type="text" name="autor_up" id="autor_up" class="form-control mb-3" placeholder="Author" required >
                    <div class="d-grid gap-2">
                        <!--
                        <button type="submit" class="btn btn-lg bg text-white btn-solid">Login</button>
                        -->
                        <input type="submit" name="submit_auth" class="btn bd bg text-white" style="background: #98ded9" value="Update Author">
                    </div>
                </form>           
            </div> 
        </div>
        <div class="formulir-upload text-center " style="margin-top: 120px" >
            <div class="align-items-center">
                <form  action="admin_act.php" class="core-form " method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <h1 class="h3 mb-5 fw">Upload<span class="fw-bolder main-color"> Buku</span></h1>
                        <div class="text-center">
                            <label for="coverFile" class="mb-3">Masukkan Sampul</label>
                            <input class="form-control mb-3" type="file" id="coverFile" name='coverFile' required > 
                        </div>
                        <div class="text-center">
                           <label for="pdfFile" class="mb-3">Masukkan PDF</label> 
                            <input class="form-control" type="file" id="pdfFile" name='pdfFile' required>

                        </div>
                    </div>
                    <input type="text" name="up-judul" class="form-control mb-3" placeholder="Judul" required >
                    <textarea class="form-control mb-3" id="sinopsis" name="sinopsis" rows="10" style="resize:none" placeholder="Sinopsis"></textarea>
                    <input type="number" name="up-harga" class="form-control mb-3" placeholder="Harga" required >
                    <select class="form-select mb-3" aria-label=".form-select-sm example" id="jenis" name="jenis" required >
                        <option value="" selected disabled>--PILIH JENIS BUKU--</option>
                    <?php
                    if($count>0){
                        while($row = $query->fetch_assoc()){
                            if ($row['id'] == 0){
                                echo ' <option value="'.$row['id'].'" style="display: none">'.$row['jenis'].'</option>'; 

                            }else{
                                echo ' <option value="'.$row['id'].'">'.$row['jenis'].'</option>'; 

                            }
                        }
                    }else{
                            echo ' <option value="">ERROR</option>'; 

                    }
                    ?>
                    </select>
                    <select class="form-select mb-3" aria-label=".form-select-sm example" name="buku" id="buku" required>
                        <option value="" selected>--PILIH GENRE/BIDANG--</option>
                    </select>
                    <select class="form-select mb-3" aria-label=".form-select-sm example" name="autor" id="autor" required >
                        <option value="" selected>--PILIH AUTHOR--</option>
                    </select>
                    <div class="d-grid gap-2">
                        <!--
                        <button type="submit" class="btn btn-lg bg text-white btn-solid">Login</button>
                        -->
                        <input type="submit" name="submit_book" class="btn bd bg text-white" style="background: #98ded9" value="Update Buku">
                    </div>
                </form>           
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

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>
