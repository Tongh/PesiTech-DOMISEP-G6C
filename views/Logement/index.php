<div id='DIYbody'>
	<h1><?php echo $title ?><h1>

	<p class="alert">
		<?php if (isset($Err)) echo $Err; if (isset($result)) print_r($result) ?>
		<input type="button" value="Ajouter" onclick="javascript:window.location.href='index.php?controller=Logement&action=add'">
	</p>
	<div class="table">
	<table class="dataintable">
		<thead>
			<tr>
				<th>ID Logement</th>
				<th>Adresse</th>
				<th>Dans Immeuble</th>
				<th>ID Client</th>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
	</div>
</div>
