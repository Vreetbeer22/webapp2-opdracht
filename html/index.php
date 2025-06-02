<?php
session_start();
include_once "connect.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Mouse+Memoirs&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>Home pagina</title>
</head>

<body>
    <nav>
        <?php
        include "header.php";
        ?>        
    </nav>
    <main>
        <div class="home-zoekblok">
            <img src="images/achtergrond-zoekblok.jpg" class="achtergrond-zoekblok" alt="plaatje met pad richting zon">
            <div class="tekst-zoekblok">
                <h2>Waar begint jouw reis?</h2>
            </div>
            <div class="zoekbalk-zoekblok">
                <form method="get">     <!-- zoekbalk -->
                    <input type="text" name="zoek" class="index-reis-zoeken" placeholder="Bestemming" value="">
                    <input type="text" name="zoek" class="index-reis-zoeken" placeholder="vertrekdatum" value="">
                    <button type="submit" class="zoekknop-zoekblok">Zoeken</button>
                </form>
            </div>
        </div>
        <div class="home-snelzoeken">
            <div class="onder">
                <div class="blok-buiteneuropa blok onder">
                    <img src="images/plaatje-buiten-europa.png" class="plaatjes-snelzoeken" alt="">
                    <div class="lijntje"></div>
                    <button class="blok-snelzoeken">
                        <h3>Buiten Europa</h3>
                        <img src="images/pijltje-snelzoeken.png" class="plaatje-pijltje-snelzoeken" alt="pijltje">
                    </button>
                </div>
                <div class="blok-binneneuropa blok onder">
                    <img src="images/plaatje-binnen-europa.png" class="plaatjes-snelzoeken" alt="">
                    <div class="lijntje"></div>
                    <button class="blok-snelzoeken">
                        <h3>Binnen europa</h3>
                        <img src="images/pijltje-snelzoeken.png" class="plaatje-pijltje-snelzoeken" alt="pijltje">
                    </button>
                </div>
            </div>
            <div class="onder">
                <div class="blok-wintervakantie blok onder">
                    <img src="images/plaatje-winter-vakantie.png" class="plaatjes-snelzoeken" alt="">
                    <div class="lijntje"></div>
                    <button class="blok-snelzoeken">
                        <h3>Winter Vakantie</h3>
                        <img src="images/pijltje-snelzoeken.png" class="plaatje-pijltje-snelzoeken" alt="pijltje">
                    </button>
                </div>
                <div class="blok-zomervakantie blok onder">
                    <img src="images/plaatje-zomer-vakantie.png" class="plaatjes-snelzoeken" alt="">
                    <div class="lijntje"></div>
                    <button class="blok-snelzoeken">
                        <h3>Zomer Vakantie</h3>
                        <img src="images/pijltje-snelzoeken.png" class="plaatje-pijltje-snelzoeken" alt="pijltje">
                    </button>
                </div>
            </div>
        </div>
        <div class="blok-waarom">
            <div class="lijntje-waarom"></div>
            <h4>Waarom boeken bij Zwerfreis?</h4>
            <div class="lijntje-waarom"></div>
        </div>
    </main>
    <footer>

    </footer>
</body>

</html>