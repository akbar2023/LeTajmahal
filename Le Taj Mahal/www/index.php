<?php
header( 'content-type: text/html; charset=utf-8' );


		// CHARGE CONF
		include("config.inc.php");
		//include("class/panier.class.php");
		session_start();
		//mysql_connect($server,$user,$pass);
		//$result=mysql_db_query($base,"SELECT * FROM `db_delice_conf`");

		//while($ra=mysql_fetch_array($result)) $CONF_VAR_SITE[ $ra['name_conf'] ] = $ra['value_conf'];

		//mysql_close();
		//unset($_SESSION['id_client']);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<META NAME="robots" CONTENT="index,follow" />

<meta name="description" content="Restaurant indien / Traiteur indien à Boulogne billancourt 92">
<META name="keywords" content="Restauration, indien, Livraison sur boulogne, restauration rapide, boulogne, menu midi, repas midi, manger le midi sur boulogne"> 


<?
if(isset($_GET['page']) && $_GET['page']!='')
{
	$base_title_page_out=", Le Taj Mahal 92 - Restaurant Indien - Boulogne billancourt";
	switch($_GET['page'])
	{
		case 'resto':
			$title_page_out="Notre restaurant".$base_title_page_out;
			break;
		case 'carte':
			$title_page_out="Notre carte".$base_title_page_out;
			break;
		case 'commande':
			$title_page_out="Commande en ligne".$base_title_page_out;
			break;
		case 'plan':
			$title_page_out="Plan Acces".$base_title_page_out;
			break;
		case 'contact':
			$title_page_out="Nous contacter".$base_title_page_out;
			break;
		default:
			$title_page_out="Le Taj Mahal 92 - Restaurant Indien - Boulogne billancourt";
	}
}
else
{
	$title_page_out="Le Taj Mahal 92 - Restaurant Indien - Boulogne billancourt";
}
?>

  <title><? echo htmlentities($title_page_out);?></title>

    <link href="slide/js-image-slider.css" rel="stylesheet" type="text/css" />
    <script src="slide/js-image-slider.js" type="text/javascript"></script>
<style>

body, td, div, p, ul, ol { font-family: Verdana, Sans-Serif; font-size: 11px; color:#FFFFFF; }
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
	background-color:black;
	background-image:url(images/background_siteindien.jpg);
	background-image:repeat;

	color:red;

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
 width: 190px;
 height: 80px;
 }
 /*
#div_menu_home ul li a {
 display:block;
 float:left;   
 width:100%;
 height: 100%;
 line-height:100px; 
 text-decoration:none;
 text-align:center;
 }
#div_menu_home  ul li a:hover {
 color:white;
 }  

*/

#div_menu_home ul li a {
 display:block;
 float:left;   
 text-decoration:none;
 text-align:center;
 }



/* BUTTON CSS GENERATOR*/

/*
.myButtonMenu {
	-moz-box-shadow:inset 0px 1px 0px 0px #ffffff;
	-webkit-box-shadow:inset 0px 1px 0px 0px #ffffff;
	box-shadow:inset 0px 1px 0px 0px #ffffff;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #ffffff), color-stop(1, #f6f6f6));
	background:-moz-linear-gradient(top, #ffffff 5%, #f6f6f6 100%);
	background:-webkit-linear-gradient(top, #ffffff 5%, #f6f6f6 100%);
	background:-o-linear-gradient(top, #ffffff 5%, #f6f6f6 100%);
	background:-ms-linear-gradient(top, #ffffff 5%, #f6f6f6 100%);
	background:linear-gradient(to bottom, #ffffff 5%, #f6f6f6 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#f6f6f6',GradientType=0);
	background-color:#ffffff;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	border-radius:6px;
	border:3px solid #dcdcdc;
	display:inline-block;
	cursor:pointer;
	color:#666666;
	font-family:Arial;
	font-size:15px;
	font-weight:bold;
	padding:15px 70px;
	text-decoration:none;
	text-shadow:0px 1px 0px #ffffff;
}
.myButtonMenu:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #f6f6f6), color-stop(1, #ffffff));
	background:-moz-linear-gradient(top, #f6f6f6 5%, #ffffff 100%);
	background:-webkit-linear-gradient(top, #f6f6f6 5%, #ffffff 100%);
	background:-o-linear-gradient(top, #f6f6f6 5%, #ffffff 100%);
	background:-ms-linear-gradient(top, #f6f6f6 5%, #ffffff 100%);
	background:linear-gradient(to bottom, #f6f6f6 5%, #ffffff 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#f6f6f6', endColorstr='#ffffff',GradientType=0);
	background-color:#f6f6f6;
}
.myButtonMenu:active {
	position:relative;
	top:1px;
}
*/

.myButtonMenu {
	-moz-box-shadow:inset 0px 39px 0px -24px #e67a73;
	-webkit-box-shadow:inset 0px 39px 0px -24px #e67a73;
	box-shadow:inset 0px 39px 0px -24px #e67a73;
	background-color:#b23d35;
	-moz-border-radius:10px;
	-webkit-border-radius:10px;
	border-radius:10px;
	border:3px solid #ffffff;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:bold;
	padding:15px 10px;
	width: 160px;
	text-decoration:none;
	text-shadow:0px 1px 0px #b23e35;
}
.myButtonMenu:hover {
	background-color:#eb675e;
}
.myButtonMenu:active {
	position:relative;
	top:1px;
}

/* END BUTTON CSS GENERATOR*/

.pic_border_menu{
	margin-top:20px;
	margin-bottom:20px;
	border:5px solid white;
}

