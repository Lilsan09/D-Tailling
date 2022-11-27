<?php if (isset($errorsArray['global'])) { ?>

   <div class="alert alert-warning" role="alert">
      <?= nl2br($errorsArray['global']) ?>
   </div>

<?php } else { ?>
   
   <?php
   if (SessionFlash::exist()) {
      ?>
      <div class="alert alert-primary" role="alert">
         <strong><?= SessionFlash::get() ?></strong>
      </div>
      
      <?php } ?>
      
      <?php
   ?>
   <form class="container">
      <h1 class="text-primary my-4">Liste des utilisateurs</h1>
      <div class="row mb-4">
         <div class="col-8">
            <div class="form-floating">
               <input type="search" value="<?= $s ?? '' ?>" id="s" class="form-control" name="s" placeholder="Dupond" />
               <label for="s" class="form-label">Recherche</label>
            </div>
         </div>
         <button class="btn btn-primary col-3" type="submit">Rechercher</button>
         <div class="col-4">
         </div>
      </div>


   </form>

   <div class="container">
      <div class="row">
         <table class="table table-striped">
            <thead>
               <tr>
                  <th scope="col" class="text-secondary">Prénom</th>
                  <th scope="col" class="text-secondary">Nom</th>
                  <th scope="col" class="text-secondary">Email</th>
                  <th scope="col" class="text-secondary">Adresse</th>
                  <th scope="col" class="text-secondary">C.Postal</th>
                  <th scope="col" class="text-secondary">modif</th>
                  <th scope="col" class="text-secondary">suppr</th>

               </tr>
            </thead>
            <tbody>

               <?php
               foreach ($users as $user) {
               ?>
                  <tr>
                     <td><?= htmlentities($user->firstname) ?></td>
                     <td><?= htmlentities($user->lastname) ?></td>
                     <td><a href="mailto:<?= htmlentities($user->email) ?>"><?= htmlentities($user->email) ?></a></td>
                     <td><?= htmlentities($user->adress) ?></td>
                     <td><?= htmlentities($user->zipcode) ?></td>
                     <td>
                        <a href="/controllers/admin/editUserCtrl.php?id=<?= $user->Id_users ?>">Modif</a>
                     </td>
                     <td>
                        <a href="/controllers/admin/deleteUserCtrl.php?id=<?= $user->Id_users ?>">suppr</a>
                     </td>
                  </tr>
               <?php } ?>
            </tbody>
         </table>
      </div>

   </div>
   <nav class="col-12 bg-dark d-flex justify-content-center">
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
<?php } ?>