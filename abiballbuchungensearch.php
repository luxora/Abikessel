<a href="/abiball/abiballreservierung_step2.php">zur&uuml;ck zur Reservierung</a>

<?php

include ("header.php");

$searchinput = $_POST['searchforminput'];

$db = new mysqli ($dbhost,$dbusername,$dbpassword,$dbdatabase0);

$sql = "SELECT * FROM abiball  WHERE tisch LIKE '%$searchinput%' OR nachname LIKE '%$searchinput%'  OR sitz LIKE '%$searchinput%' ORDER BY tisch,sitz";
$erg = $db->query($sql);

$anzahl = mysqli_num_rows($erg);

echo ("<br> <br>Dem Suchbegriff entsprechen $anzahl von 414 Pl&auml;tzen<br>");

$sql2 = "SELECT * FROM abiball ORDER BY tisch,sitz";
$erg2 = $db->query($sql2);

$anzahl2 = mysqli_num_rows($erg2);

echo ("Reservierungen insgesamt: $anzahl2 von 414 Pl&auml;tzen <br>");
$freieplaetze2 = 414 - $anzahl2;
echo ("<br>noch nicht belegte Pl&auml;tze insgesamt: $freieplaetze2 <br> <br>");



?>


<form method="post" action="abiballbuchungensearch.php" name="searchform">
Suchen: <input type="text" name="searchforminput"/> 
<input type="submit" value="Suchen"/>
</form>



<table border="1" >
<th>Nachname:</th> <th>Tisch</th> <th>Sitz</th>
 <?php

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





