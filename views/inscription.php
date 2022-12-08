<form class="inscriptionForm container-fluid d-flex align-items-center justify-content-center" method="POST" >
   <fieldset class="row justify-content-center glassForm my-4 text-dark">
      <legend class="">S'inscrire</legend>
      <div class="form-group col-lg-6">
         <label for="email" class="form-label mt-4">Adresse Mail</label>
         <input value="<?= $email ?? '' ?>" name="email" type="email" class="form-control" id="mail" aria-describedby="emailHelp" placeholder="exemple@mail.com" pattern="<?= REGEX_EMAIL ?>" required>
         <p><?= $errors['email'] ?? '' ;?></p>
      </div>
      <div class="form-group col-lg-6">
         <label for="password" class="form-label mt-4 ">Mot de passe</label>
         <input name="password" type="password" class="form-control" id="password" placeholder="******" required>
         <p><?=$errors['testPassword'] ?? ''?></p>
      </div>
      <div class="form-group col-lg-6">
         <label for="confirmPassword" class="form-label mt-4 ">Confirmer le mot de passe</label>
         <input name="confirmPassword" type="password" class="form-control" id="confirmPassword" placeholder="******" required>
      </div>
      <div class="form-group col-lg-6">
         <label for="lastname" class="form-label mt-4 ">Nom</label>
         <input value="<?= $lastname ?? ''?>" name="lastname" type="text" class="form-control" id="lastname" placeholder="Dubois.." pattern="<?= REGEX_NO_NUMBER ?>" required>
         <p><?= $errors['lastname'] ?? '' ;?></p>
      </div>
      <div class="form-group col-lg-6">
         <label for="firstname" class="form-label mt-4 ">Prénom</label>
         <input value="<?= $firstname ?? ''?>" name="firstname" type="text" class="form-control" id="firstname" placeholder="Michel.." pattern="<?= REGEX_NO_NUMBER ?>" required>
         <p><?= $errors['firstname'] ?? '' ;?></p>
      </div>
      <div class="form-group col-lg-6">
         <label for="phone" class="form-label mt-4 ">Télephone</label>
         <input value="<?= $phone ?? ''?>" name="phone" type="tel" class="form-control" id="phone" placeholder="** ** ** ** **" pattern="<?= REGEX_PHONE ?>" required>
         <p><?= $errors['phone'] ?? '' ;?></p>
      </div>
      <div class="form-group col-lg-6">
         <label for="adress" class="form-label mt-4 ">Adresse</label>
         <input value="<?= $adress ?? ''?>" name="adress" type="text" class="form-control" id="adress" placeholder="Votre adresse.." required>
         <p><?= $errors['adress'] ?? '' ;?></p>
      </div>
      <div class="form-group col-lg-6">
         <label for="zipcode" class="form-label mt-4 ">Code Postal</label>
         <input value="<?= $zipcode ?? ''?>" name="zipcode" type="text" class="form-control" id="zipcode" placeholder="80000.." pattern="<?= REGEX_ZIPCODE ?>" required>
         <p><?= $errors['zipcode'] ?? '' ;?></p>
      </div>
      <button type="submit" class="btn btn-primary btn-sm col-4 bg-light text-dark">Inscription</button>
   </fieldset>
</form>