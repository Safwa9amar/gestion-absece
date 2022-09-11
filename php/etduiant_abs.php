<?php
include_once 'db_conn.php';
mysqli_select_db($conn,'abs_users');

$result1 = mysqli_query($conn , "SELECT etudiant.id ,etudiant.nom ,etudiant.prenom, professeur.nom_prof,module.nom_mod
FROM absence 
inner join etudiant on etudiant.id = absence.nom_etud_abs
inner join professeur on professeur.id = absence.nom_prof_abs
inner join module on module.id = absence.module_abs
WHERE etudiant.nom = 'hamza'AND module.id = 8");

$result2 = mysqli_query($conn , "SELECT absence.abs_id ,absence.date_abs , absence.justification , absence.type_justification
FROM absence 
inner join etudiant on etudiant.id = absence.nom_etud_abs
inner join professeur on professeur.id = absence.nom_prof_abs
inner join module on module.id = absence.module_abs
WHERE etudiant.nom = 'hamza'AND module.id = 8");

$data1 = mysqli_fetch_assoc($result1);

    while ($data2 = mysqli_fetch_assoc($result2)) {
    
    $out[]= $data2 ;
    
    
}


    $array = array_merge($data1 , ["absence" => $out]);


    $array = json_encode($array ,JSON_UNESCAPED_UNICODE);
    echo $array ;



?> 
