<?php
header( 'content-type: text/html; charset=utf-8' );


		// CHARGE CONF
		include("../config.inc.php");

		session_start();

		// On test sur les sessions si on a déja effacer les anciennes commande


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="robots" content="noindex">

  <title>Console</title>



	<!-- Add jQuery library -->
	<script type="text/javascript" src="lib/jquery-1.10.1.min.js"></script>

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="source/jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css?v=2.1.5" media="screen" />



	<script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			$('.fancybox').fancybox();

			/*
			 *  Different effects
			 */

			// Change title type, overlay closing speed
			$(".fancybox-effects-a").fancybox({
				helpers: {
					title : {
						type : 'outside'
					},
					overlay : {
						speedOut : 0
					}
				}
			});

			// Disable opening and closing animations, change title type
			$(".fancybox-effects-b").fancybox({
				openEffect  : 'none',
				closeEffect	: 'none',

				helpers : {
					title : {
						type : 'over'
					}
				}
			});

			// Set custom style, close if clicked, change title type and overlay color
			$(".fancybox-effects-c").fancybox({
				wrapCSS    : 'fancybox-custom',
				closeClick : true,

				openEffect : 'none',

				helpers : {
					title : {
						type : 'inside'
					},
					overlay : {
						css : {
							'background' : 'rgba(238,238,238,0.85)'
						}
					}
				}
			});

			// Remove padding, set opening and closing animations, close if clicked and disable overlay
			$(".fancybox-effects-d").fancybox({
				padding: 0,

				openEffect : 'elastic',
				openSpeed  : 150,

				closeEffect : 'elastic',
				closeSpeed  : 150,

				closeClick : true,

				helpers : {
					overlay : null
				}
			});

			/*
			 *  Button helper. Disable animations, hide close button, change title type and content
			 */

			$('.fancybox-buttons').fancybox({
				openEffect  : 'none',
				closeEffect : 'none',

				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,

				helpers : {
					title : {
						type : 'inside'
					},
					buttons	: {}
				},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
			});


			/*
			 *  Thumbnail helper. Disable animations, hide close button, arrows and slide to next gallery item if clicked
			 */

			$('.fancybox-thumbs').fancybox({
				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,
				arrows    : false,
				nextClick : true,

				helpers : {
					thumbs : {
						width  : 50,
						height : 50
					}
				}
			});

			/*
			 *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
			*/
			$('.fancybox-media')
				.attr('rel', 'media-gallery')
				.fancybox({
					openEffect : 'none',
					closeEffect : 'none',
					prevEffect : 'none',
					nextEffect : 'none',

					arrows : false,
					helpers : {
						media : {},
						buttons : {}
					}
				});

			/*
			 *  Open manually
			 */

			$("#fancybox-manual-a").click(function() {
				$.fancybox.open('1_b.jpg');
			});

			$("#fancybox-manual-b").click(function() {
				$.fancybox.open({
					href : 'iframe.html',
					type : 'iframe',
					padding : 5
				});
			});

			$("#fancybox-manual-c").click(function() {
				$.fancybox.open([
					{
						href : '1_b.jpg',
						title : 'My title'
					}, {
						href : '2_b.jpg',
						title : '2nd title'
					}, {
						href : '3_b.jpg'
					}
				], {
					helpers : {
						thumbs : {
							width: 75,
							height: 50
						}
					}
				});
			});


		});
	</script>
	<style type="text/css">
		.fancybox-custom .fancybox-skin {
			box-shadow: 0 0 50px #222;
		}

		body {
			max-width: 700px;
			min-height: 350px;
			margin: 0 auto;
		}
	</style>



<style>

body, td, div, p, ul, ol { font-family: Verdana, Sans-Serif; font-size: 11px; color:black; }
img{
	border:0px;
}


#site_home{
	margin-top:0px;
	margin-bottom:0px;
	margin-left: auto;
	margin-right: auto;

	width:1000px;

	position: relative;
	text-align:left;
	float:middle;	
	padding:0px;
	color:#000000;
}

body{


	color:black;

	margin-top:0px;
	margin-bottom:0px;
	text-align:center;
	width:100%;	
	height:100%;

}

