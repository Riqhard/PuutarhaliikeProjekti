<?php 
if (!session_id()) session_start();
ini_set('default_charset', 'utf-8');
?>

<!DOCTYPE html>
<html>
<head>
    
<title><?= $title; ?></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="tyyli.css">
<link rel="stylesheet" type="text/css" href="<?= $css ?? 'tyyli'; ?>.css">
<?php if (isset($css)) echo "<link rel='stylesheet' type='text/css' href='$css.css'>";?>

<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<?php if (isset($js)) echo "<script defer src='$js.js'></script> ";?>
<script defer src="scripts.js"></script>
    
</head>
<body>    
<?php include 'navigointi.html'; ?>

<?php 
include_once "debuggeri.php";
/* Huom. suojatulla sivulla on asetukset,db,rememberme.php; */
if (!isset($loggedIn)){
  require "asetukset.php";
  include "db.php";
  include "rememberme.php";
  $loggedIn = loggedIn();
  }
debuggeri("loggedIn:$loggedIn");  
register_shutdown_function('debuggeri_shutdown');
$active = basename($_SERVER['PHP_SELF'], ".php");

function active($sivu,$active){
  return $active == $sivu ? 'active' : '';  
  }

/* Huom. nav-suojaus vie viimeiset linkit oikealle. */
?>