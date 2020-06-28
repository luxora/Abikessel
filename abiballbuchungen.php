<a href="/abiball/abiballreservierung_step2.php">zur&uuml;ck zur Reservierung</a>

<?php

include ("header.php");



$db = new mysqli ($dbhost,$dbusername,$dbpassword,$dbdatabase0);



?>

<form method="post" action="abiballbuchungensearch.php" name="searchform">
Suchen: <input type="text" name="searchforminput"/> 
<input type="submit" value="Suchen"/>
</form>

<table border="1" >
<th>Nachname:</th> <th>Tisch</th> <th>Sitz</th>
 <?php


$sql = "SELECT * FROM abiball ORDER BY tisch,sitz";
$erg = $db->query($sql);

$anzahl = mysqli_num_rows($erg);

echo ("Reservierungen insgesamt: $anzahl von 414 Pl&auml;tzen");
$freieplaetze = 414 - $anzahl;
echo ("<br>noch nicht belegte Pl&auml;tze: $freieplaetze <br> <br>");

while ($row = $erg->fetch_array())
{

echo ("<tr>");

echo ("<td>");
echo ($row['nachname']);
echo ("</td>");

/*
echo ("<td>");
echo ($row['mail']);
echo ("</td>");
*/
echo ("<td>");
echo ($row['tisch']);
echo ("</td>");

echo ("<td>");
echo ($row['sitz']);
echo ("</td>");

echo ("</tr>");


}





?>

 
 
  <!-- usw. andere Zeilen der Tabelle -->
</table>





