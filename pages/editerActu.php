<?php
function show_page()
{
    include('bd.php');

    $query = $db->query("SELECT * FROM actu WHERE id = ".$_GET['id']."");    
    
    while($row = $query->fetch_assoc()){ 
       
?> 
<a href="?page=actualites" style="color:#bc311e;font-size:11px;"><-- Retour</a>
                <form method="post" action="pages/editerActuSQL.php?id=<?php echo $_GET['id']; ?>">
                Type : <?php if($row["type"] == '2'){echo 'News';}
                            if($row["type"] == '3'){echo 'Articles';}
                            if($row["type"] == '4'){echo 'Patchnote';}
                            if($row["type"] == '5'){echo 'Youtube';} ?><br/>

                Titre : <input type="text" id="inputTitre"  name="inputTitre" value="<?php echo utf8_encode($row["titre"]); ?>" /> <br/>

                Contenu : <div id="editor1" style="background-color: #fff;" name="inputContenu"><?php echo utf8_encode($row["contenu"]); ?></div>
                    <script>
                    $('#editor1')
                    .trumbowyg({
                    });
                    </script>
                <input type="submit" value="Envoyer" />
                </form>


<?php
}}
?> 