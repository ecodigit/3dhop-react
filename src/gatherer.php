<?php
  /**
   * Making a SPARQL SELECT query
   *
   * This example creates a SPARQL query using EasyRdf package
   *
   * @package    EasyRdf
   * @copyright  Copyright (c) 2009-2013 Nicholas J Humfrey
   * @license    http://unlicense.org/
   */
  
  set_include_path(get_include_path() . PATH_SEPARATOR . './lib/');
  require_once "EasyRdf.php";
  require_once "html_tag_helpers.php";
  $sparql = new EasyRdf_Sparql_Client('http://150.146.207.67/sparql/ds'); 

  $url = $_GET["url"];
  
  $query =
  'PREFIX SM: <https://w3id.org/italia/onto/SM/>'.
  'PREFIX ve: <https://w3id.org/ecodigit/ontology/virtualEnvironments/>'.
  'PREFIX MU: <https://w3id.org/italia/onto/MU/>'.
  'PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>'.
  'SELECT DISTINCT ?URI ?unitaDiMisura ?hasSubModels ?hasHotspots WHERE {'.
  '    <'.$url.'> SM:URL ?URI .'.
  '    <'.$url.'> ve:hasVisualization ?visualization .'.
  '   ?visualization ve:hasScale ?scale .'.
  '    ?scale MU:hasMeasurementUnit ?mu .'.
  '    ?mu rdfs:label ?unitaDiMisura .'.
  '    <'.$url.'> ve:containsSubModel ?hasSubModels .'.
  '    <'.$url.'> ve:containsHotspot ?hasHotspots .'.
  '}';



$result = $sparql->query($query);
$model=$result[0]->URI;
$unitMeas = $result[0]->unitaDiMisura;
$hasSubmodel = $result[0]->hasSubModels;
$hasHotspot = $result[0]->hasHotspots;

if ($hasSubmodel==true) {
  $query_sm =
  'PREFIX ve: <https://w3id.org/ecodigit/ontology/virtualEnvironments/>'.
  'SELECT DISTINCT ?url  WHERE {'.
    '<'.$url.'> <https://w3id.org/ecodigit/ontology/virtualEnvironments/hasSubModel> ?submodel .'.
    '?submodel <https://w3id.org/italia/onto/SM/URL> ?url .'.
  '}';
  $submodels = $sparql->query($query_sm);
} else {
  $submodels = "There are no Sub models!";
}

if ($hasHotspot==true) {
  $query_hs =
  'PREFIX dc: <http://purl.org/dc/elements/1.1/>'.
  'PREFIX l0: <https://w3id.org/italia/onto/l0/>'.
  'SELECT DISTINCT ?titolo ?descrizione ?tipoHotspot WHERE {'.
  '<'.$url.'> <https://w3id.org/ecodigit/ontology/virtualEnvironments/hasHotspot> ?hotspot .'.
  '?hotspot dc:relation ?object .'.
  'OPTIONAL {?object dc:title ?titolo .}'.
  'OPTIONAL {?object l0:description ?descrizione .}'.
  /* SELECT DISTINCT ?tipoHotspot WHERE { 
    ?model <https://w3id.org/ecodigit/ontology/virtualEnvironments/hasHotspot> ?hotspot .
    ?hotspot a ?tipoHotspot .
    FILTER (?model=<'.$url.'>) 
  }*/
  '}';
  $hotspots = $sparql->query($query_hs);
} else {
  $hotspots = "There are no Hot spots!";
}


   ?>
