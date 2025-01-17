<?php
// Associatieve array met game-informatie
$games = [
    "Horizon Forbidden West" => [
        "titel" => "Horizon Forbidden West",
        "genre" => ["Action", "Adventure", "RPG"],
        "fotos" => ["fotos/horizon1.jpg", "fotos/horizon2.jpg", "fotos/horizon3.jpg", "fotos/horizon4.jpg", "fotos/horizon5.jpg"],
        "pegi" => 16,
        "beschrijving" => "Horizon Forbidden West is een open-world action RPG waarin je de wereld verkent als Aloy.",
        "rating" => 4.5,
        "trailer" => "https://www.youtube.com/watch?v=Lq594XmpPBg",
        "platform" => ["PlayStation 4", "PlayStation 5", "pc"],
        "maker" => "Guerrilla Games"
    ],
];

// Stel de huidige game in (kan worden aangepast)
$game_titel = "Horizon Forbidden West"; // Dit kan worden veranderd naar de gewenste game

// Verkrijg de game-informatie uit de array (geen switch-statement nodig meer)
$game = $games[$game_titel];

// Verkrijg de leeftijd van de gebruiker via een formulier
$leeftijd = isset($_POST['leeftijd']) ? $_POST['leeftijd'] : 0;

// Verwerk het review formulier en bereken de nieuwe rating
$new_rating = null;
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_review'])) {
    $new_rating = $_POST['rating'];
    $game["rating"] = ($game["rating"] + $new_rating) / 2; // Gemiddelde rating berekenen
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Hier vind je meningen en reviews over beroemde spellen">
    <meta name="keywords" content="gameratings, top10, games, bestgamesofalltime, populairgames">
    <meta name="author" content="Jelle Groen">
    <title>Game Review - <?= $game["titel"] ?></title>
    <style>
        #slideshow {
            width: 320px;
            height: 240px;
            margin: 20px auto;
        }
        #slideshow img {
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>

<h1>Game Review: <?= $game["titel"] ?></h1>

<?php
// Toon de game-informatie als de gebruiker oud genoeg is
if ($leeftijd >= $game["pegi"]) {
    echo "<p><strong>Genre:</strong> " . implode(", ", $game["genre"]) . "</p>";
    echo "<p><strong>PEGI Leeftijd:</strong> " . $game["pegi"] . "</p>";
    echo "<p><strong>Beschrijving:</strong> " . $game["beschrijving"] . "</p>";
    echo "<p><strong>Rating:</strong> " . $game["rating"] . "/5</p>";
    echo "<p><strong>Platformen:</strong> " . implode(", ", $game["platform"]) . "</p>";
    echo "<p><strong>Maker:</strong> " . $game["maker"] . "</p>";

    // Slideshow
    echo "<h3>Foto's:</h3>";
    echo "<div id='slideshow'>";
    echo "<img src='" . $game["fotos"][0] . "'>";
    echo "</div>";
    echo "<iframe width='560' height='315' src='" . $game["trailer"] . "' frameborder='0' allowfullscreen></iframe>";
    
    // Review sectie weergeven voor 16+
    echo "<h2>Laat een Review Achter</h2>";
    echo "<form method='POST'>
            <label for='leeftijd'>Leeftijd:</label>
            <input type='number' name='leeftijd' id='leeftijd' required><br><br>
            <label for='rating'>Rating (1 tot 5):</label><br>
            <input type='radio' id='rating1' name='rating' value='1'>
            <label for='rating1'>1</label><br>
            <input type='radio' id='rating2' name='rating' value='2'>
            <label for='rating2'>2</label><br>
            <input type='radio' id='rating3' name='rating' value='3'>
            <label for='rating3'>3</label><br>
            <input type='radio' id='rating4' name='rating' value='4'>
            <label for='rating4'>4</label><br>
            <input type='radio' id='rating5' name='rating' value='5'>
            <label for='rating5'>5</label><br><br>
            <button type='submit' name='submit_review'>Review Verzenden</button>
          </form>";

} else {
    // Als de gebruiker niet oud genoeg is
    echo "<p>Je bent niet oud genoeg om deze game te bekijken (PEGI " . $game["pegi"] . " of hoger).</p>";
}
?>

