<!DOCTYPE html>
<html>
<?php
$title = "Rekisteröityminen";
include 'header.php';
?>


    <style>
fieldset{
  width: 100%;
  box-sizing: border-box;
  margin-top: 10px;
  background-color: #4C5B61;

  margin: 10px 0;
  padding: 10px;
  border: 1px solid #BBB;
  border-radius: 5px;
}
legend{
  
  background-color: #333d4252;
  padding: 0 10px;
  font-size: 1.2rem;
  font-weight: bold;
  border: solid white 1px;
  border-radius: 5px;

  color: #fff;
  width: auto;
  float: none;
  padding: 0 10px;
}


table {
  border-collapse: collapse;
  width: 100%;
}


td {
  padding: 10px;
  border: 1px solid black;
  white-space: nowrap;
}

.container{
  display: flex;
  flex-direction: column;
  padding: 10px 20px 40px 20px;

}

form{
  
  text-align: left;

}



.taulukkokehys {
  margin: auto;
  width: 80%;
  border-collapse: collapse;
  height: 200px; 
  overflow: auto;
}


form{
  max-width: 800px;
}

.label-responsive {
  display: block;
  margin-top: 10px;
  width: 150px;
}

.label-additional {
  display: inline-block;
  margin-top: 10px;
}

[type='submit']{
  font-size: 1rem;
  padding: 5px 10px;
  margin: 10px 0;
  cursor: pointer;
  display: block;
  margin-left: auto;
  margin-right: 15%;
  border-radius: 8px;
  
  width: 150px;
}

[type='submit']:hover{
  background-color: #333;
  color: white;
  border-radius: 8px;
}

select, textarea{
  font-size: 1rem;
  font-family: Arial, Helvetica, sans-serif;
  
}


.textTest{
  color: #AAA;
}

textarea{
  width: 90%;
  resize: none;
}
.error {
      color: red;
      display: none;
}

@media (min-width: 576px) {
  .label-responsive {
    display: inline-block;
  }
}


    </style>
<body>

<?php
include 'navigointi.html';
?>



