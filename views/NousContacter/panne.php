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
    <form method="post" action="assistance.php">
      <label> <span class="txtq"> <strong> Par mail en remplissant le formulaire ci-dessous : </strong></span> </label>


      <fieldset>
        <legend>Vos coordonnées</legend>
        <!-- Titre du fieldset -->

        <label for="nom"><span class="txtq">Quel est votre nom ?</span></label>
        <input type="text" name="nom" id="nom" />
        <br/>

        <label for="prenom"> <span class="txtq">Quel est votre prénom ? </span></label>
        <input type="text" name="prenom" id="prenom" />
        <br/>
        <label for="email"><span class="txtq">Quel est votre email ?</span></label>
        <input type="text" name="email" id="email" />


      </fieldset>

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
        <input type="submit" value="Envoyer">
      </fieldset>


    </form>
  </figure>
</div>
