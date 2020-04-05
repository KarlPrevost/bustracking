<?php
include "busdata.php";
include "db.php";

if ((isset($_POST["capture"]) AND $_POST["capture"] == "Capture") AND $_POST['busselect'] != 'busselection'){
    $busline = strip_tags($_POST["busselect"]);
    $capturename = strip_tags($_POST["capturename"]);

    $insert_capture = $bdd->prepare("INSERT INTO 
    capture(nom,busline,date)
    VALUES 
    (?,?,NOW())
    ");
    $insert_capture->execute(array($capturename,$busline));
    $lastinsertid = $bdd->lastInsertId(); 
    for($i=0; $i<$busnumber; $i++){
        if(isset($busData['records'][$i]['fields']['idligne']) && $busData['records'][$i]['fields']['nomcourtligne'] == $busline){ 
            $destination = $busData['records'][$i]['fields']['destination'];
            $longitude = $busData['records'][$i]['fields']['coordonnees'][0];
            $latitude = $busData['records'][$i]['fields']['coordonnees'][1];

            $insert_marker_data_set = $bdd->prepare("INSERT INTO 
            marker_data_set(id_capture,destination,longitude,latitude)
            VALUES 
            (?,?,?,?)
            ");
            $insert_marker_data_set->execute(array($lastinsertid,$destination,$longitude,$latitude));
        }
    }
}