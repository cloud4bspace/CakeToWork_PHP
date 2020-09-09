<?php

$ctwOrg = $_GET['CTWOrg'];
$conn = "";
include './dbconn.php';

if(empty($ctwOrg)) {
    $sql = "SELECT * FROM ctwItem WHERE CTWDate>= CURDATE() ORDER BY CTWDate ASC";
} else {
    $sql = "SELECT * FROM ctwItem WHERE CTWOrg='$ctwOrg' AND CTWDate>= CURDATE() ORDER BY CTWDate ASC";
}
$result = mysqli_query($conn, $sql);

$json_array = array();
$json_array0 = array();

while($row = mysqli_fetch_assoc($result)) {
   // echo var_dump($row);

    $json_array[] = $row;
}
$json_array0 = [ "eintraege" => $json_array];

echo json_encode($json_array0);

//print_r($json_array);

?>