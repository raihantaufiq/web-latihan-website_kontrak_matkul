<?php

include("connectdb.php");

if(isset($_GET['id_matkul']) && isset($_GET['nim'])){
    $id_matkul = $_GET['id_matkul'];
    $nim = $_GET['nim'];

    mysqli_query($connect, "INSERT INTO kontrak_matkul (id_matkul, nim) VALUES ('$id_matkul' ,'$nim')");

}

mysqli_close($connect);
header('location:index.php');

?>