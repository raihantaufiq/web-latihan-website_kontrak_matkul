<?php

if(isset($_GET['nim'])){
    include("connectdb.php");

    $nim = $_GET['nim'];

    $foto_sqlResult = mysqli_query($connect, "SELECT path FROM foto_profile WHERE nim='$nim'");
    list($path_foto) = mysqli_fetch_array($foto_sqlResult);

    //Read the url
    $url = $path_foto;

    //Clear the cache
    clearstatcache();

    //Check the file path exists or not
    if(file_exists($url)) {

        //Define header information
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($url).'"');
        header('Content-Length: ' . filesize($url));
        header('Pragma: public');

        //Clear system output buffer
        flush();

        //Read the size of the file
        readfile($url,true);

        //Terminate from the script
        die();
    }else{
        echo "File path does not exist.";
    }

    mysqli_close($connect);
    header("Location: profile.php");
}
echo "File path is not defined."

?>