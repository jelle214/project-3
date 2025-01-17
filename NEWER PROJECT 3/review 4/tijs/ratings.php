<html lang="nl">

<head>
    <meta charset="UTF-8">
    <!--Zorgt ervoor dat de pagina correct word weergegeven op mobiele apparaten.-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!--SEO (search engen optimation) Metagegevens -->
    <!-- Descripption voor zoekmachines en sociale media, omschrijft kort de inhoud van de pagina-->
    <meta name="description" content="een verzameling van gaming ratings">
    <!-- Keywords Helpt zoekmachines begrijpen waar de pagina over gaat. -->
    <meta name="Keywords" content="gamestars, games, ratings,">
    <!-- Author de naam van de developer van de pagina. -->
    <meta name="author" content="Tijs Vreijling">

    <title>Ratings gamestars</title>
    <!-- Favicon kleine afbeelding die wordt weergegeven in de browser-tabbladen -->
    <link rel="icon" href="fotos/gamestars.png" type="image/x-icon">
    <!-- link naar de stylesheet-->
    <link rel="stylesheet" href="script.css">
</head>

<?php
$rating = $_POST["rating"];
$user_rating = $_POST["user_rating"];

// controleer of de user rating was ingevuld
if ($user_rating > 0) {
    $ratings_array = array($rating, $user_rating);
    $average_rating = array_sum($ratings_array) / count($ratings_array);
    // afronden naar int
    $average_rating = round($average_rating);
    $average_tekst = "{$average_rating}/5";
} else {
    $average_tekst = "{$rating}/5";
}
?>

<body>
    <!-- Navigatiebalk -->
    <nav>
        <a href="index.html">Home</a>
        <a href="Merchandise.html">Merchandise</a>
        <a href="Contact.html">Contact</a>
        <a href="games.html">Games</a>
        <a class="terug" href="games.html">terug</a>
    </nav>

    <header>
        <img src="fotos/gamestars.png" alt="Logo" class="logo">
    </header>
    <main class="net">
        <h1> <?php echo $_POST["name"]; ?> <br> bedankt voor de review.</h1><br>
        <h2>Uw review:</h2> <br><?php echo $_POST["beschrijfing"]; ?>
        <h3>Uw Rating: <?php echo $user_rating; ?></h3>
        <h3>Gemiddelde Rating: <?php echo $average_tekst; ?></h3>

    </main>
    <footer>
    </footer>
</body>

</html>