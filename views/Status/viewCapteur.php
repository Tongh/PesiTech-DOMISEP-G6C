<div id="DIYbody">

  <div class="">
    <h1><?php echo $title ?></h1>
  </div>

  <div class="selection">

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
        <td>21°C</td>
        <td colspan="2"><a href="stats.php"><img src="Image\graph_ex.png" ></a></td>
      </tr>

    </tr>
    </table>
  </div>

</div>
