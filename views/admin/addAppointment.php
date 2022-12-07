<form class="container-fluid d-flex align-items-center justify-content-center" method="POST" >
   <fieldset class="row justify-content-center glassForm bg-dark my-4 flex-column align-items-center text-dark">
      <legend class="text-center">Création d'un rendez-vous</legend>
      <div class="col-lg-6 form-group text-light">
         <label for="user">Utilisateur du rendez-vous</label>
         <select class="form-control" id="user" name="user">
            <?php foreach ($users as $user) { ?>
               <option <?= ($user == $user->Id_users) ? 'selected' : '' ?> value="<?= $user->Id_users ?>"><?= $user->firstname . ' ' . $user->lastname ?></option>
            <?php } ?>
         </select>
      </div>
      <div class="col-lg-6 form-group text-light">
         <label for="date" class="form-label mt-4">Date du rendez-vous</label>
         <input value="<?= $date ?? '' ?>" name="date" type="date" class="form-control" id="date" aria-describedby="dateHelp" pattern="<?= REGEX_DATE ?>" required>
         <p><?= $errors['date'] ?? ''; ?></p>
      </div>
      <div class="col-lg-6 form-group text-light">
         <label for="hour">Heure du rendez-vous</label>
         <select name="hour" class="form-control" id="hour">
            <?php foreach ($hoursAppt as $hourAppt) { ?>
               <option <?= (isset($hour) && $hour == $hourAppt) ? 'selected' : '' ;?> value="<?= $hourAppt ?>"><?= $hourAppt ?></option>
            <?php } ?>
         </select>
      </div>
      <div class="col-lg-6 form-group text-light">
         <label for="prestations" class="form-label mt-4 ">Prestation</label>
         <select name="prestations" class="form-control" id="prestations" required>
            <!-- <option value=""></option> -->
            <?php foreach ($prestations as $prestationType) { ?>
               <option  <?= (isset($prestation) && $prestation == $prestationType) ? 'selected' : '' ;?>  value="<?= $prestationType->Id_prestations ?>"><?= $prestationType->title ?></option>
            <?php } ?>
         </select>
      </div>
      <div class="col-lg-6 form-group text-light">
         <label for="cars" class="form-label mt-4 ">Type de véhicule</label>
         <select name="cars" class="form-control" id="cars" required>
            <?php foreach ($cars as $carType) { ?>
               <option <?= (isset($car) && $car == $carType) ? 'selected' : '' ;?> value="<?=$carType->Id_cars?>"><?=$carType->type?></option>
            <?php } ?>
         </select>
      </div>
      <button type="submit" class="mt-4 btn col-lg-3">Créer le rendez-vous</button>
   </fieldset>
</form>