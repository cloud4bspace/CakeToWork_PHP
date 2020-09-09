<!DOCTYPE html>

<html lang="de">

<head>
    <title>Skriptverzeichnis</title>
    <meta charset="utf-8">
    <meta name="description" content="Übersicht der verwendeten Skripte">
    <meta name="author" content="Bernhard Kämpf">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="../css/stylesheet.css?v=<?=time();?>" type="text/css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bangers|Cabin+Sketch|Codystar|Open+Sans|Open+Sans+Condensed:300|Passion+One|Raleway|Ribeye+Marrow|Special+Elite|Zilla+Slab+Highlight" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Anton|Dosis:800|Exo:800|Maven+Pro:900|Montserrat:700|Nunito:700|Open+Sans:700|Podkova:700|Russo+One|Slackey" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bungee|Bungee+Hairline|Bungee+Inline|Bungee+Outline|Keania+One" rel="stylesheet">
</head>
<body class='blockcontainer'>
<div>

    <fieldset>
        <legend><img src="../img/icn_php.png"></legend>
        <h1>CTW-spezifische Skripte</h1>
        <table>
            <thead>
            <tr>
                <th>
                    Skript
                </th>
                <th>
                    Bsp.
                </th>
                <th>
                    Output/Rückmeldung
                </th>
                <th>
                    Verwendung
                </th>
                <th>
                    Parameter
                </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    addnewchatmessage.php
                </td>
                <td>
                    NA
                </td>
                <td>
                    OK = ID der neuen Message
                </td>
                <td>
                    Neue Chat-Message wurde hinzugefügt
                </td>
                <td>
                    TAC, UserEmail, ChatMessage
                </td>
            <tr>
            <tr>
                <td>
                    addnewcompany.php
                </td>
                <td>
                    NA
                </td>
                <td>
                    OK = ID der neuen Firma
                    NOK = NOK
                </td>
                <td>
                    Neue Firma wurde erfolgreich hinzugefügt oder nicht
                </td>
                <td>
                    CompName
                </td>
            <tr>
            <tr>
                <td>
                    addnewitem.php
                </td>
                <td>
                    NA
                </td>
                <td>
                    1 = OK
                    0 = NOK
                </td>
                <td>
                    Neuer Termin wurde erfolgreich hinzugefügt oder nicht
                </td>
                <td>
                    UserEmail, Date, Time, Reason, Beverages, Infos
                </td>
            <tr>
            <tr>
                <td>
                    addnewteam.php
                </td>
                <td>
                    NA
                </td>
                <td>
                    10stelliger TeamAccessCode (TAC)<br>
                    Bildung TAC -> $tac = substr($newId . hash('adler32', $compName . $teamName) . "00",0,10);
                    <br><br></br>oder "NOK", wenn das Team bereits existiert
                </td>
                <td>
                    Bestätigung bei der (erfolgreichen) Erfassung eines neuen Teams
                </td>
                <td>
                    TeamName, CompName
                </td>
            <tr>
            <tr>
                <td>
                    checkdateavailability.php
                </td>
                <td>
                    <a href="https://www.cloud4b.space/caketowork/checkdateavailability.php?TAC=1234567890&Datum=2020-08-24">Link</a>
                </td>
                <td>
                    0 = Termin ist noch frei
                    1 = Termin ist bereits besetzt
                </td>
                <td>
                    Input für Hinweisfeld nach der Datumsauswahl bei der Erfassung eines neuen Eintrags
                </td>
                <td>
                    TAC, Datum
                </td>
            <tr>
                <td>
                    complist.php
                </td>
                <td>
                    <a href="https://www.cloud4b.space/caketowork/complist.php">Link</a>
                </td>
                <td>
                    Liste aller Firmen in Json-Format
                </td>
                <td>
                    wird zurzeit nicht verwendet
                </td>
                <td>
                    --
                </td>
            </tr>
            <tr>
                <td>
                    compstringlist.php
                </td>
                <td>
                    <a href="https://www.cloud4b.space/caketowork/compstringlist.php">Link</a>
                </td>
                <td>
                    Stringkette aller Firmen (durch Pipe getrennt)
                </td>
                <td>
                    Input für Firmen-Spinner
                </td>
                <td>
                    --
                </td>
            </tr>
            <tr>
                <td>
                    ctwboard.php
                </td>
                <td>
                    <a href="https://www.cloud4b.space/caketowork/ctwboard.php?TAC=1234567890">Link</a>
                </td>
                <td>
                    Liste aller Termine eines Teams (Datum >= heute) in Json-Format
                </td>
                <td>
                    Input für Listview für Terminliste
                </td>
                <td>
                    TAC
                </td>
            </tr>
            <tr>
                <td>
                    ctwChatJson.php
                </td>
                <td>
                    <a href="https://www.cloud4b.space/caketowork/ctwChatJson.php?TAC=1234567890">Link</a>
                </td>
                <td>
                    Liste aller Chatnachrichten in Json-Format
                </td>
                <td>
                    Input für Listview für Teamchat
                </td>
                <td>
                    TAC
                </td>
            </tr>
            <tr>
                <td>
                    ctwdoodle.php
                </td>
                <td>
                    <a href="https://www.cloud4b.space/caketowork/ctwdoodle.php?ItemId=17">Link</a>
                </td>
                <td>
                    Liste aller an- oder abgemeldeten Personen für einen bestimmten Termin in Json-Format
                </td>
                <td>
                    Input für Listview für Teilnehmerliste
                </td>
                <td>
                    ItemId
                </td>
            </tr>
            <tr>
                <td>
                    ctwDoodleTrx.php
                </td>
                <td>
                    <a href="https://www.cloud4b.space/caketowork/ctwDoodleTrx.php?TAC=1234567890&ACT=getStatus&UserEmail=bernhard.kaempf@gmail.com&ItemId=17">Link</a>
                </td>
                <td>
                    getStatus -> An-/Abmeldestatus im Format X|Y <br>(1|0 -> angemeldet<br>0|1 -> abgemeldet<br>9|9 -> unbekannt)
                    <br><br>setStatus -> Status 1 = Anmeldung = "angemeldet", Status 2 = Abmeldung = "abgemeldet", Status 0 = Zurücksetzung = "zurückgesetzt"
                </td>
                <td>
                    An-/Abmeldestatus für User und Termin lesen (ACT=getStatus) oder setzen (ACT=setStatus)
                </td>
                <td>
                    TAC, ACT (getStatus oder setStatus), Status, UserEmail, ItemId
                </td>
            </tr>
            <tr>
                <td>
                    ctwmonthsummary.php
                </td>
                <td>
                    <a href="https://www.cloud4b.space/caketowork/ctwmonthsummary.php?TAC=1234567890">Link</a>
                </td>
                <td>
                    Monatsstatistik in Json-Format
                </td>
                <td>
                    Listview für Monatsstatistik im Dashboard
                </td>
                <td>
                    TAC
                </td>
            </tr>
            <tr>
                <td>
                    ctwnextentry.php
                </td>
                <td>
                    <a href="https://www.cloud4b.space/caketowork/ctwnextentry.php?TAC=1234567890">Link</a>
                </td>
                <td>
                    mit Pipe (|) getrennte Stringkette des nächsten Termins
                </td>
                <td>
                    Dashboard-Ansicht der App
                </td>
                <td>
                    TAC
                </td>
            </tr>
            <tr>
                <td>
                    ctwOutputBoard.php
                </td>
                <td>
                    <a href="https://www.cloud4b.space/caketowork/ctwOutputBoard.php?TAC=1234567890">Link</a>
                </td>
                <td>
                    Webseite mit Liste der bevorstehenden Termine
                </td>
                <td>
                    Board-Ansicht (Webseite)
                </td>
                <td>
                    TAC
                </td>
            </tr>
            <tr>
                <td>
                    ctwOutputBoardContent.php
                </td>
                <td>
                    <a href="https://www.cloud4b.space/caketowork/ctwOutputBoardContent.php?TAC=1234567890">Link</a>
                </td>
                <td>
                    Inhalt (Liste) für das Skript "ctwOutputBoard.php"
                </td>
                <td>
                    Inhalt für Board-Ansicht (Webseite) - wird dynamisch nachgeladen nach jeweils 10 Sekunden
                </td>
                <td>
                    TAC
                </td>
            </tr>
            <tr>
                <td>
                    ctwteammembers.php
                </td>
                <td>
                    <a href="https://cloud4b.space/caketowork/ctwteammembers.php?TAC=1234567890">Link</a>
                </td>
                <td>
                    Json-Array aller Teammitglieder
                </td>
                <td>
                    Input für Teamliste
                </td>
                <td>
                    TAC
                </td>
            </tr>
            <tr>
                <td>
                    deleteuser.php
                </td>
                <td>
                    NA
                </td>
                <td>
                    "" oder sonst "OK"
                </td>
                <td>
                    Löschen eines Users verarbeiten
                </td>
                <td>
                    TAC, UserEmail
                </td>
            </tr>
            <tr>
                <td>
                    delitem.php
                </td>
                <td>
                    NA
                </td>
                <td>
                    int > 0, wenn der User berechtigt ist, sonst ""
                </td>
                <td>
                    Löschen eines Termins verarbeiten
                </td>
                <td>
                    TAC, ACT, Status, UserEmail, ItemId
                </td>
            </tr>
            <tr>
                <td>
                    registration.php
                </td>
                <td>
                    NA
                </td>
                <td>
                    OK / NOK
                </td>
                <td>
                    Verarbeitung der Registrierung
                </td>
                <td>
                    TAC, Username, UserEmail, UserOrg, UserTeam, UserAvatar, UserAlias
                </td>
            </tr>
                <tr>
                    <td>
                        teamstringlist.php
                    </td>
                    <td>
                        <a href="https://cloud4b.space/caketowork/teamstringlist.php?CompBez=Stadt%20Z%C3%BCrich">Link</a>
                    </td>
                    <td>
                        String mit allen Teams (Trennzeichen = Pipe)
                    </td>
                    <td>
                        Input für Team-Spinner
                    </td>
                    <td>
                        CompBez
                    </td>
                </tr>

            </tbody>
        </table>

    </fieldset>

</div>

<div id='nav' class='nav'><a href='https://cloud4b.space/caketowork/help/index.php'>  HOME</a></div>

</body>
</html>


