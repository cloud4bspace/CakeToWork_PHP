<?php
/*
 * Firmenliste
 */

$conn = "";
include './dbconn.php';

$sql = "SELECT * FROM ctwCompany ORDER BY ctwCompany.CompBezeichnung ASC";

$result = mysqli_query($conn, $sql);
$counter = 1;
while($row = mysqli_fetch_assoc($result)) {
    // echo var_dump($row);
    if($counter>1) {echo "|";}
    echo $row['CompBezeichnung'];
    $counter++;
}


?>