.pic_border_plan{
	margin-top:20px;
	margin-bottom:20px;
	border:5px solid #b23d35;
}

.adresse_resto_page{
	float:left;
	width:100%;
	text-align:center;
	color:white;
	font-weight:bold;
	padding:10px;
	font-size:25px;
	border:5px solid white;
	background-color:#b23d35;
}
.adresse_resto_page{
	float:left;
	width:100%;
	text-align:center;
	color:white;
	font-weight:bold;
	padding:10px;
	margin-bottom:10px;
	font-size:25px;
	border:5px solid white;
	background-color:#b23d35;
}

#page_commande_carte,#page_commande_menu{
	float:left;
	width:100%;
	text-align:center;
	color:white;
	padding:10px;
	margin-bottom:10px;
	font-size:12px;
	border:5px solid white;
	background-color:#b23d35;
}

.commande_menu_titre
{
	float:left;
	width:150px;
	padding-top:5px;
	height:40px;
	border-bottom:1px dotted white;
}
.commande_menu_add{
	float:left;
	padding-top:5px;
	width:100%;
	height:70px;
}
.commande_menu_add input{
	border:1px solid white;
	background-color:black;
	color:white;
	text-align:center;
	padding:5px;
}
.commande_menu_choix
{
	float:left;
	width:850px;
	height:40px;
	padding-top:5px;
	border-bottom:1px dotted white;
}

.commande_total{
	float:right;
	width:200px;
}
.commande_total input{
	width:30px;
	background-color:#b23d35;
	color:white;
	border:0px;
	width:100px;
	text-align:right;
}
#page_commande_total{
	float:left;
	width:100%;
	text-align:center;
	color:white;
	padding:10px;
	margin-bottom:10px;
	font-size:12px;
	border:5px solid white;
	background-color:#b23d35;
}
.commande_carte_title{
	float:left;
	width:100%;
	text-align:center;
	font-weight:bold;
	margin-top:5px;
	margin-bottom:5px;
	border-bottom:2px solid white;
}
.commande_carte_produit{
	float:left;
	width:100%;
	margin-bottom:2px;
	border-bottom:1px dotted white;
}
.commande_carte_produit_titre{
	float:left;
	width:300px;
	font-weight:bold;
}
.commande_carte_produit_description{
	float:left;
}
.commande_carte_produit_prix{
	float:right;
	width:50px;
}
.commande_carte_produit_quantite{
	float:right;
	width:100px;
}

#commande_menu_liste{
	float:left;
	width:100%;
}
.commande_titre_menu_panel{
	float:right;
	width:80px;
	padding-top:5px;
	height:40px;
	border-bottom:1px dotted white;
}
.commande_titre_menu_info{
	float:left;
	width:920px;
	height:40px;
	padding-top:5px;
	border-bottom:1px dotted white;
}

.menu_quantite{
	width:30px;
	border:1px solid white;
	background-color:#b23d35;
	color:white;
	text-align:center;

}
.btn_quantite{
	border:1px solid white;
	background-color:black;
	color:white;
	text-align:center;

}

#button_valide_commande{
	border:1px solid white;
	background-color:black;
	color:white;
	width:350px;
	margin-top:50px;
	margin-bottom:50px;
	height:40px;
	text-align:center;
}

.form_contact_page{
	float:left;
	width:100%;
	text-align:center;
	color:white;
	font-weight:bold;
	padding:10px;
	border:5px solid white;
	background-color:#b23d35;
	margin-top:20px;
}



.div_form_contact{
	width:100%;
	float:left;
}
.div_form_contact table{
	width:100%;
	text-align:center;
	font-weight:bold;
}
.input_contact{
	width:300px;
	margin-left:15px;
	border:2px solid black;
	height:20px;
}

.input_contact_adresse{
	width:780px;
	text-align:left;
	border:2px solid black;
	height:20px;
}

.div_form_contact textarea{
	width:850px;
	height:200px;
	border:2px solid black;
}

.btn_send_contact{
	height:30px;
	width:100px;
	border:0px;
	background-color:#b23d35;
	border:2px solid white;
	color:white;
	font-weight:bold;
}

#sliderFrame{

	float:left;
	margin-left:100px;

border:5px solid white;
}

.commande_ticket{
	float:left;
	width:300px;
}

.commande_ticket_titre{
	float:left;
	width:100%;
	height:40px;
	padding-top:5px;
	border-bottom:1px solid white;
}

.commande_ticket_ligne{
	float:left;
	width:100%;
	text-align:left;
	border-bottom:1px dotted white;
}

.commande_ticket_categorie{
	float:left;
	text-align:center;
	border-bottom:1px dashed white;
	width:100%;
}
.commande_ticket_ligne_titre{
	float:left;
	width:180px;
}
.commande_ticket_ligne_quantite{
	float:left;
	width:30px;
}
.commande_ticket_ligne_calcul{
	float:left;
	width:50px;
}
.commande_ticket_ligne_prix{
	float:left;
	width:40px;
	text-align:right;
}


.commande_ticket_total{
	float:left;
	width:100%;
	text-align:left;
}
.commande_ticket_total_prix{
	float:right;
	width:110px;
	margin-top:5px;
	text-align:right;
}
.commande_ticket_total_nb{
	float:left;
	margin-top:5px;
	width:80px;
	text-align:left;
}

</style>


<script>
	// Variable Global pour le nombre de produit
	var count_produit;
	function verrou_form(id_button)
	{
		document.getElementById(id_button).disabled = true;
	}


	function set_div(body_div,div_out)
	{
		document.getElementById(div_out).innerHTML = body_div;
	}

