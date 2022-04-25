<?php

    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpassword = '';
    $dbname = 'web_matkul';
    $connect = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

    if(! $connect){
        die('Could not connect: ' . mysqli_error($connect));
    }
    
?>