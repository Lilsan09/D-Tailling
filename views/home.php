<main>
   <?php

   if (SessionFlash::exist()) {
   ?>
      <div class="alert alert-dark alert-dismissible fade show text-light" role="alert">
         <strong><?= SessionFlash::get() ?></strong>
         <button type="button" class="btn-close closeAlertBtn" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>

   <?php } ?>
   <section class="highPage">
      <div class="container-fluid bgHeader d-flex justify-content-center align-items-center">
         <div class="row justify-content-center">
            <div class="col-lg-12 col-10 aboutDiv p-5 text-center">
               <?php if (isset($_SESSION['user'])) { ?>
                  <h2 class="text-black mb-5">Bonjour <span><?= $_SESSION['user']->firstname . ',' ?? '' ?></span></h2>
               <?php } ?>
               <h1 class="mb-5" id="zeH1">Bienvenue chez <br> <span class="dtailing">D-TAILING</span></h1>
               <h3 class="text-black">Le lavage auto profesionnel</h3>
            </div>
         </div>
      </div>
   </section>
</main>