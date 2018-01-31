<?php
$q=$_GET["q"];

$model = new AdminModel;

if ($q == "admin") $codeResult = $model -> getCodeAdmin();
if ($q == "client") $codeResult = $model -> getCodeClient();

if (isset($codeResult) && empty($codeResult)) {
  echo "";
} else {
  $username = $model -> getLogin($codeResult['id_client']);
  echo "<div class='table'><table class='dataintable'><tbody>
  <tr>
  <th class='withButton'></th>
  <th>Code</th>
  <th>Utilisé</th>
  <th>ID client</th>
  <th>Client</th>
  </tr>";

  if (isset($result) && !empty($result)) {
    for ($i=0; $i < count($result) ; $i++) {
     echo "<tr class='withButton'>";
     echo "<td>" . "<button type='button' class='btn btn-info buttonLent' data-toggle='button' value='index.php?controller=Admin&id_client=".$codeResult['id_Code']."'>Supprimer</button>" . "</td>";
     echo "<td>" . $codeResult['code'] . "</td>";
     echo "<td>" . $codeResult['utilise'] . "</td>";
     echo "<td>" . $codeResult['id_client'] . "</td>";
     echo "<td>" . $username['login'] . "</td>";
     echo "</tr>";
   }
 }
  echo "</tbody></table></div>";
}
?>
