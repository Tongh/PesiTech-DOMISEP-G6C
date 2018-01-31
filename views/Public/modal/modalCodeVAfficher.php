<div class="modal fade" id="modalCodeVAfficher" tabindex="-1" role="dialog" data-backdrop="false" data-dismiss="modal"  aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">
          <div class="btn-group form-group-sm" data-toggle="buttons">
            <label class="btn btn-primary btn-ms active">
              <input type="radio" id ="typeClient" name="typeU" value="client"  onchange="showCode(this.value)"> Codes des clients
            </label>
            <label class="btn btn-primary btn-ms">
              <input type="radio" id ="typeAdmin" name="typeU" value="admin"  onchange="showCode(this.value)"> Codes des administrateur
            </label>
          </div>
        </h4>
			</div>
			<div class="modal-body">
        <div class="">
      		<p class="">
      			<?php if (isset($Err)) echo $Err; echo "<br/>"?>
      		</p>
      	</div>
        <div class="table" id="tableCode"></div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal"> Close </button>
          <button type="submit" class="btn btn-primary"> Modifier </button>
        </div>
			</div>
		</div>
	</div>
</div>
