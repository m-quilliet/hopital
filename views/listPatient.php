<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="title-add-patient pt-5 pb-5">Liste des Patients</h1>
            </div>
        </div>

        <div class="container table-responsive py-3 pb-5"> 
            <table class="table table-bordered table-hover table-success table-striped">
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
                    <?php foreach($patients as $patient): ?>
                    <tr>
                        <td><?=$patient->id?></td>
                        <td><?=strtoupper($patient->lastname)?></td>
                        <td><?=ucwords($patient->firstname)?></td>
                        <td><?=$patient->phone?></td>
                        <td><a id="mail" href="mailto: <?= $patient->mail ?>"><?= $patient->mail ?></a></td>
                        <td><a id="info" href="/controllers/profilPatientController.php?id=<?= $patient->id?>"><img src="/public/assets/img/iconEye.png" alt="icone info"></a></td>
                        <td><a id="delete" href="/controllers/listPatientController.php?id="<?= $patient->id?>><img src="/public/assets/img/delete-30.png"></a></td>
                    </tr>
                        <?php endforeach ?>
                    
                </tbody>
            </table>
        </div>
    
        <div class="text-center">
            <a href="/controllers/addPatientController.php">
                <button type="submit" class="btn btn-outline-warning text-white"><span> Ajouter un patient</span></button>
            </a>
        </div>
    </div>
</main>

