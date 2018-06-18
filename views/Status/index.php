<?php
  $capteur_type = array("1" => "distance modèle 1", "2" => "distance modèle 2", "3" => "température",
                        "4" => "humidité", "5" => "lumière modèle 1", "6" => "couleur",
                        "7" => "présence", "8" => "lumière modèle 2", "9" => "mouvement",
                        "A" => "présence son modèle 1", "B" => "Envoie de la date JJ:MM", "C" => "Envoie de l'année AAAA",
                        "D" => "Envoi valeur potentiomètre", "H" => "Requête Heure 1", "a" =>"Requête actionneur 1",
                        "h" => "Requête Heure 2", "p" => "Requête data", "q" => "Requête année");
  $requete_tyep = array("1" => "Requête en écriture", "2" =>"Requête en lecture", "3" => "Requête en lecture/écriture");

  $url = "http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=006C";
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_HEADER, FALSE);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
  $data = curl_exec($ch);
  curl_close($ch);

  $data_tab = str_split($data,33);
?>
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
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEnvoie"> Envoyer d'une requête </button>
    <?php import("modal", "modalEnvoie.php");?>
  </div>
  <div class="table"><table class="dataintable">
    <tbody>
      <tr>
        <th>Type de la trame</th>
        <th>Objet</th>
        <th>Type de requête</th>
        <th>Type de capteur</th>
        <th>Numéro du capteur</th>
        <th>Valeur remontée</th>
        <th>Numéro de la trame</th>
        <th>Checksum</th>
        <th>Timestamp</th>
      </tr>
      <?php
      for($i=0, $size=count($data_tab);$i<$size;$i++){
        $trame = $data_tab[$i];
        //echo "$trame <br/>";
        list($t,$o,$r,$c,$n,$v,$a,$x,$year,$month,$day,$hour,$min,$sec) = sscanf($trame,"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
        list($t,$o,$r,$c,$n,$v,$a,$x,$year,$month,$day,$hour,$min,$sec) = sscanf($trame,"%1d%4s%1s%1s%2x%4s%4s%2s%4d%2d%2d%2d%2d%2d");
        if (isset($t) && !empty($t)) {
          echo "<tr>";
          echo("<td>$t</td>");
          echo("<td>$o</td>");
          $type_r = $requete_tyep[$r];
          echo("<td>$type_r</td>");
          $type_c = $capteur_type[$c];
          echo("<td>$type_c</td>");
          echo("<td>$n</td>");
          $v = ltrim($v, '0'); echo("<td>$v</td>");
          echo("<td>$a</td>");
          echo("<td>$x</td>");
          echo("<td>$year/$month/$day $hour:$min:$sec</td>");
          echo "</tr>";
        }
      }
      ?>
    </tbody>
  </table>
  </div>
  <!--<div class="mainTable">
    <table class="dataintable">
      <tr>
        <th><strong><?php echo $nom_capteur ?></strong></th>
        <th colspan="3"><strong><?php echo $nom_piece ?></strong></th>
      </tr>
      <tr>
        <td>Type</td>
        <td>Donnée actuelle</td>
        <td colspan="2">Historique</td>
      </tr>
      <tr>
        <td><?php echo $type_capteur ?></td>
        <td>21°C</td>
        <td colspan="2">
            <div class="">
              <a href="<?php echo APP_URL?>views/Public/jpgraph/getgraph.php" border=0 alt="<?php echo APP_URL?>views/Public/jpgraph/getgraph.php" align="left">
                <img src="<?php echo APP_URL?>views/Public/jpgraph/getgraph.php" alt="<?php echo APP_URL?>views/Public/jpgraph/getgraph.php"></img>
              </a>
            </div>
        </td>
      </tr>

    </tr>
    </table>
  </div>-->

</div>
