<?php
include('../bd.php');

if (!empty($_POST)) {
    $suite = 1;
    $i = 1;
    foreach($_POST as $key => $test) {

        if((isset($_POST['nomClan'])) != "") {
            ${"var" . $i} = mysqli_real_escape_string($db, $test);
        }  else { 
            echo "Erreur, le nom du clan est vide";
            header('Refresh:2;url= ../?page=clans');
            exit;}

        if((isset($_POST['fondateur'])) != "") {
            ${"var" . $i} = mysqli_real_escape_string($db, $test);
        }  else { 
            echo "Erreur, le nom du fondateur est vide";
            header('Refresh:2;url= ../?page=clans');
            exit;}
        
        if(isset($_POST[$key])) {
            ${"var" . $i} = mysqli_real_escape_string($db, $test);
        } else { ${"var" . $i} = "";}
        $i++;
    }
    if(file_exists($_FILES['logo']['tmp_name'])) {
        include('checkimgclan.php');
    } else {
        echo "Erreur, l'image est absente";
        header('Refresh:2;url= ../?page=clans');
        exit;}
} else { 
    echo "Erreur, formulaire vide";
        header('Refresh:2;url= ../?page=clans');
        exit;}

    $date =  date("m.d.y");

    if($suite == 1){

    $sql = "INSERT INTO clans (nomClan, idFondateur, tag, sousTitre, dateMaj, typeRecrutement, lienVocal, lienTw, lienSteam, lienFb, lienYt, lienSite, description, img, pays, roleplay, discipline, recrutement, competition, presence, dateCrea, factionPref, mods, serveurs)
    VALUES ('$var1', '$var2', '$var6', '$var8', '$date', '$var21', '$var20', '$var4', '$var10', '$var11', '$var9', '$var3', '$var12', '$imgNameClan', '$var7', '$var15', '$var16', '$var18' , '$var19', '$var17', '$var5', '$var13', '$var14', '')";

        if ($db->query($sql) === TRUE) {
            echo "Redirection veuillez patientez ...";
        } else {
            echo "Error: " . $sql . "<br>" . $db->error;
        }

    } 


$db->close();

header('Refresh:5;url= ../?page=clans');
exit;

?>