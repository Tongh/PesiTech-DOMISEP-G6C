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
			<a href="index.php?controller=Logement&action=add" class="btn btn-primary btn-lg" role="button">Ajouter un logement</a>
		</p>
	</div>
	<div class="table">
	<table class="dataintable">
		<tbody>
			<tr>
				<th class="withButton"></th>
				<th>ID Logement</th>
				<th>Adresse</th>
				<th>ID Client</th>
			</tr>
			<?php if (isset($result) && !empty($result)) {for ($i=0; $i < count($result) ; $i++) { ?>
			<tr>
				<td class="withButton">
					<button type="button" class="btn btn-info" data-toggle="button" value="index.php?controller=Piece&id_logement=<?php echo $result[$i]['logement']['id_logement']?>">
						Voir les détails
					</button>
				</td>
				<td>
					<?php echo "" . $result[$i]['logement']['id_logement'] . ""?>
				</td>
				<td>
					<?php echo "".$result[$i]['logement']['address'].""; ?>
				</td>
				<td>
					<?php echo "".$result[$i]['logement']['utilisateur_id utilisateur'].""; ?>
				</td>
			</tr>
		<?php }} ?>
		</tbody>
	</table>
	</div>
</div>
