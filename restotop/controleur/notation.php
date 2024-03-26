<?php
include_once "$racine/modele/bd.resto.inc.php"; 

$listeRestos = getRestosNotation(); 

// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "Notation des restaurants"; 
include "$racine/vue/entete.html.php"; 
include "$racine/vue/vueNotation.php"; //vue à coder 
include "$racine/vue/pied.html.php"; 

//Nouvelle fonction getRestosNotation() dans le modele bd.resto.inc.php 
function getRestosNotation() { 
 $resultat = array(); 
 try { 
 $cnx = connexionPDO(); 
 $req = $cnx->prepare("select resto.idR,nomR,villeR, count(*)as 
'critiques', avg(note) as 'moyenne'
 from resto,critiquer 
 where critiquer.idR=resto.idR
 group by resto.idR,nomR"); 
 $req->execute(); 
 $ligne = $req->fetch(PDO::FETCH_ASSOC); 
 while ($ligne) { 
 $resultat[] = $ligne; 
 $ligne = $req->fetch(PDO::FETCH_ASSOC); 
 } 
 } catch (PDOException $e) { 
 print "Erreur !: " . $e->getMessage(); 
 die(); 
 } 
 return $resultat; 
} 
