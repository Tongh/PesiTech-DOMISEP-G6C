<?php
require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_line.php');
require_once ('jpgraph/jpgraph_utils.inc.php');

$type_capteur_num = $_GET['type_capteur'];
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

$datay = array();
$datax = array();
$data_tab = str_split($data,33);

for($i=0, $size=count($data_tab);$i<$size;$i++){
  $trame = $data_tab[$i];
  //echo "$trame <br/>";

  list($t,$o,$r,$c,$n,$v,$a,$x,$year,$month,$day,$hour,$min,$sec) = sscanf($trame,"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
  list($t,$o,$r,$c,$n,$v,$a,$x,$year,$month,$day,$hour,$min,$sec) = sscanf($trame,"%1d%4s%1s%1s%2x%4s%4s%2s%4d%2d%2d%2d%2d%2d");

  if ($c == $type_capteur_num) {
    $datay[] = (int)$v;
    $time = "$year-$month-$day $hour:$min:$sec";
    $tstamp = strtotime($time);
    $datax[] = date("", $tstamp);
  }
}

$n = 15;
$dataY = array();
$dataX = array();
for ($i=0; $i<$n; ++$i) {
  if (!isset($datax)) {
    $dataX[] = 0;
  } else if (isset($datax[count($datax)-($n-$i)]) && !empty($datax[count($datax)-($n-$i)])) {
    $dataX[] = $datax[count($datax)-($n-$i)];
  } else {
    $dataX[] = 0;
  }
  if (!isset($datay)){
    $dataY = 0;
  } else if (isset($datay[count($datay)-($n-$i)]) && !empty($datay[count($datay)-($n-$i)])) {
    $dataY[] = $datay[count($datay)-($n-$i)];
  } else {
    $dataY[] = 0;
  }
}
$graph = new Graph(500,400);
$graph->clearTheme();

//
// We use an integer scale on the X-axis since the positions on the X axis
// are assumed to be UNI timestamps
$graph->SetScale('intlin');
$graph->title->Set('Basic example with manual ticks');

//$graph->xaxis->SetTickLabels($dataX);

// Create the plot line
$p1 = new LinePlot($dataY);
$p1->SetWeight(2);
$p1->SetColor('orange:0.9');
$graph->Add($p1);

// Output graph
$graph->Stroke();

/*require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_line.php');
// $datay = array(0,25,12,47,27,27,0);

// Setup the graph
$graph = new Graph(500,450, 'auto');
$graph->SetScale("intlin",0,$aYMax=max($datay));

$theme_class= new AquaTheme;
$graph->SetTheme($theme_class);

$graph->SetMargin(40,40,50,40);

$graph->title->Set('Données de ce capteur');
$graph->SetBox(false);
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

// For background to be gradient, setfill is needed first.
$graph->ygrid->SetFill(true,'#FFFFFF@0.5','#FFFFFF@0.5');
$graph->SetBackgroundGradient('#FFFFFF', '#00FF7F', GRAD_HOR, BGRAD_PLOT);

$graph->xaxis->SetTickLabels($datax);
$graph->xaxis->SetLabelMargin(20);
$graph->yaxis->SetLabelMargin(20);

//$graph->SetAxisStyle(AXSTYLE_BOXOUT);
$graph->img->SetAngle(180);

// Create the line
$p1 = new LinePlot($datay);
$graph->Add($p1);

$p1->SetFillGradient('#FFFFFF','#F0F8FF');
$p1->SetColor('#aadddd');

// Output line
$graph->Stroke();
*/
?>
