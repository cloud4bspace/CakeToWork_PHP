<?php
/*
 * Firmenliste
 */
$compBezeichnung = $_GET['CompBez'];
$conn = "";
include './dbconn.php';

$sql = "SELECT * FROM `ctwTeam` LEFT JOIN ctwCompany ON ctwCompany.CompId = ctwTeam.TeamCompId WHERE ctwCompany.CompBezeichnung = '$compBezeichnung' ORDER BY `ctwTeam`.`TeamBezeichnung` ASC";
$result = mysqli_query($conn, $sql);
$counter = 1;
while($row = mysqli_fetch_assoc($result)) {
    // echo var_dump($row);
    if($counter>1) {echo "|";}
    echo $row['TeamBezeichnung'];
    $counter++;
}


?>