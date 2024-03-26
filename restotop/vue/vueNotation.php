<h1>Notation des restaurants</h1>
<table border="1">
<tr><th>idR</th><th>Restaurant</th><th>Ville</th><th>Nombre de critiques</th><th>Note 
moyenne</th></tr>
<?php foreach($listeRestos as $unResto){ ?>
 <tr>
 <td><?= $unResto['idR']?></td>
 <td><?= $unResto['nomR']?></td>
 <td><?= $unResto['villeR']?></td>
 <td><?= $unResto['critiques']?></td>
 <td><?= $unResto['moyenne']?></td>
 <td>

<a href=http://localhost/restotop/?action=detail&idR=<?=$unResto['idR']; ?>>Voir le détail</a>

</td>



</tr>
<?php } ?>
</table>


