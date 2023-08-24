<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "penilaian";

$koneksi =mysqli_connect($host,$user,$pass,$db);
if (!$koneksi){
    die ("Tidak terkoneksi");
}

$ID             ="";
$NIM            = "";
$NAMA           = "";
$JENIS_KELAMIN  = "";
$JURUSAN        = "";
$SEMESTER       = "";
$NAMA_DOSEN     = "";
$MATAKULIAH_YANG_DIAMPU     = "";
$INDIKATOR_KINERJA_UTAMA   = "";
$KESAN_DAN_PESAN    ="";
$sukses="";
$error ="";

if (isset($_GET['op'])) {
    $op= $_GET['op'];
}
else {
    $op="";
}

if ($op=='edit') {
    $id=$_GET['id'];
    $sql1 = "select * from dt_penilaian where id='$id' ";
    $q1 = mysqli_query($koneksi,$sql1);
    $r1= mysqli_fetch_array ($q1);
    $NIM            = $r1['NIM'];
    $NAMA           = $r1['NAMA'];
    $JENIS_KELAMIN  = $r1['JENIS_KELAMIN'];
    $JURUSAN        = $r1['JURUSAN'];
    $SEMESTER       = $r1['SEMESTER'];
    $NAMA_DOSEN     = $r1['NAMA_DOSEN'];
    $MATAKULIAH_YANG_DIAMPU    = $r1['MATAKULIAH_YANG_DIAMPU']; 
    $INDIKATOR_KINERJA_UTAMA   = $r1['INDIKATOR_KINERJA_UTAMA'];
    $KESAN_DAN_PESAN    = $r1['KESAN_DAN_PESAN'];

    if ($NIM==''){
        $error="Data tidak ditemukan";
    }

}

