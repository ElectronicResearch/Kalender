<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electronic Research Kalender</title>
    <link href="fotokalender.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
// Sichere Variablenzuweisung
$jahr = $_POST['jahr'] ?? date('Y');

$monat_text = ["null", "Januar", "Februar", "März", "April", "Mai", "Juni", "Juli", "August", "September", "Oktober", "November", "Dezember"];
$tagname = ["So", "Mo", "Di", "Mi", "Do", "Fr", "Sa", "So"];

// Verbesserte Schaltjahrberechnung
$schaltjahr = ($jahr % 4 == 0 && ($jahr % 100 != 0 || $jahr % 400 == 0));
$monat_tage = [0, 31, ($schaltjahr ? 29 : 28), 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
?>
<table width="90%" border="0" align="center" cellpadding="1" cellspacing="0">
    <tr>
        <td>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
        </td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td class="front">&nbsp;</td>
        <td width="20%" align="right" class="front"><?php echo $jahr; ?>&nbsp;</td>
        <td width="50%" height="50">&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td width="15%" valign="top">
            <?php
            $monat = "11";
            $tag = "1";
            
            $start = getdate(mktime(0, 0, 0, $monat, 1, $jahr));
            $beginn = $start['wday'];
            
            // Kopfzeile
            echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"1\">
                <tr>
                    <td colspan=\"4\" class=\"head\">{$monat_text[$monat]}</td>
                </tr>";
            
            // Kalenderzeilen
            $tagnummer = 1;
            
            for($y = 1; $y < ($monat_tage[$monat] + 1); $y++) {
                include("feiertage.php");
                
                // Montag Werktag
                if($wd == "1" && $found != "1") {
                    echo "<tr>
                        <td width=\"1%\" class=\"wtfront\">{$tagname[$beginn]}</td>
                        <td width=\"1%\" class=\"wtfront\" align=\"right\">$tagnummer</td>
                        <td width=\"97%\" class=\"wtfront\">&nbsp;</td>
                        <td width=\"1%\" class=\"kw\">$kw</td>
                    </tr>";
                    $tagnummer++;
                }
                // Montag Feiertag
                else if($wd == "1" && $found == "1") {
                    echo "<tr>
                        <td width=\"1%\" class=\"ftfront\">{$tagname[$beginn]}</td>
                        <td width=\"1%\" class=\"ftfront\" align=\"right\">$tagnummer</td>
                        <td width=\"97%\" class=\"ftklein\" align=\"bottom\">$ft &nbsp;</td>
                        <td width=\"1%\" class=\"kwft\">$kw</td>
                    </tr>";
                    $tagnummer++;
                    unset($found);
                }
                // Sonntag, Samstag oder Feiertag
                else if($wd == "0" || $wd == "6" || ($found == "1" && $wd != "1")) {
                    echo "<tr>
                        <td width=\"1%\" class=\"ftfront\">{$tagname[$beginn]}</td>
                        <td width=\"1%\" class=\"ftfront\" align=\"right\">$tagnummer</td>
                        <td width=\"97%\" class=\"ftklein\" align=\"bottom\">$ft &nbsp;</td>
                        <td width=\"1%\" class=\"kwft\">&nbsp;</td>
                    </tr>";
                    $tagnummer++;
                    unset($found);
                    unset($ft);
                }
                // Restliche Werktage
                else {
                    echo "<tr>
                        <td width=\"1%\" class=\"wtfront\">{$tagname[$beginn]}</td>
                        <td width=\"1%\" class=\"wtfront\" align=\"right\">$tagnummer</td>
                        <td width=\"97%\" class=\"wtfront\">&nbsp;</td>
                        <td width=\"1%\" class=\"kw\">&nbsp;</td>
                    </tr>";
                    $tagnummer++;
                    unset($found);
                    unset($ft);
                }
            }
            echo "</table>";
            ?>
            <br>
        </td>
        <td colspan="2" valign="top">&nbsp;</td>
        <td width="15%" valign="top">
            <?php
            $monat = "12";
            $tag = "1";
            
            $start = getdate(mktime(0, 0, 0, $monat, 1, $jahr));
            $beginn = $start['wday'];
            
            // Kopfzeile
            echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"1\">
                <tr>
                    <td colspan=\"4\" class=\"head\">{$monat_text[$monat]}</td>
                </tr>";
            
            // Kalenderzeilen
            $tagnummer = 1;
            
            for($y = 1; $y < ($monat_tage[$monat] + 1); $y++) {
                include("feiertage.php");
                
                // Montag Werktag
                if($wd == "1" && $found != "1") {
                    echo "<tr>
                        <td width=\"1%\" class=\"wtfront\">{$tagname[$beginn]}</td>
                        <td width=\"1%\" class=\"wtfront\" align=\"right\">$tagnummer</td>
                        <td width=\"97%\" class=\"wtfront\">&nbsp;</td>
                        <td width=\"1%\" class=\"kw\">$kw</td>
                    </tr>";
                    $tagnummer++;
                }
                // Montag Feiertag
                else if($wd == "1" && $found == "1") {
                    echo "<tr>
                        <td width=\"1%\" class=\"ftfront\">{$tagname[$beginn]}</td>
                        <td width=\"1%\" class=\"ftfront\" align=\"right\">$tagnummer</td>
                        <td width=\"97%\" class=\"ftklein\" align=\"bottom\">$ft &nbsp;</td>
                        <td width=\"1%\" class=\"kwft\">$kw</td>
                    </tr>";
                    $tagnummer++;
                    unset($found);
                }
                // Sonntag, Samstag oder Feiertag
                else if($wd == "0" || $wd == "6" || ($found == "1" && $wd != "1")) {
                    echo "<tr>
                        <td width=\"1%\" class=\"ftfront\">{$tagname[$beginn]}</td>
                        <td width=\"1%\" class=\"ftfront\" align=\"right\">$tagnummer</td>
                        <td width=\"97%\" class=\"ftklein\" align=\"bottom\">$ft &nbsp;</td>
                        <td width=\"1%\" class=\"kwft\">&nbsp;</td>
                    </tr>";
                    $tagnummer++;
                    unset($found);
                    unset($ft);
                }
                // Restliche Werktage
                else {
                    echo "<tr>
                        <td width=\"1%\" class=\"wtfront\">{$tagname[$beginn]}</td>
                        <td width=\"1%\" class=\"wtfront\" align=\"right\">$tagnummer</td>
                        <td width=\"97%\" class=\"wtfront\">&nbsp;</td>
                        <td width=\"1%\" class=\"kw\">&nbsp;</td>
                    </tr>";
                    $tagnummer++;
                    unset($found);
                    unset($ft);
                }
            }
            echo "</table>";
            ?>
            <br>
            <span class="copy">&copy; M. Koznjak</span>
        </td>
    </tr>
</table>
</body>
</html>
