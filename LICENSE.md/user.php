<?php

require "function.php";

session_start();

if(isset($_SESSION['login'])) {

    // Traitement du formulaire Inscription
    if(isset($_POST['inscription']) && (isset($_POST['login'])) && (isset($_POST['password']))) {
        // récupération des données
        $login = $_POST["login"];
        $password = $_POST["password"];
        // enregistrement des donnée dans CSV
        setDataCSV($login, $password);
        header("Location: user.php");
    }
    echo "Bonjour " . $_SESSION['login'];
    ?>
    <br>
    <?php
    echo "<a href='logout.php'>Se deconnecter</a>";
    getCSV();
    // Inscrire un nouvel utilisateur
    echo "<h2>Inscription :</h2>";
    echo "<form action='' method='post'>
            Login :<br>
            <input type=\"text\" name=\"login\"><br>
            Password :<br>
            <input type=\"password\" name=\"password\"><br>
            <input type='submit' name='inscription' value='Envoyer'><br>
        </form>";

} else {
    header("Location: index.php");
}


