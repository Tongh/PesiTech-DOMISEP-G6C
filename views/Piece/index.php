<div id='DIYbody'>
	<div class="">
		<h1><?php echo $title ?><h1>
	</div>

	<div class="">
		<p class="">
			<?php if (isset($Err)) echo $Err; echo "<br/>"?>
		</p>
	</div>
	<!--<div class="btn-group">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAjouterLogemnt"> Ajouter une pièce </button>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalSupprimerLogement"> Supprimer une pièce </button>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalModifierAdrresse"> Modifier</button>
	</div>-->
	<div class="">
		<p class="">
			<a href="index.php?controller=Piece&action=add" class="btn btn-primary btn-lg" role="button">Ajouter une pièce</a>
		</p>
	</div>
	<div class="table">
	<table class="dataintable">
		<tbody>
			<tr>
				<th class="withButton"></th>
				<th>ID Pièce</th>
				<th>Superficie</th>
				<th>Nom</th>
				<th>Type de pièce</th>
        <th>ID Logement</th>
				<th>ID Client</th>
			</tr>
			<?php if (isset($result) && !empty($result)) {for ($i=0; $i < count($result) ; $i++) { ?>
			<tr>
				<td class="withButton">
					<button type="button" class="btn btn-info btn-block buttonLent" data-toggle="button" value="index.php?controller=Capteur&id_piece=<?php echo $result[$i]['piece']['id_piece']?>">
						Voir les détails
					</button>
				</td>
				<td>
					<?php echo "".$result[$i]['piece']['id_piece'].""; ?>
				</td>
				<td>
					<?php echo "".$result[$i]['piece']['superficie'].""; ?>
				</td>
				<td>
					<?php echo "".$result[$i]['piece']['nom'].""; ?>
				</td>
				<td>
					<?php echo "".$result[$i]['piece']['type'].""; ?>
				</td>
        <td>
					<?php echo "".$result[$i]['piece']['id_logement'].""; ?>
				</td>
  			<td>
  				<?php echo "".$result[$i]['piece']['id_client'].""; ?>
				</td>
			</tr>
		<?php }} ?>
		</tbody>
	</table>
	</div>
</div>
