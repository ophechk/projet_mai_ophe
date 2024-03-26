<?php

include_once "bd.inc.php";

function getRestoByIdR($idR) {

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from resto where idR=:idR");
        $req->bindValue(':idR', $idR, PDO::PARAM_INT);

        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getRestos() {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from resto");
        $req->execute();

        while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
            $resultat[] = $ligne;
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getTop4Restos() {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select resto.*,sum(note) from resto, critiquer where resto.idR=critiquer.idR group by idR order by sum(note) desc limit 4 ");
        $req->execute();

        while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
            $resultat[] = $ligne;
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getRestosByMotsCles($tabMots) {
    $resultat = array();

    $filtre = "";
    for ($i = 0; $i < count($tabMots); $i++) {
        $filtre .= " or  nomR like '%:mot$i%' ";
        $filtre .= " or  villeR like '%:mot$i%' ";
    }

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from resto " . $filtre);
        $req->execute();

        while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
            $resultat[] = $ligne;
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getRestosByTypesCuisine($tabIdTC) {
    $resultat = array();

    if (count($tabIdTC) > 0) {
        $filtre = "idTC = $tabIdTC[0] ";
        for ($i = 1; $i < count($tabIdTC); $i++) {
            $filtre .= " or  idTC = $tabIdTC[$i] ";
        }

        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("select distinct resto.* from resto,proposer where resto.idR=proposer.idR and (" . $filtre . ") order by nomR");
            $req->execute();

            while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
                $resultat[] = $ligne;
            }
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    } else {
        return false;
    }
}

function getRestosByNomR($nomR) {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from resto where nomR like :nomR");
        $req->bindValue(':nomR', "%" . $nomR . "%", PDO::PARAM_STR);

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

function getRestosByAdresse($voieAdrR, $cpR, $villeR) {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from resto where voieAdrR like :voieAdrR and cpR like :cpR and villeR like :villeR");
        $req->bindValue(':voieAdrR', "%" . $voieAdrR . "%", PDO::PARAM_STR);
        $req->bindValue(':cpR', $cpR . "%", PDO::PARAM_STR);
        $req->bindValue(':villeR', "%" . $villeR . "%", PDO::PARAM_STR);
        $req->execute();

        while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
            $resultat[] = $ligne;
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getRestosByMultiCriteres($nomR, $voieAdrR, $cpR, $villeR, $tabIdTC) {
    $resultat = array();
    $filtre = "";
    if (count($tabIdTC) > 0) {
        $filtre = "and (idTC = $tabIdTC[0] ";
        for ($i = 1; $i < count($tabIdTC); $i++) {
            $filtre .= " or  idTC = $tabIdTC[$i] ";
        }
        $filtre .= ")";
    }
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select distinct resto.* from resto,proposer where resto.idR=proposer.idR and nomR like :nomR and  voieAdrR like :voieAdrR and cpR like :cpR and villeR like :villeR  $filtre order by nomR");
        $req->bindValue(':nomR', "%" . $nomR . "%", PDO::PARAM_STR);
        $req->bindValue(':voieAdrR', "%" . $voieAdrR . "%", PDO::PARAM_STR);
        $req->bindValue(':cpR', $cpR . "%", PDO::PARAM_STR);
        $req->bindValue(':villeR', "%" . $villeR . "%", PDO::PARAM_STR);
        $req->execute();

        while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
            $resultat[] = $ligne;
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getRestosAimesByMailU($mailU) {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select resto.* from resto,aimer where resto.idR = aimer.idR and mailU = :mailU");
        $req->bindValue(':mailU', $mailU, PDO::PARAM_STR);
        $req->execute();

        while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
            $resultat[] = $ligne;
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // prog principal de test
    header('Content-Type:text/plain');

    echo "getRestos() : \n";
    print_r(getRestos());

    echo "getRestoByIdR(idR) : \n";
    print_r(getRestoByIdR(1));

    echo "getRestosByNomR(nomR) : \n";
    print_r(getRestosByNomR("charcut"));

    echo "getRestosByAdresse(voieAdrR, cpR, villeR) : \n";
    print_r(getRestosByAdresse("Ravel", "33000", "Bordeaux"));
}
?>