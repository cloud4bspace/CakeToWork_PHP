<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/*
 * Fügt das übergebene Team der Datenbank hinzu und gibt den generierten TeamAccessCode zurück
 */
$compName = $_GET['CompName'];
$teamName = $_GET['TeamName'];
$conn = "";

include './dbconn.php';

// es wird überprüft, ob es für diese Firma bereits ein gleichlautendes Team gibt
$sql = "SELECT COUNT(*) AS Treffer FROM `ctwCompany` LEFT JOIN ctwTeam ON ctwTeam.TeamCompId = ctwCompany.CompId WHERE `CompBezeichnung` = '$compName' AND ctwTeam.TeamBezeichnung = '$teamName'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if($row['Treffer']>0) {
    echo "NOK";
} else {
    // Falls es dieses Team noch nicht gibt, wird es angelegt
    // CompanyId ermitteln
    $sql = "SELECT * FROM ctwCompany WHERE CompBezeichnung = '$compName'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $compId = $row['CompId'];
    
    // prepare and bind
    $sql = "INSERT INTO `ctwTeam` (`TeamId`, `TeamCompId`, `TeamBezeichnung`, `TeamOrt`, `TeamAccessCode`) VALUES (NULL, ?, ?, '', '');";
    $stmt 	= mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "is",$compId, $teamName);
    mysqli_stmt_execute($stmt);
    $newId = $stmt->insert_id;
    mysqli_stmt_close($stmt);
    $tac = substr($newId . hash('adler32', $compName . $teamName) . "00",0,10);
    $sql = "UPDATE `ctwTeam` SET `TeamAccessCode` = '$tac' WHERE `ctwTeam`.`TeamId` = $newId";
    $result = mysqli_query($conn, $sql);
    echo $tac;

}
?>