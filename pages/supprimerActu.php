<?php

include('../bd.php');

$query = $db->query("SELECT * FROM actu WHERE id = ".$_GET['id']."");   
while($row = $query->fetch_assoc()){ 
    if(!empty($row['img'])){
    unlink ("../img/uploadActu/" .$row['img']. "");
    }
}

if(!empty($_GET['id'])) {$id = $_GET['id'];} else {$id = '';}

$sql = "DELETE FROM actu WHERE id = '$id'";

if ($db->query($sql) === TRUE) {
    echo "Supprimé !";
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}

$db->close();

header('Refresh:1;url= ../?page=actualites');
exit;