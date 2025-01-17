<html lang="nl">

<head>
	<meta charset="UTF-8">
	<!--Zorgt ervoor dat de pagina correct word weergegeven op mobiele apparaten.-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!--SEO (search engen optimation) Metagegevens -->
	<!-- Descripption voor zoekmachines en sociale media, omschrijft kort de inhoud van de pagina-->
	<meta name="description" content="een verzameling van games">
	<!-- Keywords Helpt zoekmachines begrijpen waar de pagina over gaat. -->
	<meta name="Keywords" content="gamestars, games, review,">
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
					'naam' => 'Far cry 6',
					'pegi' => 18,
					'type' => 'First-person shooter, action-adventure',
					'rel' => '2021',
					'dev' => 'Ubisoft Toronto',
					'img1' => 'fotos/farcry6.png',
					'img2' => 'fotos/fk6.jpg',
					'img3' => 'fotos/far.jpg',
					'rat' => '4',
					'desc' => 'De Far Cry-serie kent al lang een soort identiteitscrisis. Is het een hardgekookt overlevingsverhaal, of een gekke natuurkundige speeltuin met beren en vlammenwerpers? Het antwoord was meestal ‘een beetje van beide’, en dat hoeft niet per se slecht te zijn. Far Cry 6 gaat niet in tegen die trend – de vlammenwerper is absoluut nergens heen gegaan – maar het nieuwste deel slaagt er wel in om veel van de hobbels die de afgelopen paar games zijn opgedoken te verzachten, en wordt daarmee de beste de serie is al jaren oud, maar mist ook enkele stappen, vooral met het bijgewerkte inventarissysteem, en dat zorgt gaandeweg voor een aantal nieuwe problemen. In Far Cry 6 zit je opnieuw gevangen in een enorme open wereld die wordt bestuurd door een charismatische gek, dit keer op het fictieve eiland Yara. Zelfs na zoveel spellen is het nog steeds een goed idee om alle rode stippen op je kaart in blauwe te veranderen, of je nu elke vijandelijke bewaker stiekem het zwijgen oplegt of door de minder subtiele route te volgen door kogels en molotovs naar ze te gooien totdat niemand meer weet. wordt achtergelaten. '
				],
				'game2' => [
					'naam' => 'Assassins creed syndicate',
					'pegi' => 18,
					'type' => '	Action-adventure, stealth',
					'rel' => '2015',
					'dev' => 'Warner Bros. Interactive Entertainment',
					'img1' => 'fotos/creed.jpg',
					'img2' => 'fotos/assassin.jpg',
					'img3' => 'fotos/syndicate.jpg',
					'rat' => '5',
					'desc' => "Het plot van de game volgt het uitgangspunt van de Assassin's Creed-franchise, met een fictieve geschiedenis van gebeurtenissen uit de echte wereld waarin al eeuwenlang een geheime oorlog wordt uitgevochten tussen twee facties: de Assassins, die vrede en vrijheid bevorderen, en de Tempeliers, die naar vrede verlangen. via controle. Het verhaal speelt zich af in de 21e eeuw en bevat dezelfde naamloze en onzichtbare hoofdrolspeler uit Assassin's Creed Unity, die de Assassins helpt in hun race tegen de Tempeliers om een ​​artefact te vinden dat verborgen is in Londen. Het hoofdverhaal speelt zich af in Londen in 1868, aan het begin van de Tweede Industriële Revolutie, en volgt de tweeling Assassins Jacob en Evie Frye terwijl ze door de gangen van de georganiseerde misdaad navigeren en de stad heroveren van de controle van de Tempeliers. Het spel bevat ook segmenten die zich afspelen in 1916, tijdens de Eerste Wereldoorlog, en die Jacobs kleindochter Lydia Frye volgen. Het spel wordt gespeeld vanuit het perspectief van een derde persoon en de open wereld kan te voet of per koets worden genavigeerd. Syndicate introduceert nieuwe reissystemen in de serie, evenals verfijnde gevechts- en stealth-mechanica. Spelers besturen de twee hoofdpersonages gedurende het hoofdverhaal en wisselen tussen hen zowel tijdens als buiten missies. Na de lancering werd de game ondersteund met verschillende releases van downloadbare content (DLC), waaronder drie verhaaluitbreidingen. De meest opvallende hiervan, Jack the Ripper, speelt zich twintig jaar na de hoofdcampagne af en betreft Evie's achtervolging van de titulaire ongeïdentificeerde seriemoordenaar."
				],
			];


			// controleer welke link is gebruikt
			if (isset($_GET['game'])) {
				$game = $_GET['game'];
			} else {
				// als er geen link is gebruikt toon dan game 1
				$game = '1';
			}

			// laad de juiste game data gebaseerd op de id uit de link met switch
			switch ($game) {
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
			if (isset($_GET['leeftijd'])) {
				$leeftijd = $_GET['leeftijd'];

				// Maak het navigatie menu en voeg de leeftijd en de game ID toe als parameters
				echo "<nav class='tab'>";
				echo "<button class='tablinks' onclick='location.href=\"?game=1&leeftijd={$leeftijd}\";'>Far cry 6</button>";
				echo "<button class='tablinks' onclick='location.href=\"?game=2&leeftijd={$leeftijd}\";'>Assassins creed syndicate</button>";
				echo "</nav>";

				// controleer of de leeftijd hoger is dan de pegi
				if ($leeftijd > $game_data['pegi']) {

					// print de geslecteerde game naam naar de console
					echo "<script>console.log('Game: {$game_data['naam']} is geselecteerd.'); </script>";

					// stop de rating in een variabele
					$rating = $game_data['rat'];

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
					echo "<p><strong>Rating:</strong> {$rating}/5</p>";
					echo "<h4>Wil je {$game_data['naam']} een rating geven</h4>";
					//laat je de game beoordelen
					echo '<form action="ratings.php" method="post">';
					echo "<input type='hidden' name='rating' value='{$rating}'>";
					echo '<p><strong>Vul hier je naam in:</strong><br><input type="text" name="name"><br>';
					echo '<p><strong>vul hier de beschrijving in:</strong><br><textarea name="beschrijfing" rows="4" cols="50"></textarea><br>';
					echo '<p><strong>vul hier je rating in:</strong> <input type="number" name="user_rating" max="5" min="1"><br>';
					echo '<input type="submit">';
					echo '</form>';


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
				echo "<input type='submit' value='Enter'>";
				echo "</form>";
				echo "</div>";
			}
			?>
		</div>
	</main>
	<footer></footer>
</body>