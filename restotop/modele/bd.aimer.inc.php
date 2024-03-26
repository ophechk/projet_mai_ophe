<?php

include_once "bd.inc.php";

function getAimerByMailU($mailU) {
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from aimer where mailU=:mailU");
        $req->bindValue(':mailU', $mailU, PDO::PARAM_STR);
        $req->execute();
        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getAimerByIdR($idR) {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from aimer where idR=:idR");
        $req->bindValue(':idR', $idR, PDO::PARAM_INT);

        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getAimerById($mailU, $idR){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from aimer where mailU=:mailU and  idR=:idR");
        $req->bindValue(':idR', $idR, PDO::PARAM_INT);
        $req->bindValue(':mailU', $mailU, PDO::PARAM_STR);
        
        $req->execute();
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function addAimer($mailU, $idR) {
    $resultat = -1;
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("insert into aimer (mailU, idR) values(:mailU,:idR)");
        $req->bindValue(':idR', $idR, PDO::PARAM_INT);
        $req->bindValue(':mailU', $mailU, PDO::PARAM_STR);
        
        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function delAimer($mailU, $idR) {
    $resultat = -1;
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("delete from aimer where idR=:idR and mailU=:mailU");
        $req->bindValue(':idR', $idR, PDO::PARAM_INT);
        $req->bindValue(':mailU', $mailU, PDO::PARAM_STR);
        
        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}


if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // prog principal de test
    header('Content-Type:text/plain');

    echo "\n addAimer(\"mathieu.capliez@gmail.com\",1) : \n";
    print_r(addAimer("mathieu.capliez@gmail.com", 1));

    echo "\n addAimer(\"mathieu.capliez@gmail.com\",2) : \n";
    print_r(addAimer("mathieu.capliez@gmail.com", 2));

    echo "\n getAimerByMailU(\"mathieu.capliez@gmail.com\") : \n";
    print_r(getAimerByMailU("mathieu.capliez@gmail.com"));

    echo "\n getAimerByIdR(1) : \n";
    print_r(getAimerByIdR(1));
    
    echo "\n delAimer(\"mathieu.capliez@gmail.com\",2) : \n";
    print_r(delAimer("mathieu.capliez@gmail.com", 2));

    
}
?>