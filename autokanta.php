<?php
include 'debuggeri.php';
include 'tietokantarutiinit.php';
register_shutdown_function('debuggeri_shutdown');


$quary = "INSERT INTO sakko (tiedot1, tiedot2, tiedot3, tiedot4)FROM Henkilo LEFT JOIN auto ON omistaja = hetu WHERE omistaja = '080173-169T'";

$quary = "
    INSERT INTO sakko (tiedot1, tiedot2, tiedot3, tiedot4)
    SELECT henkilo.tiedot1, henkilo.tiedot2, auto.tiedot3, auto.tiedot4
    FROM Henkilo
    LEFT JOIN auto ON Henkilo.hetu = auto.omistaja
    WHERE Henkilo.hetu = '080173-169T'
";

$result = mysqli_my_quary($quary);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='hakutulos'><div class='title'>" . $row["title"]. "</div> <br> " . $row["description"]. ". <br> Rating: " . $row["rating"]. " | Release year: " . $row["release_year"] . "</div>";
    }
} else {
    echo "0 results";
}












$henkilo = "Tapio";

// Delete quarry
// % = kaikki merkit: Voi olla edessa tai takana tai välissä
$quary = "DELETE FROM Henkilo WHERE nimi LIKE '$henkilo%'";

try{
    $yhteys->query($quary);
    if ($yhteys->affected_rows > 0) {
        echo "Henkilö $henkilo poistettu onnistuneesti!";
    } else {
        echo "Henkilö $henkilo poistaminen epäonnistui tai ei muutoksia.";
    }
}
catch (Exception $e) {
    echo "Virhe poistossa: " . $e->getMessage();
    debuggeri("Virhe $yhteys->errno kyselyssä $quary $e" . $e->getMessage());
}


$autorekisteri = "DAU-781";
$autovari = "musta";
$autovuosi = "2007";
$autoomistaja = "080173-169T";


$quaryauto = "INSERT INTO auto (rekisterinro, vari, vuosimalli, omistaja) VALUES ('$autorekisteri', '$autovari', '$autovuosi', '$autoomistaja')";

try{
    $yhteys->query($quaryauto);
    if ($yhteys->affected_rows > 0) {
        echo "Auto $autorekisteri lisätty onnistuneesti!";
    } else {
        echo "Auto $autorekisteri lisääminen epäonnistui tai ei muutoksia.";
    }
}
catch (Exception $e) {
    echo "Virhe lisäyksessä: " . $e->getMessage();
    debuggeri("Virhe $yhteys->errno kyselyssä $quaryauto $e" . $e->getMessage());
}


// Update quarry
// Päivitä henkilön osoite
   $henkilotunnus = '080173-169T';  // Muokkaa henkilötunnus
   $uusiOsoite = 'Mäkelänkatu 15';  // Uusi osoite
   $vanhaOsoite = 'Koivukuja 25';  // Vanha osoite

   $sql = "UPDATE Henkilo 
   SET osoite = ? 
   WHERE hetu = ? 
   AND osoite = ?";

$stmt = $yhteys->prepare($sql);

if ($stmt === false) {
    die("Virhe kyselyä valmisteltaessa: " . $yhteys->error);
}

// Sidotaan parametrit kyselyyn: s = string
$stmt->bind_param("sss", $uusiOsoite, $henkilotunnus, $vanhaOsoite);

// Suorita kysely
if ($stmt->execute()) {
    if ($stmt->affected_rows > 0) {
        echo "Osoite päivitetty onnistuneesti!";
    } else {
        echo "Osoitteen päivittäminen epäonnistui tai ei muutoksia.";
    }
} else {
    echo "Virhe päivityksessä: " . $stmt->error;
}


$stmt->close();
$yhteys->close();


?>