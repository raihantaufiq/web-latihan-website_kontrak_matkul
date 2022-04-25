<!-- handle upload form -->
<?php
if(isset($_POST['upload'])){
    include("connectdb.php");

    $nim = $_GET['nim'];

    $fileName = $_FILES['upload_foto']['name'];
    $fileTmpName = $_FILES['upload_foto']['tmp_name'];
    $fileSize = $_FILES['upload_foto']['size'];
    $fileError = $_FILES['upload_foto']['error'];
    
    // split string berdasar karakter
    $spiltName = explode('.', $fileName); 

    // ambil string terakhir / elemen terakhir dari spiltName
    $fileType = strtolower(end($spiltName));
    
    // tipe file yang di izinkan
    $allowed = array('jpg', 'jpeg', 'png');

    // batas ukuran file
    $sizeLimit = 10000000; // 10MB
    
    //check if file is empty
    if(empty($fileName)){
        echo "File is empty";
    }
    //check if file is allowed
    else if(!in_array($fileType, $allowed)){
        echo "File is not allowed";
    }
    //check if file is too big
    else if($fileSize > $sizeLimit){
        echo "File is too big";
    }
    //check if there is error
    else if($fileError === 1){
        echo "There is an error";
    }
    else{

        $fileName = $nim."_".$fileName; // tambahkan nim di depan nama file
        $fileDestination = 'images/'.$fileName; // tempat file akan disimpan

        $foto_sqlResult = mysqli_query($connect, "SELECT nim, path FROM foto_profile WHERE nim='$nim'");
        list($nim_foto, $path_foto) = mysqli_fetch_array($foto_sqlResult);

        //check if file already exist
        if($nim_foto != null){
            // echo "File already exist";
            unlink($path_foto);
            $foto_sqlResult = mysqli_query($connect, "UPDATE foto_profile SET name_file='$fileName', size='$fileSize', path='$fileDestination', type='$fileType', date=NOW() WHERE nim='$nim'");

        }else{

            //upload file
            $foto_query = "INSERT INTO foto_profile (nim ,name_file, size, path, type, date) VALUES ('$nim' ,'$fileName', '$fileSize', '$fileDestination', '$fileType', NOW())";
            mysqli_query($connect, $foto_query);
        }

        move_uploaded_file($fileTmpName, $fileDestination);

        mysqli_close($connect);
        header("Location: profile.php");
    }
  
}