#div_menu_home{
	padding-top:30px;
	width: 1000px;
	float:left; /*pour IE*/
	height: 150px;
	text-align:center;
}

#div_menu_home ul {
	padding:0;
	margin:0;


	margin-left: auto;
	margin-right: auto;
	position: relative;
	text-align:left;
	float:middle;
	list-style-type:none;
	/* width: 200px; */
 }
#div_menu_home li {
 float:left; /*pour IE*/
 padding:5px;
 width: 220px;
 height: 40px;
 }


#div_menu_home ul li a {
 display:block;
 float:left;   
 text-decoration:none;
 text-align:center;
 }


/* BUTTON CSS GENERATOR*/

.myButtonMenu {

	background-color:white;
	-moz-border-radius:10px;
	-webkit-border-radius:10px;
	border-radius:10px;
	border:3px solid black;
	display:inline-block;
	cursor:pointer;
	color:black;
	font-family:Arial;
	font-size:15px;
	font-weight:bold;
	padding:15px 10px;
	width: 190px;
	text-decoration:none;
}
.myButtonMenu:hover {
	background-color:#dcdcdc;
}
.myButtonMenu:active {
	position:relative;
	top:1px;
}
#console_commande_liste{
	float:left; 
	width: 95%;
	padding:10px;
	border:1px solid black;
	margin-bottom:80px;
}
.console_commande_ligne{
	float:left; 
	width: 100%;
	height:30px;
	padding-top:5px;
	border-bottom:1px dotted black;
}

.console_commande_ligne_id{
	float:left;
	width: 60px;
	margin-left:5px;
}
.console_commande_ligne_etat{
	float:left;
	width: 120px;
}
.console_commande_ligne_zone{
	float:left;
	width: 150px;
}
.console_commande_ligne_nom{
	float:left;
	width: 200px;
}
.console_commande_ligne_tel{
	float:left;
	width: 100px;
}
.console_commande_ligne_action{
	float:left;
	width: 280px;
	/*border:1px dashed black;*/
	/*padding:5px;*/
}

.console_commande_ligne_action a{
	/*text-decoration:none;*/
	color:black;

}

.etat_commande_0{
	color:black;
	background-color:#FA8072;
	font-weight:bold;
}
.etat_commande_1{
	color:black;
	background-color:#B0E0E6;
	font-weight:bold;
}
.etat_commande_2{
	color:black;
	background-color:#8FBC8F;
	font-weight:bold;
}
.etat_commande_3{
	color:black;
	background-color:white;
}


/* END BUTTON CSS GENERATOR*/


.console_commande_page{
	float:left; 
	width: 100%;
	height:30px;
	padding-top:5px;
	border-bottom:1px dotted black;
}
.console_commande_page a{ 
	color:black;
}
</style>

