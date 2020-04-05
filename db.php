<?php
try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=bustracking;charset=utf8', 'root', 'votre_mot_de_passe'); 
        $bdd ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
    $bdd->query("SET NAMES UTF8");
?>            