<?php

include("connectdb.php");

if(isset($_GET['id_matkul']) && isset($_GET['nim'])){
    $id_matkul = $_GET['id_matkul'];
    $nim = $_GET['nim'];

    mysqli_query($connect, "DELETE FROM kontrak_matkul WHERE id_matkul='$id_matkul' AND nim='$nim'");

}

mysqli_close($connect);
header('location:index.php');

?>