<script>

	var id_max_commande=0;

	function commande_afficher(id_commande,name_commande)
	{
		return false;
		
	}

	function commande_annule(id_commande,name_commande)
	{
		if (confirm('Confirmer la suppréssion de la commande #'+ id_commande +' de ' + name_commande + ' ?')) {
			// On efface la div de la liste
		   elt = document.getElementById("commande_"+id_commande);
		   elt.parentNode.removeChild(elt);
			// On envoie une requette AJAX pour supprimer de la BDD

			return true;
		} else {
			// Do nothing!
			return false;
		}
		
	}

	function commande_cuisine(id_commande,name_commande)
	{
		if (confirm('PREPARATION DE LA COMMANDE #'+ id_commande +' de ' + name_commande + ' ?')) {
			// On modifie la CLASS
			window.document.getElementById("commande_"+id_commande).className='console_commande_ligne etat_commande_2';
			// On marque en préparation : 
			window.document.getElementById("etat_commande_"+id_commande).innerHTML='En préparation';

			return true;
		} else {
			// Do nothing!
			return false;
		}
		
	}

	function commande_valide(id_commande,name_commande)
	{
		if (confirm('VALIDATION COMMANDE #'+ id_commande +' de ' + name_commande + ' ?')) {
			// On efface la div de la liste - Commande fini
		   elt = document.getElementById("commande_"+id_commande);
		   elt.parentNode.removeChild(elt);
			// On envoie une requette AJAX pour supprimer de la BDD

			return true;
		} else {
			// Do nothing!
			return false;
		}
		
	}


	function ajouter_commande(id_commande,titre_zone,titre_nom_client,titre_prenom_client,tel_client)
	{


			// On cree la ligne de commande
			lediv = document.createElement("div");
            lediv.id = "commande_"+id_commande;
			lediv.className = "console_commande_ligne etat_commande_0";
			
			// On cree la div ID commande
			div_id_title = document.createElement("div");
			div_id_title.className = "console_commande_ligne_id";
			div_id_title.innerHTML = '#' + id_commande;

			// On cree la div ID commande
			div_etat_commande = document.createElement("div");
			div_etat_commande.id = "etat_commande_"+id_commande;
			div_etat_commande.className = "console_commande_ligne_etat";
			div_etat_commande.innerHTML = 'NOUVEAU';

			// On cree la div ZONE commande
			div_zone_commande = document.createElement("div");
			div_zone_commande.className = "console_commande_ligne_zone";
			div_zone_commande.innerHTML = titre_zone;

			// On cree la div NOM commande
			div_nom_commande = document.createElement("div");
			div_nom_commande.className = "console_commande_ligne_nom";
			div_nom_commande.innerHTML = titre_nom_client + ' ' + titre_prenom_client;

			// On cree la div TEL commande
			div_tel_commande = document.createElement("div");
			div_tel_commande.className = "console_commande_ligne_tel";
			div_tel_commande.innerHTML = tel_client;

			// On cree la div PANEL commande
			div_action_commande = document.createElement("div");
			div_action_commande.className = "console_commande_ligne_action";
	
			var out_panel='';

			out_panel = '<a href="action.php?page=afficher&id_commande=' + id_commande + '" target="Iframe_Action" OnClick="return commande_afficher('+ id_commande + ',\'' + titre_nom_client + ' ' + titre_prenom_client + '\');" class="fancybox fancybox.iframe">Afficher</a>';
			out_panel += ' | <a href="action.php?page=cuisine&id_commande=' + id_commande + '" target="Iframe_Action" OnClick="return commande_cuisine(' + id_commande + ',\'' + titre_nom_client + ' ' + titre_prenom_client + '\');">En Cuisine</a>';
			out_panel += ' | <a href="action.php?page=valide&id_commande=' + id_commande + '" target="Iframe_Action" OnClick="return commande_valide(' + id_commande + ',\'' + titre_nom_client + ' ' + titre_prenom_client + '\');">Valider</a>';
			out_panel += ' | <a href="action.php?page=annule&id_commande=' + id_commande + '" target="Iframe_Action" OnClick="return commande_annule(' + id_commande + ',\'' + titre_nom_client + ' ' + titre_prenom_client + '\');">Annuler</a>';

			div_action_commande.innerHTML = out_panel;



            
			// On AJOUTE TOUS à la ligne
			lediv.appendChild(div_id_title);
			lediv.appendChild(div_etat_commande);
			lediv.appendChild(div_zone_commande);
			lediv.appendChild(div_nom_commande);
			lediv.appendChild(div_tel_commande);
			lediv.appendChild(div_action_commande);

			
            
			// On ajoute la ligne à la liste
			document.getElementById("console_commande_liste").appendChild(lediv);
            
			// On modifie la valeur du max pour la boucle
			id_max_commande = Math.max(id_max_commande,id_commande);

	}

	function alert_ajout_commande()
	{
	  player = document.getElementById('player_audio');
	  player.play();
	}

</script>


 </head>

 <body>
<div id="site_home">

  <div id="div_menu_home">
	<ul id="menu_home">
		<li><a href="index.php?page=live" class="myButtonMenu">Commande en cours</a></li>
		<li><a href="index.php?page=valide" class="myButtonMenu">Commande validée</a></li>
		<li><a href="index.php?page=historique" class="myButtonMenu">Historique Commande</a></li>
	</ul>
  </div>

