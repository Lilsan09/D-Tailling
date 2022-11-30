<section class="prestation carouZel">
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
         <div class="carousel-inner">
            <?php foreach ($prestations as $key=>$prestation) { ?>
               <div class="carousel-item <?= $key == 0 ? 'active' : NULL ?>">
                  <img src="../public/uploads/prestations/<?= $prestation->Id_prestations?>.jpeg" class="d-block w-100 imgPrestation" alt="<?=$prestation->title?>">
                  <div class="carousel-caption d-md-block">
                     <h5 class="text-danger"><?= $prestation->title ?></h5>
                     <p><?= $prestation->price?>€</p>
                     <p><?= $prestation->description?></p>
                  </div>
               </div>
            <?php } ?>
         </div>
         <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
         </button>
         <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
         </button>
      </div>
   </section>