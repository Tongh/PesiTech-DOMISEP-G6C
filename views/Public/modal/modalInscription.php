<div class="modal fade" id="modalInscription" tabindex="-1" role="dialog" data-backdrop="false" data-dismiss="modal"  aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Pour vous inscrire, renseignez les informations suivantes: </h4>
      </div>
      <div class="modal-body">
        <div class="mainFont">
          <form class="form-horizontal"  method="post" action="<?php echo "index.php?controller=Inscription&action=attend"  ?>" onsubmit="return validerNewCompte()">
            <div class="form-group form-group-sm has-feedback" id="nomTest">
              <div class="formText"><label class="control-label col-sm-3" for="inputSuccess3">Nom</label></div>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="nom" placeholder=" Potter" name="nom" onchange="checkNom()">
                <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true" id="nomTestNP" style="display:none"></span>
                <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true" id="nomTestErr" style="display:none"></span><br>
                <span id="nomErr" class="error"></span>
              </div>
            </div>
            <div class="form-group form-group-sm has-feedback" id="prenomTest">
              <div class="formText"><label class="control-label col-sm-3" for="inputSuccess3">Prénom</label></div>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="prenom" name="prenom" placeholder=" Harry" onchange="checkPrenom()">
                <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true" id="prenomTestNP" style="display:none"></span>
                <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true" id="prenomTestErr" style="display:none"></span><br>
        				<span id="prenomErr" class="error"></span></span>
              </div>
            </div>
            <div class="form-group form-group-sm has-feedback" id="loginTest">
              <div class="formText"><label class="control-label col-sm-3" for="inputSuccess3">Pseudo</label></div>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="login" placeholder="magicJack" name="login" onchange="checkPseudo()">
                <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true" id="loginTestNP" style="display:none"></span>
                <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true" id="loginTestErr" style="display:none"></span><br>
        				<span id="loginErr" class="error"></span>
              </div>
            </div>
            <div class="form-group form-group-sm has-feedback" id="mdpTest">
              <div class="formText"><label class="control-label col-sm-3" for="inputSuccess3">Mot de passe</label></div>
              <div class="col-sm-9">
                <input type="password" class="form-control" id="mdpID" name="mdp" onchange="checkmdp()">
                <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true" id="mdpTestNP" style="display:none"></span>
                <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true" id="mdpTestErr" style="display:none"></span><br>
               <span id="mdpErr" class="error"></span>
              </div>
            </div>
            <div class="form-group form-group-sm has-feedback" id="mdpCTest">
              <div class="formText"><label class="control-label col-sm-3" for="inputSuccess3">Confirmation mot de passe</label></div>
              <div class="col-sm-9">
                <input type="password" class="form-control" id="mdpC" name="mdpC" onchange="checkmdpC()">
                <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true" id="mdpCTestNP" style="display:none"></span>
                <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true" id="mdpCTestErr" style="display:none"></span><br>
                <span id="mdpCErr" class="error"></span>
              </div>
            </div>
            <div class="form-group form-group-sm has-feedback" id="mailTest">
              <div class="formText"><label class="control-label col-sm-3" for="inputSuccess3">E-mail</label></div>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="mail" placeholder=" xxxxxxxxx@gmail.com" name="email" onchange="checkMail()">
                <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true" id="mailTestNP" style="display:none"></span>
                <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true" id="mailTestErr" style="display:none"></span><br>
        				<span id="mailErr" class="error"></span>
              </div>
            </div>
            <div class="form-group form-group-sm has-feedback" id="teleTest">
              <div class="formText"><label class="control-label col-sm-3" for="inputSuccess3">Téléphone</label></div>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="tele" placeholder=" 06 00 00 00 00" name="tele" onchange="checkTele()">
                <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true" id="teleTestNP" style="display:none"></span>
                <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true" id="teleTestErr" style="display:none"></span><br>
                <span id="teleErr" class="error"></span>
              </div>
            </div>
            <div class="form-group form-group-sm has-feedback" id="typeUTest">
              <div class="formText"><label class="control-label col-sm-3" for="inputSuccess3">Type</label></div>
              <div class="col-sm-9">
                <div class="btn-group form-group-sm" data-toggle="buttons">
                  <label class="btn btn-primary btn-ms active">
                    <input type="radio" id ="typeClient" name="typeU" value="client"  onchange="checkTypeU()" checked> Client
                  </label>
                  <label class="btn btn-primary btn-ms">
                    <input type="radio" id ="typeAdmin" name="typeU" value="admin"  onchange="checkTypeU()"> Administrateur
                  </label>
                </div>
              </div>
            </div>
            <div class="form-group form-group-sm has-feedback" id="codeVTest">
              <div class="formText"><label class="control-label col-sm-3" for="inputSuccess3">Code</label></div>
              <div class="col-sm-9">
                <div class="input-group">
                  <input type="text" class="form-control" id="codeV" placeholder="XXXXXXXX" name="codeV" onchange="checkCodeV()">
                  <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true" id="codeVTestNP" style="display:none"></span>
                  <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true" id="codeVTestErr" style="display:none"></span>
                  <div class="input-group-btn">
                    <a data-placement="right" tabindex="0" class="btn btn-primary btn-sm" role="button" data-toggle="popover" data-trigger="focus" data-content="le code qui vous a été envoyé par mail lors de votre souscription à nos service. si vous ne le retouvez pas, contacter l'assistance."><i class="fa fa-question" id="faid"></i></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <span id="codeVErr" class="error"></span>
              <span class="error"><?php if (isset($_GET['Err'])) echo $_GET['Err'];?></span><br><br><br>
              <button type="button" class="btn btn-default" data-dismiss="modal"> Close </button>
              <button type="submit" id="sendFormButton" class="btn btn-primary"> Inscrire </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
