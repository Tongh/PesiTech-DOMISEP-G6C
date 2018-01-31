<div id='DIYbody'>
	<div class="">
		<h1><?php echo $title ?><h1>
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
						<h3 class="panel-title">Mes logements</h3>
					</div>
					<div class="panel-body">
						<div class="espaceClient">
							<table class="table">
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
					</div>
				</div>
				<p class="">
					<a class="btn btn-primary btn-sm" href="index.php?controller=Logement&action=add" role="button">Ajouter un logement</a>
				</p>
			</div>
	</div>
</div>
