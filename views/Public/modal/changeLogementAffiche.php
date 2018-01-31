<?php
$file = fopen("./log/runtime.txt", "r");
$sessionID = fgets($file);
fclose($file);
session_id($sessionID);
session_start();

$model = new LogementModel;
$result = $model -> view();


echo "<table class='dataintable'><tbody>
<tr>
<th class=\"withButton\"></th>
<th>ID Logement</th>
<th>Adresse</th>
<th>ID Client</th>
</tr>";

if (isset($result) && !empty($result)) {
  for ($i=0; $i < count($result) ; $i++) {
   echo "<tr>";
   echo "<td class='withButton'>
   <button type='button' class='btn btn-info buttonLent' data-toggle='button' value='index.php?controller=Admin&id_client=".$result[$i]['logement']['id_logement']."'>
   Voir les détails
   </button>
   </td>";
   echo "<td>" . $result[$i]['logement']['id_logement'] . "</td>";
   echo "<td>" . $$result[$i]['logement']['address'] . "</td>";
   echo "<td>" . $result[$i]['logement']['utilisateur_id utilisateur'] . "</td>";
   echo "</tr>";
 }
}
echo "</tbody></table></div>";
?>
