<div id='DIYbody'>
	<div class="">
		<h1><?php echo $title ?><h1>
	</div>

  <div class="">
		<p class="">
			<?php if (isset($Err)) echo $Err; echo "<br/>"?>
		</p>
	</div>

  <div class="">
		<p class="">
			<a href="index.php?controller=Capteur&action=add" class="btn btn-primary btn-lg" role="button">Ajouter un Capteur</a>
		</p>
	</div>

  <div class="table">
	<table class="dataintable">
		<tbody>
			<tr>
				<th>ID Capteur</th>
				<th>Type de Capteur</th>
				<th>Nom</th>
				<th>ID Pièce</th>
        <th>ID Client</th>
			</tr>
			<?php if (isset($result) && !empty($result)) {for ($i=0; $i < count($result) ; $i++) { ?>
			<tr>
				<td>
					<button type="button" class="btn btn-info btn-block" data-toggle="button" aria-pressed="false" autocomplete="off" value="index.php?controller=Status&action=viewCapteur&id_capteur=<?php echo $result[$i]['capteur']['id_capteur']?>">
						<?php echo " ( ID Capteur : ".$result[$i]['capteur']['id_capteur']." ) "; ?>
					</button>
				</td>
				<td>
					<button type="button" class="btn btn-info btn-block" data-toggle="button" aria-pressed="false" autocomplete="off" onclick="javascript:window.location.href='index.php?controller=Capteur'">
						<?php echo " ( Type : ".$result[$i]['capteur']['type_capteur']." ) "; ?>
					</button>
				</td>
				<td>
					<button type="button" class="btn btn-info btn-block" data-toggle="button" aria-pressed="false" autocomplete="off" onclick="javascript:window.location.href='index.php?controller=Capteur'">
						<?php echo " ( Nom : ".$result[$i]['capteur']['nom']." ) "; ?>
					</button>
				</td>
				<td>
					<button type="button" class="btn btn-info btn-block" data-toggle="button" aria-pressed="false" autocomplete="off" onclick="javascript:window.location.href='index.php?controller=Capteur'">
						<?php echo " ( ID Pièce : ".$result[$i]['capteur']['piece_ID']." ) "; ?>
					</button>
				</td>
				<td>
					<button type="button" class="btn btn-info btn-block" data-toggle="button" aria-pressed="false" autocomplete="off" onclick="javascript:window.location.href='index.php?controller=Capteur'">
						<?php echo " ( ID Client : ".$result[$i]['capteur']['utilisateur_id']." ) "; ?>
					</button>
				</td>
			</tr>
		<?php }} ?>
		</tbody>
	</table>
	</div>

</div>
