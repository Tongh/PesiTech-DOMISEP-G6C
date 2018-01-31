<div id='DIYbody'>

  <section>
		<fieldset>
			<legend> <strong>  <?php echo $title ?>  </strong> </legend>
      <div class="mainFont">
        <form class="form-horizontal"  method="post" action="<?php echo "index.php?controller=Capteur&action=addForm"  ?>" onsubmit="return validerCapteur()" id="addCapteurForm">
          <div class="form-group form-group-sm">
            <div class="formText"><label class="control-label col-sm-3" for="inputSuccess3">Nom du capteur</label></div>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="nom">
            </div>
          </div>
          <div class="form-group form-group-sm  ">
            <label class="control-label col-sm-3" for="inputGroupSuccess2">Type</label>
            <div class="col-sm-9">
              <select class="form-control" form="addCapteurForm" name="type_capteur">
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
          <button type="submit" class="btn btn-primary" id="submitButton">Ajouter ce capteur dans ma pièce !</button>
        </form>
      </div>
    </fieldset>
  </section>
</div>
