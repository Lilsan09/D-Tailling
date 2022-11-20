<form class="connexionForm container" method="POST" novalidate>
   <fieldset class="row justify-content-center">
      <legend class="text-black">S'inscrire</legend>
      <div class="form-group">
         <label for="mail" class="form-label text-black">Adresse Mail</label>
         <input type="email" class="form-control" id="mail" aria-describedby="emailHelp" placeholder="Mail" required>
         <small id="emailHelp" class="form-text text-muted">Nous ne partagerons jamais votre adresse mail</small>
      </div>
      <div class="form-group">
         <label for="password" class="form-label mt-4 text-black">Mot de passe</label>
         <input name="password" type="password" class="form-control" id="password" placeholder="Mot de passe" required>
      </div>
      <div class="form-group">
         <label for="confirmPassword" class="form-label mt-4 text-black">Confirmer le mot de passe</label>
         <input type="password" class="form-control" id="confirmPassword" placeholder="Confirmation du mot de passe" required>
      </div>
      <div class="form-group">
         <label for="lastname" class="form-label mt-4 text-black">Nom</label>
         <input name="lastname" type="text" class="form-control" id="lastname" placeholder="Nom" required>
      </div>
      <p><?= $errorLastname ?? '' ;?></p>
      <div class="form-group">
         <label for="firstname" class="form-label mt-4 text-black">Prénom</label>
         <input type="text" class="form-control" id="firstname" placeholder="Prénom" required>
      </div>
      <div class="form-group">
         <label for="address" class="form-label mt-4 text-black">Adresse</label>
         <input type="text" class="form-control" id="address" placeholder="Adresse" required>
      </div>
      <button type="submit" class="btn btn-primary btn-sm col-4">Inscription</button>
   </fieldset>
</form>