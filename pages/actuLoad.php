<?php
    require ('../bd.php');

$limite = 8;
if($_POST['myid'] == "1") {
    $query = 'SELECT * FROM actu LIMIT :limite';
    } else {
    $query = 'SELECT * FROM actu WHERE type='.$_POST["myid"].' LIMIT :limite';
}

$query = $bdd->prepare($query);
$query->bindValue(
    'limite',         // Le marqueur est nommé « limite »
     $limite,         // Il doit prendre la valeur de la variable $limite
     PDO::PARAM_INT   // Cette valeur est de type entier
);
$query->execute();

echo'<div style="height: 1px;width: 900px;float: left;"></div>';
while ($donnees = $query->fetch())
{
   
    echo'<div style="float:left;margin-top: 5px; margin-bottom:5px;">';
    if($donnees['type'] == "5") {
        
        echo '    
            <div class="actuYt" style="background-image: url(https://img.youtube.com/vi/'.$donnees['idyt'].'/0.jpg);margin-left: 110px;">
                <a href="https://www.youtube.com/watch?v=pTbaWgLjN6s">
                    <span>#Gameplay</span>
                </a>
            </div>
            <div class="actuYtdes">
                <div class="ytTitre">'.$donnees['titre']. '</div>
                <div class="ytContenu">'.$donnees['contenu']. '</div>
                <div class="ytBot">'.$donnees['auteur']. '</div>
            </div>
        ';
    } elseif($donnees['type'] == "2" or $donnees['type'] == "3" or $donnees['type'] == "4") {
    
    
    switch ($donnees['type'])
        {
            case '2':
                $type = "News";
                break;
            case '3':
                $type = "Article";
                break;
            case '4':
                $type = "Patch note";
                break;
        }
        
        
        echo '
            <div class="actuImg">
                <div class="actuBan">'.$type.'</div>
            </div>
            
            <div class="actuTitre">'.$donnees['titre']. '</div>
            <div class="actuContenu">'.$donnees['contenu']. '</div>
            <div class="actuBot">'.$donnees['auteur']. '</div>
        ';
        }
     echo'</div>';
    
}
$query->closeCursor();


?>


<ul id="pagination-demo" class="pagination-sm"></ul>
    
    <script type="text/javascript">
$('#pagination-demo').twbsPagination({
        totalPages: 35,
        visiblePages: 7,
        onPageClick: function (event, page) {
            $('#page-content').text('Page ' + page);
        }
    });
    </script>