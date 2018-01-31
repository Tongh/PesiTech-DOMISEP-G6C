<div id="DIYbody">
  <div class="">
		<h1><?php echo $title ?><h1>
	</div>

  <div class="">
		<p class="">
			<?php if (isset($Err)) echo $Err; echo "<br/>"?>
		</p>
	</div>

  <div class="selection">

  </div>
  
  <div class="mainTable">
    <table class="dataintable">
      <tr>
        <th><strong><?php echo $nom_capteur ?></strong></th>
        <th colspan="3"><strong><?php echo $nom_piece ?></strong></th>
      </tr>
      <tr>
        <td>Type</td>
        <td>Donnée actuelle</td>
        <td colspan="2">Historique</td>
      </tr>
      <tr>
        <td><?php echo $type_capteur ?></td>
        <td>21°C</td>
        <td colspan="2">
            <div class="">
              <a href="<?php echo APP_URL?>views/Public/jpgraph/getgraph.php" border=0 alt="<?php echo APP_URL?>views/Public/jpgraph/getgraph.php" align="left">
                <img src="<?php echo APP_URL?>views/Public/jpgraph/getgraph.php" alt="<?php echo APP_URL?>views/Public/jpgraph/getgraph.php"></img>
              </a>
            </div>
        </td>
      </tr>

    </tr>
    </table>
  </div>
</div>
