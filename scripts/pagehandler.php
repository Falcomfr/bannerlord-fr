<?php
if (isset($_GET['page']))
{
	switch ($_GET['page'])
	{

		//old
		case 'oldclans':
			require('old/clans.php');
			break;
		case 'oldeditionclan':
			require('old/edition-clans.php');
			break;
		case 'oldinfoclan':
			require('old/info-clans.php');
			break;
		// Menu 1 - TOP
		case 'actualites':
			require('pages/actualites.php');
			break;
		case 'populaire':
			require('pages/news.php');
			break;
		case 'contenuactu':
			require('pages/affichactu.php');
			break;
		case 'editeractu':
			require('pages/editeractu.php');
			break;

		// Menu 2 - TOP
		case 'univers':
			require('pages/univers.php');
			break;
		case 'histoire':
			require('pages/histoire.php');
			break;
		case 'wiki':
			require('pages/wiki.php');
			break;
		case 'mods':
			require('pages/mods.php');
			break;

		// Menu 3 - TOP
		case 'equipe':
			require('pages/equipe.php');
			break;
		case 'donations':
			require('pages/donations.php');
			break;
		case 'rejoindre':
			require('pages/rejoindre.php');
			break;

		// Menu 4 - TOP CLAN
		case 'clans':
			require('pages/clans.php');
			break;

		case 'ajoutClan':
			require('pages/ajoutClan.php');
			break;
			
		// Clans
		case 'editionclans':
			require('pages/edition-clans.php');
			break;
		
		case 'rejoindreclans':
			require('pages/rejoindre-clans.php');
			break;
			
		case 'infoclans':
			require('pages/info-clans.php');
			break;
		
		//News
		case 'newsfull':
			require('pages/news-full.php');
			break;
		
		default:
			require('pages/notfound.php');
			break;
	}
}
else
	require('pages/actualites.php');
?>