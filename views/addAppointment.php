<main>
    <div class="container ">
        <div class="row">
            <div class="col-sm-12">
                <div class="form">
                    <?php 
                    if(isset($errorMsg)){
                        echo $errorMsg;
                    } else{?>
                    <form action="<?= isset($_GET['id']) ? '?id=' . $_GET['id'] : htmlspecialchars($_SERVER['PHP_SELF']) //permet de renseigner ds la meme page tt en encodant les caratéres speciaux ds un soucis de sécurite
                                    ?>" method="POST">

                        <div class="form-title">
                            <span><?= $title ?></span>
                            <p class="<?= $className['addAppointment'] ?>"><?= $error['addAppointment'] ?? '' ?></p>
                        </div>
                        <div class="form-group">
                            <label for="name">Nom * :</label>

                            <select class="form-select" name="name" aria-label="Default select example" required>
                                <option value=" ">Selectionner un Patient :</option>

                                <?php foreach ($listPatients as $patient) :?>
                                    <option value="<?= $patient->id ?>"
                                    <?php if(isset($patient) && isset($result)) {?> 
                                        <?=$patient-> id == $result->id ? "selected" : null?> 
                                    <?php } ?>>
                                    <?=$patient->lastname ?? $result->lastname ?? '' ?> 
                                    <?= $patient->firstname ?? $result->firstname ?? '' ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                            <p class="error"><?= $error['name'] ?? '' ?></p>
                        </div>

                        <!-- for et id meme orthographe que nos attributs -->
                        <div class="form-group">
                            <label for="date">Date * :</label>
                            <input name="date" type="date" value="<?= $result->dateHour ? date ("Y-m-d", strtotime($result->dateHour)):''?>"
                            required class="form-control" min="<?= date('Y-m-d') ?>" id="date">
                            <p class="error"><?= $error['date'] ?? '' ?></p>
                        </div>

                        <div class="form-group">
                            <label for="date">Choix de l'heure * :</label>
                            <input name="time" pattern="<?= REGEX_TIME ?>" type="time" value="<?= $result->dateHour ? date ("H:i",strtotime($result->dateHour)):''?>" 
                            required class="form-control" min="09:00" max="17:30" id="time">
                            <p class="error"><?= $error['time'] ?? '' ?></p>
                            <p class="error"><?= $error['dateHour'] ?? '' ?></p>
                        </div>

                        <button type="submit" class="btn btn-outline-warning text-white"><span> Valider le rendez-vous </span></button>
                    </form>
                    <?php } ?>


                </div>
            </div>
        </div>
    </div>
</main>