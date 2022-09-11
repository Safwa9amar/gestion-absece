<?php
session_start();
echo $_SESSION['permission'];
if ($_SESSION['permission'] == 'admin') {

    include('db_conn.php');
    $conn -> select_db("abs_users");

    
    $data = $_POST['json'];
    if (isset($data)) {

        $jsondateEncoded = json_decode($data);

        $qry = "UPDATE etudiant SET
        `num_inscription` = '$jsondateEncoded->num_inscr',
        `pwd` = '$jsondateEncoded->pass',
        `nom` = '$jsondateEncoded->nom',
        `prenom` = '$jsondateEncoded->prenom',
        `date_naiss` = '$jsondateEncoded->dob',
        `faculte` = '$jsondateEncoded->fac',
        `departement` = '$jsondateEncoded->dep',
        `specialite` = '$jsondateEncoded->spec',
        `grp` = '$jsondateEncoded->grp;'

        WHERE `etudiant`.`id` = $jsondateEncoded->id
        ";
        if (!empty($jsondateEncoded->id)) { 
            # code...
            $result = $conn->query($qry);
            $conn->error;

            if ($result) {
                echo 'sucess';
            } else {
                $conn->error;
            }
        }
        else {
            die();
        }
    }

    // del etudiant
    if (isset($_POST['data'])) {
        $del_id = $_POST['data'];
        $q = "DELETE FROM etudiant WHERE `etudiant`.`id` = $del_id";
        echo $del_id, $q;
        $res = $conn->query($q);
        $conn->error;

        if ($res) {
            echo 'sucess';
        } else {
            $conn->error;
        }
    }
}
else {
    die();
}
?>