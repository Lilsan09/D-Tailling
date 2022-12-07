<?php
if (SessionFlash::exist()) {
?>
   <div class="alert alert-dark alert-dismissible fade show text-light" role="alert">
      <strong><?= SessionFlash::get() ?></strong>
      <button type="button" class="btn-close closeAlertBtn" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>

<?php } ?>
<form class="connexionForm container-fluid d-flex align-items-center justify-content-center text-dark" method="POST">
   <fieldset class="row justify-content-center glassForm">
      <legend class="text-center mt-4">Veuillez saisir votre adresse Email</legend>
      <p><?= $errors['connexion'] ?? '' ;?></p>
      <div class="form-group col-lg-10 m-3">
         <label for="email" class="form-label">Adresse Mail</label>
         <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="exemple@mail.com" pattern="<?= REGEX_EMAIL ?>">
      </div>
      <button type="submit" class="btn btn-primary col-8 col-lg-3 m-4 bg-light text-dark">Envoyer</button>
      <p class="createAcc text-black">Vous n'avez pas de compte ?<a class="createAcc text-decoration-none" href="../controllers/inscriptionCtrl.php"><span class="dtailing"> Créer un compte</span></a> maintenant !</p>
   </fieldset>
</form>