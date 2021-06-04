<?php
include ('connect.php');

if(isset($_GET["id"])){
   $query = $koneksi->query("SELECT * FROM `data_autor` WHERE jenis = ".$_GET["id"]." "); 
   $count = mysqli_num_rows($query);

   if($count > 0){
            echo '<option value="" selected>--PILIH AUTHOR--</option>';
       while($row = $query->fetch_assoc()){
            echo ' <option value="'.$row['nama_autor'].'">'.$row['nama_autor'].'</option>'; 
       } 
   }
}else{
    echo ' <option value="">ERROR</option>'; 
    echo ' <option value="">'.$_GET["nama_autor"].'</option>'; 

}
?>
