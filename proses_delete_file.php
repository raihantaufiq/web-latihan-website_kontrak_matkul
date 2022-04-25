<?php

    if(isset($_GET['nim'])){
        include("connectdb.php");

        $nim = $_GET['nim'];

        $foto_sqlResult = mysqli_query($connect, "SELECT nim, path FROM foto_profile WHERE nim='$nim'");
        list($nim_foto, $path_foto) = mysqli_fetch_array($foto_sqlResult);

        if($nim_foto != null){
            unlink($path_foto);
            mysqli_query($connect, "DELETE FROM foto_profile WHERE nim='$nim'");
        }

        mysqli_close($connect);
        header("Location: profile.php");
    }

?>