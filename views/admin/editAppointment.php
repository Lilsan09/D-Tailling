<!-- formulaire de prise de rendez-vous -->
<form class="container-fluid d-flex align-items-center justify-content-center" method="POST" >
   <fieldset class="row justify-content-center glassForm bg-dark my-4 flex-column align-items-center text-dark">
      <legend class="text-center">Modifier un rendez-vous</legend>
      <div class="col-lg-6 form-group text-light">
         <label for="user">Modifier l'utilisateur du rendez-vous</label>
         <select class="form-control" id="user" name="user">
            <?php foreach ($users as $user) { ?>
               <option <?= ($appointment->Id_users == $user->Id_users) ? 'selected' : '' ?> value="<?= $user->Id_users ?>"><?= $user->firstname . ' ' . $user->lastname ?></option>
            <?php } ?>
         </select>
      </div>
      <div class="col-lg-6 form-group text-light">
         <label for="date" class="form-label mt-4">Modification de la date du rendez-vous</label>
         <input value="<?= $date ?? date('Y-m-d' ,strtotime($appointment->datehour)) ?>" name="date" type="date" class="form-control" id="date" aria-describedby="dateHelp" required>
         <p><?= $errors['date'] ?? ''; ?></p>
      </div>
      <div class="col-lg-6 form-group text-light">
         <label for="hour">Modifier l'heure du rendez-vous</label>
         <select name="hour" class="form-control" id="hour">
            <?php foreach ($hoursAppt as $hour) { ?>
               <option <?= (date('H:i', strtotime($appointment->datehour)) == $hour) ? 'selected' : '' ;?> value="<?= $hour ?>"><?= $hour ?></option>
            <?php } ?>
         </select>
      </div>
      <div class="col-lg-6 form-group text-light">
         <label for="prestations" class="form-label mt-4 ">Modifier la prestation</label>
         <select name="prestations" class="form-control" id="prestations" required>
            <!-- <option value=""></option> -->
            <?php foreach ($prestations as $prestation) { ?>
               <option  <?= ($appointment->Id_prestations == $prestation->Id_prestations) ? 'selected' : '' ?>  value="<?= $prestation->Id_prestations ?>"><?= $prestation->title ?></option>
            <?php } ?>
         </select>
      </div>
      <div class="col-lg-6 form-group text-light">
         <label for="cars" class="form-label mt-4 ">Choix de la voiture</label>
         <select name="cars" class="form-control" id="cars" required>
            <!-- <option value=""></option> -->
            <?php foreach ($cars as $car) { ?>
               <option <?= ($appointment->Id_cars == $car->Id_cars) ? 'selected' : '' ?> value="<?=$car->Id_cars?>"><?=$car->type?></option>
            <?php } ?>
         </select>
      </div>
      <button type="submit" class="mt-4 btn col-lg-3">Modifier le rendez-vous</button>
   </fieldset>
</form>