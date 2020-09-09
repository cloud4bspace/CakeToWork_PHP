<!DOCTYPE html>

<html lang="de">

<head>
    <title>MySQL-Tabellen</title>
    <meta charset="utf-8">
    <meta name="description" content="Übersicht der verwendeten MySQL-Tabellen>
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
        <legend><img src="../img/icn_server.png"></legend>
        <h1>CTW-spezifische MySQL-Tabellen</h1>
        <h2>Datenbank: usr_web116_5 (https://144.hosttech.eu/phpMyAdmin/index.php | User: web116)</h2>
        <table>
            <thead>
            <tr>
                <th>
                    Tabelle
                </th>
                <th>
                    Erklärung
                </th>
                <th>
                    Index
                </th>
                <th>
                    Datenfelder
                </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    ctwCompany
                </td>
                <td>
                    Liste aller Firmen von denen mindestens ein Team die App verwendet
                </td>
                <td>
                    CompId
                </td>
                <td><ul>
                        <li>`CompId` int(11) NOT NULL</li>
                        <li>`CompBezeichnung` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL</li>
                        <li>`CompSitz` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL</li>
                        <li>`CompLogo` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL</li>
                    </ul>
                </td>
            </tr>

            <tr>
                <td>
                    ctwTeam
                </td>
                <td>
                    Liste aller Teams pro Firma
                </td>
                <td>
                    TeamId
                </td>
                <td><ul><li>`TeamId` int(11) NOT NULL</li>
                        <li>`TeamCompId` int(11) NOT NULL</li>
                        <li>`TeamBezeichnung` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL</li>
                        <li>`TeamOrt` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL</li>
                        <li>`TeamAccessCode` varchar(10) NOT NULL</li>
                    </ul>
                </td>
            </tr>

            <tr>
                <td>
                    ctwMember
                </td>
                <td>
                    Mitarbeitende, welche sich für ein Team registriert haben
                </td>
                <td>
                    MemberID
                </td>
                <td><ul><li>`MemberID` int(11) NOT NULL</li>
                        <li>`MemberTeamId` int(11) NOT NULL</li>
                        <li>`MemberEmail` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL</li>
                        <li>`MemberName` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL</li>
                        <li>`MemberAlias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL</li>
                        <li>`MemberSex` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL</li>
                        <li>`MemberAvatar` varchar(255) DEFAULT NULL</li>
                        <li>`MemberAdmin` int(11) NOT NULL DEFAULT '0'</li>
                        <li>`MemberPhoto` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL</li>
                        <li>`MemberAdded` timestamp NULL DEFAULT NULL</li>
                        <li>`MemberLastChange` timestamp NULL DEFAULT NULL</li>
                    </ul>
                </td>
            </tr>

            <tr>
                <td>
                    ctwList
                </td>
                <td>
                    Terminliste mit den von Mitarbeitenden angemeldeten Znünis
                </td>
                <td>
                    ListId
                </td>
                <td><ul>
                        <li>`ListId` int(11) NOT NULL</li>
                        <li>`ListMemberEmail` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL</li>
                        <li>`ListDate` date NOT NULL</li>
                        <li>`ListDaytime` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL</li>
                        <li>`ListReason` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL</li>
                        <li>`ListFoodAndBev` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL</li>
                        <li>`ListDescription` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL</li>
                        <li>`ListLocation` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL</li>
                        <li>`ListImage` varchar(255) NOT NULL</li>
                        <li>`ListAngemeldet` int(11) NOT NULL DEFAULT '0'</li>
                        <li>`ListAbgemeldet` int(11) NOT NULL DEFAULT '0'</li>
                        <li>`ListUnentschlossen` int(11) NOT NULL DEFAULT '0'</li>
                        <li>`ListAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP</li>
                        <li>`ListLastChange` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'</li>
                    </ul>
                </td>
            </tr>

            <tr>
                <td>
                    ctwRegistration
                </td>
                <td>
                    An- oder Abmeldungen von Mitarbeitenden für einen jeweiligen Termin
                </td>
                <td>
                    RegistrationID
                </td>
                <td><ul><li>`RegistrationID` int(11) NOT NULL</li>
                        <li>`RegistrationListID` int(11) NOT NULL</li>
                        <li>`RegistrationMemberEmail` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL</li>
                        <li>`RegistrationAngemeldet` int(11) NOT NULL</li>
                        <li>`RegistrationAbgemeldet` int(11) NOT NULL</li>
                    </ul>
                </td>
            </tr>

            <tr>
                <td>
                    ctwChat
                </td>
                <td>
                    Chat-Mitteilung, welche im Teamchat übermittelt wurden
                </td>
                <td>
                    ChatID
                </td>
                <td><ul>
                        <li>`ChatID` int(11) NOT NULL</li>
                        <li>`ChatMember` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL</li>
                        <li>`ChatMessage` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL</li>
                        <li>`ChatTimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP</li>
                    </ul>
                </td>
            </tr>

            </tbody>
        </table>

    </fieldset>

</div>

<div id='nav' class='nav'><a href='https://cloud4b.space/caketowork/help/index.php'>  HOME</a></div>

</body>
</html>