<?php
// Toon de gemiddelde rating na het indienen van de review
if ($new_rating !== null) {
    echo "<p>Bedankt voor je review! De nieuwe gemiddelde rating is: " . $game["rating"] . "/5</p>";
}
?>

<!-- Javascript voor het tonen van foto's en de slideshow -->
<script>
// JavaScript object met game-informatie
const game = {
    titel: "<?= $game["titel"] ?>",
    genre: <?= json_encode($game["genre"]) ?>,
    fotos: <?= json_encode($game["fotos"]) ?>,
    pegi: <?= $game["pegi"] ?>,
    beschrijving: "<?= $game["beschrijving"] ?>",
    rating: <?= $game["rating"] ?>,
    trailer: "<?= $game["trailer"] ?>",
    platform: <?= json_encode($game["platform"]) ?>,
    maker: "<?= $game["maker"] ?>"
};

// Vraag de leeftijd van de gebruiker
const leeftijd = prompt("Wat is je leeftijd?");

// Functie om game-informatie weer te geven
function toonGameInfo() {
    if (leeftijd >= game.pegi) {
        // Toon de game-informatie
        let gameInfo = `
            <p><strong>Genre:</strong> ${game.genre.join(", ")}</p>
            <p><strong>PEGI Leeftijd:</strong> ${game.pegi}</p>
            <p><strong>Beschrijving:</strong> ${game.beschrijving}</p>
            <p><strong>Rating:</strong> ${game.rating}/5</p>
            <p><strong>Platformen:</strong> ${game.platform.join(", ")}</p>
            <p><strong>Maker:</strong> ${game.maker}</p>
            <h3>Foto's:</h3>
            <iframe width="560" height="315" src="${game.trailer}" frameborder="0" allowfullscreen></iframe>
        `;
        document.body.innerHTML = gameInfo;

        // Slideshow van foto's
        let currentImageIndex = 0;
        const slideshowDiv = document.createElement('div');
        slideshowDiv.id = 'slideshow';
        document.body.appendChild(slideshowDiv);

        // Voeg het eerste plaatje toe
        const imgElement = document.createElement('img');
        imgElement.src = game.fotos[currentImageIndex];
        slideshowDiv.appendChild(imgElement);

        // Update de afbeelding om de 3 seconden
        setInterval(function() {
            currentImageIndex = (currentImageIndex + 1) % game.fotos.length;
            imgElement.src = game.fotos[currentImageIndex];
        }, 3000); // Verander elke 3 seconden van afbeelding

        // Toon review sectie als de leeftijd 16 of ouder is
        if (leeftijd >= 16) {
            let reviewForm = `
                <h2>Laat een Review Achter</h2>
                <form method="POST">
                    <label for="leeftijd">Leeftijd:</label>
                    <input type="number" name="leeftijd" id="leeftijd" required><br><br>
        
                    <label for="rating">Rating (1 tot 5):</label><br>
                    <input type="radio" id="rating1" name="rating" value="1">
                    <label for="rating1">1</label><br>
                    <input type="radio" id="rating2" name="rating" value="2">
                    <label for="rating2">2</label><br>
                    <input type="radio" id="rating3" name="rating" value="3">
                    <label for="rating3">3</label><br>
                    <input type="radio" id="rating4" name="rating" value="4">
                    <label for="rating4">4</label><br>
                    <input type="radio" id="rating5" name="rating" value="5">
                    <label for="rating5">5</label><br><br>
        
                    <button type="submit" name="submit_review">Review Verzenden</button>
                </form>
            `;
            document.body.innerHTML += reviewForm;
        }
    } 
}

// Toon de game-informatie
toonGameInfo();
</script>

</body>
</html>
