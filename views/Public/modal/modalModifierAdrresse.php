<div class="modal fade" id="modalModifierAdrresse" tabindex="-1" role="dialog" data-backdrop="false" data-dismiss="modal"  aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Supprimer un logement : </h4>
			</div>
			<div class="modal-body">
				<div class="mainFont">
          <form class="form-horizontal" method="post" action="<?php echo "index.php?controller=Logement&action=addressForm"  ?>" onsubmit="return validerLogementAddress()" id="logementAddressForm">
            <div class="form-group form-group-sm">
							<div class="formText"><label class="control-label col-sm-3" for="inputSuccess3">ID de ce logement</label></div>
							<div class="col-sm-9">
                <input type="text" class="form-control" placeholder="4" name="id_logement">
							</div>
						</div>
            <div class="form-group form-group-sm">
							<div class="formText"><label class="control-label col-sm-3" for="inputSuccess3">Nouvel arddresse</label></div>
							<div class="col-sm-9">
                <input type="text" class="form-control" placeholder="4" name="address">
							</div>
						</div>
						<div class="modal-footer">
              <span class="error"><?php if (isset($_GET['Err'])) echo $_GET['Err'];?></span><br>
							<button type="button" class="btn btn-default" data-dismiss="modal"> Close </button>
              <button type="submit" class="btn btn-primary" id="submitButton">Enregistrer le changement !</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