<div id="sailio">


    <div class="otsikko">
    <h2>Rekisteröitymislomake</h2>
    </div>


    <div id="sisalto">
    <form id="myForm" class="needs-validation" novalidate>   
    <fieldset>
    <legend>Henkilötiedot</legend>

    <div class="row mb-2">
      <label for="nimi" class="label-responsive form-label">Nimi:</label>
      <div class="col-sm-6">
      <input type="text" id="nimi" name="nimi" class="form-control" title="Kirjoita nimi (väh. 2 merkkiä) ilman erikoismerkkejä" value="" pattern="[A-ZÅÄÖa-zåäö \-']{2,}" required>
      <div class="invalid-feedback">Anna nimi oikeassa muodossa</div>
      </div>
    </div>

    <div class="row mb-2">
      <label for="osoite" class="label-responsive form-label">Katuosoite:</label>
      <div class="col-sm-6">
      <input type="text" id="osoite" name="osoite" class="form-control" title="Kirjoita osoite (väh. 2 merkkiä) ilman erikoismerkkejä" value="" pattern="[A-ZÅÄÖa-zåäö_0-9 \-']{2,}" required>
      <div class="invalid-feedback">Anna osoite oikeassa muodossa</div>
      </div>
    </div>

    <div class="row mb-2">
      <label for="posti" class="label-responsive form-label">Postinumero:</label>
      <div class="col-sm-6">
      <input type="text" id="posti" name="posti" class="form-control" title="Kirjoita postinumero (5 numeroa)" value="" pattern="\d{5}" required>
      <div class="invalid-feedback">Anna postinumero oikeassa muodossa</div>
      </div>
    </div>

    <div class="row mb-2">
      <label for="kaupunki" class="label-responsive form-label">Postitoimipaikka:</label>
      <div class="col-sm-6">
      <input type="text" id="kaupunki" name="kaupunki" class="form-control" list="kaupungitvalikko" title="Kirjoita kaupunki" value="" pattern="[A-ZÅÄÖa-zåäö \-']{2,}" required>
      <div class="invalid-feedback">Anna Postitoimipaikka oikeassa muodossa</div>
      </div>
    </div>

    <datalist id="kaupungitvalikko">

    </datalist>


  <div class="row mb-2">
    <label for="puhelin" class="label-responsive form-label">Puhelinnumero:</label>
    <div class="col-sm-6">
    <input type="text" id="puhelin" name="puhelin" class="form-control" title="Kirjoita Puhelinnumero (esim: +358 50 1122334)" value="" pattern="(\+?\d{1,3}[- ]?)?(\d{1,4}[- ]?)?(\d{1,4}[- ]?)?(\d{1,4}){1,15}" required>
    <div class="invalid-feedback">Anna puhelinnumero oikeassa muodossa</div>
    </div>
  </div>

  <div class="row mb-2">
    <label for="email" class="label-responsive form-label">Sähköposti:</label>
    <div class="col-sm-6">
    <input type="email" id="email" name="email" class="form-control" title="Kirjoita sähköposti" value="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
    <div class="invalid-feedback">Anna Sähköposti oikeassa muodossa</div>
    </div>
  </div>

  <div class="row mb-2">
    <label for="salasana" class="label-responsive form-label">Salasana:</label>
    <div class="col-sm-6">
    <input type="password" id="salasana" name="salasana" class="form-control" title="Väh 12 merkkiä pitkä" value="" minlength="12" required>
    <div class="invalid-feedback">Anna salasana oikeassa muodossa</div>
    </div>
  </div>

  <div class="row mb-2">
    <label for="salasana2" class="label-responsive form-label">Salasana uudelleen:</label>
    <div class="col-sm-6">
    <input type="password" id="salasana2" name="salasana2" class="form-control" title="Sama salasana" value="" minlength="12" required>
    <div class="error" id="errorMessage">Molempien salasanojen pitää olla sama</div>
    </div>
  </div>
    </fieldset>


    <fieldset>
    <legend>Lisätiedot</legend>

    <div class="row mb-8">
      <label for="osasto" class="label-responsive form-label">Mistä asioista olet kiinnostunut?</label><br>
      <div class="col-sm-4">
      <input type="checkbox" id="muoti" name="muoti" value="Muoti">
      <label for="muoti"> Muoti</label><br>
      <input type="checkbox" id="urheilu" name="urheilu" value="urheilu">
      <label for="urheilu"> Urheilu</label><br>
      <input type="checkbox" id="sisustaminen" name="sisustaminen" value="sisustaminen">
      <label for="sisustaminen"> Sisustaminen</label><br>
      <input type="checkbox" id="pelit" name="pelit" value="pelit">
      <label for="pelit"> Pelit</label><br>
      <input type="checkbox" id="elokuvat" name="elokuvat" value="elokuvat">
      <label for="elokuvat"> Elokuvat </label>
      </div>
    </div>

    <br>

    <div class="row mb-12">
      <label for="maksutapa" class="label-responsive form-label">Maksutapa :</label>
      <div class="col-sm-4">
      <select name="maksutapa">
        <option>Sampo</option>
        <option>Nordea</option>
        <option>Osuuspankki</option>
        <option>Aktia </option>
      </select>
    </div>
      
    <br>

    <div class="column mb-8">
      <label for="palaute">Anna palautetta </label><br>
      <div class="col-sm-6">
      <textarea name="palaute" rows="4" cols="" maxlength="250"> </textarea>
      </div>
    </div>

    <br>

    <div class="col-12">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
        <label class="form-check-label" for="invalidCheck">Olen lukenut ja hyväksyn tuotteiden toimitusehdot.</label>
        <div class="invalid-feedback">Täytyy hyväksyä ehdot.</div>
      </div>
    </div>


    <div class="col-12">
      <button class="btn btn-primary" type="submit">Lähetä</button>
    </div>

    </fieldset>
    </form> 
    </div>
</div>


<footer>
  <p>&copy: 2024, Puutarhaliike Neilikka</p>
</footer>
</body>
</html>