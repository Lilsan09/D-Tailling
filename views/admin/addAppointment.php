<!-- formulaire de prise de rendez-vous -->
<form class="connexionForm container-fluid d-flex align-items-center justify-content-center" method="POST" enctype="multipart/form-data" novalidate>
   <fieldset class="row justify-content-center glassForm my-4 flex-column align-items-center">
      <legend class="text-center">Prendre un rendez-vous</legend>
      <div class="col-lg-6">
         <div class="form-group">
            <label for="dateHour" class="form-label mt-4">Date et heure</label>
            <input value="<?= $dateHour ?? '' ?>" name="dateHour" type="datetime-local" class="form-control" id="dateHour" aria-describedby="dateHourHelp" required>
            <p><?= $errors['dateHour'] ?? ''; ?></p>
         </div>
         <div class="form-group">
            <label for="id_users" class="form-label mt-4 ">Utilisateur</label>
            <select name="id_users" class="form-control" id="id_users" required>
               <option value="">Choisissez un utilisateur</option>
               <?php foreach ($users as $user) : ?>
                  <option value="<?= $user->getId() ?>"><?= $user->getFirstname() . ' ' . $user->getLastname() ?></option>
               <?php endforeach; ?>
            </select>
         </div>
      </div>
      <div class="form-group">
         <label for="id_prestations" class="form-label mt-4 ">Prestation</label>
         <select name="id_prestations" class="form-control" id="id_prestations" required>
            <option value="">Choisissez une prestation</option>
            <?php foreach ($prestations as $prestation) : ?>
               <option value="<?= $prestation->getId() ?>"><?= $prestation->getTitle() ?></option>
            <?php endforeach; ?>
         </select>
      </div>
      <button type="submit" class="btn btn-primary btn-sm col-lg-3">Prendre le rendez-vous</button>
   </fieldset>
</form>