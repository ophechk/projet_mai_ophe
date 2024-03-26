<?php

function controleurPrincipal($action){
    $lesActions = array();
    $lesActions["defaut"] = "index.html";
    $lesActions["condition"] = "conditions_utilisation.html";
    $lesActions["contact"] = "Contactez_nous.html";
    $lesActions["apero"] = "detail_coffret_apero.html";
    $lesActions["boisson"] = "detail_coffret_boissons_bio.html";
    $lesActions["dejeuner"] = "detail_coffret_dejeuner.html";
    $lesActions["gouter"] = "detail_coffret_gouter.html";
    $lesActions["surprise"] = "detail_coffret_surprise.html";
    $lesActions["petitdej"] = "detail_petit_dej.html";
    $lesActions["inscription"] = "inscription.html";
    $lesActions["mentions"] = "mentions_legales.html";
    $lesActions["panier"] = "Panier.html";
 

    
    if (array_key_exists ( $action , $lesActions )){
        return $lesActions[$action];
    }
    else{
        return $lesActions["defaut"];
    }

}

?>