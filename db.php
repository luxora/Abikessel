<?php

// bestimmen ob localhost oder cwsurf - je nachdem Datenbankhost setzen
$ip = getenv("REMOTE_ADDR");
$host = "";
$host = gethostbyaddr($ip);

//echo ("Datenbankhost: $host");

if ($host == "localhost")
{
$dbhost = "localhost";
}
else
{$dbhost = "db4.";}


$dbusername = "";
$dbpassword = "";
$dbdatabase0 = "";

$dbdatabase1 = "";
$dbdatabase2 = "";
$dbdatabase3 = "";
$dbdatabase4 = "";

// Pfad um das Backup zu hosten:
$dbbackup   = "/home/www/cw";

$authormail = "";
$backupmailsender = "abi@";

$abikesselversion = "1.2";



?>
