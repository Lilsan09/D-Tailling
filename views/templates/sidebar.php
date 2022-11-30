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

<body class="bg-secondary">
   <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
         <div class="container-fluid bg-secondary">
            <a class="navbar-brand" href="/controllers/admin/dashboardCtrl.php"><img src="/public/assets/img/logolightDtailing.png" alt="Logo D-Tailing" class="logo">
               <span class="visually-hidden">(current)</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor02">
               <ul class="navbar-nav me-auto">
                  <li class="nav-item">
                     <a class="nav-link" href="/controllers/admin/userListCtrl.php"><span class="text-dark">Utilisateurs</span></a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="/controllers/admin/appointmentListCtrl.php"><span class="text-dark">Rendez-Vous</span></a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="/controllers/admin/prestationListCtrl.php"><span class="text-dark">Prestations</span></a>
                  </li>
                  <li class="nav-item">
                     <?php if (isset($_SESSION['user'])) { ?>
                        <a class="nav-link text-dark" href="/controllers/deconnexionCtrl.php">Déconnexion</a>
                     <?php } else { ?>
                        <a class="nav-link text-dark" href="/controllers/connexionCtrl.php">Connexion</a>
                     <?php } ?>
                  </li>
               </ul>
               <?php if (isset($_SESSION['user'])) { ?>
                  <ul class="navbar-nav">
                     <li class="nav-item">
                        <a class="nav-link h-100 align-self-end text-dark" href="/controllers/homeCtrl.php">
                           Retour au site
                        </a>
                     </li>
                  <?php } ?>
                  </ul>
            </div>
         </div>
      </nav>
   </header>