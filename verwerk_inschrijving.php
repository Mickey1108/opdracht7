<?php
    $voornaam = $_POST['voornaam'];
    $tussenvoegsel = $_POST['tussenvoegsel'];
    $achternaam = $_POST['achternaam'];
    $mailadres = $_POST['mailadres'];

    $dbc = mysqli_connect('localhost',  'root',  'root',  '25092_db') or die ('Error connecting.');

    $query = "INSERT INTO nieuwsbrief VALUES (0,'$voornaam', '$tussenvoegsel', '$achternaam', '$mailadres')";

    $result = mysqli_query($dbc,$query) or die ('Error querying.');

    mysqli_close($dbc);

    if ($result){
        echo 'De volgende gegevens zijn toegevoegd aan de database:<br>';
        echo $voornaam . '<br>';
        echo $tussenvoegsel . '<br>';
        echo $achternaam . '<br>';
        echo $mailadres . '<br>';
    } else {
        echo 'Sorry, er is iets misgegaan. Probeer het opniew.';
    }
