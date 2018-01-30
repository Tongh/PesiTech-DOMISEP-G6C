<?php
session_start();

// Connexion bdd
include 'connexionbdd.php';

$req_id_piece=$bdd->prepare('SELECT `label_piece`,`id_piece`,`Type de piece` AS type_piece,`Superficie` FROM piece WHERE `logement_utilisateur_id utilisateur`=?;');
$req_id_piece->execute(array($_SESSION["id_utilisateur"]));



$compteur=0;
while ($id_piece=$req_id_piece->fetch())
{$compteur++;
 $tab[$compteur] = $id_piece['id_piece'] ;
$label[$compteur] = $id_piece['label_piece'];
$type_piece[$compteur] = $id_piece['type_piece'];
$superficie[$compteur] = $id_piece['Superficie'];
}
$_SESSION["compteur"]=$compteur;



if ($_SESSION["compteur"]!=0)
{
?>
<html>
<title>
  EZ-Home
</title>
<head>
  <meta charset="utf-8"/>
  <!--dossier css-->
  <link href="css/interv2.css" rel="stylesheet">

  <script src="https://use.fontawesome.com/e3c7c95da8.js"></script>
  <script src="ajout_capteurs.js"></script>
</head>

<!-- Header (tableau + image) -->
<?php
    include 'header_client.php';
?>

<body>
  <p>
  <form method='' action='ajoutpiece.php'>
  <input type='submit' value='Retourner vers mon installation'/></form>
  </p>
<p>
<form method="POST" action="supprimerpiecebdd.php">
    <label for="ttpiece">Cocher ici pour supprimer toutes vos pièces: <br /> </label><br />



     <input type="submit" name="piece_supp" value="Supprimer toutes les pièces" onclick="return confirm('Etes-vous sûr ?');" />
</form>
</p>

<?php
}
else {
  echo "Vous n'avez pas de pièce déja enregistrés";
}
?>

<h3>Veuillez choisir la piece que vous voulez supprimer : <br /> </h3>
<?php echo "<table id='tab_pieces' style='position: absolute;
bottom: 35%;
width:100%'>";?>
<?php for ($i=1; $i <$compteur+1 ; $i++) {?>
    <th>
      <form method="POST" action="supprimerpiecebdd.php">


          <p>
          <?php  $_SESSION["pieceid"][$i]=$tab[$i];
           ?>
            <input type="checkbox" name="piece_<?php echo $tab[$i]?>" id="piece" value="ON" checked hidden /> <label for="piece"> Ma piece : </label><br />
              <?php if (!($label[$i]==NULL))
              {
                echo ucfirst($label[$i]).' de superficie: '.$superficie[$i].'m²';
              }
              else {
                echo ucfirst($type_piece[$i]).' de superficie: '.$superficie[$i].'m²';
              }?>
          </p>
          <p>
           <input type="submit" value="Supprimer la pièce"  />
         </p>
     </form>
   </th>
<?php

}
?>


</body>
</html>
