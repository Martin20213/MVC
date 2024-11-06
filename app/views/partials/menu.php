<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statikus Menü</title>
    <link rel="stylesheet" href="../css/menu.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body>
<div class="off-screen-menu" onclick="toggleMenu2()">
    <ul>
        <li><a class="menugomb" href="home">Home</a></li>
        <li><a class="menugomb" href="uzenofal">Üzenőfal</a></li>
        <li><a class="menugomb" href="kapcsolat">Kapcsolat</a></li>
        <li><a class="menugomb" href="adminexport">Export</a></li>
    </ul>
</div>

<nav>
    <div class="left-menu">
        <!-- Itt jelenik meg a felhasználói információ statikus szövegként -->
        <div class="user-info" id="user-info">
            <strong>Bejelentkezett: Vezetéknév Keresztnév (Felhasználónév)</strong>
        </div>
    </div>

    <div class="centered-image-container">
        <a href="/MVC/public/index.php?url=home/index"><img src="../img/TAppancs_logo.png" alt="Logo"></a>
    </div>

    <div class="right-menu" id="right-menu">
        <a id="myLink" href="profile"><i class="fas fa-user" class="login"></i></a>
        <a id="logoutLink" href="logout"><i class="fas fa-sign-out-alt" class="login"></i></a>
    </div>

    <div class="ham-menu" onclick="toggleMenu()">
        <span></span>
        <span></span>
        <span></span>
    </div>
</nav>

<script>
// JavaScript a menü megjelenítéséhez és elrejtéséhez
function toggleMenu() {
    var link = document.getElementById('myLink');
    var link2 = document.getElementById('logoutLink');
    var userInfo = document.getElementById('user-info');
    var rightMenu = document.getElementById('right-menu');
    var offScreenMenu = document.querySelector('.off-screen-menu');

    if (link.style.display === 'inline' || link.style.display === '') {
        link.style.display = 'none';
        link2.style.display = 'none';
        rightMenu.classList.add('hidden');
    } else {
        setTimeout(function() {
            link.style.display = 'inline';
            link2.style.display = 'inline';
            userInfo.classList.remove('hidden');
            rightMenu.classList.remove('hidden');
        }, 200);
    }
}
</script>

</body>
</html>
