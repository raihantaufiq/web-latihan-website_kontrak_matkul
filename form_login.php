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
        if($_GET['status'] == "wrongnimorpassword"){ ?>
            <div class="container">
                <div class="alert alert-danger fw-bold text-center" role="alert">
                    Alert: Wrong NIM or Password
                </div>
            </div>
    <?php }
    }?>
    <div class="container p-4">
    <div class="col-md-10 mx-auto col-lg-5">
        <h2 class="text-center mb-3">Kontrak Mata Kuliah</h2>
        <form action="login.php" method="post" class="p-4 p-md-5 border rounded-3 bg-light">
            <h3 class="text-center">Login</h3>
            <p class="text-center">Diperlukan login untuk kontrak matkul</p>
            <div class="form-floating mb-3">
                <input required name="nim" id="nim" type="number" class="form-control" placeholder="NIM">
                <label for="nim">NIM</label>
            </div>
            <div class="form-floating mb-3">
                <input required name="password" id="password" type="password" class="form-control" placeholder="Password">
                <label for="password">Password</label>
            </div>
            <button name="login" id="login" class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
            <hr class="my-4">
            <p class="text-muted">Belum punya akun? <a href="form_register.php">buat akun</a> sekarang!</p>
        </form>
    </div>
    </div>
  
</main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>