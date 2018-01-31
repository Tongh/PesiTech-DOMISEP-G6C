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
			<a href="index.php?controller=Capteur&action=add" class="btn btn-primary btn-lg" role="button">Ajouter un capteur</a>
		</p>
	</div>

  <div class="table">
	<table class="dataintable">
		<tbody>
			<tr>
				<th class="withButton"></th>
				<th>ID Capteur</th>
				<th>Type de capteur</th>
				<th>Nom</th>
				<th>ID Pièce</th>
        <th>ID Client</th>
			</tr>
			<?php if (isset($result) && !empty($result)) {for ($i=0; $i < count($result) ; $i++) { ?>
			<tr>
				<td class="withButton">
					<button type="button" class="btn btn-info btn-block buttonLent" data-toggle="button" aria-pressed="false" autocomplete="off" value="index.php?controller=Status&action=viewCapteur&id_capteur=<?php echo $result[$i]['capteur']['id_capteur']?>">
						Voir les détails
					</button>
				</td>
				<td>
					<?php echo "".$result[$i]['capteur']['id_capteur'].""; ?>
				</td>
				<td>
					<?php echo "".$result[$i]['capteur']['type_capteur'].""; ?>
				</td>
				<td>
					<?php echo "".$result[$i]['capteur']['nom'].""; ?>
				</td>
				<td>
					<?php echo "".$result[$i]['capteur']['piece_ID'].""; ?>
				</td>
				<td>
					<?php echo "".$result[$i]['capteur']['utilisateur_id'].""; ?>
				</td>
			</tr>
		<?php }} ?>
		</tbody>
	</table>
	</div>

</div>
