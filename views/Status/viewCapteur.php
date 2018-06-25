<?php
  $capteur_type = array("1" => "distance modèle 1", "2" => "distance modèle 2", "3" => "température",
                        "4" => "humidité", "5" => "lumière modèle 1", "6" => "couleur",
                        "7" => "présence", "8" => "lumière modèle 2", "9" => "mouvement",
                        "A" => "présence son modèle 1", "B" => "Envoie de la date JJ:MM", "C" => "Envoie de l'année AAAA",
                        "D" => "Envoi valeur potentiomètre", "H" => "Requête Heure 1", "a" =>"Requête actionneur 1",
                        "h" => "Requête Heure 2", "p" => "Requête data", "q" => "Requête année");
  $requete_tyep = array("1" => "Requête en écriture", "2" =>"Requête en lecture", "3" => "Requête en lecture/écriture");

  $url = "http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=0G6C";
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_HEADER, FALSE);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
  $data = curl_exec($ch);
  curl_close($ch);

  $data_tab = str_split($data,33);

  $res = "0";
  for($i=0, $size=count($data_tab);$i<$size;$i++){
    $trame = $data_tab[$i];
    //echo "$trame <br/>";

    list($t,$o,$r,$c,$n,$v,$a,$x,$year,$month,$day,$hour,$min,$sec) = sscanf($trame,"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
    list($t,$o,$r,$c,$n,$v,$a,$x,$year,$month,$day,$hour,$min,$sec) = sscanf($trame,"%1d%4s%1s%1s%2x%4s%4s%2s%4d%2d%2d%2d%2d%2d");
    if ($c == "5") {
      $res = (int)$v;
    }
  }
 ?>
<div id="DIYbody">

  <div class="">
    <h1><?php echo $title ?></h1>
  </div>

  <div class="mainTable">
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
        <td><?php echo $res;?></td>
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
  </div>
  <div class="table"><table class="dataintable">
    <tbody>
      <tr>
        <th>Données</th>
        <th>Timestamp</th>
      </tr>
      <?php
      for($i=0, $size=count($data_tab);$i<$size;$i++){
        $trame = $data_tab[$i];
        //echo "$trame <br/>";

        list($t,$o,$r,$c,$n,$v,$a,$x,$year,$month,$day,$hour,$min,$sec) = sscanf($trame,"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
        list($t,$o,$r,$c,$n,$v,$a,$x,$year,$month,$day,$hour,$min,$sec) = sscanf($trame,"%1d%4s%1s%1s%2x%4s%4s%2s%4d%2d%2d%2d%2d%2d");

        if ($c == "5") {
          $datay[] = (int)$v;
          $time = "$year-$month-$day $hour:$min:$sec";
          $tstamp = strtotime($time);
          $datax[] = date("Y-m-d H:i:s", $tstamp);
        }
      }

      $n = 15;
      $dataY = array();
      $dataX = array();
      for ($i=0; $i<$n; ++$i) {
        if (isset($datax[count($datax)-($n-$i)]) && !empty($datax[count($datax)-($n-$i)])) {
          $dataX[] = $datax[count($datax)-($n-$i)];
        } else {
          $dataX[] = 0;
        }
        if (isset($datay[count($datay)-($n-$i)]) && !empty($datay[count($datay)-($n-$i)])) {
          $dataY[] = $datay[count($datay)-($n-$i)];
        } else {
          $dataY[] = 0;
        }
      }
      for($i=14, $size=-1;$i>$size;$i--){
        echo "<tr>";
        echo("<td>".$dataY[$i]."</td>");
        echo("<td>".$dataX[$i]."</td>");
        echo "</tr>";
      }
      ?>
    </tbody>
  </table>
  </div>

</div>
