<?php
session_start();
if ($_SESSION['permission'] == 'admin') {
    
    include_once('db_conn.php');
    $conn -> select_db("abs_users");
    
$num_insc =  $_GET['num_insc'];
$nom =  $_GET['nom'];
$prenom =  $_GET['prenom'];
$gender =  $_GET['gender'];
$date_naiss =  $_GET['date_naiss'];
$faculte =  $_GET['faculte'];
$departement =  $_GET['departement'];
$specialite =  $_GET['specialite'];
$Groupe =  $_GET['Groupe'];
//
$pwd =  $_GET['pwd'];


//checking if etudiant exit

$sql_check =
    "SELECT * FROM etudiant
 WHERE num_inscription = '$num_insc'";

//
$sql_insert = "
INSERT INTO etudiant(
    `id`,
    `num_inscription`,
    `pwd`,
    `nom`,
    `prenom`,
    `gender`,
    `date_naiss`,
    `faculte`,
    `departement`,
    `specialite`,
    `grp`
)
VALUES(
    NULL,
    '$num_insc',
    '$pwd',
    '$nom',
    '$prenom',
    '$gender',
    '$date_naiss',
    '$faculte',
    '$departement',
    '$specialite',
    '$Groupe');

";


if ($conn->query($sql_check)->num_rows > 0) {
    echo 3;
    
} else  { 

    if ($conn->query($sql_insert)) {
        // echo 'date insert succes';
        echo true;
    } else {
        // echo 'no date insert' . $conn -> error;
        echo false;
    }
}
}

else {
    die();
}
