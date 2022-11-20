<form class="connexionForm container" method="POST">
   <fieldset class="row">
      <legend>Se connecter</legend>
      <div class="form-group">
         <label for="exampleInputEmail1" class="form-label mt-4">Adresse Mail</label>
         <input type="email" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
         <small id="emailHelp" class="form-text text-muted">Nous ne partagerons jamais votre adresse mail</small>
      </div>
      <div class="form-group">
         <label for="exampleInputPassword1" class="form-label mt-4">Mot de passe</label>
         <input type="password" class="form-control form-control-sm" id="exampleInputPassword1" placeholder="Password">
      </div>
      <!-- <div class="form-group">
         <label for="exampleInputPassword1" class="form-label mt-4">Confirmer le mot de passe</label>
         <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
      </div> -->
      <p class="createAcc">Vous n'avez pas de compte ? <a class="createAcc text-decoration-none" href="../controllers/inscriptionCtrl.php"><span class="dtailing"> Créer un compte</span></a> maintenant !</p>
      <button type="submit" class="btn btn-primary">Connexion</button>
   </fieldset>
</form>