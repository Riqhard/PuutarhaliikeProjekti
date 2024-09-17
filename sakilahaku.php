<?php

    // echo "painike painettu";
    $tietokanta = "sakila";
    include_once 'debuggeri.php';
    include_once 'tietokantarutiinit.php';
    register_shutdown_function('debuggeri_shutdown');


if (isset($_GET["laheta"])) {
    $nimi = $_GET['nimi'];
    $kuvaus = $_GET['kuvaus'];
    $vuosi = $_GET['vuosi'];
    $kieli = $_GET['kieli'];
    $vuokra_aika = $_GET['vuokra-aika'];
    $vuokrahinta = $_GET['vuokrahinta'];
    $pituus = $_GET['pituus'];
    $korvaushinta = $_GET['korvaushinta'];
    $ikaraja = $_GET['ikaraja'];
    $specialfeatures = $_GET['specialfeatures'];

    $nimi = $yhteys->real_escape_string(strip_tags($nimi));
    $kuvaus = $yhteys->real_escape_string(strip_tags($kuvaus));
    $vuosi = $yhteys->real_escape_string(strip_tags($vuosi));
    $kieli = $yhteys->real_escape_string(strip_tags($kieli));
    $vuokra_aika = $yhteys->real_escape_string(strip_tags($vuokra_aika));
    $vuokrahinta = $yhteys->real_escape_string(strip_tags($vuokrahinta));
    $pituus = $yhteys->real_escape_string(strip_tags($pituus));
    $korvaushinta = $yhteys->real_escape_string(strip_tags($korvaushinta));
    $ikaraja = $yhteys->real_escape_string(strip_tags($ikaraja));
    $specialfeatures = $yhteys->real_escape_string(strip_tags($specialfeatures));
    

    

    



    
    $quaryfilmi = "INSERT INTO film (title, description, release_year, language_id, original_language_id, rental_duration, rental_rate, length, replacement_cost, rating, special_features) 
    VALUES ('$nimi', '$kuvaus', '$vuosi', '$kieli', '$kieli', '$vuokra_aika', '$vuokrahinta', '$pituus', '$korvaushinta', '$ikaraja', '$specialfeatures')";

    try{
        $yhteys->query($quaryfilmi);
        if ($yhteys->affected_rows > 0) {
            echo "Elokuva $nimi lisätty onnistuneesti!";
        } else {
            echo "Elokuva $nimi lisääminen epäonnistui tai ei muutoksia.";
        }
    }
    catch (Exception $e) {
        echo "Virhe lisäyksessä: " . $e->getMessage();
        debuggeri("Virhe $yhteys->errno kyselyssä $quaryfilmi $e" . $e->getMessage());
    }



}    




if (isset($_GET["painike"])) {
    $hakuavain = $_GET['hakuavain'];
    $hakuavain = $yhteys->real_escape_string(strip_tags($hakuavain));
    $quary = "SELECT * FROM film WHERE title LIKE '$hakuavain%'";
    $result = mysqli_my_quary($quary);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='hakutulos'><div class='title'>" . $row["title"]. "</div> <br> " . $row["description"]. ". <br> Rating: " . $row["rating"]. " | Release year: " . $row["release_year"] . "</div>";
        }
    } else {
        echo "0 results";
    }

}
?>
<DOCTYPE html>
<html>
    
<head>
    <?php
    $title = "sakila haku";
    include 'header.php';
    ?>
    <title>Sakila haku</title>
    <meta charset="utf-8">
    <style>
        .hakutulos {
            background-color: lightgrey;
            padding: 10px;
            margin: 10px;
            border: 1px solid black;
            border-radius: 5px;
        }
        .title {
            font-weight: bold;
            font-size: 1.3em;
            white-space: nowrap;
        }

        [type='submit']{
            font-size: 1rem;
            padding: 5px 10px;
            margin: 10px 0;
            cursor: pointer;
            display: block;
            margin-left: 100px;
            width: 150px;
        }

        .sisalto2 {
            padding: 10px;
            align-items: center;
            justify-content: center;
            display: flex;
            flex-direction: column;
            margin: 0 auto;
        }



    #main-nav{
      list-style-type: none;
      background-color: #579776;
      border: 2px solid black;
      float: left;
      margin-left: 20%;
      height: 200px;
      width: 200px;
    }
    #main-nav > ul > li{
      display: inline-block;
      /*float: left;*/
      position: relative;
      padding: 10px;
    }


    ul{ width: 100%;}
    ul.submenu{
      position:absolute;
      z-index: 1;
      width: auto;
      white-space: nowrap;
      display: none;


      border: 1px solid white;
      border-radius: 5px;
      background-color: #579776;
      color: black;
      margin: auto;
    }
    li:hover > ul.submenu{
      display: block;

      line-height: 1.2;
      padding-top: 10px;
      padding-bottom: 10px;
      padding-right: 10px;
    
    }


    a{ color: rgb(0, 0, 0);}
    a:hover{ color: coral;}
    
    </style>
</head>
<body>




    <div class="otsikko">

    <div class="sisalto2">
    <h2>Sakila haku</h2>
    <form action="sakilahaku.php" method="get">
        <label for="hakuavain">Hakuavain</label>
        <input type="text" name="hakuavain" id="hakuavain">
        <input type="submit" name="painike" value="Hae">
    </form>
    </div>


    </div>
    
