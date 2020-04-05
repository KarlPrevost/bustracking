<?php
include "db.php";
// Liste déroulante contenant la liste des captures
foreach ($bdd->query("select * from capture") as $capture):
$retrievenom = $capture["nom"];
$retrievedatecapture = $capture["date"]; 
$idcapture = $capture["id"];
?>
<option value="<?php echo $idcapture; ?>"><?php echo "'".$retrievenom."' le ".$retrievedatecapture; ?></option>
<?php endforeach; ?>