
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="../img/paw.png" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TAppancs</title>
    <link rel="stylesheet" href="../public/assets/css/style.css"> <!-- Fő stíluslap -->
    <link rel="stylesheet" href="../public/assets/css/menu.css"> <!-- Menüspecifikus stíluslap -->
</head>
<body>


<?php include 'partials/menu.php'; // Menü beillesztése ?>

<h1>Kapcsolat View</h1>



<div class="data">

<div class="data-container">
<h1>Kapcsolat</h1>

<form method="POST" action="">
        <label for="email">E-mail cím (kötelező)</label>
        <input type="email" name="email" id="email" required placeholder="E-mail címed">

        <label for="phone">Telefonszám (nem kötelező)</label>
        <input type="text" name="phone" id="phone" placeholder="Telefonszámod (opcionális)">

        <label for="message">Üzenet (kötelező)</label>
        <textarea name="message" id="message" required placeholder="Az üzeneted..." rows="5"></textarea>

        <input type="submit" value="Küldés">
    </form>

</div>
</div>


<script type="text/javascript" src="../public/assets/js/menu.js"></script> <!-- Menü JavaScript -->
</body>
</html>