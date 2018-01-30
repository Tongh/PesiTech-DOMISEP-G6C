<div id="DIYbody">
  <div id="info_contact">
    <p>
      <h3> Un problème avec le service ou votre matériel ?</h3> Vous pouvez nous contacter directement:
      <ul>
        <li> par courrier à l'adresse: 75011, Paris </li>
        <li> au travers de notre service client 24/24h au: +331·00·00·00·00</li>
      </ul>
    </p>
  </div>

  <figure id="form_assist">
    <form method="post" action="<?php echo "index.php?controller=NousContacter&action=panneEnvoyer"?>" onclick="return checkMail();">
      <label> <span class="txtq"> <strong> Par mail en remplissant le formulaire ci-dessous : </strong></span> </label>

      <fieldset>
        <legend>Votre demande</legend>
        <!-- Titre du fieldset -->

        <p>
          Précisez le type d'assistance que vous désirez :
          <br/>
          <input type="radio" name="categorie" value="infos" id="infos" />
          <label for="infos"> <span class="txtq"> Informations sur nos services  </span> </label>
          <br/>
          <input type="radio" name="categorie" value="technique" id="technique" /> <label for="technique">  <span class="txtq"> Assistance technique </span></label>
          <br/>
          <input type="radio" name="categorie" value="depannage" id="depannage" /> <label for="depannage">  <span class="txtq">Dépannage </span></label>
          <br/>
          <input type="radio" name="categorie" value="autre" id="autre" /> <label for="autre"> <span class="txtq">Autre... </span></label>
        </p>

        <p>
          <label for="ameliorer"> <span class="txtq"> Détaillez ici votre problème en quelques lignes </span></label><br />
          <textarea name="ameliorer2" id="ameliorer"></textarea>
        </p>
        <span class="error"><?php if (isset($_GET['Err'])) echo $_GET['Err'];?></span><br><br><br>
        <button type="submit" class="btn btn-primary" id="submitButton">Envoyer</button>
      </fieldset>


    </form>
  </figure>
</div>
