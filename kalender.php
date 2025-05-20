<?php
/**
 * Kalender zum Ausdrucken
 * 
 * @author M. Koznjak
 * @copyright 2024 M. Koznjak
 */
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalender zum ausdrucken</title>
    <link href="kalender.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
// Sichere Variablenzuweisung
$monat = $_GET['monat'] ?? date('n');
$jahr = $_GET['jahr'] ?? date('Y');
$tag = $_GET['tag'] ?? null;
$ta = $_GET['ta'] ?? null;
$mo = $_GET['mo'] ?? null;

$monat_text = ["null", "Januar", "Februar", "März", "April", "Mai", "Juni", "Juli", "August", "September", "Oktober", "November", "Dezember"];
$tagname = ["So", "Mo", "Di", "Mi", "Do", "Fr", "Sa", "So"];

// Verbesserte Schaltjahrberechnung
$schaltjahr = ($jahr % 4 == 0 && ($jahr % 100 != 0 || $jahr % 400 == 0));
$monat_tage = [0, 31, ($schaltjahr ? 29 : 28), 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

$start = getdate(mktime(0, 0, 0, $monat, 1, $jahr));
$beginn = $start['wday'];

// Kopfzeile
echo "<table width=\"630\" border=\"0\" cellspacing=\"0\" cellpadding=\"1\">
    <tr>
        <td colspan=\"3\" class=\"head\">{$monat_text[$monat]} $jahr</td>
        <td align=\"center\" class=\"rhkwhead\">KW</td>
    </tr>";

// Kalenderzeilen
$tagnummer = 1;

for($y = 1; $y < ($monat_tage[$monat] + 1); $y++) {
    include("feiertage.php");
    
    if($tagnummer == $tag && $monat == $monat && $wd != "6" && $wd != "0" && $found != "1") {
        echo "<tr>
            <td width=\"18\" align=\"center\" class=\"rvwt\">{$tagname[$beginn]}</td>
            <td width=\"15\" align=\"center\" class=\"rvwt\">$tagnummer</td>
            <td width=\"571\" class=\"rvwt\">&nbsp;</td>
            <td width=\"18\" align=\"center\" class=\"rhkw\">$kw</td>
        </tr>";
        $tagnummer++;
        unset($found);
    } 
    else if($tagnummer == $ta && $monat == $mo && $wd != "6" && $wd != "0" && $found != "1") {
        echo "<tr>
            <td width=\"18\" align=\"center\" class=\"rvwt\">{$tagname[$beginn]}</td>
            <td width=\"15\" align=\"center\" class=\"rvwt\">$tagnummer</td>
            <td width=\"571\" class=\"rvwt\">&nbsp;</td>
            <td width=\"18\" align=\"center\" class=\"rhkw\">$kw</td>
        </tr>";
        $tagnummer++;
        unset($found);
    }
    else if($wd == "0") {
        echo "<tr>
            <td width=\"18\" align=\"center\" class=\"rvft\">{$tagname[$beginn]}</td>
            <td width=\"15\" align=\"center\" class=\"rvft\">$tagnummer</td>
            <td width=\"571\" class=\"rvftklein\" align=\"bottom\">$ft &nbsp;</td>
            <td width=\"18\" align=\"center\" class=\"rhkw\">$kw</td>
        </tr>";
        $tagnummer++;
        unset($found);
        unset($ft);
    }
    else if($wd == "6" || ($found == "1" && $wd != "0")) {
        echo "<tr>
            <td width=\"18\" align=\"center\" class=\"rvft\">{$tagname[$beginn]}</td>
            <td width=\"15\" align=\"center\" class=\"rvft\">$tagnummer</td>
            <td width=\"571\" class=\"rvftklein\" align=\"bottom\">$ft &nbsp;</td>
            <td width=\"18\" align=\"center\" class=\"rhkw\">$kw</td>
        </tr>";
        $tagnummer++;
        unset($found);
        unset($ft);
    }
    else {
        echo "<tr>
            <td width=\"18\" align=\"center\" class=\"rvwt\">{$tagname[$beginn]}</td>
            <td width=\"15\" align=\"center\" class=\"rvwt\">$tagnummer</td>
            <td width=\"571\" class=\"rvwt\">&nbsp;</td>
            <td width=\"18\" align=\"center\" class=\"rhkw\">$kw</td>
        </tr>";
        $tagnummer++;
        unset($found);
        unset($ft);
    }
}
echo "</table>";
?>
</body>
</html>
