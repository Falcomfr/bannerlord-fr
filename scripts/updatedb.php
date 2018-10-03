<?php

include('../bd.php');

$sql='UPDATE actu SET vues=vues+1 WHERE id='.$_GET["id"].'';

$db->query($sql);

$db->close();