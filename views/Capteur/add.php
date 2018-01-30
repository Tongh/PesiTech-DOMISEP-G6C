<div id='DIYbody'>

  <section>
		<fieldset>
			<legend> <strong>  <?php echo $title ?>  </strong> </legend>
      <div class="mainFont">
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
