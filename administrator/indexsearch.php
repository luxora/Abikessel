<a href="/abiball/abiballreservierung_step2.php">zur&uuml;ck zur Reservierung</a>

<?php

include ("../header.php");

$searchinput = $_POST['searchforminput'];

$db = new mysqli ($dbhost,$dbusername,$dbpassword,$dbdatabase0);

$sql = "SELECT * FROM abiball  WHERE tisch LIKE '%$searchinput%' OR mail LIKE '%$searchinput%' 
OR nachname LIKE '%$searchinput%'  OR sitz LIKE '%$searchinput%' ORDER BY tisch,sitz";
$erg = $db->query($sql);
$anzahl = mysqli_num_rows($erg);



echo ("<br> <br> Auf den Suchparameter zutreffende Reservierungen: $anzahl von 414 Pl&auml;tzen");
?>

<form method="post" action="abiballbuchungensearch.php" name="searchform">
Suchen: <input type="text" name="searchforminput"/>
</form>

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





