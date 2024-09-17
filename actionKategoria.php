<?php

    // echo "painike painettu";
    $tietokanta = "sakila";
    include 'debuggeri.php';
    include 'tietokantarutiinit.php';
    register_shutdown_function('debuggeri_shutdown');

    $idavain = "1";
    $idavain = $yhteys->real_escape_string(strip_tags($idavain));
    $kategoriaquary = "SELECT * FROM film_category WHERE category_id LIKE '$idavain'";
    $kategoriresult = mysqli_my_quary($kategoriaquary);


    $quary = "SELECT * FROM film WHERE film_id IN ('$kategoriresult')";
    $quary = "SELECT film_id FROM film 
    INNER JOIN film_id ON ('$kategoriresult')";



    $result = mysqli_my_quary($quary);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='hakutulos'><div class='title'>" . $row["title"]. "</div> <br> " . $row["description"]. ". <br> Rating: " . $row["rating"]. " | Release year: " . $row["release_year"] . "</div>";
        }
    } else {
        echo "0 results";
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


</body>
</html>