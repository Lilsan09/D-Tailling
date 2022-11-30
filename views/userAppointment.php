<div class="container-fluid imgBg minH90 d-flex justify-content-center">
   <div class="row">
      <?php foreach ($appointments as $appointment) { ?>
         
         <div class="col-lg-6">
            <div class="card text-dark glassCard m-4">
               <div class="card-header text-center">Rendez-vous du <?= $appointment->datehour ?></div>
               <div class="card-body text-center d-flex justify-content-center align-items-center flex-column">
                  <p>Prestation : <?= $appointment->title ?></p>
                  <p>Voiture : <?= $appointment->type ?></p>
               </div>
            </div>
         </div>
      <?php } ?>
   </div>
</div>