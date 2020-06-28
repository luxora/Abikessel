<?php

include ("header.php");


if ($systemgeschlossen == "JA")
{
echo ("System geschlossen! <br>");



include ('footer.php');

exit;

}

else
{



echo ("<a href=\"../abiball/abiballreservierung_step1.php\">zur&uuml;ck zum Intro</a>");

/*echo ("<div id=\"\">Momentan leider noch nicht verf&uuml;gbar bzw. in der Entwicklung! Alle Buchungen sind ung&uuml;ltig! <br>");*/

// DELETE BOOKINGS WITH EMPTY SURNAME AND EMPTY MAIL ADRESS:
$db = new mysqli ($dbhost,$dbusername,$dbpassword,$dbdatabase0);
$sqldel = "DELETE FROM abiball WHERE nachname='' AND mail=''";
$erg = $db->query($sqldel);


// CHECK FREE SLOT:

$sql = "SELECT free FROM buchungsslot";
$erg = $db->query($sql) or die ("Fehler in abiballresevierung_step2.php (die 1) - Freier Buchungsslot konnte nicht ermittelt werden! <br> Die Buchung kann eventuell mit Einschr&auml;nkungen fortgesetzt werden. <br> Sie erhalten eine Meldung, wenn ihr Sitzplatz  bereits durch einen anderen Benutzer belegt wurde. <br>");

while ($rowa = $erg->fetch_array())
{
$slotstatus = $rowa['free'];
}

//echo ($slotstatus);

// SLOT IN USE -> MESSAGE:
if ($slotstatus == "NEIN")
{
echo (" <br> <br><div id=\"systeminuse\" style=\"text-align: center; border: 3px solid red; color: red; font-weight: bold;\">
Der Buchungsslot ist gerade durch einen anderen Benutzer belegt. <br>
Sollte Ihr Sitzplatz durch die andere Person zuvor gebucht werden, so erhalten Sie eine Fehlermeldung. <br>
Wenn Sie die Buchungstabelle aktualisieren m&ouml;chten bzw. &uuml;berpr&uuml;fen m&ouml;chten ob der Buchungsslot wieder freigegeben wurde,
klicken Sie bitte hier: <br>
<a href=\"../abiball/abiballreservierung_step2.php\">Buchungsslot aktualisieren</a>
</div> <br>");
}
// ELSE SLOT NOT IN USE -> WRITE SLOT IS USED ["FOR THIS BOOKING NOW"] TO DB:
else
{
$sqlslotuse = "UPDATE buchungsslot SET free='NEIN'";
$db->query($sqlslotuse) or die ("Fehler in abiballreservierung_step2.php (die 2)");
}




echo ("<div id=\"sitzplan\" style=\"text-align: center !important;\"> 
<br>
Die Verteilung der Sitzpl&auml;tze entnehmen Sie bitte dem Plan. <br>
<img src=\"/abiball/images/abiball.jpg\" />
<br> <br>
Sollte das Bild nicht gross genug sein, klicken Sie bitte hier: <a href=\"/abiball/images/abiball.jpg\">Bild wird vergr&ouml;ssert</a> <br>
Zur weiteren Vergr&ouml;sserung benutzen Sie bitte Ihren Webbrowser <br>
<br>
Belegte Pl&auml;tze k&ouml;nnen hier eingesehen werden: <a href=\"abiballbuchungen.php\">Belegte Pl&auml;tze</a>
<br>
</div>


");


echo ("

<form method=\"post\" action=\"abiballreservierung_step3.php\" name=\"abiballreservierungform\">


<div id=\"inputforms\" style=\"text-align: center !important;\">
 <br> <br>
Nachname: <input type=\"text\" name=\"nachnameinput\"/><br>
E-Mail: <input type=\"text\" name=\"mailinput\"/><br>
<br>
Tisch: <select name=\"tableselect\">
");

for ($i = 1; $i < 70; $i++)
{echo ("<option>$i</option>");}

echo ("
</select>  <br>



Sitzplatz: 

<select name=\"sitzplatzselect\">


");

for ($i = 1; $i < 7; $i++)
{echo ("<option>$i</option>");}




echo ("
</select>

<br> <br>
Mit einem Klick auf Sitzplatz reservieren best&auml;tigen Sie, eine Karte erworben zu haben. <br>
Die Reservierung ist verbindlich.<br>
 <br>
<input type=\"submit\" value=\"Sitzplatz reservieren\" />



</form>

</div>

<br>





");


include ('footer.php');

} // system geschlossen else klammer

?>
