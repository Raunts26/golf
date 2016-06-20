<?php
$target_dir = "images/courses/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$target_file = $target_dir . $_POST['course_id'] . ".jpg";
$uploadOk = 1;
echo($target_file);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "Fail on pilt - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "Tegemist pole pildiga.";
        $uploadOk = 0;
    }
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 10000000) {
    echo "Fail on liiga suur, suurus ületas 10MB.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "JPG, JPEG, PNG ja GIF formaat on ainult toetatud!";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Tekkis viga, faili ei laetud üles!";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "Fail ". basename( $_FILES["fileToUpload"]["name"]). " on edukalt salvestatud!";
        header("Location: " . $_SERVER['HTTP_REFERER']);
    } else {
        echo "Tekkis mingisugune viga.";
    }
}
?>
