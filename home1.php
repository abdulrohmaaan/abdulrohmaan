<!doctype html> 
<html lang="en"> 
<head> 
<meta charset="utf-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<title>Data Sertifikasi</title> 
<link 
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
rel="stylesheet" integrity="sha384
T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M
 2HN" crossorigin="anonymous"> 
</head> 
<body> 
<div class="container"> 
<h2>Data Sertifikasi</h2> 
<a href="tambah.php"> 
  <button type="button" class="btn btn-primary" style="background-color: green;">Tambah Data</button>
</a>

<a href="home.php"> 
  <button type="button" class="btn btn-primary" style="background-color: green;">Peserta</button>
</a>

<br/><br/> 
<form action="home1.php" method="get"> 
<label>Cari :</label> 
<input type="text" name="cari"> 
<input type="submit" value="cari"> 
</form> 
<!--Letak Form Pencarian--> 
<?php  
if(isset($_GET['cari'])){ 
$cari = $_GET['cari']; 
echo "<b>Hasil pencarian : ".$cari."</b>"; 
} 
?> 
<table class="table"> 
<thead> 
<tr> 
<th scope="col">No</th> 
<th scope="col">Kd_Skema</th> 
<th scope="col">Nm_skema</th> 
<th scope="col">Jenis</th> 
<th scope="col">Jumlah Unit</th> 
<th scope="col">Action</th> 
</tr> 
</thead> 
<!--Letak Proses Pencarian--> 
<?php  
include 'koneksi.php'; 
$no=1; 
if(isset($_GET['cari'])){ 
$cari = $_GET['cari']; 
$sql = mysqli_query($coon, "select * from tb_skema where nm_skema like 
'%".$cari."%'"); 
}else{ 
$sql = mysqli_query($coon,"select * from tb_skema");   
} 
while($data=mysqli_fetch_array($sql)){ 
?> 
<tbody> 
<tr> 
<th scope="row"><?php echo $no; ?></th> 
<td><?php echo $data['kd_skema']; ?></td> 
<td><?php echo $data['nm_skema']; ?></td> 
<td><?php echo $data['jenis']; ?></td> 
<td><?php echo $data['jml_unit']; ?></td> 
<td> 
<a href="edit1.php?id=<?php echo $data['id_skema']; ?>"><button type="button" 
class="btn btn-warning">Edit</button>  
<a href="delete1.php?id=<?php echo $data['id_skema'] ?>"><button type="button" 
class="btn btn-danger">Hapus</button>   
</td> 
</tr> 
<?php  
$no++; 
} 
?>    
</tbody> 
</table> 
</div> 
<script 
src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384
C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46c
 DfL" crossorigin="anonymous"></script> 
</body> 
</html>