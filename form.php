<?php
if(isset($_POST['submit']) && (isset($_POST['login'])) && (isset($_POST['password']))) {
    // récupération des données
    $login = $_POST["login"];
    $password = $_POST["password"];

    $row = 1;
    $userLogin = false;
    $userPassword = false;

    if (($handle = fopen("users.csv", "a+")) !== FALSE) {
        while (($data = fgetcsv($handle, 100, ";")) !== FALSE) {

            if ($data[0] === $login) {
                $userLogin = true;
            }
            if ($data[1] === $password) {
                $userPassword = true;
            }
        }
        fclose($handle);

        if ($userLogin === false || $userPassword === false) {
            echo "Login ou mot de passe incorrect";
        } else {
            // récupération de session
            session_start();

            if (!empty($_POST['login'])) {
                $_SESSION['login'] = $_POST['login'];
            }
            if (!empty($_POST['password'])) {
                $_SESSION['password'] = $_POST['password'];
            }
            $_SESSION['time'] = time();
            header("Location: user.php");
            exit();

        }
    }
}

echo "<form action='' method='post'>
            Login :<br>
            <input type=\"text\" name=\"login\"><br>
            Password :<br>
            <input type=\"password\" name=\"password\"><br>
            <input type='submit' name='submit' value='Envoyer'><br>
      </form>";




