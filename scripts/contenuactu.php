<div class="list_item">
    <a href="pages/supprimerActu.php?id=<?php echo $row['id']; ?>">Supprimer</a>   
    <a href="?page=editeractu&id=<?php echo $row['id']; ?>">Éditer</a>  
    <?php 
    if($row['type'] == 5) {
        echo "<a href='#' id='myBtnYT".$row['id']."'>";
    
    } else {
        echo "<a href='?page=contenuactu&id=". $row['id'] ."' >";
    }
    ?>
   <div class="actuImgCont">
        <?php if($row['type'] == 5) {
            echo "<img class='actuImg' src='http://img.youtube.com/vi/". $row['idyt'] ."/sddefault.jpg' /><img src='img/actu/bplay.png' class='bplay' />";
        } else {echo "<img class='actuImg' src='img/uploadActu/". $row['img'] ."' />";}
        ?>
   </div>
   <h2><?php echo utf8_encode(mb_strtoupper($row["titre"])); ?></h2>
   <h3><?php echo utf8_encode($row["auteur"]); ?> | <?php echo utf8_encode($row["date"]); ?></h3>
   <p style="font-color:#444444;margin:5px;" class="degrad">
   <span><?php echo substr(strip_tags(utf8_encode($row["contenu"])), 0, 170);
            if(mb_strlen(strip_tags(utf8_decode($row["contenu"]))) > 150) {
            echo '...';
        } 
            ?></span>
    </p>
    </a>
    <?php
        echo "<div id='myModalYT".$row['id']."' class='modalcss'>";

        echo "<div class='modal-content' style='width: 615px;'>";
            echo "<div class='closeYT".$row['id']." closecss'>&times;</div><b>";
            echo utf8_encode(mb_strtoupper($row['titre']));
            echo "</b><br /><iframe width='560' height='315' src='https://www.youtube.com/embed/". $row['idyt'] ."' frameborder='0' allow='autoplay; encrypted-media' allowfullscreen></iframe>";
            echo utf8_encode($row['contenu']);
            $idComment = $row['type'];
            if( $row['type'] == "5"){
                $idcomyt = $row['id'];
                include('pages/commentairesYT.php');
                }
        echo "</div>";

        echo "</div>";

        echo "<script>
        // Get the modal
        var modalYT".$row['id']." = document.getElementById('myModalYT".$row['id']."');

        // Get the button that opens the modal
        var btn = document.getElementById('myBtnYT".$row['id']."');

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName('closeYT".$row['id']."')[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
        modalYT".$row['id'].".style.display = 'block';
        UpdateDb(".$row['id'].");
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
        modalYT".$row['id'].".style.display = 'none';
        }

        </script>";
    ?>

   <div style="position: absolute; bottom:0;width: 290px;">
    <?php if($row['type'] != 5) { ?> <a href="?page=contenuactu&id=<?php echo $row['id']; ?>" class="lireSuite">Lire la suite..</a><?php } ?>
    <button class="myBtn00" id="myBtn<?php echo $num ?>" ></button></div>


    <div id="myModal<?php echo $num ?>" class="modal<?php echo $num ?> modalcss">

      <!-- Modal content -->
      <div class="modal-content">
        <div class="close<?php echo $num ?> closecss">&times;</div>
        <h2><?php echo utf8_encode(mb_strtoupper($row["titre"])); ?></h2>
        <h3><?php echo utf8_encode($row["auteur"]); ?> | <?php echo utf8_encode($row["date"]); ?></h3>
   <p style="font-color:#444444;margin:5px;" class="degrad">
   <span style='font-size: 14px;'><?php echo utf8_encode($row["contenu"]); ?></span>
    </p>
      </div>

    </div>

    <script>
        // Get the modal
        var modal<?php echo $num ?> = document.getElementById('myModal<?php echo $num ?>');

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn<?php echo $num ?>");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close<?php echo $num ?>")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal<?php echo $num ?>.style.display = "block";
            UpdateDb(<?php echo $row["id"]; ?>);
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal<?php echo $num ?>.style.display = "none";
        }

    </script>
            

</div>  