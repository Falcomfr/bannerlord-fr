
<?php

$target_dir = "../img/uploadActu/";
$target_file = $target_dir . basename($_FILES["inputImg"]["name"]);
$imgName = $_FILES["inputImg"]["name"];
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["Envoyer"])) {
    $check = getimagesize($_FILES["inputImg"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "Le fichier n'est pas une image <br/>";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Désolé l'image existe déjà ! <br/>";
    $uploadOk = 0;
}
// Vérifie la largeur/hauteur
if (getimagesize($_FILES["inputImg"]["tmp_name"])[0] < 320) {
    echo "Désolé l'image n'est pas assez large (320px min) ! <br/>";
    $uploadOk = 0;
}

if(getimagesize($_FILES["inputImg"]["tmp_name"])[1] < 180) {
    echo "Désolé l'image n'est pas assez haute (180px min) ! <br/>";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["inputImg"]["size"] > 1000000) {
    echo "Désolé le image est trop volumineux <br/>";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Désolé, seulement JPG, JPEG, PNG & GIF <br/>";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Veuillez recommencer..<br/>";
    $suite = 0;
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["inputImg"]["tmp_name"], $target_file)) {
        echo "L'image ". basename( $_FILES["inputImg"]["name"]). " a était téléchargé <br/>";
    } else {
        echo "Désolé il y a eu une erreur lors de l'upload <br/>";
        $suite = 0;
    }
}

?>
