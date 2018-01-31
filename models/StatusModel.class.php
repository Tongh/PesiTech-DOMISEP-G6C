<?php

class StatusModel extends CapteurModel {
  protected $_dbDonnees;

  function __construct() {
    $this -> _dbDonnees = $this -> viewClient();
  }



}
