<div id='DIYbody'>
	<h1><?php echo $title ?><h1>

	<div class="btn-group">
		<button type="button" class="btn btn-primary buttonVite" value="index.php?controller=EspaceClient"> Mon Profil </button>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalMdp"> Mot de passe </button>
		<button type="button" class="btn btn-primary buttonVite" value="index.php?controller=EspaceClient&action=installations" disabled="disabled"> Mos installations </button>
	</div>





  <?php include ("modalMdp.php")?>
</div>
