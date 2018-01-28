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
				<th>ID Logement</th>
				<th>Addresse</th>
				<th>ID Client</th>
			</tr>
			<?php if (isset($result) && !empty($result)) {for ($i=0; $i < count($result) ; $i++) { ?>
			<tr>
				<td>
					<button type="button" class="btn btn-info btn-block" data-toggle="button" aria-pressed="false" autocomplete="off" onclick="javascript:window.location.href='index.php?controller=Piece'">Pièces
						<?php echo " ( ID Logement : ".$result[$i]['logement']['id_logement']." ) "; ?>
					</button>
				</td>
				<td>
					<button type="button" class="btn btn-info btn-block" data-toggle="button" aria-pressed="false" autocomplete="off" onclick="javascript:window.location.href='index.php?controller=Piece'">
						<?php echo "".$result[$i]['logement']['address'].""; ?>
					</button>
				</td>
				<td>
					<button type="button" class="btn btn-info btn-block" disabled="disabled" data-toggle="button" aria-pressed="false" autocomplete="off" onclick="javascript:window.location.href='index.php?controller=Piece'">
						<?php echo " ( ID Client : ".$result[$i]['logement']['utilisateur_id utilisateur']." ) "; ?>
					</button>
				</td>
			</tr>
		<?php }} ?>
		</tbody>
	</table>
	</div>
</div>
