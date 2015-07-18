<?php 
//destinataire de l'email
$destinataire = 'arrighi.steven@gmail.com';

//message de confirmation ou d'erreur d'envoi du message

$messagesend="Votre message à bien était envoyé";
$messagedontsend="L'envoi de votre message à échoué, Veuillez réessayer SVP.";

//message d'erreur du formulaire
$formdontsend="Veuillez soumettre le formulaire dans un premier temps.";
$emptyinput="Verifiez que tout les champs soit rempli.";

//on teste si le form à été soumis

if(!isset($_POST['submit'])){
	echo '<p>'.$formdontsend.'</p>';
}
else{
//formulaire envoyé on récupére toutes les variables
	$nom = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$enterprise = $_POST['enterprise'];
	$subject =$_POST['subject'];
	$message =$_POST['message'];
	if(($nom !='') && ($email != '') && ($subject != '') && ($message != '')){
	
		//on genere puis envoie l'email

		$headers ='MIME-Version: 1.0' ."\r\n";
		$headers .='From'.$nom.'<'.$email.'>'."\r\n".
						'Reply-To:'.$email. "\r\n".
						'Content-Type: text/plain; charset="utf-8"; Delsp="Yes"; format=flowed'."\r\n".
						'Content-Disposition: inline'."\r\n".
						'Content-Transfer-Encoding: 7bit'."\r\n".
						'X-Mailer:PHP/'.phpversion();
		$cible = $destinataire;

		//remplacement de certains caractères spéciaux
		$message = str_replace("&#039;","'",$message);
		$message = str_replace("&#8217;","'",$message);
		$message = str_replace("&quot;",'"',$message);
		$message = str_replace('<br>','',$message);
		$message = str_replace('<br />','',$message);
		$message = str_replace("&lt;","<",$message);
		$message = str_replace("&gt;",">",$message);
		$message = str_replace("&amp;","&",$message);

		//Envoi du mail
		if(mail($cible, $subject, $message, $headers)){
			echo'<p>'.$messagesend.'</p>'."\n";
		}
		else{
			echo'<p>'.$messagedontsend.'</p>'."\n";
		};
	}
	else{
		echo'<p>'.$emptyinput.'<a href="contact-us.php">Retourner au formulaire</a></p>'."\n";
	};
};

 ?>