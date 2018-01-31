<div id="DIYbody">
	<h1><?php echo $title ?><h1>

	<div class="btn-group">
		<button type="button" class="btn btn-primary buttonVite" value="index.php?controller=EspaceClient" disabled="disabled"> Mon Profil </button>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalMdp"> Mot de passe </button>
		<button type="button" class="btn btn-primary buttonVite" value="index.php?controller=EspaceClient&action=installations"> Mos installations </button>
  </div>
</div>

<div class="">
  <p class="">
    <?php if (isset($Err)) echo $Err; echo "<br/>"?>
  </p>
</div>

<div class="jumbotron espaceClient">
    <div class="container">
      <h2><?php echo $content ?></h2>
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title"><?php echo $result[0]['utilisateur']['login'] . " ( UID : " . $result[0]['utilisateur']['id_utilisateur'] . " )" ?></h3>
        </div>
        <div class="panel-body">
          <div class="espaceClient">
            <table class="table">
              <tr>
                <td><?php echo "Nom" ?></td>
                <td><?php echo $result[0]["utilisateur"]["nom"] ?></td>
              </tr>
              <tr>
                <td><?php echo "Prénom" ?></td>
                <td><?php echo $result[0]["utilisateur"]["prenom"] ?></td>
              </tr>
              <tr>
                <td><?php echo "Email" ?></td>
                <td><?php echo $result[0]["utilisateur"]["email"] ?></td>
              </tr>
              <tr>
                <td><?php echo "Téléphone" ?></td>
                <td><?php echo $result[0]["utilisateur"]["telephone"] ?></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
        <p><a class="btn btn-primary btn-lg" role="button">
         One button</a>
        </p>
    </div>
</div>

<?php import("modal", "modalMdp.php")?>
