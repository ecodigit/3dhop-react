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

foreach ($result as $row) {
	$model = $row->URI;
	$unitMeas = $row->unitaDiMisura;
	$hasSubmodels = $row->hasSubModels;
	$hasHotspots = $row->hasHotspots;
}

if ($hasSubModels == 'true') {
  $query_sm =
 'PREFIX ve: <https://w3id.org/ecodigit/ontology/virtualEnvironments/>'.
 'SELECT DISTINCT ?URL WHERE {'.
 '    <'.$uri.'> <https://w3id.org/ecodigit/ontology/virtualEnvironments/hasSubModel> ?SubModel .'.
 '    ?SubModel <https://w3id.org/italia/onto/SM/URL> ?URL .'.
 '}';
  
 $submodels = $sparql->query($query_sm); 
}  


if ($hasHotspots=="true") {
 $query_hs =
 'PREFIX l0: <https://w3id.org/italia/onto/l0/>'.
 'PREFIX dc: <http://purl.org/dc/elements/1.1/>'.
 'SELECT DISTINCT ?n ?titolo ?descrizione ?tipoHotspot WHERE { '.
 '  ?model <https://w3id.org/ecodigit/ontology/virtualEnvironments/hasHotspot> ?hotspot .'.
 '  ?hotspot l0:name ?n .'.
 '  ?hotspot a ?tipoHotspot .'.
 '  ?hotspot dc:relation ?object .'.
 '  OPTIONAL {?object dc:title ?titolo .}'.
 '  OPTIONAL {?object l0:description ?descrizione .}'.
 '  FILTER (?model=<https://w3id.org/ecodigit/object/saccone/porta_latina>)'.
 '  FILTER (?tipoHotspot!=<https://w3id.org/ecodigit/ontology/virtualEnvironments/Hotspot>)'.
 '}';
 $hotspots = $sparql->query($query_hs);
}
?>