if (isset($_POST['SIMPAN'])){
    $NIM    =$_POST['NIM'];
    $NAMA   =$_POST['NAMA'];
    $JENIS_KELAMIN  =$_POST['JENIS_KELAMIN'];
    $JURUSAN    =$_POST['JURUSAN'];
    $SEMESTER   =$_POST['SEMESTER'];
    $NAMA_DOSEN =$_POST['NAMA_DOSEN'];
    $MATAKULIAH_YANG_DIAMPU =$_POST['MATAKULIAH_YANG_DIAMPU'];
    $INDIKATOR_KINERJA_UTAMA    =$_POST['INDIKATOR_KINERJA_UTAMA'];
    $INDIKATOR_KINERJA_ALL=implode(", ", $INDIKATOR_KINERJA_UTAMA);
    $KESAN_DAN_PESAN    =$_POST['KESAN_DAN_PESAN'];
   

        if($NIM && $NAMA && $JENIS_KELAMIN && $JURUSAN && $SEMESTER && $NAMA_DOSEN && $MATAKULIAH_YANG_DIAMPU && $INDIKATOR_KINERJA_ALL && $KESAN_DAN_PESAN){
            if ($op=='edit') {
                $sql1 = "update dt_penilaian set NIM='$NIM',NAMA ='$NAMA',JENIS_KELAMIN='$JENIS_KELAMIN',JURUSAN='$JURUSAN',SEMESTER='$SEMESTER' ,NAMA_DOSEN='$NAMA_DOSEN' ,MATAKULIAH_YANG_DIAMPU='$MATAKULIAH_YANG_DIAMPU' ,INDIKATOR_KINERJA_UTAMA='$INDIKATOR_KINERJA_ALL' ,KESAN_DAN_PESAN='$KESAN_DAN_PESAN' where id='$id' ";
                $q1= mysqli_query($koneksi,$sql1);
                if ($q1) {
                    $sukses="Data berhasil diupdate";
                }
                else{
                    $error="Data gagal diupdate";
                }
            }
            else {
                $sql1   ="insert into dt_penilaian(NIM,NAMA,JENIS_KELAMIN,JURUSAN,SEMESTER ,NAMA_DOSEN ,MATAKULIAH_YANG_DIAMPU ,INDIKATOR_KINERJA_UTAMA ,KESAN_DAN_PESAN)
                values ('$NIM' ,'$NAMA', '$JENIS_KELAMIN', '$JURUSAN' ,'$SEMESTER' ,'$NAMA_DOSEN','$MATAKULIAH_YANG_DIAMPU','$INDIKATOR_KINERJA_ALL','$KESAN_DAN_PESAN')";
                $q1 = mysqli_query($koneksi,$sql1);

                if ($q1){
                $sukses = "Berhasil memasukkan data baru";
                }
                else {
                $error = "Gagal memasukkan data";
                }
            }
            
        }
        else{
            $error="Silahkan masukkan semua data";
        }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .mx-auto {width:800px}
        .card {margin-top:20px; }
    </style>

</head>
<body>
    <div class="mx-auto">
        <!--untuk memasukkan data-->
        <div class="card">
            <div class="card-header text-white bg-primary">
                Edit Data
            </div>

            <div class="card-body">
                <?php
                    if ($error){
                        ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error ?>
                            </div>
                        <?php
                    }
                ?>
                <?php
                    if ($sukses){
                        ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo $sukses ?>
                            </div>
                        <?php
                    }
                ?>

                <form action="" method="POST">
                <div class="mb-3 row">
                    <label for="NIM" class="col-sm-2 col-form-label">NIM</label>
                    <div class="col-sm-10">
                        <input type="text"  class="form-control" id="NIM" name="NIM" value="<?php echo $NIM ?>">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="NAMA" class="col-sm-2 col-form-label">NAMA</label>
                    <div class="col-sm-10">
                        <input type="text"  class="form-control" id="NAMA" name="NAMA" value="<?php echo $NAMA ?>">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="JENIS_KELAMIN" class="col-sm-2 col-form-label">JENIS KELAMIN</label>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="JENIS_KELAMIN" value="Laki-laki" id="Laki-laki">
                            <label class="form-check-label" for="Laki-laki">
                                Laki-laki
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="JENIS_KELAMIN" value="Perempuan" id="Perempuan" checked>
                            <label class="form-check-label" for="Perempuan">
                                Perempuan
                            </label>
                        </div>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="JURUSAN" class="col-sm-2 col-form-label">JURUSAN</label>
                    <div class="col-sm-10">
                        <input type="text"  class="form-control" id="JURUSAN" name="JURUSAN" value="<?php echo $JURUSAN ?>">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="SEMESTER" class="col-sm-2 col-form-label">SEMESTER</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="SEMESTER"  id="SEMESTER">
                            <option value="">--Pilih Semester--</option>
                            <option value="1" <?php if ($SEMESTER=="1") echo "Selected" ?>>Semester 1</option>
                            <option value="2" <?php if ($SEMESTER=="2") echo "Selected" ?>>Semester 2</option>
                            <option value="3" <?php if ($SEMESTER=="3") echo "Selected" ?>>Semester 3</option>
                            <option value="4" <?php if ($SEMESTER=="4") echo "Selected" ?>>Semester 4</option>
                            <option value="5" <?php if ($SEMESTER=="5") echo "Selected" ?>>Semester 5</option>
                            <option value="6" <?php if ($SEMESTER=="6") echo "Selected" ?>>Semester 6</option>
                            <option value="7" <?php if ($SEMESTER=="7") echo "Selected" ?>>Semester 7</option>
                            <option value="8" <?php if ($SEMESTER=="8") echo "Selected" ?>>Semester 8</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="NAMA_DOSEN" class="col-sm-2 col-form-label">NAMA DOSEN</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="NAMA_DOSEN" id="NAMA_DOSEN">
                            <option value="">--Pilih Dosen--</option>
                            <option value="Aris Gunaryati, S.Si, MMSI" <?php if ($NAMA_DOSEN=="Aris Gunaryati, S.Si, MMSI") echo "Selected" ?>>Aris Gunaryati, S.Si, MMSI</option>
                            <option value="Agus Iskandar, S.Kom, M.Kom" <?php if ($NAMA_DOSEN=="Agus Iskandar, S.Kom, M.Kom") echo "Selected" ?>>Agus Iskandar, S.Kom, M.Kom</option>
                            <option value="Ira Diana Sholihati, S.Si, MMSI" <?php if ($NAMA_DOSEN=="Ira Diana Sholihati, S.Si, MMSI") echo "Selected" ?>>Ira Diana Sholihati, S.Si, MMSI</option>
                            <option value="Novi Dian Nathasia, S.Kom, MMSI" <?php if ($NAMA_DOSEN=="Novi Dian Nathasia, S.Kom, MMSI") echo "Selected" ?>>Novi Dian Nathasia, S.Kom, MMSI</option>
                            <option value="Frenda Farahdinna, S.Kom., M.Kom" <?php if ($NAMA_DOSEN=="Frenda Farahdinna, S.Kom., M.Kom") echo "Selected" ?>>Frenda Farahdinna, S.Kom., M.Kom</option>
                            <option value="Rini Nuraini, S.T, M.Kom" <?php if ($NAMA_DOSEN=="Rini Nuraini, S.T, M.Kom") echo "Selected" ?>>Rini Nuraini, S.T, M.Kom</option>
                            <option value="Eri Mardiani, S.Kom., M.Kom" <?php if ($NAMA_DOSEN=="Eri Mardiani, S.Kom., M.Kom") echo "Selected" ?>>Eri Mardiani, S.Kom., M.Kom</option>
                            <option value="Arie Gunawan, S.Kom, MMSI" <?php if ($NAMA_DOSEN=="Arie Gunawan, S.Kom, MMSI") echo "Selected" ?>>Arie Gunawan, S.Kom, MMSI</option>
                            <option value="Rima Tamara Aldisa, S.Kom., M.Kom" <?php if ($NAMA_DOSEN=="Rima Tamara Aldisa, S.Kom., M.Kom") echo "Selected" ?>>Rima Tamara Aldisa, S.Kom., M.Kom</option>
                            <option value="Dhieka Avrilia Lantana, S.Kom., M.Kom" <?php if ($NAMA_DOSEN=="Dhieka Avrilia Lantana, S.Kom., M.Kom") echo "Selected" ?>>Dhieka Avrilia Lantana, S.Kom., M.Kom</option>
                           
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="MATAKULIAH_YANG_DIAMPU" class="col-sm-2 col-form-label">MATAKULIAH YANG DIAMPU</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="MATAKULIAH_YANG_DIAMPU" id="MATAKULIAH_YANG_DIAMPU">
                            <option value="">--Pilih MataKuliah Yang Diampu--</option>
                            <option value="Algoritma dan Pemrograman" <?php if ($MATAKULIAH_YANG_DIAMPU=="Algoritma dan Pemrograman") echo "Selected" ?>>Algoritma dan Pemrograman</option>
                            <option value="Kalkulus" <?php if ($MATAKULIAH_YANG_DIAMPU=="Kalkulus") echo "Selected" ?>>Kalkulus</option>
                            <option value="Aljabar" <?php if ($MATAKULIAH_YANG_DIAMPU=="Aljabar") echo "Selected" ?>>Aljabar Linier</option>
                            <option value="Matematika Diskrit" <?php if ($MATAKULIAH_YANG_DIAMPU=="Matematika Diskrit") echo "Selected" ?>>Matematika Diskrit</option>
                            <option value="Komunikasi Data dan Jaringan Komputer" <?php if ($MATAKULIAH_YANG_DIAMPU=="Komunikasi Data dan Jaringan Komputer") echo "Selected" ?>>Komunikasi Data dan Jaringan Komputer</option>
                            <option value="Pemrograman Web" <?php if ($MATAKULIAH_YANG_DIAMPU=="Pemrograman Web") echo "Selected" ?>>Pemrograman Web</option>
                            <option value= "Pengantar Teknologi Komunikasi dan Informatika" <?php if ($MATAKULIAH_YANG_DIAMPU=="Pengantar Teknologi Komunikasi dan Informatika") echo "Selected" ?>>Pengantar Teknologi Komunikasi dan Informatika</option>
                            <option value="TIK dan Masyarakat" <?php if ($MATAKULIAH_YANG_DIAMPU=="TIK dan Masyarakat") echo "Selected" ?>>TIK dan Masyarakat</option>
                            
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="INDIKATOR_KINERJA_UTAMA[]" class="col-sm-2 col-form-label">INDIKATOR KINERJA</label>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="INDIKATOR_KINERJA_UTAMA[]" value="Penjelasan Dosen Mudah Dimengerti" id="Penjelasan Dosen Mudah Dimengerti">
                                <label class="form-check-label" for="Penjelasan Dosen Mudah Dimengerti">
                                    Penjelasan Dosen Mudah Dimengerti
                                </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="INDIKATOR_KINERJA_UTAMA[]" value="Bahan Ajar Dosen Lengkap" id="Bahan Ajar Dosen Lengkap" checked>
                                <label class="form-check-label" for="Bahan Ajar Dosen Lengkap">
                                    Bahan Ajar Dosen Lengkap
                                </label>
                        </div> 
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="INDIKATOR_KINERJA_UTAMA[]" value="Dosen Komunikatif" id="Dosen Komunikatif" checked>
                                <label class="form-check-label" for="Dosen Komunikatif">
                                    Dosen Komunikatif
                                </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="INDIKATOR_KINERJA_UTAMA[]" value="Ketepatan Waktu dalam mengawali dan mengakhiri perkuliahan" id="Ketepatan Waktu dalam mengawali dan mengakhiri perkuliahan" checked>
                                <label class="form-check-label" for="Ketepatan Waktu dalam mengawali dan mengakhiri perkuliahan">
                                    Ketepatan Waktu dalam mengawali dan mengakhiri perkuliahan
                                </label>
                        </div>  
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="INDIKATOR_KINERJA_UTAMA[]" value="Dosen Memberikan Tugas Yang Sesuai" id="Dosen Memberikan Tugas Yang Sesuai" checked>
                                <label class="form-check-label" for="Dosen Memberikan Tugas Yang Sesuai">
                                    Dosen Memberikan Tugas Yang Sesuai
                                </label>
                        </div>
                    </div>
                </div>
                
                

                <div class="mb-3 row">
                    <label for="KESAN_DAN_PESAN" class="col-sm-2 col-form-label">KESAN DAN PESAN TERHADAP DOSEN</label>
                    <div class="col-sm-10">
                            <textarea class="form-control" name="KESAN_DAN_PESAN"  id="KESAN_DAN_PESAN" rows="5"></textarea>
                    </div>
                </div>
                

            </div>
        </div>
                <br>
                <div class="col-12">
                    <input type="submit" name="SIMPAN" value="Simpan Data" class="btn btn-primary ">
                </div>
                <br>
            
                </form>

            </div>
        </div>   
        
        
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>