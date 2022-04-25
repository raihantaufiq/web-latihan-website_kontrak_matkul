<?php

    include('connectdb.php');

    session_start();

    if(isset($_POST['register'])){
        $nim = $_POST['nim'];
        $password = $_POST['password'];
        $namaLengkap = $_POST['namaLengkap'];
        $angkatan = $_POST['angkatan'];

        $query = "SELECT nim FROM mahasiswa WHERE nim='$nim' ";
        $result = mysqli_query($connect, $query);
        $res_nim = mysqli_fetch_array($result);

        if($res_nim == null){
            $query = "INSERT INTO mahasiswa (nim, password, nama, angkatan) VALUES ('$nim', '$password', '$namaLengkap', '$angkatan')";
            $result = mysqli_query($connect, $query);
            mysqli_close($connect);
            $_SESSION["login_nim"] = $nim;
            header('location:index.php');
        }else{
            mysqli_close($connect);
            header('location:form_register.php?status=nimtaken');
        }
        
    }    
?>