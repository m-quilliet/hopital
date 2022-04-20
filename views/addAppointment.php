<main>
    <div class="container ">
        <div class="row">
            <div class="col-sm-12">
                <div class="form"> 
                    <form action="<?= isset($_GET['id'])?'?id='.$_GET['id'] : htmlspecialchars($_SERVER['PHP_SELF'])//permet de renseigner ds la meme page tt en encodant les caratéres speciaux ds un soucis de sécurite?>"  method="POST" >
                    
                        <div class="form-title">
                            <span>Ajouter un rendez-vous</span>
                            <p class="<?=$className['addAppointment'] ?>"><?=$error['addAppointment'] ?? ''?></p>
                        </div>

                        <div class="form-group">
                        <label for="patientSelect">Choix du patient *</label>
                            <select name="patientSelect" id="patientSelect">
                            pattern= "<?=REGEX_NAME?>">
                                <option value="">Sélectionner un patient</option>
                                <?php foreach($patients as $patient):?>
                                <option value="<?=$patient->id?>"><?=strtoupper($patient->lastname)?>  <?=ucwords($patient->firstname)?></option>
                                <?php endforeach ?>
                            </select>
                            <p class="error"><?= $error['patient'] ?? '' ?></p>
                        </div>

                        <!-- for et id meme orthographe que nos attributs -->
                        <div class="form-group">
                            <label for="tripStart">Jour du rendez-vous *</label>
                            <input type="date" id="start" name="tripStart"
                                value="2022-07-22"
                                min="2022-01-01" max="2025-12-31"required pattern= "<?=REGEX_DATE?>">
                                <p class="error"><?= $error['tripStart'] ?? '' ?> </p>
                        </div>

                        <div class="form-group">
                            <label for="appt">Horaire du rendez-vous *</label>
                            <input type="time" id="appt" name="appt"
                                min="08:00" max="19:30" 
                                step="900" required 
                                pattern= "<?=REGEX_TIME?>">
                            <small>De 8h à 19h30</small>
                            <p class="error"><?= $error['appt'] ?? '' ?></p>
                        </div>

                        <button type="submit" class="btn btn-outline-warning text-white"><span> Valider le rendez-vous </span></button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</main>