<?php
if (SessionFlash::exist()) { ?>
   <div class="alert alert-dismissible alert-secondary d-flex justify-content-center m-0 alertSession border">
      <div class="alertSession d-flex w-75 justify-content-center align-items-center">
         <?= SessionFlash::get(); ?>
      </div>
      <div class="btn-group d-flex justify-content-end" role="group" aria-label="Basic example">
         <button type="button" class="btn btn-secondary btn-sm"><a href="/controllers/homeCtrl.php" class=""><img src="/public/assets/img/accueil.png" alt="Accueil"></a></button>
         <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="alert"><img src="/public/assets/img/close.png" alt="Fermer"></button>
      </div>
   </div>
<?php } ?>
<form class="connexionForm container-fluid d-flex align-items-center justify-content-center" method="POST" novalidate>
   <fieldset class="row justify-content-center glassForm my-4">
      <legend class="">Modifier les information de <?= $user->firstname . ' ' . $user->lastname ?></legend>
      <div class="form-group col-lg-6">
         <label for="email" class="form-label mt-4">Adresse Mail</label>
         <input value="<?= $user->email ?? $user->getEmail(); ?>" name="email" type="email" class="form-control" id="mail" aria-describedby="emailHelp" placeholder="exemple@mail.com" required>
         <p><?= $errors['email'] ?? ''; ?></p>
      </div>
      <div class="form-group col-lg-6">
         <label for="lastname" class="form-label mt-4 ">Nom</label>
         <input value="<?= $user->lastname ?? $user->getLastname(); ?>" name="lastname" type="text" class="form-control" id="lastname" placeholder="Dubois.." required>
         <p><?= $errors['lastname'] ?? ''; ?></p>
      </div>
      <div class="form-group col-lg-6">
         <label for="firstname" class="form-label mt-4 ">Prénom</label>
         <input value="<?= $user->firstname ?? $user->getFirstname(); ?>" name="firstname" type="text" class="form-control" id="firstname" placeholder="Michel.." required>
         <p><?= $errors['firstname'] ?? ''; ?></p>
      </div>
      <div class="form-group col-lg-6">
         <label for="phone" class="form-label mt-4 ">Télephone</label>
         <input value="<?= $user->phone ?? $user->getPhone(); ?>" name="phone" type="tel" class="form-control" id="phone" placeholder="** ** ** ** **" required>
         <p><?= $errors['phone'] ?? ''; ?></p>
      </div>
      <div class="form-group col-lg-6">
         <label for="adress" class="form-label mt-4 ">Adresse</label>
         <input value="<?= $user->adress ?? $user->getAdress(); ?>" name="adress" type="text" class="form-control" id="adress" placeholder="Votre adresse.." required>
         <p><?= $errors['adress'] ?? ''; ?></p>
      </div>
      <div class="form-group col-lg-6">
         <label for="zipcode" class="form-label mt-4 ">Code Postal</label>
         <input value="<?= $user->zipcode ?? $user->getZipcode(); ?>" name="zipcode" type="number" class="form-control" id="zipcode" placeholder="80000.." required>
         <p><?= $errors['zipcode'] ?? ''; ?></p>
      </div>
      <button type="submit" class="btn btn-primary col-8 col-lg-3 mt-4">Enregistrer les modifications</button>
      <a href="/controllers/deleteUserCtrl.php" class="text-decoration-none d-flex justify-content-end">
         <button type="button" class="btn btn-sm my-5">Supprimer l'utilisateur</button>
      </a>
   </fieldset>
</form>