<?php
function show_page()
{

include('bd.php');

$query = $db->query("SELECT * FROM actu WHERE id = ".$_GET['id']."");    

while($row = $query->fetch_assoc()){ 
	
?>

<script type="text/javascript">
UpdateDb(<?php echo $row['id']; ?>);
</script>

<a href="?page=actualites" style="color:#bc311e;font-size:11px;"><-- Retour</a>
<div style="width: 750px;text-align: left;">
    
    <div class="imgAffich" style="background-image: url(img/uploadActu/<?php echo $row['img'] ?>)"></div>
	<span style="color: #bc311e;font-size: 20px;"><?php echo utf8_encode(strtoupper($row["titre"])); ?></span><br/>
	<span style="color: #a69882">_________________________________________________________________________</span><br/>
	date,<br/>
	<span style="color:#bc311e;"><?php echo utf8_encode($row["auteur"]); ?></span><br/>
	<div style="margin-top:-12px;"><span style="color: #a69882;">_________________________________________________________________________</span></div><br/>
	<span style="font-size: 15px;"><?php echo utf8_encode($row["contenu"]); ?></span>
</div>
<?php


include('commentaires.php');

}}
?>