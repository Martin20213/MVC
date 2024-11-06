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

<?php
include 'nav/menu.php'; // Menü beillesztése
?>

<div class="data">
    <div class="data-container">
        <h1>Üzenőfal</h1>
        <form method="POST" action="">
            <input type="text" name="message" placeholder="Írd ide az üzeneted..." required>
            <input type="submit" value="Küldés">
        </form>
        <!-- Üzenetek megjelenítése -->
        <?php if (count($messages) > 0): ?>
            <?php foreach ($messages as $message): ?>
                <div class="message">
                    <p id="name"><strong><?php echo htmlspecialchars($message['Vezeteknev']) . ' ' . htmlspecialchars($message['Keresztnev']); ?></strong></p>
                    <?php
                    // Az Ido mező átkonvertálása olvashatóbb formátumra
                    $datetime = new DateTime($message['Ido']);
                    $formattedDate = $datetime->format('Y.m.d H:i'); // Formátum módosítása
                    ?>
                    
                    <p id="datum"><?php echo htmlspecialchars($formattedDate); ?></p>
                    <div class="uzenet">
                    <p><?php echo nl2br(htmlspecialchars($message['Uzenet'])); ?></p>
                </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Nincs még üzenet.</p>
        <?php endif; ?>

        <!-- Üzenet beküldő form -->
        
    </div>
</div>

<script type="text/javascript" src="../public/assets/js/menu.js"></script> <!-- Menü JavaScript -->
</body>
</html>