<?php

include('../bd.php');
if(!empty($_GET['type'])) {$iddtype = $_GET['type'];} else {$iddtype = '0';}
if(!empty($_GET['id'])) {$id = $_GET['id'];} else {$id = '';}

$sql = "DELETE FROM commentaires WHERE id = ".$_GET['id']."";

if ($db->query($sql) === TRUE) {
    echo "Supprimé !";
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}

$db->close();
if($iddtype == 5) {
    header('Refresh:1;url= ../?page=actualites');
} else {
    header('Refresh:1;url= ../?page=contenuactu&id='.$_GET['idCom'].'');
}
exit;