</script>

 </head>

 <body>
<div id="site_home">

 <center><img src="images/logo_home_1.png" alt="le taj mahal 92, restaurant/traiteur à Boulogne billancourt"/></center>
 <br /><br /><br />

  <div id="div_menu_home">
	<ul id="menu_home">

		<li><a href="index.php?page=resto" class="myButtonMenu">Notre restaurant</a></li>
		<li><a href="index.php?page=carte" class="myButtonMenu">Voir la carte</a></li>
		<li><a href="index.php?page=commande" class="myButtonMenu">Commander en ligne</a></li>
		<li><a href="index.php?page=plan" class="myButtonMenu">Plan et Accès</a></li>
		<li><a href="index.php?page=contact" class="myButtonMenu">Nous contacter</a></li>

	</ul>
  </div>

<?
if(isset($_GET['page']) && $_GET['page']!='')
{
	switch($_GET['page'])
	{
		case 'resto':
?>
<center>
<img src="images/vue_resto_exterieur.jpg" class="pic_border_menu" /><br />
<img src="images/vue_resto_interieur_1.jpg" class="pic_border_menu" /><br />
<img src="images/vue_resto_interieur_2.jpg" class="pic_border_menu" /><br />
</center>
<?
			break;
		case 'carte':
?>
<center>
<img src="images/menu_page_1.jpg" class="pic_border_menu" /><br />
<img src="images/menu_page_2.jpg" class="pic_border_menu" /><br />
<img src="images/menu_page_3.jpg" class="pic_border_menu" /><br />
<img src="images/menu_page_4.jpg" class="pic_border_menu" /><br />
</center>
<?
			break;
		case 'commande':
			if(isset($_SESSION['id_client']))
			{
			/*
				if(isset($_GET['zone']) || isset($_GET['zone']))
				{
				}*/
				//echo '<span class="adresse_resto_page">Client '.$_SESSION['id_client'].' en ligne</span>';
				// AFFICHAGE DU MINIMUM DE COMMANDE
				mysql_connect($server,$user,$pass);
				$result=mysql_db_query($base,"SELECT * FROM `zone_livraison` WHERE `id_zone`='".$_SESSION['id_zone']."'");
				$ra=mysql_fetch_array($result);
				echo '<span class="adresse_resto_page">Livraison sur '.$ra['titre_zone'].' en '.$ra['temps_zone'].' minutes<br />( Minimum de : '.$ra['prix_midi_zone'].'€ le midi et '.$ra['prix_soir_zone'].'€ le soir )</span>';
				echo '<script>var commande_min_valid= '.(date('H')>16 ? $ra['prix_soir_zone'] : $ra['prix_midi_zone'] ).';</script>'."\n";
				// JAVASCRIPT TAB PRODUIT MENU
				$result=mysql_db_query($base,"SELECT DISTINCT `id_produit`, `titre_article` FROM `base_menu_liste` NATURAL JOIN `base_produit`");
				
				echo "\n".'<script>'."\n";
				echo 'var tab_produit_menu=[];'."\n";
				while($ra=mysql_fetch_array($result))  echo 'tab_produit_menu['.$ra['id_produit'].']="'.$ra['titre_article'].'";'."\n";
				echo '</script>'."\n";
				
				mysql_close();

				//

?>
<script>

	function verif_form_commande(id_button)
	{
		
		var total_panier=prix_total_carte+prix_total_menu;
		if(  total_panier < commande_min_valid )
		{
			alert('Votre commande doit avoir un minimum de ' + commande_min_valid + ' euro');
			return false;
		}
		else
		{
			verrou_form(id_button);
			return true;
		}
	}

	
</script>
<form method="post" action="index.php?page=commande_valide" onSubmit="return verif_form_commande('button_valide_commande')">
<div id="page_commande_carte">

	
<?
		mysql_connect($server,$user,$pass);

		$result=mysql_db_query($base,"SELECT * FROM `base_produit_categorie` ORDER BY `id_categorie` ASC");
		$i=1;
			while($ra=mysql_fetch_array($result)) 
			{
				echo '<div class="commande_carte_title">'.htmlentities($ra['titre_cat']).'</div>';

				$result_b=mysql_db_query($base,"SELECT * FROM `base_produit` WHERE `id_categorie`='".$ra['id_categorie']."' ORDER BY `id_produit` ASC");
				while($rb=mysql_fetch_array($result_b)) 
				{
					echo '<div class="commande_carte_produit">';
					echo '<div class="commande_carte_produit_titre">'.htmlentities(strtoupper($rb['titre_article'])).'</div>';
					echo '<div class="commande_carte_produit_description">'.htmlentities($rb['description_article']).'</div>';
					echo '<div class="commande_carte_produit_prix">'.htmlentities($rb['prix_article']).'<input type="hidden" name="prix_produit_'.$i.'" value="'.$rb['prix_article'].'" id="prix_produit_'.$i.'" value="'.$rb['prix_article'].'"><input type="hidden" name="id_produit_'.$i.'" value="'.$rb['id_produit'].'"></div>';
					echo '<div class="commande_carte_produit_quantite"><input type="button" class="btn_quantite" value="-" onclick="javascript:commande_del_article(\'menu_produit_'.$i.'\');"> <input type="text" class="menu_quantite"  name="menu_produit_'.$i.'" id="menu_produit_'.$i.'" value="0"> <input type="button" value="+" class="btn_quantite" onclick="javascript:commande_add_article(\'menu_produit_'.$i.'\');"></div>';
					echo '</div>';
					$i++;
				}
			}

		mysql_close();
		
		echo "<script> count_produit=".$i."; </script>";
?>
	<!-- LISTING MENU AJOUTER -->
	<div class="commande_carte_title">Liste des menus ajouté à votre commande</div>
	<div id="commande_menu_liste"></div>
</div>
<script>
        var cmpt_id_form_menu = 0;
		var prix_total_menu = 0.0;
		var prix_total_carte = 0.0;
		var count_total_menu = 0;





	function calcul_panier()
	{
		var prix_panier;
		var nb_panier;
		var calcul_produit;
		prix_panier=0.0;
		nb_panier=0;

		for (j = 1; j < parseInt(count_produit) ; j++)
		{
			calcul_produit = parseFloat( document.getElementById('menu_produit_' + j).value + ".00" ) * parseFloat( document.getElementById('prix_produit_' + j).value );
			//alert("prix " + calcul_produit);
			prix_panier = prix_panier + calcul_produit;
			nb_panier = nb_panier + parseInt( document.getElementById('menu_produit_' + j).value );
		}
		prix_total_carte=prix_panier;
		//alert("prix " + prix_panier);
		document.getElementById('commande_input_total').value=(parseFloat(prix_panier)+parseFloat(prix_total_menu)).toFixed(2);
		document.getElementById('commande_input_nb').value=(parseInt(nb_panier) + parseInt(count_total_menu) );

	}

	function commande_del_article(name_input)
	{
		var a = document.getElementById(name_input);
		if(parseInt(a.value)>0) a.value = parseInt(a.value) - 1;

		calcul_panier();

	}
	function commande_add_article(name_input)
	{
		var a = document.getElementById(name_input);
		a.value = parseInt(a.value) + 1;

		calcul_panier();

	}

	function inverse_selection(id_elt)
	{
		if(document.getElementById(id_elt).checked==true)
		{
			document.getElementById(id_elt).checked=false;
		}
		else
		{
			document.getElementById(id_elt).checked=true;
		}
	}



         function make_div_menu(id_menu,prix_menu,titre_menu,id_entree,id_plat,id_dessert,option_nan){

           


			lediv = document.createElement("div");
            lediv.id = "commande_menu_"+cmpt_id_form_menu+"_div";
			
			info_titre_menu = document.createElement("div");
            info_titre_menu.id = "commande_menu_"+cmpt_id_form_menu+"_info";
			info_titre_menu.className = "commande_titre_menu_info";

			info_panel_menu = document.createElement("div");
            info_panel_menu.id = "commande_menu_"+cmpt_id_form_menu+"_panel";
			info_panel_menu.className  = "commande_titre_menu_panel";

			var ligne_info=titre_menu + "<br />";
			if(id_entree!='') ligne_info +="Entrée : " + tab_produit_menu[id_entree] + " , ";
			if(id_plat!='') ligne_info +="Plat : " + tab_produit_menu[id_plat] + " , ";
			if(id_dessert!='') ligne_info +="Dessert : " + tab_produit_menu[id_dessert] + " , ";

			if(id_menu==1) ligne_info +="Accompagnement : Riz ";
			else if(id_menu==2) ligne_info +="Accompagnement : Riz ";
			else if(id_menu==3) 
			 {
				if ( option_nan ==1 )ligne_info +="Accompagnement : Riz + Nan Fromage ";
				else ligne_info +="Accompagnement : Riz + Nan Nature ";

			 }
			else if(id_menu==4) ligne_info +="Accompagnement : Riz + Nan Fromage ";
			
			info_titre_menu.innerHTML = ligne_info;



			info_menu_form = document.createElement("input");
			info_menu_form.type = "hidden";
            info_menu_form.id = "data_menu_"+cmpt_id_form_menu+"_info";
			info_menu_form.name = "data_menu_"+cmpt_id_form_menu+"_info";
			info_menu_form.style.visibility = 'hidden';
			info_menu_form.value= id_menu + ',' + id_entree + ',' + id_plat + ',' + id_dessert + ',' + option_nan; // A REMPLIR

			prix_menu_form = document.createElement("input");
			prix_menu_form.type = "hidden";
            prix_menu_form.id = "prix_menu_"+cmpt_id_form_menu+"_info";
			prix_menu_form.style.visibility = 'hidden';
			if(option_nan=='1')
			 {
				prix_menu_form.value= ( parseFloat(prix_menu) + parseFloat(1.5) ).toFixed(2);
				//alert(prix_menu_form.value);
			 }
			else 
			 {
				prix_menu_form.value= prix_menu;
			 }


            check = document.createElement("input");
            check.type = "checkbox";
            check.name = cmpt_id_form_menu;
            check.onclick = function(){

				//prix_total_menu -= parseFloat(prix_menu); 
				prix_total_menu -= parseFloat( document.getElementById("prix_menu_"+this.name+"_info").value ); 
               elt = document.getElementById("commande_menu_"+this.name+"_div");
			   //alert("bookspace_uploader_fichier_"+this.name);
               elt.parentNode.removeChild(elt);
			   count_total_menu--;
			   calcul_panier();
            }
            
			lab = document.createElement("label");
            lab.appendChild(document.createTextNode("Enlever"));
            
			//document.getElementById("commande_menu_"+this.name+"_div").appendChild(lediv);
			lediv.appendChild(info_titre_menu);
			lediv.appendChild(info_panel_menu);

			info_panel_menu.appendChild(info_menu_form);
			info_panel_menu.appendChild(prix_menu_form);
            info_panel_menu.appendChild(check);
            info_panel_menu.appendChild(lab);
			
            
			document.getElementById("commande_menu_liste").appendChild(lediv);
            
			cmpt_id_form_menu++;
			count_total_menu++;
			prix_total_menu += parseFloat(prix_menu_form.value); 
			calcul_panier();
         }

	function add_commande_menu(id_menu,prix_menu,titre_menu)
	{
		if(id_menu=='1')
		{
			var id_entree = ''; 
			var id_plat = document.querySelector('input[name=' + 'menu_' + id_menu + '_plat' + ']:checked').value; 
			var id_dessert = ''; 
			var option_nan = '';
			// entree + accompagnement
		} 
		else if(id_menu=='2')
		{
			// entree + plat + dessert + accompagnement
			var id_entree = document.querySelector('input[name=' + 'menu_' + id_menu + '_entree' + ']:checked').value; 
			var id_plat = document.querySelector('input[name=' + 'menu_' + id_menu + '_plat' + ']:checked').value; 
			var id_dessert = document.querySelector('input[name=' + 'menu_' + id_menu + '_dessert' + ']:checked').value; 
			var option_nan = '';
		}
		else if(id_menu=='3')
		{
			// entree + plat + dessert + accompagnement
			var id_entree = document.querySelector('input[name=' + 'menu_' + id_menu + '_entree' + ']:checked').value; 
			var id_plat = document.querySelector('input[name=' + 'menu_' + id_menu + '_plat' + ']:checked').value; 
			var id_dessert = document.querySelector('input[name=' + 'menu_' + id_menu + '_dessert' + ']:checked').value; 
			if(document.getElementById("option_nan_3").checked == true) var option_nan=1;
			else var option_nan='';

			//var option_nan = document.querySelector('input[name=' + 'option_nan_' + id_menu + ']:checked').value;
		}
		else if(id_menu=='4')
		{
			// entree + plat + dessert + accompagnement
			var id_entree = document.querySelector('input[name=' + 'menu_' + id_menu + '_entree' + ']:checked').value; 
			var id_plat = document.querySelector('input[name=' + 'menu_' + id_menu + '_plat' + ']:checked').value; 
			var id_dessert = document.querySelector('input[name=' + 'menu_' + id_menu + '_dessert' + ']:checked').value; 
			var option_nan = '';
		}
		make_div_menu(id_menu, prix_menu , titre_menu, id_entree, id_plat, id_dessert, option_nan);
		//alert(id_menu + ' : ' + titre_menu + ' ( ' + id_entree + ',' + id_plat + ',' + id_dessert + ',' + option_nan + ' )' );
	}



</script>



<span class="adresse_resto_page">Menu</span>
<div id="page_commande_menu">
<?
		mysql_connect($server,$user,$pass);
		
		$min_id_menu = intval ( date("H") ) > 16 ? 2 : 0 ;

		$result=mysql_db_query($base,"SELECT * FROM `base_menu` WHERE `id_menu` > '".$min_id_menu."' ORDER BY `id_menu` ASC");
		
		$menu_tab=Array();
			while($ra=mysql_fetch_array($result)) 
			{
				$menu_tab[ $ra['id_menu'] ]['entree']=Array();
				$menu_tab[ $ra['id_menu'] ]['plat']=Array();
				$menu_tab[ $ra['id_menu'] ]['dessert']=Array();
				$menu_tab[ $ra['id_menu'] ]['accompagnement']=Array();

				echo '<div class="commande_carte_title">'.htmlentities($ra['titre_menu']).' à '.$ra['prix_menu'].' euro</div>';



				$result_b=mysql_db_query($base,"SELECT * FROM `base_menu_liste` NATURAL JOIN `base_produit` WHERE `id_menu`='".$ra['id_menu']."' ORDER BY `id_liste` ASC");
				while($rb=mysql_fetch_array($result_b)) 
				{
					$menu_tab[ $ra['id_menu'] ][ $rb['choix_menu'] ][] = ["id_produit" => $rb['id_produit'], "titre_produit" => $rb['titre_article']]; // A VERIF
				}

				foreach ($menu_tab[ $ra['id_menu'] ] as $choix_menu => $liste_choix_menu){
					if(count($liste_choix_menu))
					{
						echo '<div class="commande_menu_titre">'.$choix_menu.'</div><div class="commande_menu_choix">';
						$i=1;
						$count_ac=1;
						foreach ($liste_choix_menu as $key => $tab_choix_element){

							if($choix_menu!="accompagnement")
							{
								echo '<input type="radio" name="menu_'.$ra['id_menu'].'_'.$choix_menu.'" value="'.$tab_choix_element['id_produit'].'"'.($i==1 ? ' checked' : '').'> '.$tab_choix_element['titre_produit']." " ;
							}
							else 
							{
								if( count($liste_choix_menu)>1)
								{
									if(count($liste_choix_menu)==$count_ac)
									{
										echo $tab_choix_element['titre_produit'];
									}
									else
									{
										echo $tab_choix_element['titre_produit']." + " ;
									}
									//echo '<input type="radio" name="menu_'.$ra['id_menu'].'_'.$choix_menu.'" value="'.$tab_choix_element['id_produit'].'"'.($i==1 ? ' checked' : '').'> '.$tab_choix_element['titre_produit']." " ;
								}
								else
								{
									echo $tab_choix_element['titre_produit'];
								}
								if(count($liste_choix_menu)==$count_ac &&$ra['id_menu']==3) echo ' ( <input type="checkbox" name="option_nan_'.$ra['id_menu'].'" id="option_nan_'.$ra['id_menu'].'" value="1"> Option Nan Fromage + 1€50 ) ';
								$count_ac++;
								//echo '<input type="checkbox" name="menu_'.$ra['id_menu'].'_'.$choix_menu.'" value="'.$tab_choix_element['id_produit'].'" checked>'.$tab_choix_element['titre_produit']." " ;
							}
							$i++;

						}
						$i=1;
						echo "<br /></div>";
					}
				}
				echo '<div class="commande_menu_add"><input type="button" value="Ajouter ce menu" onclick="javascript:add_commande_menu(\''.$ra['id_menu'].'\',\''.$ra['prix_menu'].'\',\''.htmlentities($ra['titre_menu']).' à '.$ra['prix_menu'].' euro\');"></div>';

				//echo '<pre>';
				//print_r($menu_tab[ $ra['id_menu'] ]);
				//echo '</pre>';
			}

		mysql_close();

?>
</div>

<div id="page_commande_total">
	<div class="commande_carte_title">Total</div>
	<div class="commande_total"><input type="text" name="commande_input_total" id="commande_input_total" value="0"> euro TTC</div>
	<div class="commande_total"><input type="text" name="commande_input_nb" id="commande_input_nb" value="0"> Produit(s)</div>
	<div class="commande_carte_title">Choix des modes de paiements</div>
	<div class="commande_paiement">
				<table border="0" width="100%">
				<tr>
					<td><input type="checkbox" name="paiement[]" id="paiement_esp" value="1"> <img src="images/espece.png" onclick="javascript:inverse_selection('paiement_esp');" /></td>
					<td><input type="checkbox" name="paiement[]" id="paiement_cb"  value="2"> <img src="images/logo-cb-page-paiement.jpg" onclick="javascript:inverse_selection('paiement_cb');" /></td>
					<td><input type="checkbox" name="paiement[]" id="paiement_tkr"  value="3"> <img src="images/TKR.png" onclick="javascript:inverse_selection('paiement_tkr');" /></td>
				</tr>
				</table>
	</div>
	<div class="commande_carte_title">Finaliser la commande</div>
	<div class="commande_paiement">
		<center><input type="submit" id="button_valide_commande" value="Envoyer votre commande à Notre restaurant"/></center>
	</div>


</div>

</form>
<?

			}
			else
			{
				if(isset($_GET['action']) && $_GET['action']=='connect')
				{

?>
<div class="form_contact_page">

<h1>Connexion</h1><br /><br />


		<div class="div_form_contact">
			<form method="POST" action="action.php?page=connect">
				<table>
				<tr>
					<td>Email</td>
					<td colspan="2"><input type="text" class="input_contact" name="client_mail" /></td>
					<td>Mot de pass</td>
					<td colspan="2"><input type="password" class="input_contact" name="pass_client" /></td>
				</tr>
				<tr>
					<td colspan="6"><br /><br /><br /><input type="submit" class="btn_send_contact" id="btn_send_contact" value="Connexion"></td>
				</tr>
				</table>
			</form>
		</div>

</div>
<?


				}
				else if(isset($_GET['action']) && $_GET['action']=='newaccount')
				{
					if(isset($_POST['zone']) && $_POST['zone']!='0')
					{


?>
<script>
	function verif_form_account()
	{
		if( document.getElementById('client_name').value=='')
		{
			alert('Formulaire Incomplet : Nom Manquant');
			return false;
		}
		else if ( document.getElementById('client_prenom').value=='')
		{
			alert('Formulaire Incomplet : Prénom Manquant');
			return false;
		}
		else if ( document.getElementById('client_adresse').value=='')
		{
			alert('Formulaire Incomplet : Adresse Manquante');
			return false;
		}
		else if ( document.getElementById('client_tel').value=='')
		{
			alert('Formulaire Incomplet : Téléphone Manquant');
			return false;
		}
		else if ( document.getElementById('client_mail').value=='')
		{
			alert('Formulaire Incomplet : Email Manquant');
			return false;
		}
		else if ( document.getElementById('client_pass').value=='')
		{
			alert('Formulaire Incomplet : Mot de passe Manquant');
			return false;
		}
		else return true;
	}

</script>

<div class="form_contact_page">

<h1>Vous inscrire en 1 clics</h1><br /><br />


		<div class="div_form_contact">
			<form method="POST" action="action.php?page=newaccount" onsubmit="return verif_form_account();">
				<table>
				<tr>
					<td>Nom</td>
					<td colspan="2"><input type="text" class="input_contact" id="client_name" name="client_name" /></td>
					<td>Prénom</td>
					<td colspan="2"><input type="text" class="input_contact" id="client_prenom" name="client_prenom" /></td>
				</tr>
				<tr>
					<td>Adresse </td>
					<td colspan="5"><input type="text" class="input_contact_adresse" id="client_adresse"  name="client_adresse" /></td>
				</tr>
				<tr>
					<td>Bat. / Digicode / ... </td>
					<td colspan="5"><input type="text" class="input_contact_adresse" id="digicode_adresse"  name="digicode_adresse" /></td>
				</tr>
				<tr>
					<td>Zone Livraison </td>
					<td colspan="5">
<?
		mysql_connect($server,$user,$pass);
		$result=mysql_db_query($base,"SELECT * FROM `zone_livraison` where `id_zone`='".$_POST['zone']."'");
		$ra=mysql_fetch_array($result);

		echo htmlentities($ra['titre_zone']);

		mysql_close();
		echo '<input type="hidden" name="zone" value="'.$_POST['zone'].'" />';
?>
					</td>
				</tr>
				<tr>
					<td>Téléphone </td>
					<td colspan="2"><input type="text" class="input_contact" id="client_tel" name="client_tel" /></td>
					<td></td>
					<td colspan="2"></td>
				</tr>
				<tr>
					<td>&nbsp;&nbsp; </td>
					<td colspan="2">&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;</td>
					<td colspan="2">&nbsp;&nbsp;</td>
				</tr>
				<tr>
					<td>Email </td>
					<td colspan="2"><input type="text" class="input_contact" id="client_mail" name="client_mail" /></td>
					<td>Mot de pass</td>
					<td colspan="2"><input type="text" class="input_contact" id="client_pass" name="client_pass" /></td>
				</tr>

				<tr>
					<td colspan="6"><br /><br /><br /><input type="submit" class="btn_send_contact" id="btn_send_contact" value="Creer"></td>
				</tr>
				</table>
			</form>
		</div>

</div>
<?

					}
					else
					{

?>
<div class="form_contact_page">

<h1>Selectionner votre Zone de Livraison</h1><br /><br />


		<div class="div_form_contact">
			<form action="/index.php?page=commande&action=newaccount" method="POST">
	<select name="zone">
		<option value="0" selected>Selectionner votre zone de livraison</option>
<?
		mysql_connect($server,$user,$pass);
		$result=mysql_db_query($base,"SELECT * FROM `zone_livraison` ORDER BY `titre_zone` ASC");

		while($ra=mysql_fetch_array($result)) echo '<option value="'.$ra['id_zone'].'">'.htmlentities($ra['titre_zone']).'</option>';

		mysql_close();
?>
	</select> <input type="submit" value="Valider" />

			</form><br /><br />
		</div>

</div>
<?




					}
				}
				else
				{
?>
<span class="adresse_resto_page">Connectez vous ou Inscrivez vous !</span><br /><br />
<center><a href="index.php?page=commande&action=connect" class="myButtonMenu">Connectez vous</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="index.php?page=commande&action=newaccount" class="myButtonMenu">Creer un compte</a>
</center>
<?
				}
			}
?>
<!-- <span class="adresse_resto_page">Mise en place de votre service de commande en ligne dans quelques jours.</span>
 --><?

			break;
		case 'commande_valide':
?>
<span class="adresse_resto_page">Commande validé et envoyé à Notre Restaurant</span>
<div id="page_commande_carte">
<?
		if(isset($_POST) && !empty($_POST) && isset($_SESSION['id_client']) )
		{

			mysql_connect($server,$user,$pass);
			
			$result=mysql_db_query($base,"INSERT INTO `commande_liste_index` (`etat_commande`, `id_client`, `date_commande`,`heure_commande`) VALUES ('0', '".$_SESSION['id_client']."', '".date("Y-m-d")."','".date("H:i:s")."');");

			$id_commande=mysql_insert_id();



		

			foreach ($_POST as $key => $value)
			{

				if(substr($key,0,13) =='menu_produit_') // menu_produit_
				{
					if($value!='0')	
					{
						//echo $key.' - '.substr($key,13).' -> '.$value."<br />";
						mysql_db_query($base,"INSERT INTO `commande_liste_produit` (`id_commande`, `id_produit`, `count_produit`) VALUES ('".$id_commande."', '".substr($key,13)."', '".$value."');");
					}
				}
				else if(substr($key,0,9) =='data_menu') // data_menu
				{
					//echo $key.' -> '.$value."<br />";

					$tab_info_menu=explode(",", $value);

					mysql_db_query($base,"INSERT INTO  `commande_liste_menu` (`id_commande`, `id_menu`, `id_entree`, `id_plat`, `id_dessert`,`option_nam`) VALUES ('".$id_commande."', '".$tab_info_menu[0]."', '".$tab_info_menu[1]."', '".$tab_info_menu[2]."', '".$tab_info_menu[3]."', '".$tab_info_menu[4]."');");
					//echo '<pre>';
					//print_r($tab_info_menu);
					//echo '</pre>';
				}
				else if($key=='paiement')
				{
					//echo $key.' -> ';
					//print_r($value);
					//echo "<br />";
					if(count($value)>0)
					{
						// On update les modes de paiement
						mysql_db_query($base,"UPDATE `commande_liste_index` SET `paiement_commande` = '".implode(",", $value)."' WHERE `id_commande` = '".$id_commande."';");
					}
					else
					{
						// Aucun mode indiquer ont update ,,, ou on laisse nul on vera
					}
				}
				else if($key=='commande_input_total')
				{
					//echo $key.' -> '.$value."<br />";
					$total_produit=$value;
				}
				else if($key=='commande_input_nb')
				{
					//echo $key.' -> '.$value."<br />";
					$nb_produit=$value;
				}
				
			}
			// RESUME DE LA COMMANDE

			echo '<div class="commande_carte_title">Résumer de la commande</div>';

			echo '<div class="commande_ticket">';

			echo '<div class="commande_ticket_titre">A LA CARTE</div>';

			$id_categorie='';

			$result=mysql_db_query($base,"SELECT * FROM `base_produit` NATURAL JOIN `commande_liste_produit` NATURAL JOIN `base_produit_categorie` WHERE `id_commande`='".$id_commande."' ORDER BY `id_produit` ASC");
		
			while($ra=mysql_fetch_array($result)) 
			{
				if($id_categorie!=$ra['id_categorie']) 
				{
					echo '<div class="commande_ticket_categorie">'.$ra['titre_cat'].'</div>';
					$id_categorie=$ra['id_categorie'];
				}
				echo '<div class="commande_ticket_ligne">';
				echo '<div class="commande_ticket_ligne_titre">'.htmlentities($ra['titre_article']).'</div>';
				echo '<div class="commande_ticket_ligne_quantite">'.$ra['count_produit'].'</div>';
				echo '<div class="commande_ticket_ligne_calcul">'.$ra['count_produit'].' x '.$ra['prix_article'].'</div>';
				echo '<div class="commande_ticket_ligne_prix">'.( $ra['prix_article']*$ra['count_produit'] ).' €</div>';
				echo '</div>';
			}

			

			echo '<div class="commande_ticket_titre">MENU</div>';

			$result=mysql_db_query($base,"SELECT * FROM `base_menu` NATURAL JOIN `commande_liste_menu` WHERE `id_commande`='".$id_commande."' ORDER BY `id_menu` ASC");
		
			while($ra=mysql_fetch_array($result)) 
			{
				echo '<div class="commande_ticket_ligne">';
				echo '<div class="commande_ticket_ligne_titre">'.htmlentities($ra['titre_menu']).' à '.$ra['prix_menu'].' €<br />';
				
				if($ra['id_entree']!='')
				{
					$result_b=mysql_db_query($base,"SELECT * FROM `base_produit` WHERE `id_produit`='".$ra['id_entree']."'");
					$ra_b=mysql_fetch_array($result_b);
					if($ra_b['titre_article']!='') echo 'E : '.$ra_b['titre_article'].'<br />';
				}
				if($ra['id_plat']!='')
				{
					$result_b=mysql_db_query($base,"SELECT * FROM `base_produit` WHERE `id_produit`='".$ra['id_plat']."'");
					$ra_b=mysql_fetch_array($result_b);
					if($ra_b['titre_article']!='') echo 'P : '.$ra_b['titre_article'].'<br />';
				}
				if($ra['id_dessert']!='')
				{
					$result_b=mysql_db_query($base,"SELECT * FROM `base_produit` WHERE `id_produit`='".$ra['id_dessert']."'");
					$ra_b=mysql_fetch_array($result_b);
					if($ra_b['titre_article']!='') echo 'D : '.$ra_b['titre_article'].'<br />';
				}
				if($ra['option_nam']=='1')
				{
					echo '+ OPTION NAN FROMAGE<br />';
				}

				
				echo '</div>';
				echo '<div class="commande_ticket_ligne_quantite">1</div>';
				echo '<div class="commande_ticket_ligne_calcul">'.( $ra['option_nam']=='1' ? '+ 1.5' : '-').'</div>';
				echo '<div class="commande_ticket_ligne_prix">'.( $ra['option_nam']=='1' ? $ra['prix_menu'] + 1.5 : $ra['prix_menu'] ).' €</div>';
				echo '</div>';
			}
			echo '<div class="commande_ticket_titre">TARIF</div>';
			echo '<div class="commande_ticket_total"><div class="commande_ticket_total_nb">'.$nb_produit.' Produit(s)</div><div class="commande_ticket_total_prix">Total : '.$total_produit.' €</div></div>';
			

			echo '</div>'; // FIN TICKET

			mysql_close();
			//echo '<pre>';
			//print_r($_POST);
			//echo '</pre>';
		}
		else
		{
			echo '<center><h1>Acces non autorisé, merci de vous rendre sur la page commande</h1></center>';
		}
?>
</div>
<?
			break;
		case 'plan':
?>
<center>

<span class="adresse_resto_page">10 Rue des 4 Cheminées, 92100 Boulogne-Billancourt</span>

<img src="images/plan_acces.jpg" class="pic_border_plan" /><br />
</center>
<?
			break;
		case 'contact':
?>
<center>

<div class="adresse_resto_page">Nous contacter par téléphone<br /><br />Téléphone Fixe 01 41 13 61 68<br /><br />Téléphone Portable 07 58 37 82 96<br /></div>

<div class="form_contact_page">

<h1>Nous contacter par email</h1><br /><br />

		<div class="div_form_contact" id="div_form_contact">
			<form method="POST" action="ajax_action.php?page=contact" target="Iframe_Form" onSubmit="javascript:verrou_form('btn_send_contact');">
				<table>
				<tr>
					<td>Nom</td>
					<td colspan="2"><input type="text" class="input_contact" name="contact_name" /></td>
					<td>Prénom</td>
					<td colspan="2"><input type="text" class="input_contact" name="contact_prenom" /></td>
				</tr>
				<tr>
					<td>Adresse </td>
					<td colspan="5"><input type="text" class="input_contact_adresse" name="contact_adresse" /></td>
				</tr>
				<tr>
					<td>Téléphone </td>
					<td colspan="2"><input type="text" class="input_contact" name="contact_tel" /></td>
					<td>Email</td>
					<td colspan="2"><input type="text" class="input_contact" name="contact_mail" /></td>
				</tr>
				<tr>
					<td colspan="6"><br /><br /><br /><textarea name="contact_message"></textarea><br /><br /><br /><input type="submit" class="btn_send_contact" id="btn_send_contact" value="Envoyer"></td>
				</tr>
				</table>
			</form>
		</div>

</div>
</center>
			<!-- Frame Send Ajax -->
			<iframe src="" name="Iframe_Form" id="Iframe_Form" style="visibility:hidden;"></iframe>

<?
			break;
	}
}
else
{
?>
    <div id="sliderFrame">
        <div id="slider">
            <img src="images/ban_resto.jpg" />
            <img src="images/ban_food.jpg" alt="" />
        </div>
    </div>
<?

}

?>



</div>
 </body>
</html>