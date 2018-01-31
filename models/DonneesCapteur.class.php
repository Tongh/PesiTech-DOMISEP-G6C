<?php

class DonneesCapteurModel extends CapteurModel {
  
  function getgraph($x_array, $y_array) {
    require_once ('jpgraph/jpgraph.php');
    require_once ('jpgraph/jpgraph_line.php');
  }
  
  
}