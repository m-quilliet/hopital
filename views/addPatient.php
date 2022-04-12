<main>
    <div class="container ">
        <div class="row">
            <div class="col-sm-12">
                <div class="form"> 
                    <form action="<?=htmlspecialchars($_SERVER['PHP_SELF'])//permet de renseigner ds la meme page tt en encodant les caratéres speciaux ds un soucis de sécurite?>" method="POST" >
                        <div class="form-title">
                            <span>Ajout Patient</span>
                            <p class="error <?=$className['addPatient'] ?? ''?>"><?=$error['addPatient'] ?? ''?></p>
                        </div>
                        <!-- for et id meme orthographe que nos attributs -->
                        <div class="form-group">
                            <label for="lastname" class="lastname"> Nom * </label>
                            <input type="text" id="lastname" placeholder="Nom" name="lastname"required pattern= "<?=REGEX_NAME?>" value="<?= $lastname ?? ''?>">
                            <p class="error"><?= $error['lastname'] ?? '' ?></p>
                        </div>
                        <div class="form-group">
                            <label for="firstname" class="firstname"> Prénom * </label>
                            <input type="text" id="firstname" placeholder="Prénom" name="firstname"required pattern= "<?=REGEX_NAME?>" value="<?= $firstname ?? ''?>">
                            <p class="error"><?= $error['firstname'] ?? '' ?></p>
                        </div>
                        <!-- type date pas besoin de pattern -->
                        <!-- qd c'est non null c'est que c'est pas obligatoire -->
                        <div class="form-group">
                            <label for="birthdate">Date de naissance *</label>
                            <input type="date" id="birthdate" name="birthdate" value="<?=$birthdate ?? ''?>" required>
                            <p class="error"><?= $error['birthdate'] ?? '' ?></p>
                        </div> 
                        <div class="form-group">
                            <label for="phone" class="form-label">Numéro de téléphone </label>
                            <input type="tel" class="form-control" name="phone" id="phone" placeholder="N°de téléphone" required pattern="<?=REGEX_PHONE?>">
                            <p class="error"><?= $error['phone'] ?? ''?></p>
                        </div>
                        <div class="form-group">
                            <label for="mail" class="form-label">Adresse email *</label>
                            <input type="mail" class="form-control" name="mail" id="mail" placeholder="Email" value="<?=$mail ?? ''?>" required>
                            <p class="error"><?= $error['mail'] ?? ''?></p>
                        </div>
                    
                        <button type="submit" class="btn btn-outline-warning text-white"><span> Soumettre </span></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</main>

