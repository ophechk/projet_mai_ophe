
<h1>Modifier mon profil</h1>

Mon adresse électronique : <?= $util["mailU"] ?> <br />
Mettre à jour mon pseudo : 
<form action="./?action=updProfil" method="POST">
    <input type="text" name="pseudoU" placeholder="Nouveau pseudo" /><br />
    <input type="submit" value="Enregistrer" />
    <hr>
    Mettre à jour mon mot de passe : <br />
    <?= $messageMdp ?>
    <input type="password" name="mdpU" placeholder="Nouveau mot de passe" /><br />
    <input type="password" name="mdpU2" placeholder="Confirmer la saisie" /><br />
    <input type="submit" value="Enregistrer" />
    
    <hr>

    Gerer les restaurants que j'aime : <br />
    <?php for ($i = 0; $i < count($mesRestosAimes); $i++) { ?>
        <input type="checkbox" name="lstidR[]" id="resto<?= $i ?>" value="<?= $mesRestosAimes[$i]['idR'] ?>" >
        <label for="resto<?= $i ?>"><?= $mesRestosAimes[$i]['nomR'] ?></label><br />
    <?php } ?>
    <input type="submit" value="Supprimer" />

    <hr>
    
    Les types de cuisine que j'aime : <br />
    <ul id="tagFood">
    <?php for ($i = 0; $i < count($mesTypeCuisineAimes); $i++) { ?>
        <input type="checkbox" name="delLstidTC[]" id="delType<?= $i ?>" value="<?= $mesTypeCuisineAimes[$i]['idTC'] ?>" >
        <label for="delType<?= $i ?>"><li class="tag"><span class="tag">#</span><?= $mesTypeCuisineAimes[$i]['libelleTC'] ?></li></label><br />
    <?php } ?>
    </ul>
    <br />
    <input type="submit" value="Supprimer" />
    <br /><br />
    
    
    <hr>
    
    Choisir d'autres types de cuisine : <br />
    <ul id="tagFood">
    <?php for ($i = 0; $i < count($lesAutresTypesCuisine); $i++) { ?>
        <input type="checkbox" name="addLstidTC[]" id="addType<?= $i ?>" value="<?= $lesAutresTypesCuisine[$i]['idTC'] ?>" >
        <label for="addType<?= $i ?>"><li class="tag"><span class="tag">#</span><?= $lesAutresTypesCuisine[$i]['libelleTC'] ?></li></label><br />
    <?php } ?>
    </ul>
    <br />
    <input type="submit" value="Ajouter" />
    <br /><br />
    
    
    
    
</form>


