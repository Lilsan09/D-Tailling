<!-- formulaire d'ajout de prestation -->
<form class="connexionForm container-fluid d-flex align-items-center justify-content-center" method="POST" enctype="multipart/form-data" novalidate>
   <fieldset class="row justify-content-center glassForm my-4 flex-column align-items-center">
      <legend class="text-center">Ajouter une prestation</legend>
      <div class="col-lg-6">
         <div class="form-group">
            <label for="title" class="form-label mt-4">Titre</label>
            <input value="<?= $prestation->title ?? $prestation->getTitle() ?>" name="title" type="text" class="form-control" id="mail" aria-describedby="titleHelp" required>
            <p><?= $errors['title'] ?? ''; ?></p>
         </div>
         <div class="form-group">
            <label for="price" class="form-label mt-4 ">Prix</label>
            <input name="price" type="number" class="form-control" id="price" required>
         </div>
      </div>
      <div class="form-group col-lg-6">
         <label for="description" class="form-label mt-4 ">Description</label>
         <textarea name="description" class="form-control" id="description" rows="5" cols="33" required>
         </textarea>
         <p><?= $errors['description'] ?? '' ?></p>
      </div>
      <div class="form-group col-lg-6 mb-4">
         <label for="image" class="form-label mt-4">Image</label>
         <input name="image" class="form-control" type="file" id="image" required>
         <p><?= $errors['image'] ?? '' ?></p>
      </div>
      <button type="submit" class="btn btn-primary btn-sm col-lg-3">Modifier la prestation</button>
   </fieldset>
</form>