<div id="DIYbody">
	<div class="">
		<h1><?php echo $title ?><h1>
	</div>


	<div class="">
		<p class="">
			<?php if (isset($Err)) echo $Err; echo "<br/>"?>
		</p>
	</div>
	<div class="btn-group">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCodeVAfficher" > Voir les codes de vérification </button>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalClientAjouter"> Ajouter un client </button>
	</div>

	<div class="table">
		<table class="dataintable">
			<tbody>
				<tr>
					<th class="withButton"></th>
					<th>ID Client</th>
					<th>Nom</th>
					<th>Prénom</th>
					<th>Email</th>
				</tr>
				<?php if (isset($result) && !empty($result)) {for ($i=0; $i < count($result) ; $i++) { ?>
				<tr>
					<td class="withButton">
						<button type="button" class="btn btn-info buttonLent" data-toggle="button" value="index.php?controller=Admin&id_client=<?php echo $result[$i]['utilisateur']['id_utilisateur']?>">
							Voir les détails
						</button>
					</td>
					<td>
						<?php echo "" . $result[$i]['utilisateur']['id_utilisateur'] . ""?>
					</td>
					<td>
						<?php echo "".$result[$i]['utilisateur']['nom'].""; ?>
					</td>
					<td>
						<?php echo "".$result[$i]['utilisateur']['prenom'].""; ?>
					</td>
					<td>
						<?php echo "".$result[$i]['utilisateur']['email'].""; ?>
					</td>
				</tr>
			<?php }} ?>
			</tbody>
		</table>
	</div>
	<?php import("modal", "modalCodeVAfficher.php")?>
	<?php import("modal", "modalClientAjouter.php")?>
</div>
