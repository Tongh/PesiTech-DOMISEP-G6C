<div id='DIYbody'>
  <div class='content'>
    <div id="imgcnx">
      <figure>
        <img src="Image/bureau.png" alt="Bureau">
      </figure>

      <div class="cnxn">
        <h1> Accéder à mon espace personnel </h1><br/>

        <form method="post" action="<?php echo "index.php?controller=Connexion&action=attend"  ?>">
          <p>
            <label for="pseudo">Mon identifiant:</label></br></br>
            <input type="text" name="login" id="pseudo"  autofocus/>
          </p>

          <p>
            <label for="mdp">Mon mot de passe:</label></br></br>
            <input type="password" name="mdp" id="mdp"  required /><br><br>
            <span class="error"> <?php if (isset($_GET['Err'])) echo $_GET['Err'] ?></span>
          </p>

          <p>
            <button type="submit" class="btn btn-primary">Connexion</button>
          </p>

        </form>

        <p>
          <a id="co" href="recuperation_mdp.php">Mot de passe oublié ? </br> Identifiant perdu ? </a><br/>
          <a id="co" data-toggle="modal" data-target="#modalInscription">Première connexion!</a>
        </p>
      </div>
    </div>
  </div>
  <?php include("inscription.php") ?>
</div>
