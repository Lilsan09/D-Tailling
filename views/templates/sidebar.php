<!DOCTYPE html>
<html lang="fr">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- Style.css -->
   <link rel="stylesheet" href="/public/assets/css/bootstrap.min.css">
   <link rel="stylesheet" href="/public/assets/css/style.css">
   <!-- Script -->
   <script src="/public/assets/js/script.js" defer></script>
   <!-- Titre du site -->
   <title>D-Tailling</title>
</head>

<body>
   <header>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
         <div class="container bg-dark">
            <a class="navbar-brand" href="/controllers/homeCtrl.php"><img src="/public/assets/img/logoDtailing.png" alt="Logo D-Tailing" class="logo">
               <span class="visually-hidden">(current)</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor02">
               <ul class="navbar-nav me-auto">
                  <!-- <li class="nav-item">
                     <a class="nav-link active" href="/controllers/homeCtrl.php">Accueil
                        <span class="visually-hidden">(current)</span>
                     </a>
                  </li> -->
                  <li class="nav-item">
                     <a class="nav-link" href="/controllers/admin/userListCtrl.php">Utilisateurs</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="/controllers/admin/appointmentListCtrl.php">Rendez-Vous</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="/controllers/admin/editPrestationCtrl.php">Prestations</a>
                  </li>
                  <li class="nav-item">
                     <?php if (isset($_SESSION['user'])) { ?>
                        <a class="nav-link" href="/controllers/deconnexionCtrl.php">Déconnexion</a>
                     <?php } else { ?>
                        <a class="nav-link" href="/controllers/connexionCtrl.php">Connexion</a>
                     <?php } ?>
                  </li>
                  <?php if (isset($_SESSION['user'])) { ?>
                     <li class="nav-item">
                        <a class="nav-link" href="/controllers/profilUserCtrl.php">
                           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                              <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                           </svg>
                        </a>
                     </li>
                  <?php } ?>
               </ul>
            </div>
         </div>
      </nav>
   </header>