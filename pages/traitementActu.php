<?php

include('../bd.php');
$suite = 1;
if(!empty($_POST['Envoyer'])) {

    if(!empty($_POST['selectType'])) {$type = $_POST['selectType'];} else {$type = '';}

    if(!empty($_POST['inputTitre'])) {$titre = mysqli_real_escape_string($db,$_POST['inputTitre']);} else {$titre = '';}

    $auteur = "";

    $today = date("m.d.y");

    if(!empty($_POST['editor'])) {$contenu = mysqli_real_escape_string($db,$_POST['editor']);} else {$contenu = "";}

    if(!isset($_POST['inputImg'])) {
        include('../scripts/checkimg.php');
    } else {$imgName = "";}

    $idYTok = "";
    if(!empty($_POST['inputYT'])) {
        $idyt = $_POST['inputYT'];
    
        if (($pos = strpos($idyt, '?v=')) !== FALSE ||
        ($pos = strpos($idyt, '&v=')) !== FALSE){
        $pos += 3;
        if (($pos2 = strpos($idyt, '&', $pos)) === FALSE)
            $idYTok = substr($idyt, $pos);
        else
            $idYTok = substr($idyt, $pos, $pos2-$pos);
        }
    
    } else {$idYTok = 0;}


    $vues = 1;

    if($suite == 1){
        $sql = "INSERT INTO actu (type, titre, auteur, date, contenu, idyt, img, vues)
        VALUES ('$type', '$titre', '$auteur', '$today', '$contenu', '$idYTok', '$imgName', '$vues')";

        if ($db->query($sql) === TRUE) {
            echo "Redirection veuillez patientez ...";
        } else {
            echo "Error: " . $sql . "<br>" . $db->error;
        }
    }
}


$db->close();

header('Refresh:1;url= ../?page=actualites');
exit;

?>