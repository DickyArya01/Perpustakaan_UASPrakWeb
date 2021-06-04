<?php
include 'connect.php';

$novel = "SELECT * FROM `data_buku`";
$coba= "SELECT * FROM `data_buku`, `genre` where genre.id=data_buku.id_buku";
$query = mysqli_query($koneksi, $novel);
$coba_query = mysqli_query($koneksi, $coba);
$hasil = array();
$res = array();

while($data = mysqli_fetch_array($query)){
   array_push($hasil, array(
       'judul'      => $data['nama_buku'],
       'cover'      => $data['cover'],
       'file'       => $data['file'],
       'sinopsis'   => $data['sinopsis'],
       'harga_buku' => $data['harga_buku'],
       'jenis'      => $data['id_jenis'],
       'buku'       => $data['id_buku'],
       'author'     => $data['id_author'],
   )); 
}

while($row = mysqli_fetch_array($coba_query)){
    array_push($res, array(
        'id_genre'    => $row['id'],
        'genre'       => $row['genre'],
        'jenis'       => $row['jenis'],  
    ));
}

// $json= json_encode(array('book' =>$hasil, ));
// echo $json;
echo json_encode($hasil);
// echo $hasil;

// var_dump($res);
// $json1= json_encode(array('kategori' =>$res, ));
// echo json_encode($res);
// echo $json1;
// $file = "data.json";

// if(file_put_contents($file, "anjayy")){
//     echo ("file created");
// }else{
//     echo ("failed");
// }
?>