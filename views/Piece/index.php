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
			<a href="index.php?controller=Piece&action=add" class="btn btn-primary btn-lg" role="button">Ajouter une pièce</a>
		</p>
	</div>
	<div class="table">
	<table class="dataintable">
		<tbody>
			<tr>
				<th>ID Pièce</th>
				<th>Superficie</th>
				<th>Nom</th>
				<th>Type de pièce</th>
        <th>ID Logement</th>
				<th>ID Client</th>
				<th>Label Pièce</th>
			</tr>
			<?php if (isset($result) && !empty($result)) {for ($i=0; $i < count($result) ; $i++) { ?>
			<tr>
				<td>
					<button type="button" class="btn btn-info btn-xs" data-toggle="button" aria-pressed="false" autocomplete="off" onclick="javascript:window.location.href='index.php?controller=Capteur'">Capteurs
						<?php echo " ( ID Pièce : ".$result[$i]['piece']['id_piece']." ) "; ?>
					</button>
				</td>
				<td>
					<button type="button" class="btn btn-info btn-xs" data-toggle="button" aria-pressed="false" autocomplete="off" onclick="javascript:window.location.href='index.php?controller=Piece'">
						<?php echo " ( Superficie : ".$result[$i]['piece']['superficie']." ) "; ?>
					</button>
				</td>
				<td>
					<button type="button" class="btn btn-info btn-xs" data-toggle="button" aria-pressed="false" autocomplete="off" onclick="javascript:window.location.href='index.php?controller=Piece'">
						<?php echo " ( Nom : ".$result[$i]['piece']['nom']." ) "; ?>
					</button>
				</td>
				<td>
					<button type="button" class="btn btn-info btn-xs" data-toggle="button" aria-pressed="false" autocomplete="off" onclick="javascript:window.location.href='index.php?controller=Piece'">
						<?php echo " ( Type de Pièce : ".$result[$i]['piece']['type']." ) "; ?>
					</button>
				</td>
        <td>
					<button type="button" class="btn btn-info btn-xs" data-toggle="button" aria-pressed="false" autocomplete="off" onclick="javascript:window.location.href='index.php?controller=Piece'">
						<?php echo " ( Label Pièce : ".$result[$i]['piece']['id_logement']." ) "; ?>
					</button>
				</td>
  			<td>
  					<button type="button" class="btn btn-info btn-xs" data-toggle="button" aria-pressed="false" autocomplete="off" onclick="javascript:window.location.href='index.php?controller=Piece'">
  						<?php echo " ( ID Client : ".$result[$i]['piece']['id_client']." ) "; ?>
  					</button>
				</td>
				<td>
					<button type="button" class="btn btn-info btn-xs" data-toggle="button" aria-pressed="false" autocomplete="off" onclick="javascript:window.location.href='index.php?controller=Piece'">
						<?php echo " ( Label Pièce : ".$result[$i]['piece']['label_piece']." ) "; ?>
					</button>
				</td>
			</tr>
		<?php }} ?>
		</tbody>
	</table>
	</div>
</div>
