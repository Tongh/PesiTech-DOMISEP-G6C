<?php

class StatusModel extends CapteurModel {
  protected $_dbDonnees;

  function __construct() {
    $this -> _dbDonnees = $this -> viewClient();
  }

  function getIDsCapteurs() {
    if (isset($this -> _dbDonnees) && !empty($this -> _dbDonnees) && gettype($this -> _dbDonnees) == "string") {
      return $this -> _dbDonnees;
    } else {
      $result = array();
      for ($i=0; $i < count($result) ; $i++) {
          array_push($result, $this -> _dbDonnees[$i]["capteur"]["id_capteur"]);
      } return $result;
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