<div id="sailio">






</div>



<div id="main-nav">
  <ul>
    <li><p>Kategoriat</p>
      <ul class="submenu">
        <li><a href="actionKategoria.php">Action</a></li>
        <li><a href="">Animation</a></li>
        <li><a href="">Children</a></li>
        <li><a href="">Classics</a></li>
        <li><a href="">Comedy</a></li>
        <li><a href="">Documentary</a></li>
        <li><a href="">Drama</a></li>
        <li><a href="">Family</a></li>
      </ul>	
    </li>
  </ul>
<div style="clear: both;"></div>
</div>







<div id="sisalto">

<form id="myForm" class="needs-validation" novalidate>   
<fieldset>
<legend>Lisää Elokuva</legend>



<div class="row mb-2">
  <label for="nimi" class="label-responsive form-label">Elokuvan Nimi:</label>
  <div class="col-sm-6">
  <input type="text" id="nimi" name="nimi" class="form-control" title="Kirjoita nimi (väh. 2 merkkiä) ilman erikoismerkkejä" value="" pattern="[A-ZÅÄÖa-zåäö0-9 \-']{2,}" required>
  <div class="invalid-feedback">Anna nimi elokuvalle oikeassa muodossa</div>
  </div>
</div>

<br>

<div class="column mb-8">
  <label for="kuvaus">Kuvaus </label><br>
  <div class="col-sm-6">
  <textarea name="kuvaus" rows="4" cols="" maxlength="250"> </textarea>
  </div>
</div>

<br>

<div class="row mb-2">
  <label for="vuosi" class="label-responsive form-label">Julkaisuvuosi:</label>
  <div class="col-sm-6">
  <input type="text" id="vuosi" name="vuosi" class="form-control" title="Kirjoita koko vuosi" value="" pattern="\d{4}" required>
  <div class="invalid-feedback">Anna julkaisuvuosi oikeassa muodossa</div>
  </div>
</div>

<div class="row mb-12">
    <label for="kieli" class="label-responsive form-label">Valitse kieli:</label>
    <div class="col-sm-4">
    <select name="kieli">
<?php
$sql = "SELECT name FROM language";
$result = $yhteys->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

        echo "<option name='kieli' value='". $row["name"] . "'>" . $row["name"]. "</option>";
    }
} else {
    echo "0 results";
}
?>
    </select>
    </div>
</div>
      
<div class="row mb-2">
  <label for="vuokra-aika" class="label-responsive form-label">Vuokra-aika:</label>
  <div class="col-sm-6">
  <input type="text" id="vuokra-aika" name="vuokra-aika" class="form-control" title="Kirjoita vuokra-aika" value="" pattern="\d{1,}" required>
  <div class="invalid-feedback">Anna vuokra-aika oikeassa muodossa</div>
</div>

<div class="row mb-2">
  <label for="vuokrahinta" class="label-responsive form-label">Vuokrahinta:</label>
  <div class="col-sm-6">
  <input type="text" id="vuokrahinta" name="vuokrahinta" class="form-control" title="Kirjoita vuokrahinta" value="" step="0.1" min="0.99" max="10.00" pattern="\d{1,}" required>
  <div class="invalid-feedback">Anna vuokrahinta oikeassa muodossa</div>
  </div>
</div>

<div class="row mb-12">
    <label for="pituus" class="label-responsive form-label">Vuokra-aika:</label>
    <div class="col-sm-4">
    <select name="pituus">
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
    <option>5</option>
    <option>6</option>
    <option>7</option>
    <option>8</option>
    <option>9</option>
    </select>
    </div>
</div>

<div class="row mb-2">
  <label for="korvaushinta" class="label-responsive form-label">Korvaushinta:</label>
  <div class="col-sm-6">
  <input type="text" id="korvaushinta" name="korvaushinta" class="form-control" title="Kirjoita korvaushinta" value="" pattern="\d{1,}" required>
  <div class="invalid-feedback">Anna korvaushinta oikeassa muodossa</div>
  </div>
</div>

<div class="row mb-12">
    <label for="ikaraja" class="label-responsive form-label">Valitse Ikäraja:</label>
    <div class="col-sm-4">
    <select name="ikaraja">
    <option>G</option>
    <option>PG</option>
    <option>PG-13</option>
    <option>R</option>
    <option>NC-17</option>
    </select>
    </div>
</div>

<div class="col mb-12">
    <label for="specialfeatures" name="specialfeatures" class="label-responsive form-label">Special features:</label>
    <div class="col-sm-4"></div>
    Trailers<input type="checkbox" id="specialfeatures" name="specialfeatures" value="Trailers" required><br>
    Commentaries<input type="checkbox" id="specialfeatures" name="specialfeatures" value="Commentaries"><br>
    Deleted Scenes<input type="checkbox" id="specialfeatures" name="specialfeatures" value="Deleted Scenes"><br>
    Behind the Scenes<input type="checkbox" id="specialfeatures" name="specialfeatures" value="Behind the Scenes"><br>
    <div class="invalid-feedback">Valitse specialfeatures</div>
    </div>
</div>

<div class="col-12">
    <button class="btn btn-primary" name="laheta" type="submit">Lähetä</button>
</div>


</fieldset>
</form> 

</div>

</body>
</html>