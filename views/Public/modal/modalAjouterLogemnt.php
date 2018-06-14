<div class="modal fade" id="modalAjouterLogemnt" tabindex="-1" role="dialog" data-backdrop="false" data-dismiss="modal"  aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Ajouter un logement : </h4>
			</div>
			<div class="modal-body">
				<div class="mainFont">
          <form class="form-horizontal" method="post" action="<?php echo "index.php?controller=Logement&action=addForm"?>" onsubmit="return validerLogement()" id="logementAjoutForm">
						<div class="form-group form-group-sm">
              <div class="formLabel"><div class="formText"> </div></div><br><br>
							<div class="formText"><label class="control-label col-sm-3" for="inputSuccess3">Adresse</label></div>
							<div class="col-sm-9">
                <input type="text" class="form-control" placeholder="2 rue du Blomet" name="address">
							</div>
						</div>
						<div class="modal-footer">
              <span class="error"><?php if (isset($_GET['Err'])) echo $_GET['Err'];?></span><br>
							<button type="button" class="btn btn-default" data-dismiss="modal"> Close </button>
              <button type="submit" class="btn btn-primary" id="submitButton">Ajouter ce logement sur mon compte !</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
