<?php
// Connexion base de données
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=mydb', 'root', '');
}
catch (Exception $e) // Si erreur
{
        die('Erreur : ' . $e->getMessage());
}


//Sécurisation des données saisies
$login = htmlspecialchars($_POST['login']);
$password = htmlspecialchars($_POST['password']);

//On vérifie que le login existe dans la table
$verif_login = $bdd->query('SELECT COUNT(*) FROM utilisateur WHERE login = '.$login.' ');
if($verif_login->fetchColumn() == 0)
{ //Login inexistant
    //Exception, erreur ou ce que tu désires
}
else { //Login existant

    //Séléction du password pour le login saisi
    $reponse_login = $bdd->query('SELECT password FROM utilisateur WHERE login = '.$login.' LIMIT 1');
    $donnees = $reponse_login->fetch();

    //Vérif du password
    //Si le mot de passe est hashé dans la bdd, il faut appliquer ce hashage à $password dans la vérification ci-dessous
    if ($password == $donnees['password'])
    {
        // Si aucune erreur
        echo "Ouais!!!!!! J'ai plus d'érreur!!!! ( C'EST BEAU LES REVES !)" ;
    }
    $reponse_login->closeCursor(); // Termine le traitement de la requête
}

?>
