<h1>Nos cinémas</h1>

<a href="?type=cinema&action=new" class="btn btn-secondary">Ajoutez un cinéma</a>


<?php foreach($cinemas as $cinema){ ?> 
    <hr>
    <h2> <?=$cinema->getNom()?> </h2>
    <h3> <?=$cinema->getAdresse()?> </h3>
    <h3> <?=$cinema->getVille()?> </h3>

    <form action="" method="delete">
    <button type ="submit" name="id" value="<?=$cinema->getId() ?>" class="btn btn-warning">Supprimer ce cinéma</button>
    </form>
    <a href="?type=cinema&action=show=<?=$cinema->getId()?>" class="btn btn-primary">Voir ce cinéma</a>
    <hr>

    <?php } ?>