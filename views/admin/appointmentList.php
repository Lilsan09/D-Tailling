<!-- affichage des rendez-vous de tout les utilisateurs -->
<?php

if (SessionFlash::exist()) {
?>
   <div class="alert alert-dark alert-dismissible fade show text-light" role="alert">
      <strong><?= SessionFlash::get() ?></strong>
      <button type="button" class="btn-close closeAlertBtn" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>

<?php } ?>

<div class="container-fluid bg-dark minH90 h-100 d-flex  flex-column px-5">
   <h1 class="py-4 text-secondary text-center">Liste des rendez-vous</h1>
   <div class="row p-4 justify-content-center">
      
      
      <?php
      foreach ($appointments as $appointment) {
         ?>
         <div class="card bg-secondary text-dark m-3 col-lg-4 align-items-center">
            <div class="card-body">
               <h4 class="card-title">Client : <?= htmlentities($appointment->users)?></h4>
               <h6 class="card-text">Date : <?= htmlentities(ucfirst($formatDateFr->format(strtotime($appointment->datehour))) . ' à ' . $formatHourFr->format(strtotime($appointment->datehour))) ?></h6>
               <h6 class="card-text">Prestation : <?= htmlentities($appointment->title) ?></h6>
               <p class="card-text">Véhicule : <?= htmlentities($appointment->type) ?></p>
               <div class="d-flex justify-content-center">
                  <a href="/controllers/admin/editAppointmentCtrl.php?id=<?= $appointment->Id_appointments ?>" class="card-link text-center"><img class="editSupprIcon" src="/public/assets/img/crayon.png" alt="Modifier"></a>
                  <a href="/controllers/admin/deleteAppointmentCtrl.php?id=<?= $appointment->Id_appointments ?>" class="card-link text-center"><img class="editSupprIcon" src="/public/assets/img/supprimer.png" alt="Supprimer"></a>
               </div>
            </div>
         </div>
         <?php } ?>
         <a class="text-center my-4" href="/controllers/admin/addAppointmentCtrl.php">
            <button class="btn btn-primary text-dark" type="button">Ajouter un rendez-vous</button>
         </a>
      </div>

</div>