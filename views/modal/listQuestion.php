	<?php

	// faire une connexion à la BDD
	try
	{
		// On se connecte à MySQL
		$bdd = new PDO('mysql:host=localhost;dbname=luceofaq;charset=utf8', 'root', 'root');
	}
	catch(Exception $e)
	{
		// En cas d'erreur, on affiche un message et on arrête tout
	    die('Erreur : '.$e->getMessage());
	}

	// Si tout va bien, on peut continuer

	// On récupère tout le contenu de la table jeux_video
	$reponse = $bdd->query('SELECT * FROM questions');

	// On affiche chaque entrée une à une
	while ($donnees = $reponse->fetch())
	{
		
	?>
	    
		<div class="column small-12 luceofaq-question">
		 	<h3> <?php echo $donnees["question_en"]; ?> <span class="anchor"><a href="#">#</a></span><a href="#" class="button tiny right">Edit</a></h3>
		 	<p><?php echo $donnees["answer_en"]; ?> </p>
	    </div>
	<?php
}



