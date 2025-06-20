CREATE TABLE commandes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100),
    prenom VARCHAR(100),
    heure_retrait TIME,
    date_commande TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);