<html lang="nl">
<head>
    <meta charset="UTF-8">
    <!--Zorgt ervoor dat de pagina correct word weergegeven op mobiele apparaten.-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!--SEO (search engen optimation) Metagegevens -->
    <!-- Descripption voor zoekmachines en sociale media, omschrijft kort de inhoud van de pagina-->
     <meta name="description" content="een verzameling van gaming mercandise">
     <!-- Keywords Helpt zoekmachines begrijpen waar de pagina over gaat. -->
    <meta name="Keywords" content="gamestars, games, merchandice,">
    <!-- Author de naam van de developer van de pagina. -->
     <meta name="author" content="Tijs Vreijling">

     <title>Ratings gamestars</title>
     <!-- Favicon kleine afbeelding die wordt weergegeven in de browser-tabbladen -->
      <link rel="icon" href="fotos/gamestars.png" type="image/x-icon">
      <!-- link naar de stylesheet-->
       <link rel="stylesheet" href="script.css">
</head>
<body onload="pegimeter()">
          <!-- Navigatiebalk -->
    <nav>
        <a href="index.html">Home</a>
        <a href="Merchandise.html">Merchandise</a>
        <a href="Contact.html">Contact</a>
        <a href="games.html">Games</a>
    </nav>

	<header>
        <img src="fotos/gamestars.png" alt="Logo" class="logo">
    </header>
    
	<main>
	<div id="gamedata">
	
	<?php
		// de game data arrays
		$games_data = [
			'game1' => [
				'naam'=>'God of war Ragnarog',
				'pegi'=> 18,
				'type' =>'Action-adventure, Vechtspel, Computerrollenspel, Schietspel, Hack and slash',
				'rel' =>'2022',
				'dev' =>'SIE Santa Monica Studio, Jetpack Interactive',
				'img1' => 'fotos/gow.png',
				'img2' => 'fotos/godofwar.jpg',
				'img3' => 'fotos/godwr.jpg',
				'rat' => '9/10',
				'desc' => 'God of War: Ragnarök is een computerspel ontwikkeld door Santa Monica Studio en uitgegeven door Sony Interactive Entertainment voor de PlayStation 4 en PlayStation 5. Het hack and slashspel is uitgekomen op 9 november 2022.
				Het spel bleek een commercieel succes: er werden in de eerste week 5,1 miljoen exemplaren van verkocht en werd het snelst verkopende computerspel in de geschiedenis van de PlayStation. Begin februari 2023 waren er inmiddels 11 miljoen exemplaren van het spel verkocht'
				],
			'game2' => [
				'naam'=>'Suicide squad',
				'pegi'=> 18,
				'type' =>'Schietspel, Action-adventure, Platformspel, Computerrollenspel',
				'rel' =>'2024',
				'dev' =>'Warner Bros. Interactive Entertainment',
				'img1' => 'fotos/suiscuad.jpg',
				'img2' => 'fotos/ssc.jpg',
				'img3' => 'fotos/squad.jpg',
				'rat' => '6/10',
				'desc' => "In het spel vormt Amanda Waller een taskforce onder de naam Suicide Squad, bestaande uit Arkham Asylum-gevangenen Harley Quinn, Captain Boomerang, Deadshot en King Shark, voor een geheime missie in Metropolis. Pas wanneer de groep in de stad aankomt, beseffen ze de ernst van de situatie. De kwaadaardige Brainiac is begonnen met het hersenspoelen van de inwoners, waaronder ook de helden. Hierdoor is het aan de Suicide Squad om de Justice League om te brengen en Brainiac te stoppen."
				],
			];
	
	
		// controleer welke link is gebruikt
		if(isset($_GET['game'])) {
			$game=$_GET['game'];
		}else{
			// als er geen link is gebruikt toon dan game 1
			$game='1';
		}

		// laad de juiste game data gebaseerd op de id uit de link met switch
		switch($game) {
			case "1":
				$game_data = $games_data['game1'];
				break;
			case "2":
				$game_data = $games_data['game2'];
				break;
			default:
				$game_data = $games_data['game1'];			
		}
		
		// controleer of de leeftijd is ingevuld
		if(isset($_GET['leeftijd'])) {
			$leeftijd=$_GET['leeftijd'];
			
			// Maak het navigatie menu en voeg de leeftijd en de game ID toe als parameters
			echo "<nav class='tab'>";
			echo "<button class='tablinks' onclick='location.href=\"?game=1&leeftijd={$leeftijd}\";'>God of War</button>";
			echo "<button class='tablinks' onclick='location.href=\"?game=2&leeftijd={$leeftijd}\";'>Suicide Squad</button>";
			echo "</nav>";
		
			// controleer of de leeftijd hoger is dan de pegi
			if ($leeftijd > $game_data['pegi']){
				
				// print de geslecteerde game naam naar de console
				echo "<script>console.log('Game: {$game_data['naam']} is geselecteerd.'); </script>";

				// print de game data naar html met gebruik van interpolatie
				echo "<img src={$game_data['img1']} alt='foto van het spel' class='spel'>";
				echo "<img src={$game_data['img2']} alt='foto van het spel' class='spel3'>";
				echo "<img src={$game_data['img3']} alt='foto van het spel' class='spel3'>";
				echo "<div class='net'>";
				echo "<h1>Welkom bij {$game_data['naam']}</h1>";
				echo "<p><strong>Genre:</strong> {$game_data['type']}.</p>";
				echo "<p><strong>PEGI:</strong> {$game_data['pegi']}.</p>";
				echo "<p><strong>Release:</strong> {$game_data['rel']}.</p>";
				echo "<p><strong>Developer:</strong> {$game_data['dev']}.</p>";		
				echo "<p><strong>Beschrijving:</strong> {$game_data['desc']}</p>";
				echo "</div>";
			} else {
				// Meld dat de leeftijd te laag is voor deze game.
				echo "<div class='net'>";
				echo "De minimale leeftijd voor deze game is {$game_data['pegi']} jaar. U bent niet oud genoeg voor deze game.";
				echo "</div>";
			}
		} else {
			// als de leeftijd nog niet is ingevuld, dan het leeftijd invul formulier
			echo "<div class='net', 'select'>";
			echo "<form>";
			echo "<label for='fname'>Wat is je leeftijd? (in jaren)</label><br>";
			echo "<input type='number' id='leeftijd' name='leeftijd' max='100' min='0'><br>";
			echo"<input type='submit' value='Enter'>";
			echo"</form>";
			echo"</div>";
		}
?>
</div>
</main>
<footer></footer>
</body>