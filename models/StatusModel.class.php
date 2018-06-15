<?php

class StatusModel extends CapteurModel {

  function get_tous_trames() {
    $url = "http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=006C";
    $ch = curl_init();
  	curl_setopt($ch, CURLOPT_URL, $url);
  	curl_setopt($ch, CURLOPT_HEADER, FALSE);
  	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
  	$data = curl_exec($ch);
  	curl_close($ch);

    echo "Raw Data:<br />";
  	echo("$data");
    return $data;
  }

  function trames_split($data) {
    $data_tab = str_split($data,33);
  	echo "<br /><br />Tabular Data:<br />";
  	for($i=0, $size=count($data_tab);$i<$size;$i++){
  		echo "trame $i: $data_tab[$i]<br />";
  	}
    return $data_tab;
  }

  function get_une_ligne_trames($ligne) {
    $trame = $data_tab[$ligne];
  	echo("<br /><br />$trame<br/>");

    $trame_type = substr($trame,0,1);
		$object_num =  hexdec(substr($trame,1,4));
		echo("$object_num $object_num ...<br />");

    list($t,$o,$r,$c,$n,$v,$a,$x,$year,$month,$day,$hour,$min,$sec) = sscanf($trame,"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
		echo("$t,$o,$r,$c,$n,$v,$a,$x,$year,$month,$day,$hour,$min,$sec</br/>");

    $ligne_list = list($t,$o,$r,$c,$n,$v,$a,$x,$year,$month,$day,$hour,$min,$sec) = sscanf($trame,"%1d%4x%1s%1s%2x%4x%4s%2s%4d%2d%2d%2d%2d%2d");
    echo("$t,$o,$r,$c,$n,$v,$a,$x,$year,$month,$day,$hour,$min,$sec");

    return $ligne_list;
  }

  function getIDCapteur() {
    $res = $this -> viewClient();
    if (gettype($res) == "string") {
      return $res;
    } else {
      return $res[0]["capteur"]["id_capteur"];
    }
  }

  function getTimeArray() {
    $sql = 'SELECT `temps` FROM ' . 'status'  . ' WHERE `id_capteur` = \'' . $this -> getIDsCapteurs()[0] . '\'';
    if ($result = $this -> query($sql, 1)) {
			return explode($result['status']['temps']);
		} return "Ce capteur n'a pas encore des données enregistrés !";
  }

  function getValeurArray() {
    $sql = 'SELECT `valeur` FROM ' . 'status'  . ' WHERE `id_capteur` = \'' . $this -> getIDsCapteurs()[0] . '\'';
    if ($result = $this -> query($sql, 1)) {
      return explode($result['status']['valeur']);
		} return "Ce capteur n'a pas encore des données enregistrés !";
  }

  function getTimeString($arrayTime) {
    return implode(",", $arrayTime);
  }

  function getValeurString($arrayValeur) {
    return implode(",", $arrayTime);
  }

  function addNewCapteur($id_capteur, $actionneur, $prix, $unite, $status, $cosnsommation) {
    $sql = 'INSERT INTO `status` VALUES (\'' . $id_capteur . '\', \'' . $actionneur . '\', \'' . $prix . '\', \'' . $unite . '\', \'' . null . '\', \'' . null . '\', \'' . $status . '\', \'' . $cosnsommation . '\'';
    if ($result = $this -> query($sql)) {
      return 0;
		} return "Ajouter échec!";
  }

}
