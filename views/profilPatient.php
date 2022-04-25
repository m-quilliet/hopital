
<section>
<p><?= $errorMessage ?? ''?></p>
<?php if (empty ($errorMessage)){?> 
    <div class="card">


        <div class="header"></div>
        <div>
            <h2><?=ucwords($idProfil->lastname) ?></h2>
            <h3><?=ucwords($idProfil->firstname) ?></h3>
            <hr><hr>
            <p>Date de Naissance : <?= $idProfil->birthdate ?></p>
            <p>N° de téléphone :<a href="tel" <?= $idProfil->phone ?>></a></p>
            <p>Adresse Mail :<a href="mailto" <?= $idProfil->mail ?>></a></p>
            <hr>
            <h3><small>Rendez-vous</small></h3>
            <?php foreach ($allApptById as $result) : ?>
            <hr>
            <p>Date :<?= date('d/m/Y', strtotime($result->dateHour))?? '' ?></p>
            <p>Heure :<?= date('H:i', strtotime($result->dateHour))?? '' ?></p>
            <?php endforeach ?>
        </div>

        <div class="text-center">
            <a href="/controllers/modifPatientController.php?id=<?= $idProfil->id?>">
            <button type="button" class="btn btn-outline-warning"><span> Modifier les informations </span></button>
            </a>
        </div>
    </div>
    <?php 
} ?>
</section>


<!-- //require once appelé la premiére fois
    //getMessage=  méthode de la classe patient de l'objet pdo exception 
    //filter input= 
    //methode prepare= retourne un objet de type pdo stmt ms a^partient à la calsse pdo
    //trown new pdo eception= ca transfére l'erreur ds le catch (avec un para d'entree)et on va pouvoir lui passer un message qu'on pourra récupérer
    avec méthode getmessage
    //fetch all() retourne tt les enregistrement dder par requete// methode pdo stmt retourne un tableau d'objet ar on a définit au préalable
    //database::dbconnect retourne l'objet pdo
    //__contruct : hydrate notre objet avec des setteurs qui affecte des vaeurs aux attributs
-->