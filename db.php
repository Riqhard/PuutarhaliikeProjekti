<?php
try {
   $yhteys = new mysqli($db_server, $db_username, $db_password, $DB);
   if ($yhteys->connect_error) {
       die("Yhteyden muodostaminen epäonnistui: " . $yhteys->connect_error);
       }
   $yhteys->set_charset("utf8");
   }
catch (Throwable $e) {
   die("Virhe yhteyden muodostamisessa: " . $e->getMessage());
   }

function db_connect(){
return $GLOBALS['yhteys'];   
}
?>