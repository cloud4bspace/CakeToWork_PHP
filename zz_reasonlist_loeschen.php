<?php
/*
 * Firmenliste
 */

$conn = "";
include './dbconn.php';

$sql = "SELECT * FROM ctwCompany ORDER BY ctwCompany.CompBezeichnung ASC";

$result = mysqli_query($conn, $sql);

$json_array = array();
$json_array0 = array();

while($row = mysqli_fetch_assoc($result)) {

    echo $row[CompBezeichnung] . "|";
}


?>