<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "penilaian";
$id="";

$koneksi =mysqli_connect($host,$user,$pass,$db);
if (!$koneksi){
    die ("Tidak terkoneksi");
}

if (isset($_GET['op'])) {
    $op= $_GET['op'];
}
else {
    $op="";
}

if ($op =='delete') {
    $id = $_GET ['id'];
    $sql1 = "DELETE FROM dt_penilaian WHERE id='$id' "; 
    $q1 = mysqli_query($koneksi,$sql1);
    if ($q1){
        $sukses="Berhasil menghapus data";
    }
    else{
        $error="Gagal menghapus data";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Indeks Penilaian Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .mx-auto {width:1400px}
        .card {margin-top:20px; }
    </style>
</head>
<body>
    <div class="mx-auto">
        <!--untuk memasukkan data-->
        <div class="card">
            <div class="card-header text-white bg-secondary">
                Data Penilaian Dosen Universitas Nasional
            </div>
            
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                           <th scope="col">#</th>
                           <th scope="col">NIM</th>
                           <th scope="col">NAMA</th>
                           <th scope="col">JENIS KELAMIN</th>
                           <th scope="col">JURUSAN</th>
                           <th scope="col">SEMESTER</th>
                           <th scope="col">NAMA DOSEN</th>
                           <th scope="col">MATAKULIAH YANG DIAMPU</th>
                           <th scope="col">INDIKATOR KINERJA</th>
                           <th scope="col">KESAN PESAN</th> 
                           <th scope="col">OPSI</th>
                        </tr>
                        <tbody>
                        
                            <?php
                            $sql2 = "select *from dt_penilaian order by id desc";
                            $q2 = mysqli_query($koneksi,$sql2);
                            $urut=1;
                            while ($r2 = mysqli_fetch_array($q2)) {
                                $ID            = $r2['ID'];
                                $NIM            = $r2['NIM'];
                                $NAMA           = $r2['NAMA'];
                                $JENIS_KELAMIN  = $r2['JENIS_KELAMIN'];
                                $JURUSAN        = $r2['JURUSAN'];
                                $SEMESTER       = $r2['SEMESTER'];
                                $NAMA_DOSEN     = $r2['NAMA_DOSEN'];
                                $MATAKULIAH_YANG_DIAMPU    = $r2['MATAKULIAH_YANG_DIAMPU']; 
                                $INDIKATOR_KINERJA_UTAMA   = $r2['INDIKATOR_KINERJA_UTAMA'];
                                $KESAN_DAN_PESAN    = $r2['KESAN_DAN_PESAN'];

                                ?>
                                <tr>
                                    <th scope="row"><?php echo $urut++?></th>
                                    <td scope="row"><?php echo $NIM?></td>
                                    <td scope="row"><?php echo $NAMA?></td>
                                    <td scope="row"><?php echo $JENIS_KELAMIN?></td>
                                    <td scope="row"><?php echo $JURUSAN?></td>
                                    <td scope="row"><?php echo $SEMESTER?></td>
                                    <td scope="row"><?php echo $NAMA_DOSEN?></td>
                                    <td scope="row"><?php echo $MATAKULIAH_YANG_DIAMPU?></td>
                                    <td scope="row"><?php echo $INDIKATOR_KINERJA_UTAMA?></td>
                                    <td scope="row"><?php echo $KESAN_DAN_PESAN?></td>
                                    <td scope="row">

                                        <a href="edit.php?op=edit&id=<?php echo $ID?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                        <a href="data.php?op=delete&id=<?php echo $ID?>" onClick="return confirm('Yakin ingin menghapus?')"><button type="button" class="btn btn-danger">Delete</button></a>
                                        
                                        
                                    </td>

                                </tr>
                                <?php
                            }

                            ?>


                        </tbody>
                    </thead>
                </table>
                <div align="center"><a href="index.php">
                    <button type="button" class="btn btn-primary">Tambah Data</button>
                    </a>
                </div>
                               
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>