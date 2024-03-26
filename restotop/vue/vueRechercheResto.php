
<h1>Recherche d'un restaurant</h1>
<form action="./?action=recherche&critere=<?= $critere ?>" method="POST">


    <?php
    switch ($critere) {
        case "nom":
            ?>
            Recherche par nom : <br />
            <input type="text" name="nomR" placeholder="nom" value="<?= $nomR ?>" /><br />
            <?php
            break;
        case "adresse":
            ?>
            Recherche par adresse : <br />
            <input type="text" name="villeR" placeholder="ville" value="<?= $villeR ?>"/><br />
            <input type="text" name="cpR" placeholder="code postal" value="<?= $cpR ?>"/><br />
            <input type="text" name="voieAdrR" placeholder="rue" value="<?= $voieAdrR ?>"/><br />
            <?php
            break;
        case "type":
            ?> 
            Recherche par type de cuisine :<br />
            Selectionner un ou plusieurs types de cuisine<br />
            <?php
            // mes types de cuisine
            for ($i = 0; $i < count($mesTypeCuisineAimes); $i++) {
                if (count($tabIdTC) == 0) {
                    $check = "checked"; // on ne provient pas du formulaire de recherche
                } else {
                    $check = ""; // on provient du formulaire de recherche, checked sera peut etre fait dans la condition suivante

                    if (in_array($mesTypeCuisineAimes[$i]['idTC'], $tabIdTC)) {
                        $check = "checked";
                    }
                }
                ?>
                <input type="checkbox" <?= $check ?> name="tabIdTC[]" id="aime<?= $i ?>" value="<?= $mesTypeCuisineAimes[$i]['idTC'] ?>" >
                <label for="aime<?= $i ?>"><?= $mesTypeCuisineAimes[$i]['libelleTC'] ?></label><br />
                <?php
            }
            // les autres types de cuisine
            for ($i = 0; $i < count($lesAutresTypesCuisine); $i++) {
                $check = "";
                if (in_array($lesAutresTypesCuisine[$i]['idTC'], $tabIdTC)) {
                    $check = "checked";
                }
                ?>
                <input type="checkbox" <?= $check ?> name="tabIdTC[]" id="autres<?= $i ?>" value="<?= $lesAutresTypesCuisine[$i]['idTC'] ?>" >
                <label for="autres<?= $i ?>"><?= $lesAutresTypesCuisine[$i]['libelleTC'] ?></label><br />
                <?php
            }
            ?>  <br /><?php
            break;
        case "multi":
            ?>
            Recherche multi-critères<br />
            <input type="text" name="nomR" placeholder="nom du restaurant" value="<?= $nomR ?>"/>
            <input type="text" name="voieAdrR" placeholder="rue" value="<?= $voieAdrR ?>"/><br />
            <input type="text" name="cpR" placeholder="code postal" value="<?= $cpR ?>"/>
            <input type="text" name="villeR" placeholder="ville" value="<?= $villeR ?>"/>

            <br />
            <?php
            // mes types de cuisine
            for ($i = 0; $i < count($mesTypeCuisineAimes); $i++) {
                if (count($tabIdTC) == 0) {
                    $check = "checked"; // on ne provient pas du formulaire de recherche
                } else {
                    $check = ""; // on provient du formulaire de recherche, checked sera peut etre fait dans la condition suivante

                    if (in_array($mesTypeCuisineAimes[$i]['idTC'], $tabIdTC)) {
                        $check = "checked";
                    }
                }
                ?>
                <input type="checkbox" <?= $check ?> name="tabIdTC[]" id="aime<?= $i ?>" value="<?= $mesTypeCuisineAimes[$i]['idTC'] ?>" >
                <label for="aime<?= $i ?>"><?= $mesTypeCuisineAimes[$i]['libelleTC'] ?></label><br />
                <?php
            }
            // les autres types de cuisine
            for ($i = 0; $i < count($lesAutresTypesCuisine); $i++) {
                $check = "";
                if (in_array($lesAutresTypesCuisine[$i]['idTC'], $tabIdTC)) {
                    $check = "checked";
                }
                ?>
                <input type="checkbox" <?= $check ?> name="tabIdTC[]" id="autres<?= $i ?>" value="<?= $lesAutresTypesCuisine[$i]['idTC'] ?>" >
                <label for="autres<?= $i ?>"><?= $lesAutresTypesCuisine[$i]['libelleTC'] ?></label><br />
                <?php
            }
            break;
    }
    ?>
    <br /><br />
    <input type="submit" value="Rechercher" />

</form>
