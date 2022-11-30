<!-- affichage des rendez-vous de tout les utilisateurs -->
<?php
require_once(__DIR__ . '/../../config/config.php');
if (SessionFlash::exist()) {
?>
   <div class="alert alert-primary" role="alert">
      <strong><?= SessionFlash::get() ?></strong>
   </div>

<?php } ?>

<?php
?>

<div class="container-fluid bg-dark minH90 h-100 d-flex align-items-center">
   <div class="row">
      <h1>Liste des rendez-vous</h1>
      <table class="table table-striped my-5 px-5">
         <thead>
            <tr>
               <th scope="col" class="text-secondary">Client</th>
               <th scope="col" class="text-secondary">Date et Heure</th>
               <th scope="col" class="text-secondary">Prestation</th>
               <th scope="col" class="text-secondary">Véhicule</th>
               <th scope="col" class="text-secondary">modif</th>
               <th scope="col" class="text-secondary">suppr</th>
            </tr>
         </thead>
         <tbody>
            <?php
            foreach ($appointments as $appointment) {
            ?>
               <tr>
                  <td><?= htmlentities($appointment->users) ?></td>
                  <td><?= htmlentities($appointment->datehour) ?></td>
                  <td><?= htmlentities($appointment->title) ?></td>
                  <td><?= htmlentities($appointment->type) ?></td>
                  <td>
                     <a href="/controllers/admin/editAppointmentCtrl.php?id=<?= $appointment->Id_appointment ?>">Modif</a>
                  </td>
                  <td>
                     <a href="/controllers/admin/deleteAppointmentCtrl.php?id=<?= $appointment->Id_appointment ?>">suppr</a>
                  </td>
               </tr>
            <?php } ?>
         </tbody>
      </table>
      <a class="text-center" href="/controllers/admin/addAppointmentCtrl.php">
         <button class="btn btn-primary" type="button">Ajouter un rendez-vous</button>
      </a>
   </div>

</div>