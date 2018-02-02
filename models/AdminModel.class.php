<?php

class AdminModel extends Model {
  protected $_utilisateurModel;
  protected $_logementModel;
  protected $_capteurModel;
  protected $_pieceModel;

  function __construct() {
    $this -> _utilisateurModel = new UtilisateurModel;
    $this -> _logementModel = new LogementModel;
    $this -> _capteurModel = new CapteurModel;
    $this -> _pieceModel = new PieceModel;
  }

  function getLogementInfo() {
    return $this -> _logementModel -> view();
  }

  function getCapteurInfo() {
    return $this -> _capteurModel -> viewClient();
  }

  function getPieceInfo() {
    return $this -> _pieceModel -> veiwClient();
  }

  function getUserInfo() {
    return $this -> _utilisateurModel -> select($_SESSION["User"]);
  }

  function getUserByID($id_client) {
    return $this -> _utilisateurModel -> selectByID($id_client);
  }


  function getClientInfo() {
    $type = "admin";
    $sql = "SELECT * FROM utilisateur WHERE `typeUtilisateur` <> '$type'";
    if ($result = $this -> _utilisateurModel -> query($sql)) {
      return $result;
    } return 0;
  }

  function getCodeClient() {
    $sql = "SELECT `code` FROM codeClient";
    if ($result = $this -> _utilisateurModel -> query($sql, 1)) {
      return $result;
    } return 0;
  }

  function getCodeAdmin() {
    $sql = "SELECT `code` FROM codeAdmin";
    if ($result = $this -> _utilisateurModel -> query($sql, 1)) {
      return $result;
    } return 0;
  }

  function getLogin($id_login) {
    if ($result = $this -> _utilisateurModel -> getLogin($id_login)) {
      return $result;
    } return 0;
  }



}
