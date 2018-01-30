<?php
/* Pour remettre l'id AI d'une table à 0 :
=> PhpMyAdmin
==> Sélectionne ta Base de donnée
===> Sélectionne ta Table
====> Supprime toutes les entrées déja faites
=====> Clique sur ['Opérations']
======> Modifie la valeur de ['AUTO_INCREMENT']  en ['1'].
=======> Clique sur ['Exécuter'] */

//On démarre la session
session_start();

$login = $_SESSION['login'];

// Connexion bdd
include 'connexionbdd.php';

//Recupération de l'id de l'utilisateur dans une variable $_SESSION
$req_id_utilisateur=$bdd->prepare('SELECT `id_utilisateur`FROM utilisateur WHERE login=?;');
$req_id_utilisateur->execute(array($login));
$id_utilisateur=$req_id_utilisateur->fetch();
$_SESSION["id_utilisateur"]=$id_utilisateur[0];
$req_id_utilisateur->closeCursor();

//Recupération du nom de l'utilisateur dans une variable $_SESSION
$req_nom_utilisateur=$bdd->prepare('SELECT `nom`FROM utilisateur WHERE login=?;');
$req_nom_utilisateur->execute(array($login));
$nom_utilisateur=$req_nom_utilisateur->fetch();
$_SESSION["nom"]=$nom_utilisateur[0];
$req_nom_utilisateur->closeCursor();



// On compte le nombre de pieces deja ajouté par l'utilisateur
$req_nb_pieces=$bdd->prepare('SELECT COUNT(*)  FROM piece WHERE `logement_utilisateur_id utilisateur`=? GROUP BY `logement_utilisateur_id utilisateur`;');
$req_nb_pieces->execute(array( $id_utilisateur[0]));
$nbpiece_utilisateur=$req_nb_pieces->fetch();
$req_nb_pieces->closeCursor();

// On recupére les infos sur les pieces deja enregistrés par l'utilisateur
$req_piece=$bdd->prepare('SELECT `label_piece`,`id_piece`,`Type de piece` AS type_piece FROM piece WHERE `logement_utilisateur_id utilisateur`=?;');
$req_piece->execute(array($id_utilisateur[0]));


// On recupére les capteurs de chaque pieces deja enregistrés par l'utilisateur
$req_pieces_ajoutes=$bdd->prepare('SELECT `nom`,`type_capteur`,`piece_ID piece` AS piece_ID FROM capteurs WHERE `piece_logement_utilisateur_id utilisateur`=?;');
$req_pieces_ajoutes->execute(array($id_utilisateur[0]));



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





<?php
if (isset($_GET["msgpiece"]))
{
echo '<h4>'.$_GET["msgpiece"].'</h4>';
}

// On affiche ici le form d'ajout de piece multiples si l'utilisateur n'a pas ajouter de piece et/ou s'il a appuyer sur "ajouter une nouvelle piece" du form dans la dèrniere case
if (($nbpiece_utilisateur==0) OR ((isset($_POST["ajoutpiece"]) AND ($_POST['ajoutpiece']=='Ajouter une pièce'))))
{ echo
  "<table class='pieces'>
   <caption> Mes pièces   </caption>
      <th>
        <form method='POST' action='gestion_pieces.php'>
          <label>  Veuillez ajouter des pieces en indiquant leurs nombres:  </label>   </br></br>
           <input type='number'  name='nbpiece' value='1' min='1' max='8'/>
          <input type='submit' value='Envoyer' />
        </form>
      </th>
  </table>";
}



else {
  $compteur1=0;

  // Sinon on affiche les pieces déja ajoutés

  echo "<table id='tab_pieces' style='position: absolute;
  top: 160px;
  width:100%'>";

  while ($piece=$req_piece->fetch())
  {

    $compteur1++;
    $_SESSION["compteur1"]=$compteur1;
  ?>

    <th>
      <form method="POST" action="supprimerpiece.php"><input type="submit" value="X" id="bouton_suppression" /> </form>
      <p> Ma pièce : <?php echo ucfirst($piece['label_piece']);?>  </p>

      <p><i> <?php echo ucfirst($piece['type_piece']);?> </i> </br><p/>

      <p>
            <div class="sectionIcone">
            Température : <i class="fa fa-thermometer-three-quarters fa-2x fa-fw" aria-hidden="true"></i>
            </div>
            <form><input type="number" value="21" min="5" max="32"/>°C</form>
        </div>
        </p>

      <p>

        <div class="icone">
          <div class="sectionIcone">
            Eclairage : <i class="fa fa-lightbulb-o fa-2x fa-fw" aria-hidden="true"></i>
          </div>
          <?php include "bouton.php" ?>
      </p>


      <!--<p>
          <div class="sectionIcone">
            Volets : <i class="fa fa-columns fa-2x fa-fw" aria-hidden="true"></i>
          </div>
          <?php // include "bouton.php" ?>
      </p> -->



<?php
        for ($i=0; $i <$compteur1 ; $i++) {

        while ($test=$req_pieces_ajoutes->fetch())
        {
        if (($test['piece_ID']== $piece['id_piece']))
        {
          echo ucfirst($test['type_capteur']).' :';
          include "bouton.php";
        }}}


?>

      <p> Ajouter un nouveau capteur: </p> </br>


      <div id="a_masquer_<?php echo $compteur1 ?>" style="display:none">



          <form action="ajout_capteurs.php" method="POST" >

          <label for="piece">Veuillez sélectionner </br>
          le type de capteur à ajouter : <br /> </label><br />
          <input type="text" name="id_piece" value="<?php echo $piece['id_piece'] ?>" hidden />
          <p>
                <select name="type_capteur" id="capteur">
                    <option value="presence">Capteur de Présence</option>
                    <option value="fumee">Capteur de Fumée</option>
                    <option value="ouverture">Capteur d'Ouverture </option>
                    <option value="camera">Caméra</option>
                    <option value="luminosite">Capteur de Luminosité</option>
                    <option value="humidite">Capteur d'Humidité</option>
                    <option value="temperature">Capteur de Température </option>
                    <option value="autre">Autre</option>
                </select>
            </p>
              <input type="submit" value="Enregistrer le capteur"/>
          </form>


          </div>
      <input type="button" value="+" onclick="masquer_div('a_masquer_<?php echo $compteur1 ?>');" />


      </th>
      <?php  } ?>


      <th>
         <form method="POST" action="ajoutpiece.php">
           <input type="submit" name="ajoutpiece" id="capteur" value="Ajouter une pièce">
         </form>
       </br>
       <form method="POST" action="supprimerpiece.php">
             <input type="submit" value="Supprimer une pièce"/>
       </form>
       </th>

<?php  }

?>
</table>






  </body>



</html>
