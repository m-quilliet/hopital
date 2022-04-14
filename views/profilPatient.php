<section id="image">
    <div class="card">
        <div class="header"></div>
        <div>
            <h2><?=ucwords($idProfil->lastname) ?></h2>
            <h3><?=ucwords($idProfil->firstname) ?></h3>
            <hr><hr>
            <p>Date de Naissance : <?= $idProfil->birthdate ?></p>
            <p>N° de téléphone : <?= $idProfil->phone ?></p>
            <p>Adresse Mail : <?= $idProfil->mail ?></p>
        </div>
        <div class="text-center">
            <a href="/controllers/addPatientController.php">
            <button type="button" class="btn btn-outline-warning"><span> Modifier les informations </span></button>
            </a>
        </div>
    </div>
</section>