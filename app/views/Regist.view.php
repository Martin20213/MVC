
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
<div class="data">

<div class="login-container">
        <h2>Regisztráció</h2>
        <form method="POST" action="register">
            <input type="text" name="lastname" placeholder="Vezetéknév" required>
            <input type="text" name="firstname" placeholder="Keresztnév" required>
            <input type="email" name="email" placeholder="E-mail" required>
            <input type="text" name="phone" placeholder="Telefonszám (nem kötelező)">
            <input type="text" name="username" placeholder="Felhasználónév" required>
            <input type="password" name="password" placeholder="Jelszó" required>
            <input type="submit" class="gomb"  value="Regisztrálok">


            <?php if (!empty($errorMessage)): ?>
            <p style="color: red;"><?php echo $errorMessage; ?></p>
        <?php endif; ?>


        </form>
        <div class="register">
            <p>Már van fiókod?</p>
            <a href="login">Bejelentkezés</a>
        </div>
    </div>
</div>

<script type="text/javascript" src="../public/assets/js/menu.js"></script> <!-- Menü JavaScript -->

</body>
</html>