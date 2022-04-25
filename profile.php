<?php

include("connectdb.php");

session_start();

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
        $mahasiswa_sqlResult = mysqli_query($connect, "SELECT nama, angkatan FROM mahasiswa WHERE nim='$nim_login'");
        list($nama_mahasiswa, $angkatan) = mysqli_fetch_array($mahasiswa_sqlResult);

        $foto_sqlResult = mysqli_query($connect, "SELECT nim, path FROM foto_profile WHERE nim='$nim_login'");
        list($nim_foto, $path_foto) = mysqli_fetch_array($foto_sqlResult);
        ?>

        <div class="container py-5">
            <div class="row text-center">
                <div>
                    <?php 
                    if($nim_foto == null){
                        echo '<img src="images/profile_blank.jpg" alt="blank" width="auto" height="250">';
                    }else{
                        echo '<img src="'.$path_foto.'" alt="blank" width="auto" height="250">';
                        echo '<br />';
                        echo '<a href="proses_download.php?nim='.$nim_login.'" class="btn btn-sm btn-outline-primary mt-1">Download foto</a>';
                    }
                    ?>
                    
                    <h3 class="mt-2"><?php echo $nama_mahasiswa; ?></h3>
                    <h5>NIM <?php echo $nim_login; ?></h5>
                    <p class="fw-bold">Angkatan <?php echo $angkatan; ?></p>
                </div>
                <hr>
                <div class="py-3">
                    Upload foto profil
                    <form action="proses_upload.php?nim=<?php echo $nim_login; ?>" method="post" enctype="multipart/form-data">
                        <div class="input-group">
                            <input type="file" class="form-control col-8 col-lg-10" name="upload_foto" id="upload_foto">
                            <input type="submit" class="btn  btn-outline-primary rounded-0 col-2 col-lg-1" id="upload" name="upload" value="Upload">
                            <a href="profile.php" class="btn  btn-outline-secondary rounded-0 col-2 col-lg-1">Cancel</a>
                        </div>
                    </form>
                    <a href="proses_delete_file.php?nim=<?php echo $nim_login; ?>" class="btn btn-outline-danger mt-3 mb-3">Hapus Foto Profil</a>
                </div>
                <hr>
            </div>
        </div>
        
    </div>
  
</main>

<?php
    mysqli_close($connect);
?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>