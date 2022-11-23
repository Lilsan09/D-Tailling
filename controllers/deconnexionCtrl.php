<?php
   session_start();
   unset($_SESSION['user']);
   header('Location: /controllers/homeCtrl.php');
   exit();