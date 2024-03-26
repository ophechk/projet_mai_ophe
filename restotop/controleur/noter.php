<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/bd.critiquer.inc.php";
include_once "$racine/modele/authentification.inc.php";


// recuperation des donnees GET, POST, et SESSION
$idR = $_GET["idR"];
$note = $_GET["note"];

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 

$mailU = getMailULoggedOn();
if ($mailU != "") {
    $critiquer = getCritiquerById($idR, $mailU);

// traitement si necessaire des donnees recuperees
    ;
    if ($critiquer == false) {
        
        addCritiquer($idR, $mailU);
        updCritiquerNote($idR, $mailU, $note);
    } else {
        updCritiquerNote($idR, $mailU, $note);
    }
}

// redirection vers le referer
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>