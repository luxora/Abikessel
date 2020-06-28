<?php

include ("header.php");

echo ("<a href=\"../abizeitung/login.php\">zur&uuml;ck zur Abizeitung</a>");

echo ("


<div id=\"frontpage\" style=\"text-align: center;\">

<h2>Willkommen im Abikessel</h2>

<p>Dieser Assistent wird Sie durch die Sitzplatz-Reservierung f&uuml;r
den Abiturball des Abschlussjahrgangs xxx am xxx f&uuml;hren. <br>

Bitte beachten Sie, dass die Buchungen nur g&uuml;ltig sind, wenn Sie zuvor bei uns eine Karte erworben haben. <br>
Sie k&ouml;nnen f&uuml;r die Anzahl an Karten, die Sie bezahlt haben Sitzpl&auml;tze reservieren. <br> <br>
Sollten &Uuml;berbuchungen auftreten [das heisst, dass Sie 6 Pl&auml;tze buchen, obwohl Sie nur 5 Karten erworben haben], werden alle <b>&uuml;berz&auml;hligen Buchungen gel&ouml;scht. <br></b>
<br>
Bitte beachten Sie, dass nur vollst&auml;ndige Buchungen entgegengenommen werden. <br>
Buchungen ohne Mail Adresse oder Namen sind ung&uuml;ltig. <br>

Sollten sich mehrere Leute gerade im Buchungsvorgang befinden, und somit zur gleichen Zeit einen den gleichen Platz buchen, so gilt die Regel:  <br>
Wer zuerst kommt, mahlt zuerst. <br>
<br>
Bitte kontrollieren Sie deshalb die Buchungstabelle im n&auml;chsten Schritt, welche Pl&auml;tze noch frei sind. <br>
Sollten mehrere Leute den <b>gleichen</b> Platz <b>zur gleichen Zeit</b> gebucht haben, so setzen wir uns mit Ihnen in Verbindung und versuchen einen anderen Platz zu finden. <br>


</p>
");

if ($systemgeschlossen == "JA")
{
echo ("System geschlossen! <br>");
echo ("
</div>



");


include ('footer.php');

exit;

}

else
{
echo ("<form method=\"post\" action=\"abiballreservierung_step2.php\" name=\"abiballintroform\">
<input type=\"submit\" value=\"Lasst die Party beginnen\"/>
</form>

");


echo ("
</div>



");


include ('footer.php');
}

?>
