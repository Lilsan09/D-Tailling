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
         <div class="container-fluid bg-dark">
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
                     <a class="nav-link" href="/controllers/prestationCtrl.php">Prestations</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="/controllers/coordonneeCtrl.php">Nous trouver</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="/controllers/contactCtrl.php">Contact</a>
                  </li>
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Nos réseaux</a>
                     <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Linkedin</a>
                        <a class="dropdown-item" href="#">Facebook</a>
                        <a class="dropdown-item" href="#">Instagram</a>
                     </div>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="/controllers/connexionCtrl.php">Connexion</a>
                  </li>
               </ul>
            </div>
         </div>
      </nav>
   </header>