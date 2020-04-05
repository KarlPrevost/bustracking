<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bus Trackling Siloek</title>
        <link rel="stylesheet" href="style.css" type="text/css">
        <!-- leaflet CSS -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
    </head>
    <body>
    <?php include "capture.php";?>
    <?php include "display_capture.php";?>

        <div class="entete">
            <img src="star.jpg" alt="logo star">
            <h1>GEOLOCALISATION DES BUS DU RESEAU</h1>
        </div>

        <!-- Formulaire d'affichage des lignes sur la carte avec option de capture -->
        <!-- -- BLOC -- -->
        <div class="backgroundblanc">
            <div class="form1">
                <form action = "index.php" method="post">
                    <label for="search">Afficher une ligne de bus sur la carte</label>
                    <select autocomplete="off" name="busselect" id="busselect" size="1"> 
                    <!-- Autocomplete off sert à reset la valeur sur firefox au reload -->
                        <option class="busselection" value="busselection">Ligne</option>
                        <?php
                            include "select_bus.php";
                        ?>
                    </select>
                    <input type = "text" name = "capturename" placeholder = "Nom de l'enregistrement" value = "Nom de l'enregistrement" size = "45" id="capturename">
                    <input class="buttons2" type = "submit" name = "capture"  value = "Capture" id="capture">
                </form>
            </div>
            <div class="form1">
                <!-- -- /BLOC -- -->

                <!-- Formulaire d'affichage des captures de position des bus -->
                <!-- -- BLOC -- -->
                <form action = "index.php" method = "post">
                <select name="captureselect" id="captureselect" size="1">
                        <option class="captureselection" value="captureselection">Selectionner une capture</option>
                        <?php
                            include "retrieve_capture.php";
                        ?>
                    </select>
                <input class="buttons" type = "submit" name = "busselectbutton" value = "Afficher la capture" id="busselectbutton">
                </form>
            </div>
        </div>

        <!-- -- /BLOC -- -->

        <!-- MAP OPENSTREEETMAP LEAFLET -->
            <div id="busmap"></div>
        
         <!-- JQuery -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"
			  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
			  crossorigin="anonymous"></script>
        <!-- leaflet javascript -->
        <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" 
            integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
        <!-- My scripts -->
        <script src="script.js"></script>
    </body>
</html>
