<?php
try
{
    // On se connecte à MySQL
      $bdd= new PDO('mysql:host=localhost;dbname=mydb;charset=utf8','root','');

    // On récupère tout le contenu de la table jeux_video
    $reponse = $bdd->query('SELECT id_utilisateur FROM utilisateur');

    // On affiche chaque entrée une à une
 ?>
 <select name="id_utilisateur">
 <?php
 	while ($donnees = $reponse->fetch())
 	{
 	?>
   <p>
   <option value="choix"><?php echo $donnees['id_utilisateur']; ?></option>
         </p>
 	<?php
 	}
 ?>
    </select>
 <?php
    $reponse->closeCursor(); // Termine le traitement de la requête

}
catch(Exception $e)
{
    // En cas d'erreur précédemment, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());
}
?>
