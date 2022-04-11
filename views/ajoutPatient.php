<main>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="form">
                    <form action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post"enctype="multipart/form-data" >
                        <div class="form-title">
                            <span>Ajout Patient</span>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="lastname"> Nom * </label>
                            <input type="text" id="lastname" placeholder="Nom" name="lastname"required pattern= "<?=REGEX_NAME?>" value="<?= $lastname ?? ''?>">
                            <p class="error"><?= $error['lastname'] ?? "" ?></p>
                        </div>
                        <div class="form-group">
                            <label for="firstnamee" class="firstname"> Prénom * </label>
                            <input type="text" id="firstname" placeholder="Prénom" name="firstname"required pattern= "<?=REGEX_NAME?>" value="<?= $firstname ?? ''?>">
                            <p class="error"><?= $error['firstname'] ?? "" ?></p>
                        </div>
                        <div class="form-group">
                            <label for="date">Date de naissance *</label>
                            <input type="date" id="date" name="date" value="2018-07-22"
                            pattern= "<?=REGEX_DOB?>"
                        min="1900-01-01" max="2015-12-31">  
                        <p class="error"><?= $error['date'] ?? '' ?></p>
                        </div> 
                        <div class="m-3">
                            <label for="phone" class="form-label">Numéro de téléphone *</label>
                            <input type="number" class="form-control" name="phone" id="phone" placeholder="N°de téléphone" required pattern="<?=REGEX_PHONE?>">
                            <p class="error"><?= $error['phone'] ?? ''?></p>
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label">Adresse email *</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?=$email ?? ''?>" required>
                            <p class="error"><?= $error['email'] ?? ""?><p>
                        </div>
                    
                        <button type="submit" class="btn btn-outline-warning text-white"><span> Soumettre </span></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</main>

