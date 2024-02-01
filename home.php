<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Peserta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384 T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M 2HN" crossorigin="anonymous">
    <style>
        .alamat{
            position: relative;
            left :132px;
            top: -15px;
        }
        .cari{
            position: relative;
            left : 300px;
            color : green;
        }
        .filter{
            position: relative;
            left  :20px;
        }
    </style>
</head>


<body class="">
    <center>
        <div class="container">
            <h2>Data Peserta</h2>

            <a href="tambah.php">
                <button type="button" class="btn btn-primary">Tambah Data</button>
            </a>

            <a href="home1.php">
                <button type="button" class="btn btn-primary">Sertifikasi</button>
            </a>
        </center>

        <br/><br/>
    <div class ="filter">
        <form action="home.php" method="get">
            <label>Cari Nama Peserta :</label>
            <input type="text" name="cari_nama"><br>
            <label>Cari Jenis Kelamin :</label>
            <input type="text" name="cari_jenis_kelamin"><br>
            <label>Cari Alamat :</label>
            <div class="alamat">
            <input type="text" name="cari_alamat">
            </div>
            </div>
            <div class="cari"> 
            <input type="submit" value="Cari"><br>
        </div>
            
        </form>

        <!--Letak Form Pencarian-->
        <?php
        if(isset($_GET['cari_nama']) || isset($_GET['cari_jenis_kelamin']) || isset($_GET['cari_alamat'])){
            $cari_nama = $_GET['cari_nama'];
            $cari_jenis_kelamin = $_GET['cari_jenis_kelamin'];
            $cari_alamat = $_GET['cari_alamat'];

            echo "<b>Hasil pencarian: Nama - ".$cari_nama.", Jenis Kelamin - ".$cari_jenis_kelamin.", Alamat - ".$cari_alamat."</b>";
        }
        ?>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kd_Skema</th>
                    <th scope="col">Nama_Peserta</th>
                    <th scope="col">Jenis kelamin</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No Hp</th>
                    <th scope="col">nik</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <?php
            include 'koneksi.php';
            $no = 1;

            if(isset($_GET['cari_nama']) || isset($_GET['cari_jenis_kelamin']) || isset($_GET['cari_alamat'])){
                $cari_nama = $_GET['cari_nama'];
                $cari_jenis_kelamin = $_GET['cari_jenis_kelamin'];
                $cari_alamat = $_GET['cari_alamat'];

                $sql = mysqli_query($coon, "SELECT * FROM tb_peserta WHERE nm_peserta LIKE '%$cari_nama%' AND jekel LIKE '%$cari_jenis_kelamin%' AND alamat LIKE '%$cari_alamat%'");
            } else {
                $sql = mysqli_query($coon, "SELECT * FROM tb_peserta");
            }
            ?>
            <tbody>
                <?php
                while($data = mysqli_fetch_array($sql)){
                    ?>
                    <tr>
                        <th scope="row"><?php echo $no; ?></th>
                        <td><?php echo $data['kd_skema']; ?></td>
                        <td><?php echo $data['nm_peserta']; ?></td>
                        <td><?php echo $data['jekel']; ?></td>
                        <td><?php echo $data['alamat']; ?></td>
                        <td><?php echo $data['no_hp']; ?></td>
                        <td><?php echo $data['nik']; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $data['id_peserta']; ?>">
                                <button type="button" class="btn btn-warning">Edit</button>
                            </a>

                            <a href="delete.php?id=<?php echo $data['id_peserta'] ?>">
                                <button type="button" class="btn btn-danger">Hapus</button>
                            </a>
                        </td>
                    </tr>
                    <?php
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384 C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46c DfL" crossorigin="anonymous"></script>
</body>
</html>
