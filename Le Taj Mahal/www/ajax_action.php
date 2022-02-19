<?
		include("config.inc.php");
		//include("class/panier.class.php");
		//include("include/function.inc.php");
		session_start();




function validate_email($email){

   $exp = "^[a-z\'0-9]+([._-][a-z\'0-9]+)*@([a-z0-9]+([._-][a-z0-9]+))+$";

   if(eregi($exp,$email)){

      if(checkdnsrr(array_pop(explode("@",$email)),"MX")){
        return true;
      }else{
        return false;
      }

   }else{

      return false;

   }    
}


switch($_GET['page'])
	 {
	 case 'contact':
		
		//$EMAIL_ADMIN_SITE="contactazn@gmail.com";

		//echo $EMAIL_ADMIN_SITE;

		if(validate_email($_POST['contact_mail']))
		 {
			$from_email=$_POST['contact_mail'];
			$from_name=$_POST['contact_name']=='' && $_POST['contact_name']=='' ? "No Name" : $_POST['contact_name']." ".$_POST['contact_prenom'];
		 }
		 else
		 {
			 $from_email = $EMAIL_ADMIN_SITE;
			 $from_name=$TITLE_SITE;
		 }


			$from_email = $EMAIL_ADMIN_SITE;
			$entetemail  = 'MIME-Version: 1.0' . "\r\n"; // Version MIME
			$entetemail .= 'Content-type: text/html; charset=ISO-8859-1'."\r\n"; // l'en-tete Content-type pour le format HTML

			$entetedate = date("r"); // avec offset horaire
			$entetemail .= "From: $TITLE_SITE <postmaster@letajmahal92.fr>\r\n"; // Adresse expéditeur
			//$entetemail .= "Cc: \r\n";
			//$entetemail .= "Bcc: \r\n"; // Copies cachées

			//if(validate_email($_POST['contact_mail'])) $entetemail .= "Reply-To: $from_email \r\n"; // Adresse de retour

			$entetemail .= "Reply-To: ".$_POST['contact_mail']." \r\n"; // Adresse de retour

			$entetemail .= "X-Mailer: PHP/" . phpversion() . "\r\n" ;
			$entetemail .= "Date: $entetedate\r\n"; 

			// Formatage du message
			$contact_info="<table border=\"0\">";
			$contact_info .="<tr><td colspan=\"2\">Information<br />*************<br /><br /></td></tr>";
			$contact_info .="<tr><td>Nom </td><td>: ".htmlentities($_POST['contact_name'])."</td></tr>";
			$contact_info .="<tr><td>Prénom </td><td>: ".htmlentities($_POST['contact_prenom'])."</td></tr>";
			$contact_info .="<tr><td>Adresse </td><td>: ".htmlentities($_POST['contact_adresse'])."</td></tr>";
			$contact_info .="<tr><td>Téléphone </td><td>: ".htmlentities($_POST['contact_tel'])."</td></tr>";
			$contact_info .="<tr><td>Email </td><td>: ".htmlentities($_POST['contact_mail'])."</td></tr>";
			$contact_info .="<tr><td colspan=\"2\">Message<br />*************<br /><br />".nl2br(htmlentities($_POST['contact_message']))."</td></tr>";
			$contact_info .="</table>";




			mail($EMAIL_ADMIN_SITE,'Un message venant de votre site internet '.$TITLE_SITE,$contact_info,$entetemail);


?>
<HTML>
<HEAD>
<script language="Javascript" type="text/javascript">
function view_result()
{
	parent.set_div('<br /><br /><br /><br /><CENTER>Votre message a &eacute;t&eacute; envoy&eacute;</CENTER><br /><br />','div_form_contact');
	//parent.view_com_image_page(<? echo $_GET['id_photo']; ?>,1,'photo_com_body');
}
</script>
</HEAD>
<body onload="javascript:view_result();return false;">
</BODY>
</HTML>
<?
		 break;



	 case 'newaccount':


		mysql_connect($server,$user,$pass);

		mysql_db_query($base,"INSERT INTO `base_client` (`id_zone`, `nom_client`, `prenom_client`, `adresse_client`, `tel_client`, `email_client`, `pass_client`) VALUES ('".$_GET['zone']."', '".$_GET['client_name']."', '".$_GET['client_prenom']."', '".$_GET['client_adresse']."', '".$_GET['client_tel']."', '".$_GET['client_mail']."', '".md5($_GET['client_pass'])."')");

		$_SESSION['id_client']=mysql_insert_id();

		mysql_close();



			$from_email = $EMAIL_ADMIN_SITE;
			$entetemail  = 'MIME-Version: 1.0' . "\r\n"; // Version MIME
			$entetemail .= 'Content-type: text/html; charset=ISO-8859-1'."\r\n"; // l'en-tete Content-type pour le format HTML

			$entetedate = date("r"); // avec offset horaire
			$entetemail .= "From: $TITLE_SITE <postmaster@letajmahal92.fr>\r\n"; // Adresse expéditeur
			//$entetemail .= "Cc: \r\n";
			//$entetemail .= "Bcc: \r\n"; // Copies cachées

			//if(validate_email($_POST['contact_mail'])) $entetemail .= "Reply-To: $from_email \r\n"; // Adresse de retour

			$entetemail .= "X-Mailer: PHP/" . phpversion() . "\r\n" ;
			$entetemail .= "Date: $entetedate\r\n"; 

			// Formatage du message
			$contact_info="<table border=\"0\">";
			$contact_info .="<tr><td colspan=\"2\">Nous vous rappelons vos informations communiquée et nous vous souhaitons une exelente dégustation dans notre restaurant<br />*************<br /><br /></td></tr>";
			$contact_info .="<tr><td>Nom </td><td>: ".htmlentities($_POST['contact_name'])."</td></tr>";
			$contact_info .="<tr><td>Prénom </td><td>: ".htmlentities($_POST['contact_prenom'])."</td></tr>";
			$contact_info .="<tr><td>Adresse </td><td>: ".htmlentities($_POST['contact_adresse'])."</td></tr>";
			$contact_info .="<tr><td>Téléphone </td><td>: ".htmlentities($_POST['contact_tel'])."</td></tr>";
			$contact_info .="<tr><td>Mot de pass </td><td>: ".htmlentities($_POST['client_pass'])."</td></tr>";
			$contact_info .="</table>";




			mail($_GET['client_mail'],'Cresation de votre compte sur '.$TITLE_SITE,$contact_info,$entetemail);


?>
<HTML>
<HEAD>
<script language="Javascript" type="text/javascript">
function view_result()
{
	parent.set_div('<br /><br /><br /><br /><CENTER>Votre compte a &eacute;t&eacute; cr&eacute;</CENTER><br /><br /><a href="index.php?page=commande" class="myButtonMenu">Commander en ligne</a>','form_contact_page');
	//parent.view_com_image_page(<? echo $_GET['id_photo']; ?>,1,'photo_com_body');
}
</script>
</HEAD>
<body onload="javascript:view_result();return false;">
</BODY>
</HTML>
<?
		 break;

	 }


?>