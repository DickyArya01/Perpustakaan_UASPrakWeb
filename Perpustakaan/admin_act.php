<?php
include 'connect.php';

$cover=$_FILES['coverFile'];
$pdf=$_FILES['pdfFile'];

$coverName=$_FILES['coverFile']['name'];
$coverTmp=$_FILES['coverFile']['tmp_name'];
$coverSize=$_FILES['coverFile']['size'];
$coverType=$_FILES['coverFile']['type'];
$coverError=$_FILES['coverFile']['error'];

$pdfName=$_FILES['pdfFile']['name'];
$pdfTmp=$_FILES['pdfFile']['tmp_name'];
$pdfSize=$_FILES['pdfFile']['size'];
$pdfType=$_FILES['pdfFile']['type'];
$pdfError=$_FILES['pdfFile']['error'];

$judul=$_POST['up-judul'];
$sinopsis=$_POST['sinopsis'];
$harga = $_POST['up-harga'];
$jenis= $_POST['jenis'];
$buku = $_POST['buku'];
$autor= $_POST['autor'];


if(isset($_POST["submit_book"])){
    // $coverData=base64_encode(file_get_contents($coverTmp));
    // $pdfData=base64_encode(file_get_contents($pdfTmp));
    if($coverSize < 1000000 && $pdfSize < 1000000){
        if($coverError == 0 && $pdfError ==0){
            $coverExt = explode('.',$coverName);
            $coverActualExt = strtolower(end($coverExt));

            $pdfExt = explode('.',$pdfName);
            $pdfActualExt = strtolower(end($pdfExt));

            $coverAllowed = array('jpg','jpeg', 'png');
            $pdfAllowed = 'pdf';

            if(in_array($coverActualExt,$coverAllowed) && $pdfActualExt == $pdfAllowed){
                if($jenis == 1){
                    $uploadCover= "cover/$coverName";
                    $uploadBook= "book/$pdfName";
                    $sql_novel="INSERT INTO `data_buku`(`id`, `nama_buku`, `cover`, `file`, `sinopsis`, `harga_buku`, `id_jenis`, `id_buku`, `id_author`) VALUES (NULL,'$judul','$uploadCover','$uploadBook','$sinopsis','$harga','$jenis','$buku','$autor')";
                    $insert_novel=$koneksi->query($sql_novel);

                    if($insert_novel){
                        $coverData = move_uploaded_file($coverTmp,$uploadCover);
                        $pdfData = move_uploaded_file($pdfTmp,$uploadBook);
                        if($coverData && $pdfData){
                            header('location: home.php');
                        }else{
                            echo "tidak bisa";
                        }
                    }else{
                        echo "error";
                        echo $jenis;
                        echo $buku;
                        echo $autor;
                    }
                }elseif($jenis == 2){
                    $uploadCover= "cover/$coverName";
                    $uploadBook= "book/$pdfName";
                    $sql_pd="INSERT INTO `data_buku`(`id`, `nama_buku`, `cover`, `file`, `sinopsis`, `harga_buku`, `id_jenis`, `id_buku`, `id_author`) VALUES (NULL,'$judul','$uploadCover','$uploadBook','$sinopsis','$harga','$jenis','$buku','$autor')";
                    $insert_pd=$koneksi->query($sql_pd);
                    if($insert_pd){
                        $coverData = move_uploaded_file($coverTmp,$uploadCover);
                        $pdfData = move_uploaded_file($pdfTmp,$uploadBook);
                        if($coverData && $pdfData){
                            header('location: home.php');
                        }else{
                            echo "tidak bisa";
                        }
                    }else{
                        echo "tidak bisa";
                    }
                }elseif($jenis = 3){
                    
                    $uploadCover= "cover/$coverName";
                    $uploadBook= "book/$pdfName";
                    $sql_bp="INSERT INTO `data_buku`(`id`, `nama_buku`, `cover`, `file`, `sinopsis`, `harga_buku`, `id_jenis`, `id_buku`, `id_author`) VALUES (NULL,'$judul','$uploadCover','$uploadBook','$sinopsis','$harga','$jenis','$buku','$autor')";
                    $insert_bp=$koneksi->query($sql_bp);
                    if($insert_bp){
                        $coverData = move_uploaded_file($coverTmp,$uploadCover);
                        $pdfData = move_uploaded_file($pdfTmp,$uploadBook);
                        if($coverData && $pdfData){
                            header('location: home.php');
                        }else{
                            echo "tidak bisa";
                        }
                    }else{
                        echo "error";
                        echo $jenis;
                        echo $buku;
                    }                    
                }else{
                    echo "masukkan jenis buku";
                }

            }else{
                if(!in_array($coverActualExt,$coverAllowed)){
                    echo "file sampul harus gambar";
                }elseif($pdfActualExt != $pdfAllowed){
                    echo "file buku harus pdf";
                }else{
                    echo "file harus diisi";
                }
            }


        }else{
            echo "file terlalu besar";
        }
    }else{
        echo "gak bisa";
    }
}


?>