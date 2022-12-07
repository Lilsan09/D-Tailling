<?php

if (SessionFlash::exist()) {
?>
   <div class="alert alert-dark alert-dismissible fade show text-light" role="alert">
      <strong><?=SessionFlash::get()?></strong>
      <button type="button" class="btn-close closeAlertBtn" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>

<?php } ?>

   <div class="container-fluid bg-dark minH90">
      <form class="my-4 bg-dark">
         <div class="row justify-content-center">
            <h1 class="text-secondary my-4 text-center">Liste des utilisateurs</h1>
            <div class="col-8">
               <div class="form-floating">
                  <input type="search" value="<?= $s ?? '' ?>" id="s" class="form-control" name="s" placeholder="Dupond" />
                  <label for="s" class="form-label"></label>
               </div>
            </div>
            <button class="btn btn-sm btn-primary col-2 col-lg-1" type="submit"><img src="/public/assets/img/loupe.png" alt="Rechercher"></button>
         </div>
      </form>
      <div class="row justify-content-center p-4">
         <?php
      foreach ($users as $user) {
         ?>
         <div class="card bg-secondary text-dark m-3 col-lg-4 align-items-center">
            <div class="card-body">
               <h5 class="card-text">Nom :  <?= htmlentities($user->lastname)?></h5>
               <h5 class="card-text">Prénom : <?= htmlentities($user->firstname) ?></h5>
               <h6 class="card-text">Email : <?= htmlentities($user->email) ?></h6>
               <h6 class="card-text">Adresse : <?= htmlentities($user->adress) ?></h6>
               <h6 class="card-text">Code Postal : <?= htmlentities($user->zipcode) ?></h6>
               <div class="d-flex justify-content-center">
                  <a href="/controllers/admin/editUserCtrl.php?id=<?= $user->Id_users ?>" class="card-link text-center"><img class="editSupprIcon" src="/public/assets/img/crayon.png" alt="Modifier"></a>
                  <a href="/controllers/admin/deleteUserCtrl.php?id=<?= $user->Id_users ?>" class="card-link text-center"><img class="editSupprIcon" src="/public/assets/img/supprimer.png" alt="Supprimer"></a>
               </div>
            </div>
         </div>
         <?php } ?>
      </div>
      <nav class="col-12 d-flex justify-content-center">
         <ul class="pagination pagination-sm bg-dark shadow-none">
            <?php
            for ($i = 1; $i <= $nbPages; $i++) {
               if ($i == $currentPage) { ?>
                  <li class="page-item active" aria-current="page">
                     <span class="page-link text-secondary">
                        <?= $i ?>
                        <span class="visually-hidden">(current)</span>
                     </span>
                  </li>
               <?php } else { ?>
                  <li class="page-item"><a class="page-link" href="?currentPage=<?= $i ?><?= (empty($s) || $s == '') ? '' : '&s=' . $s ?>"><?= $i ?></a></li>
            <?php }
            } ?>
         </ul>
      </nav>

   </div>