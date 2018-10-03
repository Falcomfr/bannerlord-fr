<?php
include('../bd.php');

if(!empty($_POST['selectType'])) {$type = $_POST['selectType'];} else {$type = '';}

if(!empty($_POST['inputTitre'])) {$titre = $_POST['inputTitre'];} else {$titre = '';}

$auteur = "";

$today = date("m.d.y");

if(!empty($_POST['editor1'])) {$contenu = $_POST['editor1'];} else {$contenu = "";}

$vues = 1;

$id = $_GET['id'];
           
$sql = "UPDATE actu SET type = '$type', titre = '$titre', auteur = '$auteur', date = '$today', contenu = '$contenu', vues = '$vues' WHERE id = '$id'";

if ($db->query($sql) === TRUE) {
    echo "ajouté !";
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}

$db->close();

header('Location: ../?page=actualites');
exit;