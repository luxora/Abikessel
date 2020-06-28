<a href="/abiball/abiballreservierung_step2.php">zur&uuml;ck zur Reservierung</a>

<?php

include ("../header.php");

if ($administrationgeschlossen = "JA")
{
echo ("Administration geschlossen! <br>");
exit;
}


$db = new mysqli ($dbhost,$dbusername,$dbpassword,$dbdatabase0);

$sql = "SELECT * FROM abiball ORDER BY tisch,sitz";
$erg = $db->query($sql);

$anzahl = mysqli_num_rows($erg);

echo ("<br> <br> Reservierungen insgesamt: $anzahl von 414 Pl&auml;tzen");
$freieplaetze = 414 - $anzahl;
echo ("<br>noch nicht belegte Pl&auml;tze: $freieplaetze <br> <br>");
?>

<form method="post" action="indexsearch.php" name="searchform">
Suchen: <input type="text" name="searchforminput"/> 
<input type="submit" value="Suchen"/>
</form>

<form method="post" action="indexorder.php" name="orderform">
Ordnen nach: 
<select name="orderselection">
<option>nachname</option>
<option>mail</option>
<option>tisch</option>
<option>sitz</option>
<option>timestamp</option>
</select>
<input type="submit" value="Ordnen"/>
</form>
<br> <br>

<table border="1" >
<th>Nachname:</th> <th>Mail</th> <th>Tisch</th> <th>Sitz</th> <th>Buchungszeitstempel:</th>
 <?php

while ($row = $erg->fetch_array())
{

echo ("<tr>");

echo ("<td>");
echo ($row['nachname']);
echo ("</td>");


echo ("<td>");
echo ($row['mail']);
echo ("</td>");

echo ("<td>");
echo ($row['tisch']);
echo ("</td>");

echo ("<td>");
echo ($row['sitz']);
echo ("</td>");


echo ("<td>");
echo ($row['timestamp']);
echo ("</td>");

echo ("</tr>");


}





?>

 
 
  <!-- usw. andere Zeilen der Tabelle -->
</table>





