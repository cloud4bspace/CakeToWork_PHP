<?php
/*
 * Vollständige Liste aller An-/Abmeldungen für einen Termin
 */
$teamAccessCode = $_GET['TAC']; // wird hier nicht genutzt
$itemId = $_GET['ItemId'];
$conn = "";
include './dbconn.php';


$sql = "SELECT * FROM `ctwRegistration` LEFT JOIN ctwMember ON ctwRegistration.RegistrationMemberEmail = ctwMember.MemberEmail LEFT JOIN ctwList ON ctwRegistration.RegistrationListID = ctwList.ListId WHERE `RegistrationListID` = $itemId ORDER BY `ctwRegistration`.`RegistrationAngemeldet` DESC, ctwMember.MemberName ASC";
$result = mysqli_query($conn, $sql);

$json_array = array();
$json_array0 = array();

while($row = mysqli_fetch_assoc($result)) {
    // echo var_dump($row);
    $json_array[] = $row;
}
$json_array0 = [ "doodle" => $json_array];

echo json_encode($json_array0);

//print_r($json_array);

?>