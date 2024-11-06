<?php

class Login extends Controller
{
    public function index()
    {
        // Bejelentkezési űrlap megjelenítése
        $this->view('login');
    }

    public function authenticate()
    {
        session_start();
        $model = new Model();

        // Feltételezzük, hogy a bejelentkezési űrlap POST módszerrel küldi az adatokat.
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Ellenőrizzük a felhasználót az adatbázisban
            $user = $model->getUser($username, $password);
            if ($user) {
                // Sikeres bejelentkezés, jog_id beállítása
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['jog_id'] = $user['jog_id']; // 2-es vagy 3-as jogid, attól függően, hogy milyen joggal rendelkezik

                // Irányítsuk át a felhasználót a kezdőoldalra vagy más nézetre
                header('Location: /home'); // Példa: kezdőlap
                exit();
            } else {
                // Hibás bejelentkezési adatok
                $error = 'Hibás felhasználónév vagy jelszó.';
                $this->view('login', ['error' => $error]);
            }
        } else {
            // Ha nem POST kérés, a bejelentkezési űrlap megjelenítése
            $this->view('login');
        }
    }

    public function logout()
    {
        session_start();
        session_destroy(); // Kijelentkezés
        header('Location: /login'); // Vissza a bejelentkezési oldalra
        exit();
    }
}
