<div id='DIYbody'>
	<div class="">
		<h1><?php echo $title ?><h1>
	</div>

	<div class="">
		<p class="">
			<?php if (isset($Err)) echo $Err; echo "<br/>"?>
		</p>
	</div>
	<div class="btn-group">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAjouterLogemnt"> Ajouter un logement </button>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalSupprimerLogement"> Supprimer un logement </button>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalModifierAdrresse"> Modifier l'addresse</button>
	</div>
	<div class="table" id="tableCode">
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
						<button type="button" class="btn btn-info buttonLent" data-toggle="button" value="index.php?controller=Piece&id_logement=<?php echo $result[$i]['logement']['id_logement']?>">
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
<?php import("modal", "modalAjouterLogemnt.php");import("modal", "modalSupprimerLogement.php");import("modal", "modalModifierAdrresse.php");?>
</div>
