<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Hier vind je meningen en reviews over beroemde spellen">
    <meta name="keywords" content="gameratings, top10, games, bestgamesofalltime, populairgames">
    <meta name="author" content="Jelle Groen">
</head>
<?php
// Associatieve arrays voor games, inclusief de afbeelding
$games = [
    1 => [
        'title' => 'luigi`s mansion 3',
        'genre' => 'adventure-puzzle',
        'release_year' => 2019,
        'developer' => 'Nintendo',
        'image' => 'lw3.png' // Voeg hier de afbeelding toe
    ],
    2 => [
        'title' => 'Undertale',
        'genre' => 'Action-Adventure',
        'release_year' => 2015,
        'developer' => 'Toby Fox',
        'image' => 'ut.png' // Voeg hier de afbeelding toe
    ],
];

// Verkrijg de game_id uit de URL of zet het naar een standaardwaarde (bijv. 1)
$game_id = isset($_GET['game_id']) ? $_GET['game_id'] : 1;

// Controleer of het game_id bestaat in de array
if (isset($games[$game_id])) {
    $game = $games[$game_id];
    echo "<h1>{$game['title']}</h1>";
    echo "<p><strong>Genre:</strong> {$game['genre']}</p>";
    echo "<p><strong>Release Year:</strong> {$game['release_year']}</p>";
    echo "<p><strong>Developer:</strong> {$game['developer']}</p>";
    // Toon de afbeelding
    echo "<img src='foto/{$game['image']}' alt='{$game['title']}' style='width:300px; height:auto;'>";
} else {
    echo "<p>Game niet gevonden!</p>";
}
?>

<!-- Links om andere games te bekijken -->
<ul>
    <li><a href="?game_id=1">luigi`s mansion 3</a></li>
    <li><a href="?game_id=2">Undertale</a></li>
</ul>
