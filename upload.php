<?php 
if (isset($_POST['submit_file'])){
    $file = $_FILES['file'];
    
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 100000){
                $fileNameNew = uniqid('', true).".". $fileActualExt;
                $fileDestination = 'uploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                header("Location: pag_user.php?uploadsuccess");
            } else{
                echo "<script> alert('Arquivo muito grande') </script>";
            }
        } else{
            echo '<script> alert("Opa, você não está logado. Acho que você não deveria estar aqui.") </script>';
        }
    }else{
        echo "cacea";
        echo '<script> alert("Não é permitido enviar esse tipo de arquivo. Apenas JPG, JPEG ou PNG.") </script>';
    }
}
?>