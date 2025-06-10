<?php
session_start();

$servername = "db";
$username = "user";
$password = "password";
$database = "mydatabase";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$database;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Databaseverbinding mislukt: " . $e->getMessage() . "<br>Controleer of de database bestaat en of de gebruiker de juiste rechten heeft.");
}

$stmt = $pdo->query("SHOW TABLES LIKE 'gebruiker'");
$tableExists = $stmt->rowCount() > 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userInput = trim($_POST['username'] ?? '');
    $passInput = trim($_POST['password'] ?? '');

    if (!empty($userInput) && !empty($passInput)) {
    // Probeer eerst als admin
    $stmt = $pdo->prepare("SELECT * FROM admins WHERE naam = :username AND wachtwoord = :password");
    $stmt->bindValue(':username', $userInput);
    $stmt->bindValue(':password', $passInput);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $_SESSION['ingelogt'] = true;
        $_SESSION['user'] = $userInput;
        $_SESSION['role'] = 'admin';
        header("Location: admin.php");
        exit;
    }

    // Probeer dan als gewone gebruiker
    $stmt = $pdo->prepare("SELECT * FROM gebruiker WHERE naam = :username AND wachtwoord = :password");
    $stmt->bindValue(':username', $userInput);
    $stmt->bindValue(':password', $passInput);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $_SESSION['ingelogt'] = true;
        $_SESSION['user'] = $userInput;
        $_SESSION['role'] = 'gebruiker';
        header("Location: index.php");  // <-- Verander dit naar jouw gebruikerspagina
        exit;
    }

    // Geen gebruiker gevonden
    header("Location: index.php?error=1");
    exit;
}
}
?>