<div class="modal fade" id="modalMdp" tabindex="-1" role="dialog" data-backdrop="false" data-dismiss="modal"  aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Mot de passe modification : </h4>
			</div>
			<div class="modal-body">
				<div class="mainFont">
					<form class="form-horizontal"  method="post" action="<?php echo "index.php?controller=EspaceClient&action=changerMdp"  ?>" onsubmit="return validerMdp()" id="modifierMdpForm">
						<div class="form-group form-group-sm">
							<div class="formText"><label class="control-label col-sm-3" for="inputSuccess3">Ancien mot de passe</label></div>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="oldmdp">
							</div>
						</div>
						<div class="form-group form-group-sm">
							<div class="formText"><label class="control-label col-sm-3" for="inputSuccess3">Nouveau mot de passe</label></div>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="newmdp">
							</div>
						</div>
						<div class="form-group form-group-sm">
							<div class="formText"><label class="control-label col-sm-3" for="inputSuccess3">Confimation nouveau mot de passe</label></div>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="newmdpC">
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal"> Close </button>
							<button type="submit" class="btn btn-primary"> Modifier </button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
