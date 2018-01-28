<div id='DIYbody'>
	<div class="">
		<h1><?php echo $title ?><h1>
	</div>

	<div class="">
		<p class="">
			<?php if (isset($Err)) echo $Err; if (isset($result)) print_r($result); echo "<br/>"?>
		</p>
	</div>
	<div class="">
		<p class="">
			<input type="button" value="Ajouter" onclick="javascript:window.location.href='index.php?controller=Logement&action=add'">
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
			<?php if (isset($result) && !empty($result)) {foreach ($result[0]["logement"] as $value) { ?>
			<tr>
				<td><?php echo $value["id_logement"]; ?></td>
				<td><?php echo $value["address"]; ?></td>
				<td><?php echo $value["utilisateur_id utilisateur"]; ?></td>
			</tr>
		<?php }} ?>
		</tbody>
	</table>
	</div>
</div>
