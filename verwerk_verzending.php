<?php
// 0. UITLEZEN VAN POST-ARRAY
$subject = $_POST['subject'];
$message = $_POST['message'];

// 1. CONNECTIE MAKEN MET DE DATABASE
$dbc = mysqli_connect('localhost', 'root', 'root', '25092_db') or die ('Error connecting.');

// 2. KIJKEN IN DE DATABASE EN ALLE MAILADRESSEN TEVOORSCHIJN HALEN
$query = "SELECT mailadres FROM nieuwsbrief";
$result = mysqli_query ($dbc,$query) or die ('Error querying.');

// 3. LOOPJE WAARIN EEN BERICHT WORDT VERZONDEN NAAR ALLE MAILADRESSEN
while ($row = mysqli_fetch_array($result)) {
    echo 'Mail verzonden naar: ' . $row ['mailadres'] . '<br>';
    // VARIABELE VOOR DE MAIL
    $to = $row['mailadres'];
    $headers = 'From: 25092@ma-web.nl';
    // MAIL VERZENDEN
    mail($to,$subject,$message,$headers);
}

echo 'Klaar met verzenden.';
