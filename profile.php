<?php


 
session_start();


if ($_SESSION['permission'] == 'admin') {
    include('layout/admin.php');
}
 elseif ($_SESSION['permission'] == 'prof'){
    include('layout/prof.php');

 }

 elseif($_SESSION['permission'] == 'chefDep'){
    include('layout/chefDep.php');


 }

 elseif($_SESSION['permission'] == 'Etud'){
    include('layout/etudiant.php');

 }



if (isset($_GET['id']) == 'logout') {
    session_unset();
    session_destroy();
}


?>
