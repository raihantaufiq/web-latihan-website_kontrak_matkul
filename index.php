<?php

include("connectdb.php");

session_start();

if(isset($_GET["clear_session"])){
    session_unset();
    header('location:index.php');
}

if(!isset($_SESSION["login_nim"])){
    header('location:form_login.php');
}

$nim_login = $_SESSION["login_nim"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <link rel="icon" href="images/Millennium_logo.png"> -->
    <title>Kontrak Mata Kuliah</title>
</head>
<body>

<nav class="p-2 bg-dark text-white">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <!-- <img src="images/GnK.png" alt="logo" height="40px" width="auto" class="pe-3"> -->
            <ul class="nav ">
                <li><a href="index.php" class="nav-link px-3 text-white">Home</a></li>
            </ul>
            <ul class="nav ">
                <li><a href="profile.php" class="btn btn-outline-primary me-2">MyProfile</a></li>
                <li class=""><a href="index.php?clear_session='true'" class="btn btn-outline-danger">Logout</a></li>
            </ul>
            
        </div>
    </div>
</nav>
    
<main>
    <div class="container col-12">
        <?php 
        $mahasiswa_sqlResult = mysqli_query($connect, "SELECT nama FROM mahasiswa WHERE nim='$nim_login'");
        list($nama_mahasiswa) = mysqli_fetch_array($mahasiswa_sqlResult);
        echo '<h3 class="text-center my-3">Selamat Datang '.$nama_mahasiswa.'</h3>';
        ?>
        <h5>Pilih Mata Kuliah Yang Akan di Kontrak</h5>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th class="col-1">Kode</th>
                    <th class="col-6">Nama Matkul</th>
                    <th>SKS</th>
                    <th class="col-4">Dosen</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $kontrak_sqlResult = mysqli_query($connect, "SELECT id_matkul FROM kontrak_matkul WHERE nim='$nim_login'");
                
                $id_matkul_inkontrak = [];
                $i=0;
                while(list($result) = mysqli_fetch_array($kontrak_sqlResult, MYSQLI_NUM)){
                    $id_matkul_inkontrak[$i] = $result;
                    $i ++;
                }
                
                $matkul_sqlResult = mysqli_query($connect, "SELECT * FROM mata_kuliah");
                $inc = 1;
                while (list($id_matkul, $nama_matkul, $sks, $nidn_inmatkul) = mysqli_fetch_array($matkul_sqlResult)) {
                    if(in_array($id_matkul, $id_matkul_inkontrak) == false){
                        $dosen_sqlResult = mysqli_query($connect, "SELECT nama FROM dosen WHERE nidn='$nidn_inmatkul'");
                        list($nama_dosen) = mysqli_fetch_array($dosen_sqlResult);
                        echo '<tr>';
                            echo '<th>'.$inc.'</th>';
                            echo '<td>'.$id_matkul.'</td>';
                            echo '<td>'.$nama_matkul.'</td>';
                            echo '<td>'.$sks.'</td>';
                            echo '<td>'.$nama_dosen.'</td>';
                            echo '<td><a href="add_kontrak.php?id_matkul='.$id_matkul.'&nim='.$nim_login.'" class="btn w-100 btn-sm btn-primary">Tambah</a></td>';
                        echo '</tr>';
                        $inc ++;
                    }
                }
                ?>
            </tbody>
        </table>
        <hr class="my-4">
        <h5>Usulan Mata Kuliah</h5>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th class="col-1">Kode</th>
                    <th class="col-6">Nama Matkul</th>
                    <th>SKS</th>
                    <th class="col-4">Dosen</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $kontrak_sqlResult = mysqli_query($connect, "SELECT id_matkul FROM kontrak_matkul WHERE nim='$nim_login' ORDER BY id_matkul");
                $inc = 1;
                while (list($id_matkul_inkontrak) = mysqli_fetch_array($kontrak_sqlResult)) {
                    $matkul_sqlResult = mysqli_query($connect, "SELECT nama_matkul, sks, nidn FROM mata_kuliah WHERE id_matkul='$id_matkul_inkontrak'");
                    list($nama_matkul, $sks, $nidn_inkontrak) = mysqli_fetch_array($matkul_sqlResult);
                    $dosen_sqlResult = mysqli_query($connect, "SELECT nama FROM dosen WHERE nidn='$nidn_inkontrak'");
                    list($nama_dosen) = mysqli_fetch_array($dosen_sqlResult);
                    echo '<tr>';
                        echo '<th>'.$inc.'</th>';
                        echo '<td>'.$id_matkul_inkontrak.'</td>';
                        echo '<td>'.$nama_matkul.'</td>';
                        echo '<td>'.$sks.'</td>';
                        echo '<td>'.$nama_dosen.'</td>';
                        echo '<td><a href="delete_kontrak.php?id_matkul='.$id_matkul_inkontrak.'&nim='.$nim_login.'" class="btn w-100 btn-sm btn-danger">Batal</a></td>';
                    echo '</tr>';
                    $inc ++; 
                }
                ?>
            </tbody>
        </table>
    </div>
  
</main>

<?php
    mysqli_close($connect);
?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>