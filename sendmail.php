<?php

// ########## SEND MAILS:############



/* ##### GENERATE TEXT ###### */


$veranstalteremail = "xxx";
$empfaenger = $mail;
$absendername = "Ticketsystem Abiball xxxx"; // vll lieber sowas wie "Ticketsystem"
$absendermail = "abiball@t-online.de";
//$betrefffuerveranstalter = "Platz $sitzplatz  Buchungsbestaetigung";
$betreff = "Sitzplatzreservierung Abiball ($tisch - $sitz)"; // so ists besser  auch für den buchenden ... dann sieht er schon im Betreff obs der richtige Platz ist.
$text = "

Sehr geehrte Damen und Herren,

Sie haben gerade online einen Sitzplatz fuer den Abiturball des Abschlussjahrgangs xxx am xxx reserviert.
Der Abiturball findet im xxx statt.
Eine Kopie dieser Mail wurde an den Veranstalter weitergeleitet.
Bitte beachten Sie, dass diese Buchung nur gueltig ist, wenn Sie bereits die Anzahl an Karten erworben haben,
fuer die Sie jetzt die Plaetze reserviert haben.
Den Veranstaltungstermin ist der xxxx



Bei Fragen wenden Sie sich bitte an xxx

Vielen Dank fuer Ihre Buchung!


-------------------------------------



Nachname: $nachname
Mail: $mail
Tisch: $tisch
Sitz: $sitz


-------------------------------------




Mit freundlichen Gruessen

xxxx (AK Abiball)


--- Abikessel 1.0 ---

";


/* ################ SEND MAILS ####################*/

 
    
/* ## THIS IS A PHP BASED MAIL OPTION */


require_once 'phpmailer/jmail.php';

// create instance of new mail
$mail = new JMail();

/**
 *  set the smtp, set the password:
 * @param String $auth   =    use password (true?/false?)
 * @param String $host   =    your smtp host (zb smtp.gmail.com)
 * @param String $user   =    your smtp username 
 * @param String $pass   =    your smtp password
 * @param String $secure =    '','tls','ssl'
 * @param Integer $port  =    the port to connect to via fsockopen();
 *  
 */

require ("mailuserdata.php");


$mail->useSMTP($iauth, $ihost,$iuser, $ipass,$isecurity,$iport);






/**
 *  send an email:
 * @param String $from         =    your mail address (also your address for replies)
 * @param String $fromname     =    your name
 * @param String $recipient    =    the persons mail you want to send your message to
 * @param String $subject      =    the subject of your mail
 * @param String $mail_body    =    the body of your mail
 *  
 */

/** SEND NORMAL MAIL TO PERSON WHO HAS BOOKED **/



/** SEND  MAIL TO ORGANIZER: **/



// $mail->sendMail($from = $absendermail,$fromname = $absendername,$recipient = $veranstalteremail ,$subject = $betrefffuerveranstalter,$mail_body = $text."\n"."E-Mail Adresse fuer Rueckfragen: ".$email." \n");


/* SEND NORMAL MAIL TO PERSON WHO HAS BOOKED **/



$mail->sendMail($from=$absendermail,$fromname=$absendername, $recipient = $empfaenger,$subject = $betreff, $mail_body = $text, $htmlmode = false, $bcc = $veranstalteremail);



/* END TESTING WITH EMAIL ACC.*/




?>

