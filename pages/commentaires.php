<?php

include('bd.php');
echo "<b style='font-size: 13px;'>COMMENTAIRE(S) :</b>";

$query = $db->query("SELECT * FROM commentaires WHERE idactu = ".$_GET['id']."");  

$row_cnt = $query->num_rows;

echo " (".$row_cnt.")<br/><br/>";

while($row = $query->fetch_assoc()){ 

    echo "<div style='font-size: 12px;background: url(img/7.png) repeat;border:1px solid #c6bb9b; padding: 5px;margin-top:3px;margin-bottom:3px;width: 700px;'><b>".utf8_encode($row["auteur"])."</b> ";
    echo "<a href='pages/supprimerCom.php?id=". $row["id"] ."&idCom=". $row["idactu"] ."' style='float:right;' '>Supprimer</a>";
    echo utf8_encode($row["date"])."<br/>";

    echo "<div style='padding:5px;'>".utf8_encode($row["commentaire"])."</div></div>";
    

}

?>

<form method="post"  action="pages/traitementCom.php" name="formulaire">
    <textarea id="editorCom"  name="inputCom" style="height: 90px; width: 550px" onKeyDown="limiteurCom();" onKeyUp="limiteurCom();"></textarea><br/>
    <input readonly type=text name="indicateurCom" size="3" maxlength=3 value="250">
    <input type="hidden" name="idCom" value="<?php echo $_GET['id']; ?>" />
    <input type="hidden" name="type" value="<?php echo $idComment; ?>" />
    <input type="submit" value="Envoyer" name="Envoyer" />
</form>
       
<script>
  function limiteurCom()
    {
    maximum = 250;
    champCom = document.formulaire.editorCom;
    indicCom = document.formulaire.indicateurCom;

    if (champCom.value.length > maximum)
      champCom.value = champCom.value.substring(0, maximum);
    else
      indicCom.value = maximum - champCom.value.length;
    }
</script>