<?php
/*
 * Vollständige Liste aller Einträge mit allen verfügbaren Datenfeldern
 */
$teamAccessCode = $_GET['TAC'];
$conn = "";
include './dbconn.php';

if(empty($ctwOrg)) {
    $sql = "SELECT * FROM `ctwList` LEFT JOIN ctwMember ON ctwMember.MemberEmail = ctwList.ListMemberEmail LEFT JOIN ctwTeam ON ctwTeam.TeamId = ctwMember.MemberTeamId LEFT JOIN ctwCompany ON ctwCompany.CompId = ctwTeam.TeamCompId ORDER BY ctwList.ListDate ASC";
} else {
    $sql = "SELECT * FROM `ctwList` LEFT JOIN ctwMember ON ctwMember.MemberEmail = ctwList.ListMemberEmail LEFT JOIN ctwTeam ON ctwTeam.TeamId = ctwMember.MemberTeamId LEFT JOIN ctwCompany ON ctwCompany.CompId = ctwTeam.TeamCompId WHERE ctwTeam.TeamAccessCode = '$teamAccessCode'";
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