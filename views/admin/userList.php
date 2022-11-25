<?php if (isset($errorsArray['global'])) { ?>

   <div class="alert alert-warning" role="alert">
      <?= nl2br($errorsArray['global']) ?>
   </div>

<?php } else { ?>
   <h1 class="text-primary mb-5">Liste des utilisateurs</h1>

   <?php
   if (SessionFlash::exist()) {
   ?>
      <div class="alert alert-primary" role="alert">
         <strong><?= SessionFlash::get() ?></strong>
      </div>

   <?php } ?>

<?php
?>
   <form>
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
      
      
      <table class="table table-striped">
         <thead>
            <tr>
               <th scope="col">Prénom</th>
               <th scope="col">Nom</th>
               <th scope="col">Email</th>
               <th scope="col">Adresse</th>
               <th scope="col">Code postal</th>
               <th scope="col">modif</th>
               <th scope="col">suppr</th>
               
            </tr>
         </thead>
         <tbody>
            
            <?php
         foreach ($users as $user) {
            ?>
            <tr>
               <td><?= htmlentities($user['firstname']) ?></td>
               <td><?= htmlentities($user['lastname']) ?></td>
               <td><a href="mailto:<?= htmlentities($user['email']) ?>"><?= htmlentities($user['email']) ?></a></td>
               <td><?= htmlentities($user['adress']) ?></td>
               <td><?= htmlentities($user['zipcode']) ?></td>
               <td>
                  <a href="/controllers/edit-patientCtrl.php?id=<?= htmlentities($user->id) ?>"><i class="far fa-edit"></i></a>
                  <a href="/controllers/delete-patientCtrl.php?id=<?= $user->id ?>"><i class="fas fa-trash fs-5"></i></a>
               </td>
               
            </tr>
         <?php } ?>

      </tbody>
   </table>

            <?php var_dump($s)?>
   <nav aria-label="...">
      <ul class="pagination">
         <?php
         for ($i = 1; $i <= $nbPages; $i++) {
            if ($i == $currentPage) { ?>
               <li class="page-item active" aria-current="page">
                  <span class="page-link">
                     <?= $i ?>
                     <span class="visually-hidden">(current)</span>
                  </span>
               </li>
            <?php } else { ?>
               <li class="page-item"><a class="page-link" href="?currentPage=<?= $i ?><?= (empty($s) || $s =='')? '' : '&s=' . $s ?>"><?= $i ?></a></li>
         <?php }
         } ?>
      </ul>
   </nav>
<?php } ?>