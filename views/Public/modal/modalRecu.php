<?php

 ?>

<div class="modal fade" id="modalRecu" tabindex="-1" role="dialog" data-backdrop="false" data-dismiss="modal"  aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel"> Recevoir les données des capteurs </h4>
			</div>
			<div class="modal-body">
				<div class="mainFont">
          <form class="form-horizontal" method="post" action="<?php echo "index.php?controller=Status&action=saveDonnees"  ?>" onsubmit="return validerRecuDonnees()" id="donneesRecuForm">

            <div class="modal-body" action=GETLOG team=0000>  </div>

						<div class="modal-footer">
              <span class="error"><?php if (isset($_GET['Err'])) echo $_GET['Err'];?></span><br>
							<button type="button" class="btn btn-default" data-dismiss="modal"> Close </button>
              <button type="submit" class="btn btn-primary" id="submitButton"> Enregistrer les données reçu </button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
