    <h1> <?=$cinema->getNom()?> </h1>
    <h2> <?=$cinema->getAdresse()?> </h2>
    <h2> <?=$cinema->getVille()?> </h2>

    <form action="?type=cinema&action=suppr" method="delete">
     <button type ="submit" name="id" value="<?=$cinema->getId() ?>" class="btn btn-warning">Supprimer ce vélo</button>
    </form>

<a href="?type=cinema&action=index" class="btn btn-secondary">Retour a la liste des cinémas</a>
    <hr>
