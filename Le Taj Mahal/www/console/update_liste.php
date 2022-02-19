<?
header( 'content-type: text/html; charset=utf-8' );


		// CHARGE CONF
		include("../config.inc.php");

 if(isset($_GET['last_id']) && is_numeric($_GET['last_id']))
 {

	mysql_connect($server,$user,$pass);

	$result=mysql_db_query($base,"SELECT * FROM `commande_liste_index` WHERE `id_commande` >= ".($_GET['last_id']+1)." AND `date_commande`='".date("Y-m-d")."' AND `etat_commande` !='3' ORDER BY `id_commande` ASC");
	//echo "SELECT * FROM `commande_liste_index` NATURAL JOIN `base_client` NATURAL JOIN `zone_livraison` WHERE `id_commande` > '".$_GET['last_id']."' ORDER BY `id_commande` ASC";
	echo '<script language="Javascript" type="text/javascript">'."\n";
	$max_id=$_GET['last_id'];
	$add = false;
	$registe="";
	while($ra=mysql_fetch_array($result)) 
	 {
		$result_b=mysql_db_query($base,"SELECT * FROM `base_client` NATURAL JOIN `zone_livraison` WHERE `id_client` = ".$ra['id_client']."");
		$rb=mysql_fetch_array($result_b);
		$cmd = "window.parent.ajouter_commande(".$ra['id_commande'].",'".$rb['titre_zone']."','".$rb['nom_client']."','".$rb['prenom_client']."','".$rb['tel_client']."');\n";
		echo $cmd;
		$registe.=$cmd;
		$max_id=max($ra['id_commande'],$max_id);
		$add = true;
	 }
	if($add)
	 {
		echo "window.parent.alert_ajout_commande();\n";
	 }

	echo "var nb = 30 ;\n";
	echo "timer = window.setTimeout('document.location.href=\"update_liste.php?last_id=".$max_id."\"', 1000*nb);\n";
	echo '</script>'."\n";
	mysql_close();
 }	
 echo htmlentities($registe);
?>
oki