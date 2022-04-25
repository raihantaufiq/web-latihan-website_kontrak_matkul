<?php

    session_start();

    include('connectdb.php');

    if(isset($_POST['login'])){
        $nim = $_POST['nim'];
        $password = $_POST['password'];

        $query = "SELECT nim, password FROM mahasiswa WHERE nim='$nim' ";
        $result = mysqli_query($connect, $query);

        list($res_nim, $res_password) = mysqli_fetch_array($result);

        mysqli_close($connect);

        if($nim == $res_nim){

            if($password == $res_password){
                $_SESSION["login_nim"] = $res_nim;
                header('location:index.php');
            }else{
                header('location:form_login.php?status=wrongnimorpassword');
            }

        }else{
            header('location:form_login.php?status=wrongnimorpassword');
        }
    }
?>