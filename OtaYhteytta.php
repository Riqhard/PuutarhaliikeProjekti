<!DOCTYPE html>
<html>
<?php
$title = "Ota yhteyttä";
include 'header.php';
?>

<body>
  
<?php
include 'navigointi.html';
?>



<div id="sailio">

    <div class="otsikko">
        <h2>Voit ottaa meihin yhteyttä</h2>
    </div> 

    <div id="uutis_otsikko">
        <h4> * puhelimitse yksittäisiin myymälöihin</h4>
        <h4>* sähköpostitse: asiakaspalvelu@puutarhaliikeneilikka.fi</h4>
        <h4> * alla olevalla lomakkeella</h4>
    </div>
    



        


        <div id="sisalto">
            <form method="post">   
            <fieldset>
            <legend>Henkilötiedot</legend>
            <label for="nimi" class="label-responsive">Nimi:</label>
            <input type="text" id="nimi" name="nimi" value="" pattern="[A-ZÅÄÖa-zåäö \-']{2,50}" required><br>
            <label for="sposti" class="label-responsive">Sähköposti osoite:</label>
            <input type="email" id="sposti" name="sposti" value="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
            <br>
            <hr>
            <br>
            <label for="maksutapa" class="label-additional">Aihe :</label>
            <select name="maksutapa">
            <option>Kysymys tuotteesta</option>
            <option>Tilaus</option>
            <option>Yhteydenottopyyntö</option>
            <option>Muu </option>
            </select>
            <br>
            <br>

            

            <label for="palaute">Viesti </label><br>
            <textarea name="palaute" rows="4" cols="" pattern="[A-ZÅÄÖa-zåäö\-'@/_0-9]{5,500}" required> </textarea>
            <br><br>


            <label for="ehdot">Haluan tilata Puutarhaliike Neilikan uutiskirjeen</label>

            <input type="checkbox" id="html" name="ehdot" value="kylla">Kyllä

            <hr>
            <br>

            <input type="submit" value="Lähetä"> 
            </fieldset>
            </form>    
        </div>


</div>

<footer>
<p>&copy: 2024, Puutarhaliike Neilikka</p>
</footer>
</body>
</html>