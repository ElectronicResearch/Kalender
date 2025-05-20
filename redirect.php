<?php
error_reporting(E_ALL); 
ini_set('display_errors', 0); 
?>
<?php 

// Sichere Variablenzuweisung
$jahr = $_POST['jahr'] ?? null;
$monat = $_POST['monat'] ?? null;
$kal = $_POST['kal'] ?? null;

// Einfache Kalender (foto und kalender)
if ($kal === 'foto' || $kal === 'kalender') {
    if (empty($jahr) || empty($monat)) {
        echo "Fehler";
        exit;
    }
    include("{$kal}.php");
}

// Komplexe Kalender (leporello, halbjahreskalender, fotokalender)
$komplexe_kalender = [
    'leporello1', 'leporello2',
    'halbjahreskalender1', 'halbjahreskalender2',
    'fotokalender1', 'fotokalender2', 'fotokalender3',
    'fotokalender4', 'fotokalender5', 'fotokalender6'
];

if (in_array($kal, $komplexe_kalender, true)) {
    if (empty($jahr)) {
        echo "Fehler";
        exit;
    }
    include("{$kal}.php");
}
?>
