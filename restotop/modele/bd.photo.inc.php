<?php

include_once "bd.inc.php";

function getPhotosByIdR($idR) {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from photo where idR=:idR");
        $req->bindValue(':idR', $idR, PDO::PARAM_INT);

        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getPhotoByIdP($idP) {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from photo where idP=:idP");
        $req->bindValue(':idP', $idP, PDO::PARAM_INT);
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function addPhoto($idP, $cheminP, $idR) {
    $resultat = -1;
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("insert into photo (idP, cheminP, idR) values(:idP,:cheminP,:idR)");
        $req->bindValue(':idP', $idP, PDO::PARAM_INT);
        $req->bindValue(':cheminP', $cheminP, PDO::PARAM_STR);
        $req->bindValue(':idR', $idR, PDO::PARAM_INT);

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

    echo "\n addPhoto(0, \"entrepote1.jpg\",1) : \n";
    print_r(addPhoto(0, "entrepote1.jpg", 1));

    echo "\n addPhoto(1, \"entrepote2.jpg\",1) : \n";
    print_r(addPhoto(1, "entrepote2.jpg", 1));

    echo "\n addPhoto(2, \"sapporo1.jpg\",3) : \n";
    print_r(addPhoto(2, "sapporo1.jpg", 3));



    echo "\n getPhotosByIdR(1) : \n";
    print_r(getPhotosByIdR(1));

    echo "\n getPhotosByIdR(3) : \n";
    print_r(getPhotosByIdR(3));

    echo "\n getPhotoByIdP(1) : \n";
    print_r(getPhotoByIdP(1));
}
?>