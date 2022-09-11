<?php


include 'db_conn.php';
mysqli_select_db($conn, 'abs_users');
session_start();
if ($_SESSION['permission'] == 'admin') {


if (isset($_POST['module']) || isset($_POST['list_etudiant'])) {
    if (empty($_POST['module'])) {
        echo 'Veuillez remplir le champ Module <br>';
    }

    if (empty($_POST['list_etudiant'])) {
        echo 'Veuillez remplir le champ Etudinat <br>';
    } else if (!empty($_POST['module']) && !empty($_POST['list_etudiant'])) {
        $query = $conn->prepare("SELECT * FROM `etud_mod` WHERE etudiant_id = ? AND  mod_id = ? ");
        foreach ($_POST['list_etudiant'] as $key => $value) {
            $query->bind_param('ss', $value, $_POST['module']);
            $query->execute();
            $result = $query->get_result();
            if ($result == false) {
                // break;
            } else if (mysqli_num_rows($result) > 0) {
                echo $_POST['nom_etud_list'][$key] . ' => déjà dans cette classe<br>';
                // break;
            } else {
                    $query = $conn->prepare("INSERT INTO `etud_mod` (`etudiant_id`, `mod_id`) VALUES (?, ?)");
                    $query->bind_param('ss', $value, $_POST['module']);
                    $query->execute();
                    echo ' ajoutée à la classe avec succès<br>'; 
            }
        }
        die();
    }
} else {
    echo 'Merci de Remplir tous les champs';
}
} else {
    die();
}
