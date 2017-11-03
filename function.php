<?php

function getCSV()
{
    if (($handle = fopen("users.csv", "r")) !== FALSE) {
        echo "<table>";
        echo "<h2>Utilisateurs</h2>";
        while (($data = fgetcsv($handle, 100, ";")) !== FALSE) {
            echo "<tr><td>".$data[0]."</td>";
        }
        echo "</table>";
        fclose($handle);
    }
}

function deleteUser($login, $password)
{
    // enregistrement des données dans users.csv
    $list = array ($login, $password);

    $fp = fopen('users.csv', 'a');

    fputcsv($fp, $list, ';');

    fclose($fp);

}

function setDataCSV($login, $password)
{
    // enregistrement des données dans users.csv
    $list = array ($login, $password);

    $fp = fopen('users.csv', 'a');

    fputcsv($fp, $list, ';');

    fclose($fp);

}