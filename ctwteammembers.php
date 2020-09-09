<?php
/*
 * Vollständige Liste aller Teammitglieder mit allen verfügbaren Datenfeldern
 */
$teamAccessCode = $_GET['TAC'];
$conn = "";
include './dbconn.php';


$sql = "SELECT * FROM `ctwMember` LEFT JOIN ctwTeam ON ctwTeam.TeamId = `MemberTeamId` LEFT JOIN ctwCompany ON ctwTeam.TeamCompId = ctwCompany.CompId WHERE ctwTeam.TeamAccessCode = '$teamAccessCode' ORDER BY `ctwMember`.`MemberName` ASC";
$result = mysqli_query($conn, $sql);

$json_array = array();
$json_array0 = array();

while($row = mysqli_fetch_assoc($result)) {
    // echo var_dump($row);

    $json_array[] = $row;
}
$json_array0 = [ "teamlist" => $json_array];

echo json_encode($json_array0);

//print_r($json_array);

?>