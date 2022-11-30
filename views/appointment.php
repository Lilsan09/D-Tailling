<!-- formulaire de prise de rendez-vous -->
<form class="connexionForm container-fluid d-flex align-items-center justify-content-center" method="POST" novalidate>
   <fieldset class="row justify-content-center glassForm my-4 flex-column align-items-center text-dark">
      <legend class="text-center">Prendre un rendez-vous</legend>
      <div class="col-lg-6 form-group">
         <label for="date" class="form-label mt-4">Date du rendez-vous</label>
         <input value="<?= $date ?? '' ?>" name="date" type="date" class="form-control" id="date" aria-describedby="dateHelp" required>
         <p><?= $errors['date'] ?? ''; ?></p>
      </div>
      <div class="col-lg-6 form-group">
         <label for="hour">Horaire du rendez-vous</label>
         <select name="hour" class="form-control" id="hour">
            <?php foreach ($hoursAppt as $hour) { ?>
               <option value="<?= $hour ?>"><?= $hour ?></option>
            <?php } ?>
         </select>
      </div>
      <div class="col-lg-6 form-group">
         <label for="prestations" class="form-label mt-4 ">Choix de la prestation</label>
         <select name="prestations" class="form-control" id="prestations" required>
            <option value=""></option>
            <?php foreach ($prestations as $prestation) { ?>
               <option value="<?= $prestation->Id_prestations ?>"><?= $prestation->title ?></option>
            <?php } ?>
         </select>
      </div>
      <div class="col-lg-6 form-group">
         <label for="cars" class="form-label mt-4 ">Choix de la voiture</label>
         <select name="cars" class="form-control" id="cars" required>
            <option value=""></option>
            <?php foreach ($cars as $car) { ?>
               <option value="<?=$car->Id_cars?>"><?=$car->type?></option>
            <?php } ?>
         </select>
      </div>
      <button type="submit" class="mt-4 btn col-lg-3">Prendre le rendez-vous</button>
   </fieldset>
</form>