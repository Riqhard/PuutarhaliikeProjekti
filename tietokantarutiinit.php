<?php
$palvelin = "localhost";
$kayttaja = "root";
$salasana = "";
$tietokanta = $tietokanta ?? "autokanta"; // (isset($tietokanta)) ? $tietokanta : "autokanta"; SAMA ASIA
$yhteys = new mysqli($palvelin, $kayttaja, $salasana, $tietokanta);
if ($yhteys->connect_error) {
   die("Yhteyden muodostaminen epäonnistui: " . $yhteys->connect_error);
}
$yhteys->set_charset("utf8");
function mysqli_my_quary($quary) {
    $yhteys = $GLOBALS['yhteys'];
    $result = false;
    try{
        $result= $yhteys->query($quary);
    }
    catch (Exception $e) {
        echo "Virhe kyselyssä: " . $e->getMessage();
        debuggeri("Virhe $yhteys->errno kyselyssä $quary $e" . $e->getMessage());

    }

    return $result;
}

?>