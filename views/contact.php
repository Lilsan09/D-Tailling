<?php
   if (SessionFlash::exist()) { ?>
      <div class="alert alert-dismissible alert-secondary">
         <?= SessionFlash::get(); ?>
         <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
   <?php } ?>
<form class="container-fluid d-flex connexionForm justify-content-center align-items-center py-3" method="POST">
   <fieldset class="d-flex flex-column align-items-center h-auto glassForm row text-dark">
      <legend>Nous contacter</legend>
      <div class="form-group col-12 my-4">
         <label for="email" class="form-label ms-2">Adresse mail</label>
         <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="exemple@mail.com" pattern="<?= REGEX_EMAIL ?>">
      </div>
      <div class="form-group col-12 my-4">
         <label for="lastname" class="form-label ms-2">Nom</label>
         <input name="lastname" type="text" class="form-control" id="lastname" placeholder="Michel" pattern="<?= REGEX_NO_NUMBER ?>">
      </div>
      <div class="form-group col-12 my-4">
         <label for="firstname" class="form-label ms-2">Prénom</label>
         <input name="firstname" type="text" class="form-control" id="firstname" placeholder="Dubois" pattern="<?= REGEX_NO_NUMBER ?>">
      </div>
      <div class="form-group col-12 mt-3">
         <label for="message" class="form-label ms-2">Votre message</label>
         <textarea name="message" class="form-control" id="message" rows="3"></textarea>
      </div>
      <button type="submit" class="btn btn-primary mt-5 col-6 col-lg-2 text-dark">Envoyer</button>
   </fieldset>
</form>