<?php

include('bd.php');
echo "<b style='font-size: 13px;'>COMMENTAIRE(S) :</b>";
$query0 = $db->query("SELECT * FROM commentaires WHERE idactu = ".$idcomyt."");  

$row_cnt0 = $query0->num_rows;

echo " (".$row_cnt0.")<br/><br/>";

while($row0 = $query0->fetch_assoc()){ 

    echo "<div style='font-size: 12px;background: url(img/7.png) repeat;border:1px solid #c6bb9b; padding: 5px;margin-top:3px;margin-bottom:3px;width: 550px;'><b>".utf8_encode($row0["auteur"])."</b> ";
    echo "<a href='pages/supprimerCom.php?id=". $row0["id"] ."&idCom=". $row0["idactu"] ."&type=". $idComment ."' style='float:right;' >Supprimer</a>";
    echo utf8_encode($row0["date"])."<br/>";
    echo "<div style='padding:5px;'>".utf8_encode($row0["commentaire"])."</div></div>";

}

?>

<form method="post"  action="pages/traitementCom.php" name="formulaire23">
    <textarea id="editorCom23"  name="inputCom" style="height: 90px; width: 350px" onKeyDown="limiteurCom23();" onKeyUp="limiteurCom23();"></textarea><br/>
    <input readonly type=text name="indicateurCom23" size="3" maxlength=3 value="250">
    <input type="hidden" name="idCom" value="<?php echo $idcomyt; ?>" />
    <input type="hidden" name="type" value="<?php echo $idComment; ?>" />
    <input type="submit" value="Envoyer" name="Envoyer" />
</form>
       
<script>
  function limiteurCom23()
    {
    maximum = 250;
    champCom23 = document.formulaire23.editorCom23;
    indicCom23 = document.formulaire23.indicateurCom23;

    if (champCom23.value.length > maximum)
      champCom23.value = champCom23.value.substring(0, maximum);
    else
      indicCom23.value = maximum - champCom23.value.length;
    }
</script>