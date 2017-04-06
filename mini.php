<!DOCTYPE HTML>
<html>
<head>
	<meta charset='utf-8'>
	<title>Mini chat </title>
</head>
<body>
	<form action= 'mini.php' method= 'post'>
		<input type= 'text' name= 'pseudo'/>
		<input type= 'textbox' name= 'messages'/>
		<input type= 'submit' value= 'Envoyer'/>
	</form>
<?php
if(isset($_POST['pseudo']) && isset($_POST['messages'])){
	try{
		$bdd = new PDO('mysql:host=localhost;dbname=mini-chat;charset=utf8','root','');
	}catch (Exception $e){
		die('Erreur: '.$e->getMessage());
	}
	$req = $bdd->prepare('INSERT INTO chat(pseudo,messages) VALUES(:pseudo, :messages)');
	$req-> execute(array(
		'pseudo' => $_POST['pseudo'],
		'messages' => $_POST['messages'] 
	));
	//echo 'Le message est bien enregistré';
	?>
	<?php
	try{
		$bdd = new PDO('mysql:host=localhost;dbname=mini-chat;charset=utf8','root','');
	}catch (Exception $e){
		die('Erreur :'.$e->getMessage);
	}
	$reponse = $bdd->query('SELECT * FROM chat LIMIT 0,10');
	while($donnees = $reponse->fetch()){
	?>
	<p><?php echo '<b>'.$donnees['pseudo'].'</b>'.' '.':'.' '.$donnees['messages'];?></p>
	<?php
		}
	}
	?>


</body>
</html>