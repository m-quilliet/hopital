<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="title-add-patient pt-5 pb-2">Liste des Patients</h1>
            </div>
        </div>

        <div class="container table-responsive py-3 pb-5">
            <form action="" method="POST">
                <input id="search" type="search" placeholder="Rechercher un patient" name="search" value="<?= $search ?? '' ?>">
                <input type="submit" value="Rechercher">
            </form>
            <table class="table table-bordered table-hover table-success table-striped" data-toggle="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">LASTNAME</th>
                        <th scope="col">FIRSTNAME</th>
                        <th scope="col">PHONE</th>
                        <th scope="col">MAIL</th>
                        <th scope="col">FICHE</th>
                        <th scope="col">SUPP</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listPatients as $patient) : ?>
                        <tr>
                            <td><?= $patient->id ?></td>
                            <td><?= strtoupper($patient->lastname) ?></td>
                            <td><?= ucwords($patient->firstname) ?></td>
                            <td><a id="phone" href="mailto: <?= $patient->phone ?>"><?= $patient->phone ?></a></td>
                            <td><a href="mailto: <?= $patient->mail ?>"><?= $patient->mail ?></a></td>
                            <td><a id="info" href="/controllers/profilPatientController.php?id=<?= $patient->id ?>"><img src="/public/assets/img/iconEye.png" alt="icone info"></a></td>
                            <td><a id="delete" href="/controllers/deletePatientController.php?id=<?= $patient->id ?>"><img src="/public/assets/img/delete-30.png"></a></td>
                        </tr>
                    <?php endforeach ?>

                </tbody>
            </table>
            <div class="text-end">
                <a href="/controllers/addPatientController.php">
                    <img src="/public/assets/img/icons8-plus-2-mathématique-40.png"><button type="submit" class="btn"><span> Ajouter un patient</span></button>
                </a>
            </div>

            <div class="text-center">
                <?php for ($i = 0; $i < $nbPages; $i++) { ?>
                    <a href="/controllers/listPatientController.php?page=<?= $i + 1 ?>">
                        <button type="button" id="pagination" class="btn"><?= $i + 1 ?></button>
                    </a>
                <?php } ?>
            </div>
        </div>


    </div>
</main>