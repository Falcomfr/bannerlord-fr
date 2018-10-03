<?php

include('../bd.php');
$iddtype = $_POST['type'];

if(!empty($_POST['inputCom'])) {$commentaire = $_POST['inputCom'];} else {$commentaire = '';}
if(!empty($_POST['idCom'])) {$idCom = $_POST['idCom'];} else {$idCom = '';}
$today = date("m.d.y");
$auteur = "Falcom";


$sql = "INSERT INTO commentaires (auteur, commentaire, date, idactu)
VALUES ('$auteur', '$commentaire', '$today', '$idCom')";

    if ($db->query($sql) === TRUE) {
        echo "Redirection veuillez patientez ...";
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }

$db->close();
if($iddtype == 5) {
    header('Refresh:1;url= ../?page=actualites');
} else {
    header('Refresh:1;url= ../?page=contenuactu&id='.$idCom.'');
}

exit;