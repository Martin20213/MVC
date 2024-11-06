<!DOCTYPE html>
<html lang="hu">
<head>
    <link rel="icon" href="../img/paw.png" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TAppancs</title>
    <link rel="stylesheet" href="../public/assets/css/style.css"> <!-- Fő stíluslap -->
    <link rel="stylesheet" href="../public/assets/css/menu.css"> <!-- Menüspecifikus stíluslap -->
</head>
<body>

<?php include 'partials/menu.php'; ?> <!-- Menü beillesztése -->

<div class="data">
    <div class="login-container">
        <h2>Bejelentkezés</h2>
        <form method="POST" action="login/authenticate">
            <input type="text" name="username" placeholder="Felhasználónév" required>
            <input type="password" name="password" placeholder="Jelszó" required>
            <input type="submit" class="gomb" value="Bejelentkezés">

            <!-- Hibaüzenet megjelenítése, ha van -->
            <?php if (isset($data['errorMessage']) && !empty($data['errorMessage'])): ?>
                <p style="color: red;"><?php echo htmlspecialchars($data['errorMessage']); ?></p>
            <?php endif; ?>
        </form>
        <div class="register">
            <p>Még nem regisztráltál?</p>
            <a href="register">Regisztrálok</a>
        </div>
    </div>
</div>

<script type="text/javascript" src="../js/menu.js"></script>

</body>
</html>
