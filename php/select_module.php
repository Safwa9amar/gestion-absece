<?php

include 'db_conn.php';
mysqli_select_db($conn, 'abs_users');

// select * module from module tabel by speçcialté
if (isset($_POST['data'])) {
    $query = $conn->prepare('SELECT module.nom_mod ,  module.id
        FROM mod_spe
        inner JOIN module on module.id = mod_spe.module_id
        WHERE specialte_id = ?');
    $query->bind_param('s', $_POST['data']);
    $query->execute();
    $result = $query->get_result();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value=' . $row['id'] . '>';
            echo $row['nom_mod'];
            echo '</option>';
        }
    }
}


?>