<?php
$host = "127.0.0.1";
$dbname = "clickandcollect";
$user = "root";
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connexion échouée : " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'] ?? '';
    $prenom = $_POST['prenom'] ?? '';
    $heure = $_POST['heure'] ?? ''; 

    $stmt = $pdo->prepare("INSERT INTO commandes (nom, prenom, heure_retrait) VALUES (?, ?, ?)");
    $stmt->execute([$nom, $prenom, $heure]);

    $ticket_id = $pdo->lastInsertId();
} else {
    header('Location: commande.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <title>Confirmation</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
    <header>
      <div class="logo-container">
        <img
          src="assets/Capture_d_e╠ücran_2025-05-14_a╠Ç_14.05.37-removebg-preview.png"
          alt="Logo L’Atelier de la Fève" />
        <div class="logo-text">
          <span>L’Atelier</span><br />
          <span>de la Fève</span>
        </div>
      </div>
      <nav class="center-nav">
        <ul>
          <li><a href="main.html">Home</a></li>
          <li><a href="commander.html">Commander</a></li>
          <li><a href="Cafés.html">Nos Cafés</a></li>
          <li><a href="Menu.html" target="_blank" rel="noopener noreferrer">Menu</a></li>
          <li><a href="#">En savoir plus</a></li>
        </ul>
      </nav>
      <div class="spacer"></div>
    </header>
    <main class="confirmation-container">
        <h2>Commande validée !</h2>
        <p>Votre numéro de ticket est :</p>
        <div><?= htmlspecialchars($ticket_id) ?></div>
    </main>
          <footer class="footer">
      <div class="footer-top">
        <div class="footer-logo">
          <img
            src="assets/Capture_d_e╠ücran_2025-06-04_a╠Ç_11.12.31-removebg-preview.png"
            alt="Logo L'Atelier de la Fève" />
        </div>
        <div class="footer-links">
          <h3>En Savoir plus</h3>
          <a href="#">À Propos de nous</a>
          <a href="#">Nous contacter</a>
          <a href="#">FAQ</a>
        </div>
        <div class="footer-social">
          <h3>Nos Réseaux</h3>
          <a href="#"
            ><img
              src="assets/Ico╠éne iPhone application blanc beige Instagram Insta re╠üseaux sociaux.jpg"
              alt="Instagram"
          /></a>
          <a href="#"
            ><img src="assets/beige tiktok logo­ƒº©.jpg" alt="TikTok"
          /></a>
          <a href="#"
            ><img src="assets/facebook - beige icon.jpg" alt="Facebook"
          /></a>
        </div>
      </div>
      <div class="footer-bottom">
        <a href="#">Données</a>
        <a href="#">Cookies</a>
        <a href="#">Politique de confidentialité</a>
        <a href="#">Condition d’utilisation</a>
      </div>
    </footer>
</body>
</html>
