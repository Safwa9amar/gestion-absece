<?php
include 'db_conn.php';
mysqli_select_db($conn, 'abs_users');
session_start();
if ($_SESSION['permission'] == 'admin') {
    $prof_id = [];
    if (isset($_GET['prof_name']) || isset($_GET['prof_user']) || isset($_GET['prof_pass']) || isset($_GET['selectDepart'])) {
        $prof_name = $_GET['prof_name'];
        $prof_user = $_GET['prof_user'];
        $prof_pass = $_GET['prof_pass'];
        $prof_Depart = $_GET['selectDepart'];
        if (empty($prof_Depart) and empty($prof_user) and empty($prof_name)) {
            echo '<div class="ui negative message"><i class="close icon"></i>Veuillez remplir Tous les Champs</div>';
        } else if (empty($prof_Depart)) {
            echo '<div class="ui negative message"><i class="close icon"></i>Veuillez remplir le champ Departement</div>';
        } else if (empty($prof_name)) {
            echo '<div class="ui negative message"><i class="close icon"></i>Veuillez remplir le champ Nom Complete</div>';
        } else if (empty($prof_user)) {
            echo '<div class="ui negative message"><i class="close icon"></i>Veuillez remplir le champ Nom d\'utilisateur</div>';
        } else {
            $query = $conn->prepare('SELECT * from  `professeur` WHERE  user_name = ?');
            $query->bind_param('s', $prof_user);
            $query->execute();
            $result = $query->get_result();

            if (mysqli_num_rows($result) > 0) {
                echo '<div class="ui orange message"><i class="close icon"></i>Professeur ' . $prof_user . ' deja exist</div>';
                die();
            } else {

                $query = $conn->prepare("INSERT INTO `professeur` (`id`, `nom_prof`, `departement`, `user_name`, `pwd`, `permission`)
                    VALUES (NULL, ?, ?, ? , ?, 'prof')");
                $query->bind_param('ssss', $prof_name, $prof_Depart, $prof_user, $prof_pass);
                $query->execute();
                $result = $query->get_result();
                echo '<div class="ui green message"><i class="close icon"></i>Le professeur a été ajouté avec succès</div>';

                $query = $conn->prepare('SELECT * from  `professeur` WHERE  user_name = ?');
                $query->bind_param('s', $prof_user);
                $query->execute();
                $result = $query->get_result();
                while ($row = mysqli_fetch_assoc($result)) {
                    $prof_id[] = $row['id'];
                    $query = $conn->prepare("INSERT INTO `pro_speç` (`prof_id`, `spe_id`) VALUES (?, ?)");
                    $query->bind_param('ss', $row['id'], $_GET['prof_spe']);
                    $query->execute();
                }
            }
        }
    }
    if (isset($_POST['ModuleListNames']) || isset($_POST['ModuleListIds']) || isset($_POST['select_spec_prof'])) {
       
        if (empty($_POST['select_spec_prof'])) {
            echo '<div class="ui negative message"><i class="close icon"></i>Veuillez remplir le champ de speçialité</div>';
        }
        else if (empty($_POST['ModuleListNames'])) {
            echo '<div class="ui negative message"><i class="close icon"></i>Veuillez remplir le champ des Matières</div>';
        }
        else{
        $query = $conn->prepare('SELECT * from  `professeur` WHERE  user_name = ?');
        $query->bind_param('s', $_POST['prof_user']);
        $query->execute();
        $result = $query->get_result();
        while ($row = mysqli_fetch_assoc($result)) {
            $prof_id[] = $row['id'];
        }
        foreach ($_POST['ModuleListIds'] as $key => $value) {
            $query = $conn->prepare('SELECT * FROM  `prof_spe_mod` WHERE prof_id = ? AND mod_id = ? AND spe_id = ?');
            $query->bind_param('sss', $prof_id[0], $_POST['ModuleListIds'][$key], $_POST['select_spec_prof']);
            $query->execute();
            $result = $query->get_result();
            if ($result == false) {
                // break;
            } else if (mysqli_num_rows($result) > 0) {
                echo '<div class="ui orange message"><i class="close icon"></i>'.$_POST['ModuleListNames'][$key] . ' => déjà  Ajouter</div>';
                
            } else {
                $query = $conn->prepare("INSERT INTO `prof_spe_mod` (`prof_id`, `mod_id`, `spe_id`) VALUES (?, ?, ?)");
                $query->bind_param('sss', $prof_id[0], $_POST['ModuleListIds'][$key] , $_POST['select_spec_prof'] );
                $query->execute();
                echo '<div class="ui green message"><i class="close icon"></i>'.$_POST['ModuleListNames'][$key] . ' <i class="check icon"></i></div>';
            }
        }
        }
    }
    if (isset($_GET['del_prof'])) {
        $query = $conn->prepare('DELETE FROM `professeur` WHERE `professeur`.`id` = ?');
        $query->bind_param('s', $_GET['del_prof']);
        $query->execute();
        $result = $query->get_result();
        echo true;
    }
} else {
    die();
}
