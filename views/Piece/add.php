<div id='DIYbody'>

  <section>
		<fieldset>
			<legend> <strong>  <?php echo $title ?>  </strong> </legend>
      <div class="mainFont">
        <form class="form-horizontal" method="post" action="<?php echo "index.php?controller=Piece&action=addForm"?>" onsubmit="return validerPiece()" id="addPieceForm">
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
                <option value="Salon">Salon</option>
                <option value="Cuisine">Cuisine</option>
                <option value="Chambre">Chambre</option>
                <option value="Salle">Salle</option>
                <option value="Autre">Autre</option>
              </select>
            </div>
          </div>
          <button type="submit" class="btn btn-primary" id="submitButton">Ajouter cette pièce sur mon compte !</button>
        </form>
      </div>
    </fieldset>
  </section>
</div>
