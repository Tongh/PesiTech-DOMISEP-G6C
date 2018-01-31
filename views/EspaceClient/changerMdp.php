<div id='DIYbody'>
	<h1><?php echo $title ?><h1>

	<div class="btn-group">
		<button type="button" class="btn btn-primary buttonVite" value="index.php?controller=EspaceClient"> Mon Profil </button>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalMdp" disabled="disabled"> Mot de passe </button>
		<div class="btn-group">
			<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Mes installations
				<span class="caret"></span>
			</button>
			<ul class="dropdown-menu">
				<li><a href="#">Mes logements</a></li>
				<li><a href="#">Mes Pièces</a></li>
				<li><a href="#">Mes Capteurs</a></li>
				<li role="separator" class="divider"></li>
				<li><a href="#">Mes achats</a></li>
			</ul>
		</div>
	</div>

</div>
