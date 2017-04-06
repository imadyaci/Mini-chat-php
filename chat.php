<?php
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