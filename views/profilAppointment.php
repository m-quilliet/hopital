<section>
    <p><?= $error ?? '' ?></p>
    <?php if (empty($error)) { ?>
        <div class="card">
            <div class="header"></div>
            <div>
                <div>
                    <h2><?= ucwords($idPatients->lastname) ?? '' ?></h2>
                    <h3><?= ucwords($idPatients->firstname) ?? '' ?> </h3>
                    <hr>
                    <hr>
                    <p>Date: <?= date('d/m/Y', strtotime($idPatients->dateHour)) ?? '' ?> </p>
                    <p>Heure: <?= date('H:i', strtotime($idPatients->dateHour)) ?? '' ?></p>
                </div>
                <div class="text-center">
                    <a href="/controllers/modifAppointmentController.php?id=<?= $idPatients->idAppointment ?>">
                        <button type="button" class="btn btn-outline-warning"><span> Modifier les informations </span></button>
                    </a>
                </div>
            </div>
        <?php } ?>
</section>