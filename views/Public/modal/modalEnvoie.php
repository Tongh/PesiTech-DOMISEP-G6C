<div class="modal fade" id="modalEnvoie" tabindex="-1" role="dialog" data-backdrop="false" data-dismiss="modal"  aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel"> Envoyer une requête vers la carte </h4>
			</div>
			<div class="modal-body">
				<div class="mainFont">
          <form class="form-horizontal" method="post" action="<?php echo "index.php?controller=Status&action=requeteEnvoie"  ?>" onsubmit="return validerRequete()" id="RequeteForm">

            <div class="form-group form-group-sm has-feedback" id="TrameTest">
              <div class="formText"><label class="control-label col-sm-3" for="inputSuccess3"> Trame </label></div>
              <div class="formText"><label class="control-label col-sm-3" for="inputSuccess3"> 1 </label></div>
            </div>

            <div class="form-group form-group-sm has-feedback" id="NumeroObjetTest">
              <div class="formText"><label class="control-label col-sm-3" for="inputSuccess3"> Numéro d'objet </label></div>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="objet" value="006C" name="objet" onchange="checkObjet()">
              </div>
            </div>

            <div class="form-group form-group-sm has-feedback" id="RequeteTest">
              <div class="formText"><label class="control-label col-sm-3" for="inputSuccess3"> Requête (REQ) </label></div>
              <div class="col-sm-9">
                <select class="form-control" name="requeteType">
                  <option value="1"> 1 => Requête en écriture </option>
                  <option value="2"> 2 => Requête en lecture </option>
                  <option value="3"> 3 => Requête en lecture/écriture </option>
                </select>
              </div>
            </div>

            <div class="form-group form-group-sm has-feedback" id="CapteurTypeTest">
              <div class="formText"><label class="control-label col-sm-3" for="inputSuccess3"> Type de capteur (TYP) </label></div>
              <div class="col-sm-9">
                <select class="form-control" name="capteurType">
                  <option value="1"> 1 => Capteur de distance modèle 1 </option>
                  <option value="2"> 2 => Capteur de distance modèle 2 </option>
                  <option value="3"> 3 => Capteur de température </option>
                  <option value="4"> 4 => Capteur d'humidité </option>
                  <option value="5"> 5 => Capteur de lumière modèle 1 </option>
                  <option value="6"> 6 => Capteur de couleur </option>
                  <option value="7"> 7 => Capteur de présence </option>
                  <option value="8"> 8 => Capteur de lumière modèle 2 </option>
                  <option value="9"> 9 => Capteur de mouvement </option>
                  <option value="A"> A => Capteur présence son modèle 1 </option>
                  <option value="B"> B => Envoie de la date JJ:MM </option>
                  <option value="C"> C => Envoie de l'année AAAA </option>
                  <option value="D"> D => Envoi valeur potentiomètre </option>
                  <option value="H"> H => Requête Heure 1 </option>
                  <option value="a"> a => Requête actionneur 1 </option>
                  <option value="h"> h => Requête Heure 2 </option>
                  <option value="p"> p => Requête data </option>
                  <option value="q"> q => Requête année </option>
                </select>
              </div>
            </div>

            <div class="form-group form-group-sm has-feedback" id="NumeroActionneurTest">
              <div class="formText"><label class="control-label col-sm-3" for="inputSuccess3"> Numéro d'actionneur (NUM) </label></div>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="actionneur" name="actionneur" placeholder="04" onchange="checkActionneur()">
              </div>
            </div>

            <div class="form-group form-group-sm has-feedback" id="ValeurTest">
              <div class="formText"><label class="control-label col-sm-3" for="inputSuccess3"> Valeur à envoyer à l'actionneur (ANS) </label></div>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="valeur" name="valeur" placeholder="0020" onchange="checkValeur()">
              </div>
            </div>

						<div class="modal-footer">
              <span class="error"><?php if (isset($_GET['Err'])) echo $_GET['Err'];?></span><br>
							<button type="button" class="btn btn-default" data-dismiss="modal"> Close </button>
              <button type="submit" class="btn btn-primary" id="submitButton"> Valider </button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
