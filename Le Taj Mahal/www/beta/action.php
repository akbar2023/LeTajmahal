<?
		include("config.inc.php");

		session_start();

		// Si le panier n'existe pas on le cree
		//unset($_SESSION['panier']);

switch($_GET['page'])
	 {
	 case 'newaccount':

		mysql_connect($server,$user,$pass);


			$result=mysql_db_query($base,"SELECT `id_client`,`id_zone`,`pass_client` FROM `base_client` WHERE `email_client`='".$_POST['client_mail']."'");
			if(mysql_num_rows($result)==1 || $_POST['client_mail']=='')
			{
				// COMPTE DEJA EXISTANT
				$ra=mysql_fetch_array($result);
				
				echo '<center><h1>COMPTE DEJA EXISTANT</h1><br /><br /><br /><a href="action.php?page=rappel_mdp&id_compte='.$ra['id_client'].'">RAPPEL DE MOT DE PASS</a></center>';
				mysql_close();

			}
			else
			 {
				// COMPTE INEXISTANT

				mysql_db_query($base,"INSERT INTO `base_client` (`id_zone`, `nom_client`, `prenom_client`, `adresse_client`, `tel_client`, `email_client`, `pass_client`) VALUES ('".$_POST['zone']."', '".$_POST['client_name']."', '".$_POST['client_prenom']."', '".$_POST['client_adresse']."', '".$_POST['client_tel']."', '".$_POST['client_mail']."', '".md5($_POST['client_pass'])."')");

				$_SESSION['id_client']=mysql_insert_id();

				$_SESSION['id_zone']=$_POST['zone'];

				mysql_close();



					$from_email = $EMAIL_ADMIN_SITE;
					$entetemail  = 'MIME-Version: 1.0' . "\r\n"; // Version MIME
					$entetemail .= 'Content-type: text/html; charset=ISO-8859-1'."\r\n"; // l'en-tete Content-type pour le format HTML

					$entetedate = date("r"); // avec offset horaire
					$entetemail .= "From: $TITLE_SITE <postmaster@letajmahal92.fr>\r\n"; // Adresse expediteur
					//$entetemail .= "Cc: \r\n";
					//$entetemail .= "Bcc: \r\n"; // Copies cachées

					//if(validate_email($_POST['contact_mail'])) $entetemail .= "Reply-To: $from_email \r\n"; // Adresse de retour

					$entetemail .= "X-Mailer: PHP/" . phpversion() . "\r\n" ;
					$entetemail .= "Date: $entetedate\r\n"; 

					// Formatage du message
					$contact_info="<table border=\"0\">";
					$contact_info .="<tr><td colspan=\"2\">Bonjour,<br />Nous vous rappelons les informations communiquée et nous vous souhaitons une exelente dégustation dans notre restaurant<br /><br /><br /></td></tr>";
					$contact_info .="<tr><td>Nom </td><td>: ".htmlentities($_POST['client_name'])."</td></tr>";
					$contact_info .="<tr><td>Prénom </td><td>: ".htmlentities($_POST['client_prenom'])."</td></tr>";
					$contact_info .="<tr><td>Adresse </td><td>: ".htmlentities($_POST['client_adresse'])."</td></tr>";
					$contact_info .="<tr><td>Téléphone </td><td>: ".htmlentities($_POST['client_tel'])."</td></tr>";
					$contact_info .="<tr><td>Mot de pass </td><td>: ".htmlentities($_POST['client_pass'])."</td></tr>";
					$contact_info .="</table>";




					mail($_POST['client_mail'],'Creation de votre compte sur '.$TITLE_SITE,$contact_info,$entetemail);


					header('Location: index.php?page=commande');

			 }



			break;


	 case 'connect':
			
			mysql_connect($server,$user,$pass);

			$result=mysql_db_query($base,"SELECT `id_client`,`id_zone`,`pass_client` FROM `base_client` WHERE `email_client`='".$_POST['client_mail']."'");
			if(mysql_num_rows($result)==1)
			{
				$ra=mysql_fetch_array($result);
				//echo md5($_POST['pass_client']).' vs '.$ra['pass_client'];
				if( $ra['pass_client'] == md5($_POST['pass_client']) )
				{
					$_SESSION['id_client']=$ra['id_client'];
					$_SESSION['id_zone']=$ra['id_zone'];


					header('Location: index.php?page=commande');
				}
				else header('Location: index.php?page=commande&action=connect');
			}
			else
			 {
				header('Location: index.php?page=commande&action=connect');
			 }


			mysql_close();
			break;
	 case 'change_mdp':

		 mysql_connect($server,$user,$pass);
		 $result=mysql_db_query($base,"SELECT * FROM `base_client` WHERE `id_client`='".$_GET['id']."'");
		 $ra=mysql_fetch_array($result);
		 mysql_close();

		 if($ra['pass_client']==$_GET['k'])
		 {

			 if(isset($_POST['new_pass']))
			 {
				 mysql_db_query($base,"UPDATE `base_client` SET `pass_client` = '".md5($_POST['new_pass'])."' WHERE `id_client` = '".$_GET['id']."';");

				echo '<center><h1>Mot de passe modifie</h1><br />'.$_POST['new_pass'].'<br /><br /><a href="index.php?page=commande&action=connect">Vous connecter</a></center>';
			 }
			 else
			 {
	?>
	<center>
	<h1>Changement du mot de pass</h1>
	<h2>Merci de saisir votre nouveau mot de passe</h2>
	<form method="post" action="">

		Email<br /><br /><? echo $ra['email_client']; ?><br /><br /><br />Nouveau mot de pass<br /><br /><br />
		<input type="text" name="new_pass" style="border:1px solid black;width:300px;"/><br /><br /><br />
		
		<input type="submit" value="Confirmer la modification de votre mot de pass">
	</form>
	</center>
	<?
			 }
		 }
		 else
		 {
			 echo '<center><h1>Acces non autorise ou demande expire.</h1></center>';
		 }

		 break;
	 case 'rappel_mdp':

			 if(isset($_GET['id_compte']))
			 {
				 //echo 'Mail='.$_POST['client_mail'];
				 if(isset($_POST['client_mail']))
				 {


					 mysql_connect($server,$user,$pass);
					 $result=mysql_db_query($base,"SELECT * FROM `base_client` WHERE `id_client`='".$_GET['id_compte']."'");
					 $ra=mysql_fetch_array($result);
					 mysql_close();

					$from_email = $EMAIL_ADMIN_SITE;
					$entetemail  = 'MIME-Version: 1.0' . "\r\n"; // Version MIME
					$entetemail .= 'Content-type: text/html; charset=ISO-8859-1'."\r\n"; // l'en-tete Content-type pour le format HTML

					$entetedate = date("r"); // avec offset horaire
					$entetemail .= "From: $TITLE_SITE <postmaster@letajmahal92.fr>\r\n"; // Adresse expéditeur


					$entetemail .= "X-Mailer: PHP/" . phpversion() . "\r\n" ;
					$entetemail .= "Date: $entetedate\r\n"; 

					// Formatage du message
					$contact_info='Bonjour,<br />Nous venons de recevoir un demande une modification de votre mot de pass.<br /><br />Afin de suivre votre demande, ';
					$contact_info .='<a href="http://letajmahal92.fr/beta/action.php?page=change_mdp&id='.$ra['id_client'].'&k='.$ra['pass_client'].'">Cliquer ici pour continuer la modification</a>';



					mail($ra['email_client'],'Modification de votre mot de pass sur '.$TITLE_SITE,$contact_info,$entetemail);


					 echo '<center><h1>Changement du mot de pass</h1><h2>Demande envoyee, merci de consulter vos emails.</h2></center>';
				 }
				 else
				 {

					 mysql_connect($server,$user,$pass);
					 $result=mysql_db_query($base,"SELECT * FROM `base_client` WHERE `id_client`='".$_GET['id_compte']."'");
					 $ra=mysql_fetch_array($result);
					 mysql_close();
?>
<center>
<h1>Changement du mot de pass</h1>
<h2>Merci de confirmer la demande de changement de mot de passe que vous receverez par email.</h2>
<form method="post" action="">
	<input type="hidden" name="client_mail" value="<? echo $ra['email_client']; ?>" />
	<? echo $ra['email_client']; ?><br /><br /><br />
	<input type="submit" value="Confirmer la demande de modification de votre mot de pass">
</form>
</center>
<?
				 }
			 }
			 else
			 {

				 if(isset($_POST['client_mail']))
				 {
					 mysql_connect($server,$user,$pass);
					 $result=mysql_db_query($base,"SELECT `id_client` FROM `base_client` WHERE `email_client`='".$_POST['client_mail']."'");
					if(mysql_num_rows($result)==1)
					{
						$ra=mysql_fetch_array($result);
						mysql_close();
						header('Location: action.php?page=rappel_mdp&action=rappel_mdp&id_compte='.$ra['id_client']);
					}
					else
					{
						echo '<h3>Compte inexistant, merci de bien saisir votre adresse mail ...</h3>';
?>
<center>
<h1>Changement du mot de pass</h1>
<h2>Veuillez saisir votre adresse mail pour que nous vous envoyons la demande de changement de mot de pass par email</h2>
<form method="post" action="">
	<input type="text" name="client_mail" style="border:1px solid black;width:300px;"><br /><br /><br />
	<input type="submit" value="Demander un nouveau mot de pass">
</form>
</center>
<?
						mysql_close();
					}
					 mysql_close();
				 }
				 else
				 {

?>
<center>
<h1>Changement du mot de pass</h1>
<h2>Veuillez saisir votre adresse mail pour que nous vous envoyons la demande de changement de mot de pass par email</h2>
<form method="post" action="">
	<input type="text" name="client_mail" style="border:1px solid black;width:300px;"><br /><br /><br />
	<input type="submit" value="Demander un nouveau mot de pass">
</form>
</center>
<?
				 }
			 }

		break;

	 }
?>