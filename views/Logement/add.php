<div id='DIYbody'>
  <h1><?php echo $title ?><h1>

  <div class="mainFont">
    <form method="post" action="<?php echo "index.php?controller=Logement&action=attend"  ?>" onsubmit="return validerLogement()">
    	<input type="text" placeholder="XXXXXXXX" name="Address">
    	<input type="text" placeholder="XXXXXXXX" name="dans_immeuble">
    	<input type="text" placeholder="XXXXXXXX" name="value">
    	<input type="submit" name="ajouter" value="Ajouter">
    </form>
  </div>
</div>
