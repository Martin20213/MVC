<?php

session_start();

#itt toltjuk be az összes file-t amit mindig be kell(az init.php meghívásával)
require "../app/core/init.php";


#App osztaly szarmaztatasa


$app = new App;

#loadcontroller function meghivasa (App osztalybol)

$app -> loadController();
