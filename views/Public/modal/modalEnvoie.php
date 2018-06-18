<?php
  $capteur_type = array("1" => "distance modèle 1", "2" => "distance modèle 2", "3" => "température",
                        "4" => "humidité", "5" => "lumière modèle 1", "6" => "couleur",
                        "7" => "présence", "8" => "lumière modèle 2", "9" => "mouvement",
                        "A" => "présence son modèle 1", "B" => "Envoie de la date JJ:MM", "C" => "Envoie de l'année AAAA",
                        "D" => "Envoi valeur potentiomètre", "H" => "Requête Heure 1", "a" =>"Requête actionneur 1",
                        "h" => "Requête Heure 2", "p" => "Requête data", "q" => "Requête année");
  $requete_tyep = array("1" => "Requête en écriture", "2" =>"Requête en lecture", "3" => "Requête en lecture/écriture");



  $url = "http://projets-tomcat.isep.fr:8080/appService?ACTION=COMMAND&TEAM=006C&TRAME=1006A150100339B";
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_HEADER, FALSE);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
  $data = curl_exec($ch);
  curl_close($ch);

  $data_tab = str_split($data,33);
  ?>
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
                <select class="form-control">
                  <option> 1 => Requête en écriture </option>
                  <option> 2 => Requête en lecture </option>
                  <option> 3 => Requête en lecture/écriture</option>
                </select>
              </div>
            </div>

            <div class="form-group form-group-sm has-feedback" id="CapteurTypeTest">
              <div class="formText"><label class="control-label col-sm-3" for="inputSuccess3"> Type de capteur (TYP) </label></div>
              <div class="col-sm-9">
                <select class="form-control">
                  <option> 1 => Capteur de distance modèle 1 </option>
                  <option> 2 => Capteur de distance modèle 2 </option>
                  <option> 3 => Capteur de température </option>
                  <option> 4 => Capteur d'humidité </option>
                  <option> 5 => Capteur de lumière modèle 1 </option>
                  <option> 6 => Capteur de couleur </option>
                  <option> 7 => Capteur de présence </option>
                  <option> 8 => Capteur de lumière modèle 2 </option>
                  <option> 9 => Capteur de mouvement </option>
                  <option> A => Capteur présence son modèle 1 </option>
                  <option> B => Envoie de la date JJ:MM </option>
                  <option> C => Envoie de l'année AAAA </option>
                  <option> D => Envoi valeur potentiomètre </option>
                  <option> H => Requête Heure 1 </option>
                  <option> a => Requête actionneur 1 </option>
                  <option> h => Requête Heure 2 </option>
                  <option> p => Requête data </option>
                  <option> q => Requête année </option>
                </select>
              </div>
            </div>

            <div class="form-group form-group-sm has-feedback" id="NumeroActionneurTest">
              <div class="formText"><label class="control-label col-sm-3" for="inputSuccess3"> Numéro d'actionneur (NUM) </label></div>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="actionneur" name="actionneur" onchange="checkActionneur()">
              </div>
            </div>

            <div class="form-group form-group-sm has-feedback" id="ValeurTest">
              <div class="formText"><label class="control-label col-sm-3" for="inputSuccess3"> Valeur à envoyer à l'actionneur (ANS) </label></div>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="valeur" name="valeur" onchange="checkValeur()">
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
