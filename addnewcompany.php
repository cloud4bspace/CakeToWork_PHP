<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/*
 * Vollständige Liste aller Einträge mit allen verfügbaren Datenfeldern
 */
$compName = $_GET['CompName'];
$conn = "";

include './dbconn.php';

$sql = "SELECT COUNT(*) AS Treffer FROM ctwCompany WHERE CompBezeichnung = '$compName'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if($row['Treffer']>0) {
    echo "NOK";
} else {
    // prepare and bind
    $sql = "INSERT INTO `ctwCompany` (`CompId`, `CompBezeichnung`, `CompSitz`, `CompLogo`) VALUES (NULL, ?, '', '');";
    $stmt 	= mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s",$_GET['CompName']);
    mysqli_stmt_execute($stmt);
    echo $stmt->insert_id;
    mysqli_stmt_close($stmt);
}
?>