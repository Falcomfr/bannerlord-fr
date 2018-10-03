<?php
    require ('steamauth/steamauth.php');
	# You would uncomment the line beneath to make it refresh the data every time the page is loaded
	unset($_SESSION['steam_uptodate']);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<link rel="stylesheet" type="text/css" href= "css/style.css" />
		<link rel="stylesheet" type="text/css" href= "css/actu.css" />
		
		<title>Bannerlord France</title>
    
		<meta name='description' content='Bannerlord France' />
		<meta name='keywords' content='Mountandblade' />
		<meta name='robots' content='ALL' />
		<meta name='author' content="VG & ODE" />
		<meta name='language' content='Fr' />
		
        <link rel="stylesheet" href="trumbowyg/dist/ui/trumbowyg.css">
        <!-- Import jQuery -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="trumbowyg/docs/js/vendor/jquery-3.2.1.min.js"><\/script>')</script>
        <!-- Import Trumbowyg -->
        <script src="trumbowyg/dist/trumbowyg.js"></script>


        <!-- Import all plugins you want AFTER importing jQuery and Trumbowyg -->
        <script src="trumbowyg/dist/plugins/pasteembed/trumbowyg.pasteembed.js"></script>

        <!-- Compteur vues -->
        <script type="text/javascript">
            function UpdateDb($id){
            var Id=$id;
            if(window.XMLHttpRequest){xmlhttp=new XMLHttpRequest();}// code for IE7+, Firefox, Chrome, Opera, Safari
            else{xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}// code for IE6, IE5
            xmlhttp.onreadystatechange=function(){if(xmlhttp.readyState==4 && xmlhttp.status==200){document.getElementById("result"+Id).innerHTML=xmlhttp.responseText;}}
            xmlhttp.open("GET","scripts/updatedb.php?id="+Id,true);
            xmlhttp.send();
            }
        </script>

        <script>
            function searchFilter(page_num) {
                page_num = page_num?page_num:0;
                var keywords = $('#keywords').val();
                var sortBy = $('#sortBy').val();
                $.ajax({
                    type: 'POST',
                    url: 'pages/getData.php',
                    data:'page='+page_num+'&keywords='+keywords+'&sortBy='+sortBy,
                    beforeSend: function () {
                        $('.loading-overlay').show();
                    },
                    success: function (html) {
                        $('#posts_content').html(html);
                        $('.loading-overlay').fadeOut("slow");
                    }
                });
            }
        </script>

	</head>
	<body>
        <div id="chargement">
			<img alt="fondban" src='img/menu/menud1.png'/>
            <img alt="fondban2" src='img/menu/menud3.png'/>
			<img alt="Logo" src='img/menu/logohover.png'/>
			<img alt="Actualités" src='img/menu/actuhover.png'/>
			<img alt="Forum" src='img/menu/forumhover.png'/>
			<img alt="Clans" src='img/menu/listeclanhover.png'/>
			<img alt="Univers" src='img/menu/univershover.png'/>
        </div>
        
        <div class="menu">
            <div class="menulabel">
                <a class="actu link" href="?page=actualites"></a>
                <div class="menuBan menuLink" id="menuActu">
                        <a href="?page=populaire"  class="banActu">Les plus populaires</a>
                        <div class="menubot" id="menubotl"></div>
                </div>
                
            </div>
                <img class="point" src=img/menu/separation.png />
            <div class="menulabel1">
                <a class="univers link" href="?page=univers"></a>
                <div id="menuUnivers" class="menuBan menuLink" >
                    <a id='banHis' href='?page=histoire'>L'histoire</a>
                    <a href='?page=factions'>Les factions</a>
                    <a href='?page=solo'>Le solo</a>
                    <a href='?page=multi'>Le multijoueur</a>
                    <a href='?page=equipement'>L'équipement</a>
                    <div class="menubot" id="menubotl"></div>
                </div>
            </div>
            <div class="menulabel2">
                <a class="logo" href="?page=actualites"></a>
                <div class="menuBan menuLink" id="menuLogo">
                    <a id='banEquip' href='?page=equipe'>L'équipe</a>
                    <a href='?page=donations'>Donations</a>
                    <a href='?page=rejoindre'>Rejoindre</a>
                    <div class="menubot" id="menubotf"></div>
                </div>
            </div>
                <a class="clans link" href="?page=clans"></a>
                <img class="point" src=img/menu/separation.png />
                <a class="forum link" href="?page=forum"></a>
        </div>

        <div class="banner-bandeau"></div>
        <div class="banner-mid">
            
        </div>
        <div class="banner-bandeau"></div>
               
        <div class="banner-bot-info">
        <div id="steam">
                


<?php
if(!isset($_SESSION['steamid'])) {

    loginbutton(); //login button
    
}  else {
    include ('steamauth/userInfo.php');
    
    echo'<div id="bordersteam"></div>';
    echo'<div id="bordersteamr"></div>';
    echo'<div id="border-h" ></div>';

        echo '<div id="imgsteam">'.$steamprofile['avatarfull'].'</div>';
        echo '<div id="bordersteamM"></div>';

    echo "<div id='infosteam'>";
        echo $steamprofile['personaname'];
    echo '<a href="#" style="text-shadow:none;font-weight: bold;font-size:14px;display: block;">'.logoutbutton().'</a>';
    echo '</div>';
    echo '<div id="border-h"></div>';
                

    
    
} ?>
    </div>
                
            <div id="boubou">
                <a class='banniereAll' id="yt" href='https://www.youtube.com/user/taleworldschannel' target="_blank"></a>
                <a class='banniereAll' id="ts" href='#'></a>
                <a class='banniereAll' id="steamB" href='http://store.steampowered.com/app/261550/Mount__Blade_II_Bannerlord/' target="_blank"></a>
                <a class='banniereAll' id="face" href='#'></a>
                <form class="dons" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
                <input type="hidden" name="cmd" value="_s-xclick">
                <input type="hidden" name="hosted_button_id" value="98AW5G7RDDQ38">
                <input type="image" src="img/menu/dons.png" name="submit" alt="PayPal, le réflexe sécurité pour payer en ligne">
                <img alt="" src="https://www.paypalobjects.com/fr_FR/i/scr/pixel.gif">
                </form>
            </div>
        </div>
               
        <div class="contenu">
            <?php
			 require('scripts/pagehandler.php');
            show_page();
            ?>
        </div>             
        <div class="banner-bandeau" style="clear:both;"></div>
        
        

        
    </body>