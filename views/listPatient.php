<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="title-add-patient pt-5 pb-5">Liste des Patients</h1>
            </div>
        </div>

        <div class="container table-responsive  py-5"> 
            <table class="table table-bordered table-hover table-success table-striped">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Lastname</th>
                        <th scope="col">Firstname</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Mail</th>
                        <th scope="col">Infos</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($patients as $patient): ?>
                    <tr>
                        <td><?=$patient->id?></td>
                        <td><?=strtoupper($patient->lastname)?></td>
                        <td><?=$patient->firstname?></td>
                        <td><?=$patient->phone?></td>
                        <td><a href="mailto: <?= $patient->mail ?>"><?= $patient->mail ?></a></td>
                        <td><a href="/controllers/profilPatientController.php?id=<?= $patient->id?>"><img src="/public/assets/img/iconEye.png" alt="icone info"></a></td>
                    </tr>
                        <?php endforeach ?>
                    
                </tbody>
            </table>
        </div>
    
        <div class="text-center">
            <a href="/controllers/addPatientController.php">
                <button type="button" class="btn btn-outline-secondary">Ajouter un patient</button>
            </a>
        </div>
    </div>
</main>

