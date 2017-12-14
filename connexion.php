<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8" />
  <link href="css/inter.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/headerBodyFooterFixed.css"/>
  <title> EZ-home - Connexion</title>
</head>

<body>

  <header class="DIYheader">
    <a href="site-accueil.html"><img src="Image/logo_ez-home-moitie.png" alt="Logo" id="logo"></a>
    <a href="connexion.html" class='connecterboutton'> <img src="Image/profil.png" alt="Se Connecter" id="imgcn"/></a>

    <nav id="barre">
      <ul>
        <div>
          <li class="qsn">
            <a href="site-accueil.html#qui_sommes_nous"> Qui sommes-nous? </a>
          </li>

          <li class="ns">
            <a href="site-accueil.html#nos_services"> Nos services </a>
          </li>

          <li class="ach">
            <a href="site-accueil.html#acheter"> Acheter </a>
          </li>
        </div>
      </ul>
    </nav>
  </header>
  <div id='DIYbody'>
    <div class='content'>
      <div id="imgcnx">
        <figure>
          <img src="Image/bureau.png" alt="Bureau">
        </figure>



        <div class="cnxn">
          <h1> Accéder à mon espace personnel </h1><br/>

          <form method="post" action="connexion.php">

          <p>
       			  <label for="pseudo">Mon identifiant:</label>
              </br>
              </br>
              <input type="text" name="pseudo" id="pseudo"  autofocus/>
       			</p>

       			<p>
       			  <label for="mdp">Mon mot de passe:</label>
              </br>
              </br>
              <input type="password" name="mdp" id="mdp"  required />
            </p>

            <p>
              <input type="submit" value="Connexion" />
            </p>

  </form>

  <p>
    <a id="co" href="">Mot de passe oublié ? </a>
    <br/>
    <a id="co" href="">J'ai perdu mon identifiant</a>
    <br/>
    <a id="co" href="CreerNewCompte.php">Première connexion!</a>
  </p>

</div>

</div>
</div>
</div>
<footer class="DIYfooter">
  <nav>
    <div id="barre">
      <ul>
        <li class='adminfooter'>
          <a href="connexion.html"> Interface administrateur </a>
        </li>
        <li class='nouscontacterfooter'>
          <a href="nous_contacter.html"> Nous contacter </a>
        </li>
        <li class='DOMISEPfooter'>
          <a href="quoi.html"> DOMISEP </a>
        </li>
      </ul>
    </div>
    <div>
      <p>
        Developed by PESITech ©
      </p>
      <div>
      </nav>

    </footer>



  </body>
  </html>
