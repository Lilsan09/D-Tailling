<?php
if (SessionFlash::exist()) {
?>
   <div class="alert alert-primary" role="alert">
      <strong><?= SessionFlash::get() ?></strong>
   </div>

<?php } ?>

<?php
?>
<h1>Liste des prestations</h1>

<div class="container">
   <div class="row">
      <table class="table table-striped">
         <thead>
            <tr>
               <th scope="col" class="text-secondary">Titre</th>
               <th scope="col" class="text-secondary">Description</th>
               <th scope="col" class="text-secondary">Prix</th>
               <th scope="col" class="text-secondary">modif</th>
               <th scope="col" class="text-secondary">suppr</th>
            </tr>
         </thead>
         <tbody>

            <?php
            foreach ($prestations as $prestation) {
            ?>
               <tr>
                  <td><?= htmlentities($prestation->title) ?></td>
                  <td><?= htmlentities($prestation->description) ?></td>
                  <td><?= htmlentities($prestation->price) ?></td>
                  <td>
                     <a href="/controllers/admin/editPrestationCtrl.php?id=<?= $prestation->Id_prestations ?>">Modif</a>
                  </td>
                  <td>
                     <a href="/controllers/admin/deletePrestationCtrl.php?id=<?= $prestation->Id_prestations ?>">suppr</a>
                  </td>
               </tr>
            <?php } ?>
         </tbody>
      </table>
      <a class="text-center" href="/controllers/admin/addPrestationCtrl.php">
         <button class="btn btn-primary" type="button">Ajouter une prestation</button>
      </a>
   </div>

</div>