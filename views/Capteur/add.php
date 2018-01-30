<div id='DIYbody'>

  <section>
		<fieldset>
			<legend> <strong>  <?php echo $title ?>  </strong> </legend>
      <div class="mainFont">
        <form class="form-horizontal"  method="post" action="<?php echo "index.php?controller=Capteur&action=addForm"  ?>" onsubmit="return validerCapteur()" id="addCapteurForm">
          <div class="form-group form-group-sm">
            <div class="formText"><label class="control-label col-sm-3" for="inputSuccess3">Superficie</label></div>
            <div class="col-sm-9">
              <input type="text" class="form-control" placeholder="17" name="superficie">
            </div>
          </div>
          <div class="form-group form-group-sm">
            <label class="control-label col-sm-3" for="inputGroupSuccess2">Nom</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Ma Chambre" name="nom">
            </div>
          </div>
          <div class="form-group form-group-sm  ">
            <label class="control-label col-sm-3" for="inputGroupSuccess2">Type</label>
            <div class="col-sm-9">
              <select name="type" class="form-control" form="addPieceForm">
                <option value="Capteur de Présence">Capteur de Présence</option>
                <option value="Capteur de Fumée">Capteur de Fumée</option>
                <option value="Capteur d'Ouverture">Capteur d'Ouverture</option>
                <option value="Caméra">Caméra</option>
                <option value="Capteur de Luminosité">Capteur de Luminosité</option>
                <option value="Capteur d'Humidité">Capteur d'Humidité</option>
                <option value="Capteur de Température">Capteur de Température</option>
                <option value="Autre type de capteur">Autre type de capteur</option>
              </select>
            </div>
          </div>
          <button type="submit" class="btn btn-primary" id="submitButton">Ajouter cette pièce sur mon compte !</button>
        </form>


        <form method="post" action="<?php echo "index.php?controller=Capteur&action=addForm"  ?>" onsubmit="return validerCapteur()">
          <div class="formLabel"><div class="formText">Type de Capteur : <input type="text" placeholder="Type de Capteur" name="type_capteur"></div></div><br><br>
          <div class="formLabel"><div class="formText"> Nom de Capteur : <input type="text" placeholder="Capteur Salon" name="nom"></div></div><br><br>
          <!--<div class="formLabel"><div class="formText">Dans Immeuble : <input type="text" placeholder="XXXXXXXX" name="dans_immeuble"></div></div><br><br><br>-->
          <span class="error"><?php if (isset($_GET['Err'])) echo $_GET['Err'];?></span><br><br><br>
  				<button type="submit" class="btn btn-primary" id="submitButton">Ajouter ce capteur sur mon compte !</button>
        </form>
      </div>
    </fieldset>
  </section>
</div>
