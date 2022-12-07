<div class="container-fluid imgBg minH90 d-flex flex-column ">
   <div class="row">
      <div class="col-12 glass text-dark text-center d-flex justify-content-center">
         <p class="pt-2 m-0"><span class="dtailing">⚠️</span> Pour toutes modifications ou annulation de rendez-vous, merci de contacter le service client <span class="dtailing">⚠️</span></p>
      </div>
   </div>
   <div class="row">
      <?php if ($appointments == NULL || $appointments == 0) {
         echo "<h2 class='text-center text-dark my-5'>Vous n'avez aucun rendez-vous de programmé..</h2>
            <a class='text-center' href='/controllers/appointmentCtrl.php'>
               <button class='btn btn-primary bg-light text-dark' type='button'>Ajouter un rendez-vous</button>
            </a>";
      } else {
         foreach ($appointments as $appointment) { ?>
            <div class="col-lg-4">
               <div class="card text-dark glassCard m-4">
                  <div class="card-header text-center">Rendez-vous du <?= $appointment->datehour ?></div>
                  <div class="card-body d-flex justify-content-center align-items-center flex-column">
                     <p>Prestation : <?= $appointment->title ?></p>
                     <p>Voiture : <?= $appointment->type ?></p>
                  </div>
               </div>
            </div>
      <?php }
      } ?>
   </div>
</div>