<div id="DIYbody">
  <div id="">
    <p>
      <h3> Un problème avec le service ou votre matériel ?</h3> Vous pouvez nous contacter directement:
      <ul>
        <li> par courrier à l'adresse: 75011, Paris </li>
        <li> au travers de notre service client 24/24h au: +331·00·00·00·00</li>
      </ul>
    </p>
  </div>

  <figure id="form_assist">
    <form method="post" action="<?php echo " index.php?controller=NousContacter&action=panneEnvoyer"?>" onclick="return checkMail();" id="panneForm">
      <label> <span class="txtq"> <strong> Par mail en remplissant le formulaire ci-dessous : </strong></span> </label>

      <fieldset>
        <legend>Votre demande</legend>
        <!-- Titre du fieldset -->

        <p>
          Précisez le type d'assistance que vous désirez :
          <div class="radio">
            <label>
              <input type="radio" name="categorie" id="infos" value="infos" checked>
              <div class="myradiofont">
                Informations sur nos services
              </div>
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="categorie" id="technique" value="technique">
              <div class="myradiofont">
                Assistance technique
              </div>
            </label>
          </div>
          <div class="radio disabled">
            <label>
              <input type="radio" name="categorie" id="depannage" value="depannage">
              <div class="myradiofont">
                Dépannage
              </div>
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="categorie" id="autre" value="autre">
              <div class="myradiofont">
                Autre...
              </div>
            </label>
          </div>
        </p>

        <p>
          <label for="ameliorer"> <span class="txtq"> Détaillez ici votre problème en quelques lignes </span></label><br />
          <textarea name="description" id="description" class="form-control" form="panneForm" placeholder="Je ne sais pas comment installer mes capteurs..." maxlength="255"></textarea>
        </p>
        <span class="error"><?php if (isset($_GET['Err'])) echo $_GET['Err'];?></span><br><br><br>
        <button type="submit" class="btn btn-primary" id="submitButton">Envoyer</button>
      </fieldset>


    </form>
  </figure>
</div>
