<?php
$ts = mktime(0, 0, 0, $monat, $tagnummer, $jahr);

$start = getdate($ts);
$beginn = $start['wday'];
$wd = date("w", $ts);
$kw = date("W", $ts);

// UNIX Timestamps für bewegliche Feiertage
$teas = easter_date($jahr);
$himmelfahrt = $teas + 3447400;
$pfingstmontag = $teas + 4320000;
$pfingstsonntag = $teas + 4233600;
$fron = $teas + 5184000;

// Datum
$eastertag = date("j", $teas);
$eastermon = date("n", $teas);
$himmeltag = date("j", $himmelfahrt);
$himmelmon = date("n", $himmelfahrt);
$pfingstsotag = date("j", $pfingstsonntag);
$pfingstsomon = date("n", $pfingstsonntag);
$pfingstmotag = date("j", $pfingstmontag);
$pfingstmomon = date("n", $pfingstmontag);
$frontag = date("j", $fron);
$fronmon = date("n", $fron);

// Feiertagsprüfungen
if ($tagnummer == $eastertag && $monat == $eastermon) {
    $found = "1";
    $ft = "Ostersonntag";
}

$karfreitag = $eastertag - 2;
if ($tagnummer == $karfreitag && $monat == $eastermon) {
    $found = "1";
    $ft = "Karfreitag";
}

$ostermontag = $eastertag + 1;
if ($tagnummer == $ostermontag && $monat == $eastermon) {
    $found = "1";
    $ft = "Ostermontag";
}

if ($tagnummer == $himmeltag && $monat == $himmelmon) {
    $found = "1";
    $ft = "Christi Himmelfahrt";
}

if ($tagnummer == $pfingstsotag && $monat == $pfingstsomon) {
    $found = "1";
    $ft = "Pfingstsonntag";
}

if ($tagnummer == $pfingstmotag && $monat == $pfingstmomon) {
    $found = "1";
    $ft = "Pfingstmontag";
}

if ($tagnummer == $frontag && $monat == $fronmon) {
    $found = "1";
    $ft = "Fronleichnam";
}

// Statische Feiertage aus Datei lesen
$feiertag = "feiertage.txt";
if (file_exists($feiertag)) {
    $search = file($feiertag, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($search as $line) {
        $ziffern = explode("&&", $line);
        if ($tagnummer == $ziffern[0] && $monat == $ziffern[1]) {
            $ft = $ziffern[2];
            $found = "1";
            break;
        }
    }
}
?>