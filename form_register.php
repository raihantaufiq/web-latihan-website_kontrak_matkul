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

    <style>
        /* untuk menyembunyikan spinner pada input angka */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
</head>
<body>

<nav class="p-2 bg-dark text-white">
    <div class="container">
        <div class="d-flex align-items-center justify-content-start">
            <!-- <img src="images/GnK.png" alt="logo" height="40px" width="auto" class="pe-3"> -->
            <ul class="nav col-12">
                <!-- <li><a href="index.php" class="nav-link px-3 text-white">Home</a></li> -->
            </ul>
        </div>
    </div>
</nav>
    
<main>
    <?php
    if(isset($_GET['status'])){
        if($_GET['status'] == "nimtaken"){ ?>
            <div class="container">
                <div class="alert alert-danger fw-bold text-center" role="alert">
                    Alert: NIM already exist, please insert different NIM
                </div>
            </div>
    <?php }
    }?>
    <div class="container col-12 p-5 my-3 shadow bg-light">
    <div class="col-md-10 mx-auto col-lg-8">
        <h3 class="mb-4 border-bottom text-center">Daftar Akun Baru</h3>
        <form action="register.php" method="POST" class="row g-3">
            <div class="col-sm-6">
              <label for="nim" class="form-label">NIM</label>
              <input required name="nim" type="number" class="form-control" id="nim">
            </div>
            <div class="col-sm-6">
              <label for="password" class="form-label">Password</label>
              <input required name="password" type="password" class="form-control" id="password">
            </div>
            <div class="col-12">
              <label for="namaLengkap" class="form-label">Nama Lengkap</label>
              <input required name="namaLengkap" type="text" class="form-control" id="namaLengkap">
            </div>
            <div class="col-12">
                <label for="angkatan" class="form-label">Angkatan</label>
                <input required name="angkatan" type="number" class="form-control" id="angkatan">
            </div>
            <div class="col-12 mb-2">
              <button name="register" id="register" type="submit" class="btn w-100 btn-primary">Register</button>
            </div>
        </form>
        <hr class="my-2">
        <small class="text-muted">Sudah punya akun? <a href="form_login.php">Masuk sekarang</a></small>
    </div>
    </div>
  
</main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>