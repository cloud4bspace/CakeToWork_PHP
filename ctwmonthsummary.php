<?php
/*
 * Vollständige Liste aller Einträge mit allen verfügbaren Datenfeldern
 */
$teamAccessCode = $_GET['TAC'];
$conn = "";
include './dbconn.php';


$sql = "SELECT ListReason, COUNT(*) AS Anzahl FROM `ctwList` LEFT JOIN ctwMember ON ctwMember.MemberEmail = ctwList.ListMemberEmail LEFT JOIN ctwTeam ON ctwTeam.TeamId = ctwMember.MemberTeamId LEFT JOIN ctwCompany ON ctwCompany.CompId = ctwTeam.TeamCompId WHERE MONTH(ctwList.ListDate) = MONTH(CURRENT_DATE()) AND ctwTeam.TeamAccessCode = '$teamAccessCode' GROUP BY `ListReason`";
$result = mysqli_query($conn, $sql);

$json_array = array();
$json_array0 = array();

while($row = mysqli_fetch_assoc($result)) {
    // echo var_dump($row);

    $json_array[] = $row;
}
$json_array0 = [ "monthlyboard" => $json_array];

echo json_encode($json_array0);

//print_r($json_array);

?>