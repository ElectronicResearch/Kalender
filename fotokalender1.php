<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Electronic Research Kalender</title>
<link href="fotokalender.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
if (!empty($HTTP_POST_VARS)) {extract($HTTP_POST_VARS);}

 $monat_text = array("null","Januar","Februar","M&auml;rz","April","Mai","Juni","Juli","August","September","Oktober","November","Dezember");
 $tagname = array("So","Mo","Di","Mi","Do","Fr","Sa","So");
 $schaltjahr = gettype($jahr/4);
 if($schaltjahr=="integer") {
    $monat_tage = array(0,31,29,31,30,31,30,31,31,30,31,30,31);
    } else {
      $monat_tage = array(0,31,28,31,30,31,30,31,31,30,31,30,31);
      }
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
    <td width="20%" align="right" class="front"><?php echo "$jahr"; ?>&nbsp;</td>
    <td width="50%" height="50">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="15%" valign="top">
      <?php 

 $monat = "1";
 $tag = "1";
 
 $start = getdate(mktime(0,0,0,$monat,1,$jahr)); 
 //Werktagnummer 1=Mo - 0=So
 $beginn = "$start[wday]"; 
 
 //Kopfzeile
 echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"1\">
  <tr>
    <td colspan=\"4\"  class=\"head\">$monat_text[$monat]</td>
  </tr>";
//Kalenderzeilen
 $tagnummer = 1; 

for($y=1;$y<($monat_tage[$monat]+1);$y++) 
 {
include("feiertage.php");
//Montag Werktag
		if($wd == "1" && $found != "1") {
     echo "<tr>
    <td width=\"1%\" class=\"wtfront\">$tagname[$beginn]</td>
    <td width=\"1%\"  class=\"wtfront\" align=\"right\">$tagnummer</td>
    <td width=\"97%\"  class=\"wtfront\">&nbsp;</td>
    <td width=\"1%\"   class=\"kw\">$kw</td>
  </tr>";  
$tagnummer++;
          } 
//Montag Feiertag
else if($wd == "1" && $found == "1") {
     echo "<tr>
    <td width=\"1%\"  class=\"ftfront\">$tagname[$beginn]</td>
    <td width=\"1%\"  class=\"ftfront\" align=\"right\">$tagnummer</td>
    <td width=\"97%\"  class=\"ftklein\"  align=\"bottom\">$ft &nbsp;</td>
    <td width=\"1%\"   class=\"kwft\">$kw</td>
  </tr>";  
$tagnummer++;
unset($found);
} 		  
else if($wd == "0" or $wd == "6" or $found == "1" and $wd != "1" ) {
//Sonntag, Samstag oder Feiertag
  echo "<tr>
    <td width=\"1%\"  class=\"ftfront\">$tagname[$beginn]</td>
    <td width=\"1%\"  class=\"ftfront\" align=\"right\">$tagnummer</td>
    <td width=\"97%\"  class=\"ftklein\"  align=\"bottom\">$ft &nbsp;</td>
    <td width=\"1%\"   class=\"kwft\">&nbsp;</td>
  </tr>";  
		  $tagnummer++; 
unset($found);
unset($ft);
 		  }
		  

		//restl. Werktage 
else { 
echo "<tr>
    <td width=\"1%\"  class=\"wtfront\">$tagname[$beginn]</td>
    <td width=\"1%\"  class=\"wtfront\" align=\"right\">$tagnummer</td>
    <td width=\"97%\"  class=\"wtfront\">&nbsp;</td>
    <td width=\"1%\"   class=\"kw\">&nbsp;</td>
  </tr>"; $tagnummer++;
unset($found);
unset($ft);

}}
echo "</table>";
?>
      <br>
</td>
    <td colspan="2" valign="top">&nbsp;</td>
    <td width="15%" valign="top">      <?php 

 $monat = "2";
 $tag = "1";
 
 $start = getdate(mktime(0,0,0,$monat,1,$jahr)); 
 //Werktagnummer 1=Mo - 0=So
 $beginn = "$start[wday]"; 
 
 //Kopfzeile
 echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"1\">
  <tr>
    <td colspan=\"4\"  class=\"head\">$monat_text[$monat]</td>
  </tr>";
//Kalenderzeilen
 $tagnummer = 1; 

for($y=1;$y<($monat_tage[$monat]+1);$y++) 
 {
include("feiertage.php");
//Montag Werktag
		if($wd == "1" && $found != "1") {
     echo "<tr>
    <td width=\"1%\" class=\"wtfront\">$tagname[$beginn]</td>
    <td width=\"1%\"  class=\"wtfront\" align=\"right\">$tagnummer</td>
    <td width=\"97%\"  class=\"wtfront\">&nbsp;</td>
    <td width=\"1%\"   class=\"kw\">$kw</td>
  </tr>";  
$tagnummer++;
          } 
//Montag Feiertag
else if($wd == "1" && $found == "1") {
     echo "<tr>
    <td width=\"1%\"  class=\"ftfront\">$tagname[$beginn]</td>
    <td width=\"1%\"  class=\"ftfront\" align=\"right\">$tagnummer</td>
    <td width=\"97%\"  class=\"ftklein\"  align=\"bottom\">$ft &nbsp;</td>
    <td width=\"1%\"   class=\"kwft\">$kw</td>
  </tr>";  
$tagnummer++;
unset($found);
} 		  
else if($wd == "0" or $wd == "6" or $found == "1" and $wd != "1" ) {
//Sonntag, Samstag oder Feiertag
  echo "<tr>
    <td width=\"1%\"  class=\"ftfront\">$tagname[$beginn]</td>
    <td width=\"1%\"  class=\"ftfront\" align=\"right\">$tagnummer</td>
    <td width=\"97%\"  class=\"ftklein\"  align=\"bottom\">$ft &nbsp;</td>
    <td width=\"1%\"   class=\"kwft\">&nbsp;</td>
  </tr>";  
		  $tagnummer++; 
unset($found);
unset($ft);
 		  }
		  

		//restl. Werktage 
else { 
echo "<tr>
    <td width=\"1%\"  class=\"wtfront\">$tagname[$beginn]</td>
    <td width=\"1%\"  class=\"wtfront\" align=\"right\">$tagnummer</td>
    <td width=\"97%\"  class=\"wtfront\">&nbsp;</td>
    <td width=\"1%\"   class=\"kw\">&nbsp;</td>
  </tr>"; $tagnummer++;
unset($found);
unset($ft);

}}
echo "</table>";
?>
      <br>
</span><span class="copy">&copy; electronic-research.de</span></td>
  </tr>
</table>
</body>
</html>
