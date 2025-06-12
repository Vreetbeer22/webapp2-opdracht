<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Document</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <main>
        <div class="contact">
            <h2>Neem contact met ons op</h2>
            <div class="container">
                <div class="contact-form">
                    <form>
                        <label for="naam">Naam:</label>
                        <input type="text" id="naam" name="naam">

                        <label for="email">E-mailadres:</label>
                        <input type="email" id="email" name="email">

                        <label for="onderwerp">Onderwerp:</label>
                        <input type="text" id="onderwerp" name="onderwerp">

                        <label for="bericht">Bericht:</label>
                        <textarea id="bericht" name="bericht" rows="4"></textarea>


                    </form>
                    <button type="submit">Verstuur</button>
                </div>
                <div class="contact-info">
                    <h3>Contact gegevens</h3>
                    <p>📍 Adres<br>Postcode</p>
                    <p>📞 Telefoonnummer</p>
                    <p>✉️ Mailadres</p>

                    <div class="hours">
                        <h3>Openingstijden</h3>
                        <p>Ma - Vr: 7:00 tot 21:00</p>
                        <p>Zaterdag: 9:30 tot 20:00</p>
                        <p>Zondag: Gesloten</p>
                    </div>

                    <iframe class="map-button" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3213.961910268009!2d5.866229177106125!3d51.82704468730163!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c7094758831e59%3A0x606c614ce9de3505!2sROC%20Nijmegen%20-%20Heyendaalseweg!5e1!3m2!1snl!2snl!4v1748416752710!5m2!1snl!2snl" width="600" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </main>
    <?php include 'footer.php'; ?>
</body>

</html>