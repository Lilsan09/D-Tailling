<main>
   <?php
   // Affichage des messages flash
   if (SessionFlash::exist()) { ?>
      <div class="alert alert-dismissible alert-secondary">
         <?= SessionFlash::get(); ?>
         <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
   <?php } ?>
   <section class="highPage">
      <div class="container-fluid bgHeader d-flex justify-content-center align-items-center">
         <div class="row justify-content-center">
            <div class="col-lg-12 col-10 aboutDiv p-5 text-center">
            <?php if (isset($_SESSION['user'])) { ?>
                  <h2 class="text-black mb-5">Bonjour <span><?= $_SESSION['user']->firstname . ',' ?? ''?></span></h2>
               <?php } ?>
               <h1 class="mb-5" id="zeH1">Bienvenue chez <br> <span class="dtailing">D-TAILING</span></h1>
               <h3 class="text-black">Le lavage auto profesionnel</h3>
            </div>
         </div>
      </div>
   </section>
   <!-- <section class="about">
      <div class="container">
         <div class="row aboutRow">
            <div class="col-12 aboutDiv">
               <h2>A propos</h2>
               <p class="aboutText">
                  Le Detailing Automobile est une technique visant à sublimer l’extérieur comme l’intérieur d’un véhicule par des techniques de nettoyage professionnelles agissant en profondeur sur la carrosserie.
                  <br>
                  <br>
                  En effet, votre véhicule va faire l’objet pendant cette rénovation d’une attention toute particulière afin de lui redonner l’éclat et la brillance d’un véhicule neuf.
                  <br>
                  <br>
                  Le detailing automobile se décline en plusieurs sous-opérations, chacune étant minutieusement menée avec un matériel de haute technicité et l’utilisation de produits de grande qualité. Afin que le résultat final soit à la hauteur de vos espérances, rien ne doit être laissé au hasard.
                  <br>
                  <br>
                  En confiant votre véhicule à <span class="dtailing">D-TAILING</span>, vous le laissez entre les mains expertes d’un technicien hors pair, doublé d’un esthète. Vous aurez affaire à un amoureux des belles mécaniques, un passionné méticuleux, un fervent connaisseur de l’histoire de l’automobile et des marques.
               </p>
            </div>
         </div>
      </div>
   </section> -->
   <!-- <div class="sep">
      <div class="separate text-center"></div>
   </div> -->
</main>