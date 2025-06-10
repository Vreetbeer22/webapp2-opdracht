<?php

$is_ingelogd = $_SESSION["ingelogt"] ?? false;  //wordt gebruikt om te kijken of gebruiker wel/niet is ingelogt

include_once "connect.php";
$db = new db();
$pdo = $db->get_connection();
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <title>Zwerfreis</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <div class="header">
        <div class="header-content">
            <img class="logo-zerfreis-header" src="images/logo-zwerfreis.png" alt="Zwerfreis logo">
            <h1>Zwerfreis</h1>
        </div>
        <nav class="header-content-text">
            <div class="header-content-links-inlog">
                <?php if ($is_ingelogd) { ?> <!-- Als er is ingelogd -->
                    <a href="loguit.php">Uitloggen</a>

                    <?php if ($_SESSION['role'] === 'admin') { ?>
                        <a href="admin.php">Beheerpaneel</a>
                    <?php } ?>
                <?php } else { ?> <!-- Als er niet is ingelogt -->
                    <a href="#" id="loginLink">Login</a>

                    <div id="loginModal" class="modal">
                        <div class="modal-content">
                            <span class="close">&times;</span>
                            <form action="login.php" method="post">
                                <h3>Inloggen</h3>
                                <label for="username">Gebruikersnaam:</label>
                                <input type="text" name="username" required>
                                <label for="password">Wachtwoord:</label>
                                <input type="password" name="password" required>
                                <button type="submit">Login</button>
                            </form>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="header-content-links">
                <a href="index.php">Home</a>
                <a href="informatie.php">Reizen</a>
                <a href="overons.php">Over ons</a>
                <a href="contact.php">Contact</a>
            </div>
        </nav>
    </div>
    <script src="js/inlogmenu.js"></script>