<div id='DIYbody'>
  <h1><?php echo $title ?><h1>

  <form method="post" action="<?php echo "index.php?controller=Logement&action=attend"  ?>" onsubmit="return validerLogement()">
  	<input type="text" placeholder="XXXXXXXX" name="value">
  	<input type="submit" name="Ajouter">
  </form>
</div>
