<?php
function show_page()
{
?>

<div class="post-search-panel">
    <input type="text" id="keywords" onkeyup="searchFilter()"/>
    <select id="sortBy" onchange="searchFilter()">
        <option value="tous">Tout afficher</option>
        <option value="2">News</option>
        <option value="3">Articles</option>
        <option value="4">Patchnote</option>
        <option value="5">Vidéos</option>
    </select>

    <div>
        <a href="#" id="myBtnAdd">Ajouter</a>
        
        <div id="myModalAdd" class="modalcss" >

            <!-- Modal content -->
            <div class="modal-content">
                <div class="close closecss">&times;</div>
                <form method="post" action="pages/traitementActu.php" enctype="multipart/form-data" name="formulaire">
                Type : <select id="selectType" name="selectType">
                            <option value="2" class="show">News</option>
                            <option value="3" class="show">Articles</option>
                            <option value="4" class="show">Patchnote</option>
                            <option value="5" id="hide">Vidéos</option>
                        </select><br/>
                <script>
                $( ".show" ).click(function() {
                  $( "#pFacultatif" ).show();
                  $( "#pFaculYt" ).hide();
                });
                $( "#hide" ).click(function() {
                  $( "#pFacultatif" ).hide();
                  $( "#pFaculYt" ).show();
                });
                </script>
                <span id="pFacultatif">Image : <span style="font-size:12px;"><i>(Min:320px/180px)</i></span><input type="file" id="inputImg"  name="inputImg" /><br/></span>
                <span id="pFaculYt">Lien youtube : <input type="text" id="inputYT"  name="inputYT" /><br/></span>
                Titre : <input type="text" id="inputTitre"  name="inputTitre" value="" onKeyDown="limiteur();" onKeyUp="limiteur();"/> 
                <input readonly type=text name="indicateur" size="3" maxlength=3 value="30"><br/>
<script>
  function limiteur()
    {
    maximum = 30;
    champ = document.formulaire.inputTitre;
    indic = document.formulaire.indicateur;

    if (champ.value.length > maximum)
      champ.value = champ.value.substring(0, maximum);
    else
      indic.value = maximum - champ.value.length;
    }
</script>

                Contenu : <div id="editor" style="background-color: #fff;" name="inputContenu"></div>
                    <script>
                    $( "#pFaculYt" ).hide();
                    $('#editor')
                    .trumbowyg({
                    });
                    </script>
                <input type="submit" value="Envoyer" name="Envoyer" />
                </form>
            </div>

        </div>

        <script>
        // Get the modal
        var modalAdd = document.getElementById('myModalAdd');

        // Get the button that opens the modal
        var btn = document.getElementById("myBtnAdd");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modalAdd.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modalAdd.style.display = "none";
        }

        </script>
    </div>
</div>

<div class="post-wrapper">
    <div class="loading-overlay"><div class="overlay-content">Chargement..</div></div>
    <div id="posts_content">
    <?php
    include('pages/Pagination.php');
    
    include('bd.php');
    
    $limit = 12;
    
    $queryNum = $db->query("SELECT COUNT(*) as postNum FROM actu");
    $resultNum = $queryNum->fetch_assoc();
    $rowCount = $resultNum['postNum'];
    
    $pagConfig = array(
        'totalRows' => $rowCount,
        'perPage' => $limit,
        'link_func' => 'searchFilter'
    );
    $pagination =  new Pagination($pagConfig);
    
    echo $pagination->createLinks();
    
        $query = $db->query("SELECT * FROM actu ORDER BY id DESC LIMIT $limit");
    
    if($query->num_rows > 0){ ?>
        <div class="posts_list">
        <?php
            $num = '';
            while($row = $query->fetch_assoc()){ 
                $postID = $row['id'];
                $num++;

include 'scripts/contenuactu.php';
       
     } ?>
        </div>
    <?php } ?>
    </div>
</div>

<?php
}
?>
