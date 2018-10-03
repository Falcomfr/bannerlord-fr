<?php

$target_dir = "../img/clan/img/";
$target_file = $target_dir . basename($_FILES["logo"]["name"]);
$imgNameClan = $_FILES["logo"]["name"];
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["Envoyer"])) {
    $check = getimagesize($_FILES["logo"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "Le fichier n'est pas une image <br/>";
        $uploadOk = 0;
        header('Refresh:2;url= ../?page=ajoutClan');
        exit;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Désolé l'image existe déjà ! Veuillez recommencer ou changer son nom <br/>";
    $uploadOk = 0;
    header('Refresh:2;url= ../?page=ajoutClan');
    exit;
}
// Vérifie la largeur/hauteur
if (getimagesize($_FILES["logo"]["tmp_name"])[0] > 300) {
    echo "Désolé l'image est trop large (300px max) ! <br/>";
    $uploadOk = 0;
        header('Refresh:2;url= ../?page=ajoutClan');
        exit;
}

if(getimagesize($_FILES["logo"]["tmp_name"])[1] > 300) {
    echo "Désolé l'image est trop haute (300px max) ! <br/>";
    $uploadOk = 0;
    header('Refresh:2;url= ../?page=ajoutClan');
    exit;
}

// Check file size
if ($_FILES["logo"]["size"] > 1000000) {
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
    if (move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file)) {
        echo "L'image ". basename( $_FILES["logo"]["name"]). " a était téléchargé <br/>";
    } else {
        echo "Désolé il y a eu une erreur lors de l'upload <br/>";
        $suite = 0;
    }
}

?>
