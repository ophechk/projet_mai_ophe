<?php

include_once "bd.inc.php";

function getProposerByIdR($idR) {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from proposer where idR=:idR");
        $req->bindValue(':idR', $idR, PDO::PARAM_INT);

        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getProposerByIdTC($idTC) {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from proposer where idTC=:idTC");
        $req->bindValue(':idTC', $idTC, PDO::PARAM_INT);

        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function addProposer($idR, $idTC) {
    $resultat = -1;
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("insert into proposer (idR, idTC) values(:idR,:idTC)");
        $req->bindValue(':idR', $idR, PDO::PARAM_INT);
        $req->bindValue(':idTC', $idTC, PDO::PARAM_INT);

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

    echo "\n addProposer(1,1) : \n";
    print_r(addProposer(1, 1));

    echo "\n addProposer(2,1) : \n";
    print_r(addProposer(2, 1));

    echo "\n addProposer(3,3) : \n";
    print_r(addProposer(3, 3));

    echo "\n getProposerByIdR(1) : \n";
    print_r(getProposerByIdR(1));

    echo "\n getProposerByIdTC(3) : \n";
    print_r(getProposerByIdTC(3));
}
?>