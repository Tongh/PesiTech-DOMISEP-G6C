<?php
class StatusController extends Controller {
  function index() {
    $this -> set('title', 'Le status de Votre périphérique');
    $this -> set('content', 'Bienvenue sur votre EspaceClient!');
    $this -> render();
  }


}
