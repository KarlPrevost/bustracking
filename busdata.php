<?php
$apiurl = "https://data.explore.star.fr/api/records/1.0/search/?dataset=tco-bus-vehicules-position-tr&lang=fr&rows=446&facet=numerobus&facet=nomcourtligne&facet=sens&facet=destination";
$busData = json_decode(file_get_contents($apiurl),true);

$busnumber = $busData['nhits']; 

// $busdata now contains all data requested from the api
// $busData->records[0]->fields->coordonnees[0]; // if std class and arrays
// $busData['records'][0]['fields']['coordonnees'][0];  // if arrays only