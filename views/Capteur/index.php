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
			<a href="index.php?controller=Capteur&action=add" class="btn btn-primary btn-lg" role="button">Ajouter un Capteur</a>
		</p>
	</div>

</div>
