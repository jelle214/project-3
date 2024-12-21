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
<body> 
          <!-- Navigatiebalk -->
    <nav>
        <a href="index.html">Home</a>
        <a href="Merchandise.html">Merchandise</a>
        <a href="Contact.html">Contact</a>
        <a href="games.html">Games</a>
    </nav>
    <nav class="tab">        
		<button class="tablinks" onclick="location.href='?game=1';">Overcooked</button>
		<button class="tablinks" onclick="location.href='?game=2';">Wicher</button>        
    </nav>
    <main>
	<div id="gamedata">
	
	<?php
		// de game data arrays
		$games_data = [
			'game1' => [
				'naam'=>'Overcooked 2',
				'pegi'=> 12,
				'type' =>'actie, casual, indie',
				'rel' =>'2018',
				'dev' =>'Team17, Ghost Town Games',
				'img' => 'fotos/Overcooked.webp',
				'desc' => 'Overcooked 2 is a chaotic co-op cooking game for 1-4 players in which you must serve a variety of recipes including sushi,pasta, cakes, burgers and burritos to hungry customers in a series of unconventional kitchens. Whether it be a hot air balloon, a magical Wizard’s school or even another planet, you’ll have to be bready for anything. Work solo or with up to three friends to prep orders while overcoming obstacles such as fire, collapsing floors, overbearing waiters and of course, the classic kitchen problem of floating work surfaces.'
				],
			'game2' => [
				'naam'=>'The Wicher',
				'pegi'=> 12,
				'type' =>'actie, rollenspel',
				'rel' =>'2007',
				'dev' =>' CD Projekt RED',
				'img' => 'fotos/tww.png',
				'desc' => "The Witcher (Polish: Wiedźmin pronounced [ˈvʲɛd͡ʑmʲin]) is a 2007 action role-playing game developed by CD Projekt Red for Microsoft Windows and CD Projekt on OS X. It was based on the fantasy novel series The Witcher by Polish author Andrzej Sapkowski. The games story takes place after the events of the main saga. It was released in 2007 to positive reviews from critics. In 2009, a console version, The Witcher: Rise of the White Wolf, was scheduled for release using an entirely new engine and combat system. This was suspended as a result of payment problems with console developers Widescreen Games. The first game has, to date, two sequels, namely The Witcher 2: Assassins of Kings in 2011 and The Witcher 3: Wild Hunt in 2015."
				],
			];

		// controleer welke link is gebruikt
		if(isset($_GET['game'])) {
			$game=$_GET['game'];
		}else{
			// als er geen link is gebruikt toon dan game 1
			$game='1';
		}

		// laad de juiste game data gebaseerd op de link met een if statement
		if ($game == "1"){
			$game_data = $games_data['game1'];
		} elseif ($game == "2"){
			$game_data = $games_data['game2'];
		} else {
			$game_data = $games_data['game1'];
		}

		// print de geslecteerde game naam naar de console
		echo "<script>console.log('Game: {$game_data['naam']} is geselecteerd.'); </script>";

		// print de game data naar html met gebruik van interpolatie
		echo "<img src={$game_data['img']} alt='foto van het spel' class='spel'>";
		echo "<div class='net'>";
		echo "<h1>Welkom bij {$game_data['naam']}</h1>";
		echo "<p><strong>Genre:</strong> {$game_data['type']}.</p>";
		echo "<p><strong>PEGI:</strong> {$game_data['pegi']}.</p>";
		echo "<p><strong>Release:</strong> {$game_data['rel']}.</p>";
		echo "<p><strong>Developer:</strong> {$game_data['dev']}.</p>";		
		echo "<p><strong>Beschrijving:</strong> {$game_data['desc']}</p>";
		echo "</div>";
?>
 </div>
</main>
<footer></footer>
</body>