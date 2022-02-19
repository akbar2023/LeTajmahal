<?php
		// CHARGE CONF
		include("../config.inc.php");

if(isset($_GET['page']) && $_GET['page']!='')
{
	switch($_GET['page'])
	{
		case 'annule':

			mysql_connect($server,$user,$pass);
			
			mysql_db_query($base,"DELETE FROM `commande_liste_produit` WHERE `id_commande` ='".$_GET['id_commande']."'");
			mysql_db_query($base,"DELETE FROM `commande_liste_menu` WHERE `id_commande` ='".$_GET['id_commande']."'");
			mysql_db_query($base,"DELETE FROM `commande_liste_index` WHERE `id_commande` ='".$_GET['id_commande']."'");

			mysql_close();
			break;

		case 'afficher':

			mysql_connect($server,$user,$pass);
			$result=mysql_db_query($base,"SELECT `etat_commande`,`date_commande`,`heure_commande` FROM `commande_liste_index` WHERE `id_commande`='".$_GET['id_commande']."'");
			$ra=mysql_fetch_array($result);
			if($ra['etat_commande']=='0')
			{
				// On modifie en lu si et seulement si on a pas valider ou envoyer en cuisine
				mysql_db_query($base,"UPDATE `commande_liste_index` SET `etat_commande` = '1' WHERE `id_commande` = '".$_GET['id_commande']."';");

			// Update CLASS et DIV
?>
<script language="Javascript" type="text/javascript">
	parent.document.getElementById("etat_commande_"+<? echo $_GET['id_commande']; ?>).innerHTML = 'Consultée';
	parent.document.getElementById("commande_"+<? echo $_GET['id_commande']; ?>).className='console_commande_ligne etat_commande_1';
</script>
<?

			}


?>
<style>


body, td, div, p, ul, ol { font-family: Verdana, Sans-Serif; font-size: 18px; color:#000000; }

body{
	min-height:500px;
}
.commande_carte_title{
	float:left;
	width:100%;
	text-align:center;
	font-weight:bold;
	margin-top:5px;
	margin-bottom:5px;
	border-bottom:2px solid black;
}

.commande_ticket{
	float:left;
	width:420px;
}

.commande_ticket_titre{
	float:left;
	width:100%;
	height:50px;
	padding-top:5px;
	border-bottom:1px solid black;
}

.commande_ticket_ligne{
	float:left;
	width:100%;
	text-align:left;
	border-bottom:1px dotted black;
}

.commande_ticket_categorie{
	float:left;
	text-align:center;
	border-bottom:1px dashed black;
	width:100%;
}
.commande_ticket_ligne_titre{
	float:left;
	width:230px;
}
.commande_ticket_ligne_quantite{
	float:left;
	width:40px;
}
.commande_ticket_ligne_calcul{
	float:left;
	width:80px;
}
.commande_ticket_ligne_prix{
	float:left;
	width:70px;
	text-align:right;
}


.commande_ticket_total{
	float:left;
	width:100%;
	text-align:left;
}
.commande_ticket_total_prix{
	float:right;
	width:150px;
	margin-top:5px;
	text-align:right;
}
.commande_ticket_total_nb{
	float:left;
	margin-top:5px;
	width:120px;
	text-align:left;
}

</style>
<?


			// RESUME DE LA COMMANDE

			
			//echo '<meta name="viewport" content="width=300; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />';
			echo '<div class="commande_ticket">';

			echo '<div class="commande_carte_title"><input type="button" value="Imprimer cette page" onClick="window.print();"></div>';
			$formate_date=explode('-',$ra['date_commande']);
			echo '<div class="commande_ticket_titre">Commande #'.$_GET['id_commande'].'<br />le '.$formate_date[2].'-'.$formate_date[1].'-'.$formate_date[0].' à '.$ra['heure_commande'].'</div>';
			echo '<div class="commande_ticket_titre">A LA CARTE</div>';

			$id_categorie='';
			$nb_produit=0;
			$total_produit=0.0;

			$result=mysql_db_query($base,"SELECT * FROM `base_produit` NATURAL JOIN `commande_liste_produit` NATURAL JOIN `base_produit_categorie` WHERE `id_commande`='".$_GET['id_commande']."' ORDER BY `id_produit` ASC");
		
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
				echo '<div class="commande_ticket_ligne_calcul"> x '.$ra['prix_article'].'</div>';
				echo '<div class="commande_ticket_ligne_prix">'.( $ra['prix_article']*$ra['count_produit'] ).'</div>';
				echo '</div>';
				$nb_produit+=$ra['count_produit'];
				$total_produit+= ( $ra['prix_article']*$ra['count_produit'] );
			}

			

			echo '<div class="commande_ticket_titre">MENU</div>';

			$result=mysql_db_query($base,"SELECT * FROM `base_menu` NATURAL JOIN `commande_liste_menu` WHERE `id_commande`='".$_GET['id_commande']."' ORDER BY `id_menu` ASC");
		
			while($ra=mysql_fetch_array($result)) 
			{
				echo '<div class="commande_ticket_ligne">';
				echo '<div class="commande_ticket_ligne_titre">'.htmlentities($ra['titre_menu']).' à '.$ra['prix_menu'].'€<br />';
				
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
				echo '<div class="commande_ticket_ligne_prix">'.( $ra['option_nam']=='1' ? $ra['prix_menu'] + 1.5 : $ra['prix_menu'] ).'</div>';
				echo '</div>';

				$nb_produit++;
				$total_produit +=  ( $ra['option_nam']=='1' ? $ra['prix_menu'] + 1.5 : $ra['prix_menu'] ) ;
			}
			$result=mysql_db_query($base,"SELECT `paiement_commande` FROM `commande_liste_index` WHERE `id_commande`='".$_GET['id_commande']."'");
			$ra=mysql_fetch_array($result);
			$mode_paiement='';
			if($ra['paiement_commande']=='')
			{
				$mode_paiement="Non indique";
			}
			else
			{
				$tab_p=explode(',',$ra['paiement_commande']);
				foreach ($tab_p as $key => $value)
				{
					switch($value)
					{
						case '1':
							$mode_paiement.="Espece, ";
							break;
						case '2':
							$mode_paiement.="CB, ";
							break;
						case '3':
							$mode_paiement.="Ticket R";
							break;
					}
				}
			}

			echo '<div class="commande_ticket_titre">TARIF<br />Paiement en : '.$mode_paiement.'</div>';
			echo '<div class="commande_ticket_total"><div class="commande_ticket_total_nb">'.$nb_produit.' Produit(s)</div><div class="commande_ticket_total_prix">Total : '.$total_produit.' €</div></div>';
			

			echo '</div>'; // FIN TICKET

			mysql_close();



			mysql_close();

			break;
		case 'cuisine':

			mysql_connect($server,$user,$pass);
			// Update BDD
			mysql_db_query($base,"UPDATE `commande_liste_index` SET `etat_commande` = '2' WHERE `id_commande` = '".$_GET['id_commande']."';");
			mysql_close();

			break;

		case 'valide':

			mysql_connect($server,$user,$pass);
			// Update BDD
			mysql_db_query($base,"UPDATE `commande_liste_index` SET `etat_commande` = '3' WHERE `id_commande` = '".$_GET['id_commande']."';");
			mysql_close();

			break;
	}
}

?>