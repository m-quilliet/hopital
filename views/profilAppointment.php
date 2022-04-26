<section>
    <p><?= $error ?? '' ?></p>
    <?php if (empty($error)) { ?>
        <div class="card">
            <div class="header"></div>
            <div>
                <div>
                    <h2><?= ucwords($appointment->lastname) ?? '' ?></h2>
                    <h3><?= ucwords($appointment->firstname) ?? '' ?> </h3>
                    <hr>
                    <hr>
                    <p>Date: <?= date('d/m/Y', strtotime($appointment->dateHour)) ?? '' ?> </p>
                    <p>Heure: <?= date('H:i', strtotime($appointment->dateHour)) ?? '' ?></p>
                </div>
                <div class="text-center">
                    <a href="/controllers/modifAppointmentController.php?id=<?= $appointment->idAppointment ?>">
                        <button type="button" class="btn btn-outline-warning"><span> Modifier les informations </span></button>
                    </a>
                </div>
            </div>
        <?php } ?>
</section>