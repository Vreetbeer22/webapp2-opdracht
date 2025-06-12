<?php
session_start();

if (!isset($_SESSION['ingelogt']) || $_SESSION['role'] !== 'admin') {
    header("Location: index.php");
    exit;
}
?>
<?php
include "connect.php";
$database = new db();
$pdo = $database->get_connection();

//toevoegen
if (isset($_POST['toevoegen'])) {
    $locatie = $_POST['locatie'];
    $omschrijving = $_POST['omschrijving'];
    $prijs = $_POST['prijs'];
    $datum = $_POST['datum'];
    $personen = $_POST['personen'];

    try {
        $stmt = $pdo->prepare("INSERT INTO reizen (locatie, omschrijving, prijs, datum, personen) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$locatie, $omschrijving, $prijs, $datum, $personen]);
        $melding = "Item succesvol toegevoegd";
    } catch (PDOException $e) {
        $melding = "Fout bij toevoegen: " . $e->getMessage();
    }

}

//aanpassen
if (isset($_POST["aanpassen"])) {
    $id = $_POST['id'];
    $locatie = $_POST['locatie'];
    $omschrijving = $_POST['omschrijving'];
    $prijs = $_POST['prijs'];
    $datum = $_POST['datum'];
    $personen = $_POST['personen'];
    $stmt = $pdo->prepare("UPDATE reizen SET locatie = ?, omschrijving = ?, prijs = ?, datum = ?, personen = ? WHERE id = ?");
    $stmt->execute([$locatie, $omschrijving, $prijs, $datum, $personen, $id]);
}

//verwijderen
if (isset($_POST["verwijderen"])) {
    $id = $_POST["id"];
    $locatie = $_POST["locatie"];

    if (!empty($id) && !empty($locatie)) {
        $stmt = $pdo->prepare("DELETE FROM reizen WHERE id = ? OR locatie = ?");
        $stmt->execute([$id, $locatie]);
    } elseif (!empty($id)) {
        $stmt = $pdo->prepare("DELETE FROM reizen WHERE id = ?");
        $stmt->execute([$id]);
    } elseif (!empty($locatie)) {
        $stmt = $pdo->prepare("DELETE FROM reizen WHERE locatie = ?");
        $stmt->execute([$locatie]);
    }
}

?>
<?php if (isset($melding)): ?>
    <div class="melding">
        <p><?= $melding ?></p>
    </div>
<?php endif; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Document</title>
</head>

<body>
    <?php
    include "header.php";
    ?>
    <main>
        <div class="admin-body">
            <div class="naast ruimte-tussen">
                <div class="form-blok">
                    <form method="post">
                        Locatie: <input type="text" name="locatie" class="invulbalk" required><br>
                        Omschrijving: <textarea name="omschrijving" class="invulbalk"></textarea><br>
                        Prijs <input type="price" name="prijs" class="invulbalk" required><br>
                        Datum <input type="date" name="datum" class="invulbalk" required><br>
                        Personen <input type="number" name="personen" class="invulbalk" required><br>
                        <button type="submit" name="toevoegen" class="invulbalk">Toevoegen</button>
                    </form>
                </div>
                <div class="form-blok">
                    <form method="post">
                        Id: <input type="text" name="id" class="invulbalk" required><br>
                        Locatie: <input type="text" name="locatie" class="invulbalk" required><br>
                        Omschrijving: <textarea name="omschrijving" class="invulbalk"></textarea><br>
                        Prijs <input type="price" name="prijs" class="invulbalk" required><br>
                        Datum <input type="date" name="datum" class="invulbalk" required><br>
                        Personen <input type="number" name="personen" class="invulbalk" required><br>
                        <button type="submit" name="aanpassen" class="invulbalk">Aanpassen</button>
                    </form>
                </div>
                <div class="form-blok">
                    <form method="post">
                        Id: <input type="text" name="id" class="invulbalk"><br>
                        Locatie: <input type="text" name="naam" class="invulbalk"><br>
                        <button type="submit" name="verwijderen" class="invulbalk">verwijderen</button>
                    </form>
                </div>
            </div>
        </div>
        <?php

        require_once 'connect.php';

        $db = new db();

        $sql = "SELECT * FROM `reizen`;";
        $result = $db->get_connection()->query($sql);

        foreach ($result as $row) {


            $template = '
                    <p class="menu-item">%s - %s, %s - €%s - %s, %s personen</p>
                ';

            echo sprintf($template, $row["id"], $row["locatie"], $row["omschrijving"], $row["prijs"], $row["datum"], $row["personen"]);
        }
        ?>
    </main>
    <footer>

    </footer>
</body>
    <script src="js/melding.js"></script>
</html>