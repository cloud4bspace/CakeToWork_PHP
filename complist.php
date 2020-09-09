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
    // echo var_dump($row);

    $json_array[] = $row;
}
$json_array0 = [ "companies" => $json_array];

echo json_encode($json_array0);

//print_r($json_array);

?>