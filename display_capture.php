<?php
include "db.php";

$return_arr = array();

if ((isset($_POST["busselectbutton"]) AND $_POST["busselectbutton"] == "Afficher la capture") AND $_POST['captureselect'] != 'captureselection'){
    $select_search = $bdd->prepare("SELECT 
    *
    FROM
    capture,
    marker_data_set
    WHERE
    capture.id = marker_data_set.id_capture and capture.id = ?
    ");
    $select_search->execute(array($_POST['captureselect'])); 

    $select_found = $select_search->fetchAll();
    $select_found_json = json_encode($select_found);

    $file = "capturedata.json";
    file_put_contents($file, ($select_found_json));
    $select_search->closeCursor();
}