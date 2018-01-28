<div id='DIYbody'>

  <section>
		<fieldset>
			<legend> <strong>  <?php echo $title ?>  </strong> </legend>
      <div class="mainFont">
        <form method="post" action="<?php echo "index.php?controller=Piece&action=addForm"  ?>" onsubmit="return validerPiece()">
          <div class="formLabel"><div class="formText">Superficie : <input type="text" placeholder="17" name="superficie"></div></div><br><br>
          <div class="formLabel"><div class="formText">Nom : <input type="text" placeholder="QUOI" name="nom"></div></div><br><br>
          <div class="formLabel"><div class="formText">Type : <input type="text" placeholder="Salon" name="type"></div></div><br><br>
          <div class="formLabel"><div class="formText">Label Pièce : <input type="text" placeholder="" name="label_piece"></div></div><br><br>
          <!--<div class="formLabel"><div class="formText">Dans Immeuble : <input type="text" placeholder="XXXXXXXX" name="dans_immeuble"></div></div><br><br><br>-->
          <span class="error"><?php if (isset($_GET['Err'])) echo $_GET['Err'];?></span><br><br><br>
  				<button type="submit" class="btn btn-primary" id="submitButton">Ajouter cette pièce sur mon compte !</button>
        </form>
      </div>
    </fieldset>
  </section>
</div>
