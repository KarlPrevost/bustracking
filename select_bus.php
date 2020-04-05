<?php
include "busdata.php";
// Liste deroulante contenant les noms de lignes
$nline = count($busData['facet_groups'][2]['facets']);
for ($i=0; $i<$nline; $i++):
    $nomcourtligne = $busData['facet_groups'][2]['facets'][$i]['name'];?>  
    <option value="<?php echo $nomcourtligne; ?>"><?php echo $nomcourtligne; ?></option> 
<?php endfor; ?>