<?php
// si on reçoit une donnée
if(isset($_GET['q'])) {
    $q = htmlentities($_GET['q']); // protection
     
    // connexion à la base de données
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=symfony', 'root', '');
    } catch(Exception $e) {
        exit('Impossible de se connecter à la base de données.');
    }
    // écriture de la requête
    $requete = "SELECT name FROM apps WHERE name LIKE '". $q ."%' LIMIT 0, 10";
    // exécution de la requête
    $resultat = $bdd->query($requete) or die(print_r($bdd->errorInfo()));
    // affichage des résultats
    while($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {
        echo $donnees['name'] ."\n";
    }
}
?>