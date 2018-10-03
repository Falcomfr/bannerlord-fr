<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'></script>
<script>
$(document).ready(function(){
    var $nomClan = $('#nomClan'),
        $logo = $('#logo'),
        $envoi = $('#envoi'),
        $erreur = $('#erreur'),
        $erreurImg = $('#erreurImg'),
        $fondateur = $('#fondateur'),
        $logo = $('#logo'),
        $reset = $('#rafraichir'),
        $champ = $('.champ');

        $champ.keyup(function(){
            if($(this).val().length < 5){ // si la chaîne de caractères est inférieure à 5
                $(this).css({ // on rend le champ rouge
                borderColor : 'red',
                color : 'red'
                });
            }
            else{
                $(this).css({ // si tout est bon, on le rend vert
                borderColor : 'green',
                color : 'green'
                });
            }
        });


    $envoi.click(function(e){
        var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
            if($nomClan.val().length < 5 || $fondateur.val().length < 5 ){
                e.preventDefault();
                $erreur.css('display', 'block'); // on affiche le message d'erreur
            } else {$erreur.css('display', 'none');}
            if($.inArray($logo.val().split('.').pop().toLowerCase(), fileExtension) == -1 ){
                e.preventDefault();
                $erreurImg.css('display', 'block'); // on affiche le message d'erreur
            } else {$erreurImg.css('display', 'none');}
            
            var _URL = window.URL || window.webkitURL;
            $logo.change(function(e) {
                var file, img;
                if ((file = this.files[0])) {
                    img = new Image();
                    img.onload = function() {
                        if(this.width > 300 || this.height > 300) {
                            alert("Image trop large/haut ! 300Px max");
                        }
                    };
                    img.onerror = function() {
                        alert( "not a valid file: " + file.type);
                    };
                    img.src = _URL.createObjectURL(file);
                }
            });


            if($logo.width() > 300 || $logo.height() > 300){
                e.preventDefault();
                $erreurImg.css('display', 'block');
            }
        
    });



    
    $reset.click(function(){
        $champ.css({ // on remet le style des champs comme on l'avait défini dans le style CSS
            borderColor : '#ccc',
            color : '#555'
        });
        $erreur.css('display', 'none'); // on prend soin de cacher le message d'erreur
    });


});
</script>
<?php
function show_page()
{

echo '<form action="scripts/traitementClan.php" method="POST" enctype="multipart/form-data" >';

echo '<table>';

echo '<tr>';
echo '<th colspan="4"><span style="color:#ba2715; font-size:20px;">EDITER UN CLAN</span></th>';
echo '</tr>';

echo '<tr>';
echo '<td colspan="4">_______________________________________________________________________________</td>';
echo '</tr>';

echo '<tr>';
echo '<td>Nom du clan:* </td><td><input type="text" name="nomClan" id="nomClan" class="champ"  ></td>';
echo '<td rowspan="3" colspan="2">Logo(300px*300px):* <input type="file" name="logo" id="logo" class="champ" ></td>';
echo '</tr>';

echo '<tr>';
echo '<td>Pseudo du fondateur:*  </td><td><input type="text" name="fondateur" id="fondateur" class="champ" ></td>';
echo '</tr>';


echo '<tr>';
echo '<td>Adresse site web:  </td><td><input type="text" name="siteweb"></td>';
echo '</tr>';

echo '<tr>';
echo '<td>Topic Taleword forum:  </td><td><input type="text" name="topicTaleworld"></td>';
echo '<td>Date de création du clan:</td><td>

    <select name="dateCrea" id="dateCrea">
        <option value="Avant 2000">Avant 2000</option>
        <option value="2001">2001</option>
        <option value="2002">2002</option>
        <option value="2003">2003</option>
        <option value="2004">2004</option>
        <option value="2005">2005</option>
        <option value="2006">2006</option>
        <option value="2007">2007</option>
        <option value="2008">2008</option>
        <option value="2009">2009</option>
        <option value="2010">2010</option>
        <option value="2011">2011</option>
        <option value="2012">2012</option>
        <option value="2013">2013</option>
        <option value="2014">2014</option>
        <option value="2015">2015</option>
        <option value="2016">2016</option>
        <option value="2017">2017</option>
        <option value="2018" selected>2018</option>
    </select>
    
    </td>';
echo '</tr>';

echo '<tr>';
echo '<td>Tag du clan: </td><td> <input type="text" name="tag"></td>';
echo '<td>Pays d\'origine:  </td><td>

    <select name="pays" id="pays">
        <option value="1">International</option>
        <option value="2">France</option>
        <option value="3">Belgique</option>
        <option value="4">Suisse</option>
        <option value="5">Canada</option>
    </select>

</td>';
echo '</tr>';

echo '<tr>';
echo '<td>Devise:  </td><td><input type="text" style="width:190px;" name="devise"></td>';
echo '<td>Chaine youtube:</td><td><input type="text" name="lienYt"></td>';
echo '</tr>';

echo '<tr>';
echo '<td>Page steam du clan: </td><td><input type="text" name="steam"></td>';
echo '<td>Page facebook: </td><td><input type="text" name="lienFb"></td>';
echo '</tr>';

echo '<tr>';
echo '<td>Description: </td><td colspan="3"> <textarea style="height:150px;width: 400px;" name="description"></textarea></td>';
echo '</tr>';


echo '<tr>';
echo '<td colspan="4" style="height:15px;"></td>';
echo '</tr>';

echo '<tr>';
echo '<th colspan="4"><span style="color:#ba2715;">Roleplay</span></th>';
echo '</tr>';

echo '<tr>';
echo '<td>Faction préférée: </td><td><input type="text" name="faction"></td>';
echo '<td>Mods joués: </td><td> <input type="text" name="mods"></td>';
echo '</tr>';

echo '<tr>';
echo '<td colspan="4" style="height:15px;"></td>';
echo '</tr>';

echo '<tr>';
echo '<th colspan="4"><span style="color:#ba2715;">Orientation</span></th>';
echo '</tr>';

echo '<tr>';
echo '<td style="text-align:right;width:200px;">Pas de roleplay</td><td colspan ="2" style="text-align:center;"><input type="range" style="width:270px;" min="0" max="6" name="selectRoleplay"></td><td>Très roleplay</td>';
echo '</tr>';

echo '<tr>';
echo '<td style="text-align:right;">Démocratique</td><td colspan ="2" style="text-align:center;"><input type="range" style="width:270px;"  min="0" max="6" name="selectAuto"></td><td>Autoritaire</td>';
echo '</tr>';

echo '<tr>';
echo '<td style="text-align:right;">Pas de présence requise</td><td colspan ="2" style="text-align:center;"><input type="range" style="width:270px;"  min="0" max="6" name="selectPresence"></td><td>Présence régulière requise</td>';
echo '</tr>';

echo '<tr>';
echo '<td style="text-align:right;">Recrutement non sélectif</td><td colspan ="2" style="text-align:center;"><input type="range" style="width:270px;"  min="0" max="6" name="selectRecrut"></td><td>Recrutement sélectif</td>';
echo '</tr>';

echo '<tr>';
echo '<td style="text-align:right;">Non compétitif</td><td colspan ="2" style="text-align:center;"><input type="range" style="width:270px;"  min="0" max="6" name="selectCompet"></td><td>Très compétitif</td>';
echo '</tr>';

echo '<tr>';
echo '<td colspan="4" style="height:15px;"></td>';
echo '</tr>';

echo '<tr>';
echo '<th colspan="4"><span style="color:#ba2715;">Serveurs</span></th>';
echo '</tr>';

echo '<tr>';
echo '<td>Lien teamspeak: </td><td><input style="width:200px;" type="text" name="serveurTs"></td>';
echo '</tr>';

echo '<tr>';
echo '<td>Serveur de jeu: </td><td><input type="text" name="serveurJeu" style="width:210px;" value="Non disponible pour le moment" disabled="disabled" ></td>';
echo '</tr>';

echo '<tr>';
echo '<td colspan="4" style="height:15px;"></td>';
echo '</tr>';

echo '<tr>';
echo '<th colspan="4"><span style="color:#ba2715;">Recrutement</span></th>';
echo '</tr>';

echo '<tr>';
echo '<td>Recrutement ouvert: </td><td> Oui <input type="radio" checked="checked" name="recrutement" value="oui"> Non <input type="radio" name="recrutement" value="non"></td>';
echo '</tr>';

echo '</table>';
echo '<input type="reset" id="rafraichir" value="Rafraîchir" />';
echo '<input type="submit" id="envoi" value="envoyer">';
echo '</form>';

echo '<div id="erreur" style="display: none">';
echo '<p>Vous n\'avez pas rempli correctement les champs du formulaire !</p>';
echo '</div>';

echo '<div id="erreurImg" style="display: none">';
echo '<p>Mauvais format d\'image</p>';
echo '</div>';

}
?>