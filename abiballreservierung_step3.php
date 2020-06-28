<?php

include ("header.php");

if ($systemgeschlossen == "JA")
{
echo ("<a href=\"../abiball/abiballreservierung_step1.php\">zur&uuml;ck zum Intro</a>");
echo ("System geschlossen");

echo ("<br> <br>");
include ('footer.php');
exit;

}

else
{

echo ("<a href=\"../abiball/abiballreservierung_step1.php\">zur&uuml;ck zum Intro</a>");



echo ("<div id=\"bookingfinal\" style=\"text-align: center;\">
");


// WRITE TO DB:

$db = new mysqli ($dbhost,$dbusername,$dbpassword,$dbdatabase0);

$nachname = $_POST['nachnameinput'];
$mail = $_POST['mailinput'];
$tisch = $_POST['tableselect'];
$sitz = $_POST['sitzplatzselect'];

// CHECK IF VALUE IS EMPTY:
if ($nachname == "" || $mail== "" || $tisch == "" || $sitz== "")
{
echo ("<div id=\"onevalueisempty\" style=\"text-align: center; border: 3px solid red; color: red; font-weight: bold;\">
Die Eingabe war ung&uuml;ltig! <br>
Bitte geben Sie einen Namen, eine Mail Adresse sowie Tisch und Sitzplatz an. <br>

</div> <br>");
echo ("<a href=\"../abiball/abiballreservierung_step2.php\">zur&uuml;ck zur Auswahl</a>");

exit;

}

// CHECK IF SEAT AND TABLE HAS ALREADY BEEN BOOKED:
$sqlb = "SELECT nachname FROM abiball WHERE tisch='$tisch' AND sitz='$sitz'";
$erg = $db->query($sqlb) or die ("SQL Query Fehler in abiballreservierung_step3.php (die 1)");
while ($row = $erg->fetch_array())
{
$nachnamealreadybooked = $row['nachname'];
}
if (isset($nachnamealreadybooked))
{
echo ("<div id=\"alreadybooked\" style=\"text-align: center; border: 3px solid red; color: red; font-weight: bold;\">Sie k&ouml;nnen diesen Sitzplatz nicht buchen. <br>Dieser Sitzplatz ist bereits von $nachnamealreadybooked belegt!</div> <br>");
echo ("<a href=\"../abiball/abiballreservierung_step2.php\">zur&uuml;ck zur Auswahl</a>");

exit;
}

// SAVE AND PRINT PERSONAL DATA:
echo ("Folgende Daten werden jetzt im System gespeichert: <br>");

echo ("
 <br>
<div id=\"datatable\" style=\"margin-left: 40%;\">
<table border=\"1\">
<th>Nachname:</th> <th>Mail:</th> <th>Tisch:</th> <th>Sitzplatz:</th>

<tr>
<td> $nachname
</td>




<td> $mail
</td>



<td> $tisch
</td>



<td> $sitz
</td>



</table>

</div>

");



echo ("<br> <br>");
$date = date("d.m.Y");
$time = date("H:i:s");

$timestamp = $date." ".$time;
$sql = "INSERT INTO abiball (nachname,mail,tisch,sitz,timestamp) VALUES ('$nachname','$mail','$tisch','$sitz','$timestamp')";


$erg = $db->query($sql) or die ("
BEI DER BUCHUNG IST EIN FEHLER AUFGETRETEN! <br> BITTE WIEDERHOLEN SIE DIE BUCHUNG UND KONTROLLIEREN IHRE EINGABEN  <br>[abiballreservierung_step3.php (die 2)]<br>


");

/*
include ("mailuserdata.php");
include ("sendmail.php");
*/

// BUCHUNGSSLOT FREIGEBEN:

$sqlslotuse = "UPDATE buchungsslot SET free='JA'";
$db->query($sqlslotuse) or die ("Fehler in abiballreservierung_step3.php (die 3)");


// MELDUNG:

echo ("Ihre Buchung wurde im System gespeichert. <br>

Bitte vergewissern Sie sich, dass die Buchung hier ordnungsgem&auml;ss eingetragen wurde: <a href=\"../abiball/abiballbuchungen.php\">erfolgreiche Buchungen</a>
 <br>
Sollte dies nicht der Fall sein, so wiederholen Sie bitte die Buchung. <br>

<a href=\"../abiball/abiballreservierung_step1.php\">erneute Buchung bzw. Buchung wiederholen</a> <br>
<br> <br>
Erfolgreiche Sitzplatzreservierungen k&ouml;nnen auch hier eingesehen werden: <br>
<a href=\"../abiball/abiballbuchungen.php\">Sitzplatzreservierungen einsehen</a>

<br> <br>
<a href=\"../abiball/abiballreservierung_step1.php\">zur&uuml;ck zur Buchungsstartseite</a> <br>

<a href=\"../abizeitung/login.php\">zur&uuml;ck zur Abizeitung</a> <br>
");




echo ("</div>");

include ('footer.php');

} // system geschlossen else klammer

?>
