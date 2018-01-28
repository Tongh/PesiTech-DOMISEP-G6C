<div id='DIYbody'>

  <section>
		<fieldset>
			<legend> <strong>  Pour vous inscrire, renseignez les informations suivantes:  </strong> </legend>
      <div class="mainFont">
        <form method="post" action="<?php echo "index.php?controller=Logement&action=addForm"  ?>" onsubmit="return validerLogement()">
          <div class="formLabel"><div class="formText">Address : <input type="text" placeholder="2 rue du Blomet" name="address"></div></div><br><br>
          <!--<div class="formLabel"><div class="formText">Dans Immeuble : <input type="text" placeholder="XXXXXXXX" name="dans_immeuble"></div></div><br><br><br>-->
          <span class="error"><?php if (isset($_GET['Err'])) echo $_GET['Err'];?></span><br><br><br>
  				<button type="submit" class="btn btn-primary" id="submitButton">Ajouter ce logement sur mon compte !</button>
        </form>
      </div>
    </fieldset>
  </section>
</div>
