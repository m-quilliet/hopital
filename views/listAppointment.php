<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="title-add-patient pt-5 pb-5">Liste des Rendez-Vous</h1>
            </div>
        </div>

        <div class="container table-responsive py-3 pb-5">
            <table class="table table-bordered table-hover table-success table-striped">
                <thead>
                    <tr>
                        <th scope="col">LASTNAME</th>
                        <th scope="col">FIRSTNAME</th>
                        <th scope="col">DATE </th>
                        <th scope="col">HEURE</th>
                        <th scope="col">FICHE</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listAppointment as $appointment) : ?>
                        <tr>
                            <td><?= strtoupper($appointment->lastname) ?></td>
                            <td><?= ucwords($appointment->firstname) ?></td>
                            <td><?= date('d/m/Y', strtotime($appointment->dateHour)) ?></td>
                            <td><?= date('H:i', strtotime($appointment->dateHour)) ?></td>
                            <td><a id="info" href="/controllers/profilAppointmentController.php?id=<?= $appointment->idAppointment ?>"><img src="/public/assets/img/iconEye.png" alt="icone info"></a></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

        <div class="text-center">
            <a href="/controllers/addAppointmentController.php">
                <button type="submit" class="btn btn-outline-warning text-white"><span>Création de rendez-vous</span></button>
            </a>
        </div>
    </div>
</main>