<?

if(isset($_GET['page']) && $_GET['page']!='')
{
	switch($_GET['page'])
	{
		case 'live':
			echo '<center><h1>Commande en cours</h1></center>';
			echo '<div id="console_commande_liste">';
			mysql_connect($server,$user,$pass);
			
			$result=mysql_db_query($base,"SELECT * FROM `commande_liste_index` NATURAL JOIN `base_client` NATURAL JOIN `zone_livraison` WHERE  `date_commande`='".date("Y-m-d")."' AND ( `etat_commande` = '0' OR `etat_commande` = '1' OR `etat_commande` = '2' ) ORDER BY `id_commande` ASC");
			$i=1;
			$max_id=0;
				while($ra=mysql_fetch_array($result)) 
				{
					echo '<div id="commande_'.$ra['id_commande'].'" class="console_commande_ligne etat_commande_'.$ra['etat_commande'].'">';
					echo '<div class="console_commande_ligne_id"> #'.$ra['id_commande'].'</div>';
					echo '<div id="etat_commande_'.$ra['id_commande'].'" class="console_commande_ligne_etat">';
						switch($ra['etat_commande'])
						{
							case 0:
								echo 'NOUVEAU';
								break;
							case 1:
								echo 'Consultée';
								break;
							case 2:
								echo 'En préparation';
								break;
							case 3:
								echo 'Livrée';
								break;
						}
					echo '</div>';
					echo '<div class="console_commande_ligne_zone">'.htmlentities($ra['titre_zone']).'</div>';
					echo '<div class="console_commande_ligne_nom">'.htmlentities($ra['nom_client'].' '.$ra['prenom_client']).'</div>';
					echo '<div class="console_commande_ligne_tel">'.htmlentities($ra['tel_client']).'</div>'; 
					echo '<div class="console_commande_ligne_action"><a href="action.php?page=afficher&id_commande='.$ra['id_commande'].'" target="Iframe_Action" OnClick="return commande_afficher(\''.$ra['id_commande'].'\',\''.htmlentities($ra['nom_client'].' '.$ra['prenom_client']).'\');" class="fancybox fancybox.iframe">Afficher</a> | <a href="action.php?page=cuisine&id_commande='.$ra['id_commande'].'" target="Iframe_Action" OnClick="return commande_cuisine(\''.$ra['id_commande'].'\',\''.htmlentities($ra['nom_client'].' '.$ra['prenom_client']).'\');">En Cuisine</a> | <a href="action.php?page=valide&id_commande='.$ra['id_commande'].'" target="Iframe_Action" OnClick="return commande_valide(\''.$ra['id_commande'].'\',\''.htmlentities($ra['nom_client'].' '.$ra['prenom_client']).'\');">Valider</a> | <a href="action.php?page=annule&id_commande='.$ra['id_commande'].'" target="Iframe_Action" OnClick="return commande_annule(\''.$ra['id_commande'].'\',\''.htmlentities($ra['nom_client'].' '.$ra['prenom_client']).'\');">Annuler</a></div>';
					echo '</div>';

					$max_id=max($max_id,$ra['id_commande']);

				}

			mysql_close();
			echo '</div>';
			echo '<script> id_max_commande='.$max_id.';</script>';

			break;

		case 'valide':
			echo '<center><h1>Commande validée</h1></center>';

			echo '<div id="console_commande_liste">';
			mysql_connect($server,$user,$pass);
			
			$result=mysql_db_query($base,"SELECT * FROM `commande_liste_index` NATURAL JOIN `base_client` NATURAL JOIN `zone_livraison` WHERE `etat_commande` = '3' AND `date_commande`='".date("Y-m-d")."' ORDER BY `id_commande` DESC");
			$i=1;
				while($ra=mysql_fetch_array($result)) 
				{
					echo '<div id="commande_'.$ra['id_commande'].'" class="console_commande_ligne etat_commande_'.$ra['etat_commande'].'">';
					echo '<div class="console_commande_ligne_id"> #'.$ra['id_commande'].'</div>';
					echo '<div class="console_commande_ligne_etat">Livrée</div>';
					echo '<div class="console_commande_ligne_zone">'.htmlentities($ra['titre_zone']).'</div>';
					echo '<div class="console_commande_ligne_nom">'.htmlentities($ra['nom_client'].' '.$ra['prenom_client']).'</div>';
					echo '<div class="console_commande_ligne_tel">'.htmlentities($ra['tel_client']).'</div>';
					echo '<div class="console_commande_ligne_action"><a href="action.php?page=afficher&id_commande='.$ra['id_commande'].'" target="Iframe_Action" OnClick="return commande_afficher('.$ra['id_commande'].',\''.($ra['nom_client'].' '.$ra['prenom_client']). '\');" class="fancybox fancybox.iframe">Afficher</a> | <a href="action.php?page=annule&id_commande='.$ra['id_commande'].'" target="Iframe_Action" OnClick="return commande_annule(\''.$ra['id_commande'].'\',\''.htmlentities($ra['nom_client'].' '.$ra['prenom_client']).'\');">Supprimer</a></div>';
					echo '</div>';

				}

			mysql_close();
			echo '</div>';


			break;

		case 'historique':



			function nombre_page($nb_objet,$nb_par_page)
			{
				if($nb_objet<=$nb_par_page)$nb_page=1;
				else
				{
					$nb_page=($nb_objet - $nb_objet%$nb_par_page)/$nb_par_page;
					if($nb_page*$nb_par_page<$nb_objet)$nb_page++;
				}
				return $nb_page;
			}

	function listing_page_soft($nb_page,$page,$name_var_page)
	{
		$page_name=substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
		if($page=="")$page=1;
		if(count($_GET)==0)
		{
			$get_info="";
		}
		else if(count($_GET)==1 && isset($_GET[$name_var_page]))
		{
			$get_info="";
		}
		else
		{
			foreach($_GET as $key => $value)
			{
				if($key!=$name_var_page)
				{
					$get_info.=$key.'='.$value.'&';
				}
			}
		}
		//$get_info=(isset($_GET['id']))? "id=".$_GET['id']."&" : "";
		if($nb_page==1)
		{
			print "";
		}
		else
		{
			if($page!=1)print  "<a href=\"".$page_name."?".$get_info.$name_var_page."=1\">Première page</a>  ";
			if($page==1)print "  ";
			else print "<a href=\"".$page_name."?".$get_info.$name_var_page."=".($page-1)."\">&lt;&lt;&lt;</a>  ";

			if($nb_page>10)
			{
				if($page>10)
				{
					if($page+10>=$nb_page)
					{
						print" ... ";
						for($i=$nb_page-10;$i<=$nb_page;$i++) 
						{
							if($i==$page)print "<b>".$i."</b>  ";
							else print "<a href=\"".$page_name."?".$get_info.$name_var_page."=".$i."\">".$i."</a>  "; //ici le lien
						}
					}
					else
					{
						print" ... ";
						for($i=$page-5;$i<=$page+5;$i++) 
						{
							if($i==$page)print "<b>".$i."</b>  ";
							else print "<a href=\"".$page_name."?".$get_info.$name_var_page."=".$i."\">".$i."</a>  "; //ici le lien
						}
						print" ... ";
					}
				}
				else
				{
					if($page>5)
					{
						print" ... ";
						for($i=$page-5;$i<=$page+5;$i++) 
						{
							if($i==$page)print "<b>".$i."</b>  ";
							else print "<a href=\"".$page_name."?".$get_info.$name_var_page."=".$i."\">".$i."</a>  "; //ici le lien
						}
						print" ... ";
					}
					else
					{
						for($i=1;$i<=10;$i++) 
						{
							if($i==$page)print "<b>".$i."</b>  ";
							else print "<a href=\"".$page_name."?".$get_info.$name_var_page."=".$i."\">".$i."</a>  "; //ici le lien
						}
						print" ... ";
					}
				}
			}
			else
			{

				for($i=1;$i<=$nb_page;$i++) 
				{
					if($i==$page)print "<b>".$i."</b>  ";
					else print "<a href=\"".$page_name."?".$get_info.$name_var_page."=".$i."\">".$i."</a>  "; //ici le lien
				}
			}
			
			if($page!=$nb_page)
			{
				print " <a href=\"".$page_name."?".$get_info.$name_var_page."=".($page+1)."\">&gt;&gt;&gt;</a>";
				print "  <a href=\"".$page_name."?".$get_info.$name_var_page."=".$nb_page."\">Dernière page</a>";
			}
		}
	}


			echo '<center><h1>Commande Historique</h1></center>';

			echo '<div id="console_commande_liste">';
			mysql_connect($server,$user,$pass);

			$NB_RESULT_BY_PAGE=25;

			// On compte les resultat
			$result=mysql_db_query($base,"SELECT count(*) as nb_result FROM `commande_liste_index`");
			$ra=mysql_fetch_array($result);
			$nb_result=$ra['nb_result'];
			$nb_page_result=nombre_page($ra['nb_result'],$NB_RESULT_BY_PAGE);

			// On select la page 
			$page_result =( isset($_GET['num_page']) && is_numeric($_GET['num_page']) )? $_GET['num_page'] : 1;
			$pos_cmd=($page_result-1)*$NB_RESULT_BY_PAGE;



			$result=mysql_db_query($base,"SELECT * FROM `commande_liste_index` NATURAL JOIN `base_client` NATURAL JOIN `zone_livraison` WHERE 1 ORDER BY `id_commande` DESC LIMIT ".$pos_cmd.",".$NB_RESULT_BY_PAGE);
			$i=1;
				while($ra=mysql_fetch_array($result)) 
				{
					echo '<div id="commande_'.$ra['id_commande'].'" class="console_commande_ligne">';
					echo '<div class="console_commande_ligne_id"> #'.$ra['id_commande'].'</div>';
					echo '<div class="console_commande_ligne_etat">';

					$mode_paiement='';
					if($ra['paiement_commande']=='')
					{
						$mode_paiement="NA";
					}
					else
					{
						$tab_p=explode(',',$ra['paiement_commande']);
						foreach ($tab_p as $key => $value)
						{
							switch($value)
							{
								case '1':
									$mode_paiement.="ESP, ";
									break;
								case '2':
									$mode_paiement.="CB, ";
									break;
								case '3':
									$mode_paiement.="TKR";
									break;
							}
						}
					}
					echo $mode_paiement.'</div>';


					echo '<div class="console_commande_ligne_zone">'.htmlentities($ra['titre_zone']).'</div>';
					echo '<div class="console_commande_ligne_nom">'.htmlentities($ra['nom_client'].' '.$ra['prenom_client']).'</div>';
					echo '<div class="console_commande_ligne_tel">'.htmlentities($ra['tel_client']).'</div>';
					echo '<div class="console_commande_ligne_action"><a href="action.php?page=afficher&id_commande='.$ra['id_commande'].'" target="Iframe_Action" OnClick="return commande_afficher('.$ra['id_commande'].',\''.($ra['nom_client'].' '.$ra['prenom_client']). '\');" class="fancybox fancybox.iframe">Afficher</a> | <a href="action.php?page=annule&id_commande='.$ra['id_commande'].'" target="Iframe_Action" OnClick="return commande_annule(\''.$ra['id_commande'].'\',\''.htmlentities($ra['nom_client'].' '.$ra['prenom_client']).'\');">Supprimer</a></div>';
					echo '</div>';

				}
			echo '<div class="console_commande_page"><center>';
			listing_page_soft($nb_page_result,$page_result,"num_page");
			mysql_close();
			echo '</center></div>';
			echo '</div>';
			
			

			break;

	}
}

?>
    <audio preload="auto" src="alerte.wav" id="player_audio"></audio>
			<!-- Frame Send Ajax -->
			<iframe src="" name="Iframe_Action" id="Iframe_Action" style="visibility:hidden;"></iframe>
			<iframe src="update_liste.php?last_id=<? echo $max_id; ?>" name="Iframe_Actu" id="Iframe_Actu" style="visibility:hidden;" ></iframe>

</div>
 </body>
</html>