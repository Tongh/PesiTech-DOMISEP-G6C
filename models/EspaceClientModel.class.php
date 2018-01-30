<?php

class EspaceClientModel extends Model {
  protected $_logementModel;
  protected $_capteurModel;
  protected $_pieceModel;

  function __construct() {
    $this -> _logementModel = new LogementModel;
    $this -> _capteurModel = new CapteurModel;
    $this -> _pieceModel = new PieceModel;
  }

  function getLogementInfo() {
    return $this -> _logementModel -> view();
  }

  function getCapteurInfo() {
    return $this -> _capteurModel -> view();
  }


}
