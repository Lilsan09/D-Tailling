<?php
if (SessionFlash::exist()) {
?>
   <div class="alert alert-dark alert-dismissible fade show text-light" role="alert">
      <strong><?= SessionFlash::get() ?></strong>
      <button type="button" class="btn-close closeAlertBtn" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>

<?php } ?>

<?php
?>

<div class="container-fluid minH90 h-100 d-flex align-items-center bg-dark">
   <div class="row p-4 justify-content-center">
      <h1 class="text-light text-center">Liste des prestations</h1>
      <?php
      foreach ($prestations as $prestation) {
      ?>
         <div class="card mb-3 p-4 col-lg-5 m-3">
            <h3 class="card-header text-dark">Prestation : <?= htmlentities($prestation->title) ?></h3>
            <div class="card-body text-dark">
               <h5 class="card-title text-dark">Prix : <?= htmlentities($prestation->price) ?>€</h5>
               <img class="w-100 h-100" src="/public/uploads/prestations/<?= $prestation->Id_prestations ?>.jpeg" alt="Illustration de la prestation">
            </div>
            <div class="card-body text-dark mt-4">
               <h6 class="card-title">Description : </h6>
               <p class="card-text"><?= html_entity_decode($prestation->description) ?></p>
            </div>
            <div class="card-body text-center">
               <a href="/controllers/admin/editPrestationCtrl.php?id=<?= $prestation->Id_prestations ?>" class="card-link text-center"><img class="editSupprIcon" src="/public/assets/img/crayon.png" alt="Modifier"></a>
               <a href="/controllers/admin/deletePrestationCtrl.php?id=<?= $prestation->Id_prestations ?>" class="card-link text-center"><img class="editSupprIcon" src="/public/assets/img/supprimer.png" alt="Supprimer"></a>
            </div>
         </div>
      <?php } ?>
      <a class="text-center" href="/controllers/admin/addPrestationCtrl.php">
         <button class="btn btn-primary text-dark" type="button">Ajouter une prestation</button>
      </a>
   </div>

</div>