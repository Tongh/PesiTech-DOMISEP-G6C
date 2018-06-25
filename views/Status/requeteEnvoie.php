<div id="DIYbody">
  <div class="">
  	<h1><?php echo $title ?><h1>
  </div>

  <div class="">
  	<p class="">
  		<?php if (isset($Err)) echo $Err; echo "<br/>"?>
  	</p>
  </div>

  <div>
    <?php
      $tim = date("is");
      $checksum = 66;
      $timeStamp = date("YmdHis");
      $requete =  $trame . $objet . $req . $type_c . $actionneur . $valeur . $tim . $checksum . $timeStamp;

      $ch = curl_init();
      $url = "http://projets-tomcat.isep.fr:8080/appService?ACTION=COMMAND&TEAM=0G6C&TRAME=".$requete;
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_HEADER, FALSE);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
      $output = curl_exec($ch);
      curl_close($ch);

      echo $output;
    ?>
  </div>
</div>
