<html lang="nl">
<head>
    <meta charset="UTF-8">
    <!--Zorgt ervoor dat de pagina correct word weergegeven op mobiele apparaten.-->
    <meta name="viewport" content="width=device-width, initial-scale=1,0">
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
<body> <img src= "fotos/Overcooked.webp" alt="foto van het spel" class="spel">
          <!-- Navigatiebalk -->
    <nav>
        <a href="index.html">Home</a>
        <a href="Merchandise.html">Merchandise</a>
        <a href="Contact.html">Contact</a>
        <a href="games.html">Games</a>
    </nav>
    <main>
        <?php
$game = 1;
            $games = array(
                'spel'=>'<h1>overcooked2</h1>', 
                'beschrijfing'=>'Overcooked 2 is a chaotic co-op cooking game for 1-4 players in which you must serve a variety of recipes including sushi,
                                    pasta, cakes, burgers and burritos to hungry customers in a series of unconventional kitchens. Whether it be a hot air balloon,
                                    a magical Wizard’s school or even another planet, you’ll have to be bready for anything.
                                    Work solo or with up to three friends to prep orders while overcoming obstacles such as fire, collapsing floors, overbearing waiters and of course,
                                    the classic kitchen problem of floating work surfaces.', 
                'spel2' => "<h1>The Wicher</h1> ", 
                'beschrijfing2' =>"The Witcher (Polish: Wiedźmin pronounced [ˈvʲɛd͡ʑmʲin]) is a 2007 action role-playing game developed by CD Projekt Red for Microsoft Windows and CD Projekt on OS X.
                                    It was based on the fantasy novel series The Witcher by Polish author Andrzej Sapkowski. The games story takes place after the events of the main saga.[4][5]
                                   It was released in 2007 to positive reviews from critics. In 2009, a console version, The Witcher: Rise of the White Wolf,
                                    was scheduled for release using an entirely new engine and combat system. This was suspended as a result of payment problems with console developers Widescreen Games. 
                                    The first game has, to date, two sequels, namely The Witcher 2: Assassins of Kings in 2011 and The Witcher 3: Wild Hunt in 2015.");

           if ($game == 1){
           echo $games['spel'];
           echo $games['beschrijfing'];}
           
           elseif ($game == 2){
            echo $games['spel2'];
            echo $games['beschrijfing2'];}
            
            else {'<h1>error</h1>';}
           ?>

        
    </main>
    <footer></footer>
</body>