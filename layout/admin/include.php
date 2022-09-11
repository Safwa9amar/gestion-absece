<?php
if (isset($_GET['ref_id'])) {
    
    if ($_GET['ref_id'] == 'listEtudiant') {
        include('list_etudiant.php');
    }
    if ($_GET['ref_id'] == 'home') {
        include('admin_home.php');
    }
    if ($_GET['ref_id'] =='listAbsence') {
        include('absence.php');
    }
    if ($_GET['ref_id'] =='listprof') {
        include('list_prof.php');
    }
    if ($_GET['ref_id'] =='listmodules') {
        include('list modules.php');
    }
    else if ($_GET['ref_id'] =='err'  || isset($_GET['err_page']) ) {
        
        include('404.php');

    }
 
}
else {
    header('Location: profile.php?ref_id=err&err_page');
   
}
?>
    