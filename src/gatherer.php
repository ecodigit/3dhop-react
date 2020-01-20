<?php
  /*
  * Questo è il componente incaricato di recuperare i metadati dallo SPARQL endpoint
  * a partire dall'uri dell'oggetto. L'uri è previsto essere presente nella pagina
  * dei risultati delle ricerche.
  */
  $started = session_start();
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
  'PREFIX dc: <http://purl.org/dc/elements/1.1/>'.
  'PREFIX l0: <https://w3id.org/italia/onto/l0/>'.
  'SELECT DISTINCT ?URI ?unitaDiMisura ?hasSubModels ?hasHotspots ?url ?titolo ?descrizione WHERE {'.
  '    <'.$url.'> SM:URL ?URI .'.
  '    <'.$url.'> ve:hasVisualization ?visualization .'.
  '   ?visualization ve:hasScale ?scale .'.
  '    ?scale MU:hasMeasurementUnit ?mu .'.
  '    ?mu rdfs:label ?unitaDiMisura .'.
  '    <'.$url.'> ve:containsSubModel ?hasSubModels .'.
  '    <'.$url.'> ve:containsHotspot ?hasHotspots .'.
  '  OPTIONAL {'.
  '    <'.$url.'> <https://w3id.org/ecodigit/ontology/virtualEnvironments/hasSubModel> ?submodel .'.
  '    ?submodel <https://w3id.org/italia/onto/SM/URL> ?url .'.
  '  }'.
  '  OPTIONAL{'.
  '    <'.$url.'> <https://w3id.org/ecodigit/ontology/virtualEnvironments/hasHotspot> ?hotspot .'.
  '    ?hotspot dc:relation ?object .'.
  '    OPTIONAL {?object dc:title ?titolo .}'.
  '    OPTIONAL {?object l0:description ?descrizione .}'.
  '  }'.
  '}';


$result = $sparql->query($query);
//$res = json_encode($result,JSON_PRETTY_PRINT);

//$unitMeas = $res->unitaDiMisura;
//    $html="   Unita di Misura:  ".$unitMeas;

// echo $res;

foreach ($result as $row) {
echo "<li>"."$row->URI "." $row->unitaDiMisura "." $row->hasSubModels</li>\n";
}
//var_dump($result);
   ?>
