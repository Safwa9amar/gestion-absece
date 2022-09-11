<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/dist/css/prof.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.7/semantic.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.semanticui.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.7/semantic.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js  "></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.semanticui.min.js  "></script>

    <title>Abs | <?php echo $_SESSION['username'] ?></title>
</head>

<body>
    <div class="ui grid">
        <div class="sixteen wide column">
            <div class="ui   menu">
                <a href="#" class="item">
                    <img src="assets/img/Logo_UDLtransparent.png" alt="udl logo" class="src">
                </a>


                <div class="right menu">

                    <div class="item">
                        <a href="#" class="item">
                            <i class='user icon'></i>
                            <?php echo $_SESSION['username'] ?>
                        </a>
                    </div>

                </div>

            </div>
        </div>
        <div class="three wide column">


            <h3>Legend</h3>
            <ul>
                <li><i class="circle green icon"></i>absences justifier</li>
                <li><i class="circle red icon"></i> absences non justifier</li>
            </ul>

            <h3>Choisissez une module</h3>
            <ul>

                <?php
                include './php/db_conn.php';
                mysqli_select_db($conn, 'abs_users');


                $stmt = $conn->prepare("SELECT specialite.specialte_id,specialite.specialte_nom
                            FROM pro_speç
                            inner JOIN professeur ON professeur.id = pro_speç.prof_id
                            inner JOIN specialite ON specialite.specialte_id = pro_speç.spe_id
                            WHERE prof_id = ?");
                $stmt->bind_param("s", $_SESSION["prof_id"]);
                $stmt->execute();
                $result = $stmt->get_result();

                if (mysqli_num_rows($result) > 0) {

                    # code...
                    while ($row = mysqli_fetch_assoc($result)) {

                        $specialte[] = $row['specialte_id'];
                        $spec_nom[] = $row['specialte_nom'];
                    }
                } else {
                    echo 'No data';
                }
                # code...
                $stmt11 = $conn->prepare("SELECT  module.nom_mod,module.id , professeur.nom_prof,specialite.specialte_nom
                FROM  prof_spe_mod 
                inner JOIN professeur ON professeur.id = prof_spe_mod.prof_id
                inner JOIN module ON module.id = prof_spe_mod.mod_id
                inner JOIN specialite ON specialite.specialte_id = prof_spe_mod.spe_id
                WHERE prof_id = ?
                ORDER BY `prof_spe_mod`.`spe_id` ASC
                ");


                $stmt11->bind_param("s", $_SESSION["prof_id"]);
                $stmt11->execute();
                $result11 = $stmt11->get_result();

                if (empty($specialte)) {
                    echo 'empty';
                } else {
                    while ($row = mysqli_fetch_assoc($result11)) {
                        $mod[] = $row['nom_mod'];
                        echo '<a href=' . '?mod_id=' . $row["id"] . '&mod_nom=' . $row['nom_mod'] . '>';
                        echo ' ( ' . $row['specialte_nom'] . ' ) ' . $row['nom_mod'];
                        echo '</a>';
                        echo '<br>';
                        echo '<br>';
                    }
                }



                ?>

            </ul>
        </div>
        <div class="twelve wide column">

            <table class="ui striped table">
                <tr>
                    <th>TD</th>
                    <th>TP</th>
                    <th>Cours</th>
                    <th>Choisissez etudiant</th>
                    <th>La date</th>
                    <th>Heure</th>
                    <th></th>

                </tr>
                <tr>
                    <td><input type="radio" name="a" id="TD"></td>
                    <td><input type="radio" name="a" id="TP"></td>
                    <td><input type="radio" name="a" id="Cours"></td>
                    <td class="three wide">
                        <select id="etud_abs" class="ui fluid search dropdown">
                            <option></option>
                            <?php
                            include 'php/db_conn.php';
                            mysqli_select_db($conn, 'abs_users');
                            $query = $conn->prepare("SELECT etudiant.nom , etudiant.prenom,etudiant.id
                                        FROM etud_mod
                                        inner JOIN etudiant ON etudiant.id = etud_mod.etudiant_id
                                        WHERE mod_id = ? ");
                            $query->bind_param('s', $_GET['mod_id']);
                            $query->execute();
                            $result = $query->get_result();
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value=' . $row['id'] . '>';
                                echo $row['nom'] . ' ' . $row['prenom'];
                                echo '</option>';
                            }
                            ?>

                        </select>
                    </td>
                    <td class="three wide">
                        <input type="date" name="" id="date_abs" value='<?php echo date('Y-m-d'); ?>'>
                    </td>
                    <td>
                        <input type="time" name="" id="time_abs">
                    </td>




                    <td id="abs_messege"></td>

                    <td class="one wide">
                        <i id="valid_abs" class="check icon"></i>
                        <i id="reset_abs" class="close icon"></i>
                    </td>

                </tr>
            </table>
            <h1><?php if (isset($_GET['mod_nom'])) {
                    echo $_GET['mod_nom'];
                }
                ?>
            </h1>
            <div class="ui bottom attached tab segment active" data-tab="second">


                <table class="ui red table" id="absdata">
                    <thead>
                        <tr>
                            <th>N° insc/ Nom </th>
                            <th>Groupe</th>
                            <th>Absences</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = $conn->prepare('SELECT etudiant.* ,module.* , absence.* 
                    FROM absence
                    inner JOIN etudiant ON etudiant.id = absence.etudant_id
                    inner JOIN module ON module.id = absence.mod_id
                    WHERE mod_id = ?');

                        $query->bind_param("s", $_GET['mod_id']);
                        $query->execute();
                        $result1 = $query->get_result();

                        if (mysqli_num_rows($result1) > 0) {

                            # code...
                            while ($row = mysqli_fetch_assoc($result1)) {
                                $etudiant_abs[] = $row['etudant_id'];
                                $etudiant_insc[] = $row['num_inscription'];
                                $etudiant_nom[] = $row['nom'];
                                $etudiant_prenom[] = $row['prenom'];
                                $etudiant_grp[] = $row['grp'];
                                $etudiant_periode[] = $row['periode'];
                            }
                            $query = $conn->prepare('SELECT etudiant.* ,module.* , absence.* 
                        FROM absence
                        inner JOIN etudiant ON etudiant.id = absence.etudant_id
                        inner JOIN module ON module.id = absence.mod_id
                        WHERE etudant_id = ?');
                            foreach (array_unique($etudiant_abs) as $key => $value) {
                                echo '<tr>';
                                echo '<td>';
                                // echo $etudiant_abs[$key];
                                echo ' ';
                                echo $etudiant_insc[$key];
                                echo ' ';
                                echo $etudiant_nom[$key];
                                echo ' ';
                                echo $etudiant_prenom[$key];
                                echo '</td>';
                                echo '<td>';
                                echo $etudiant_grp[$key];
                                echo '</td>';



                                echo ' ';
                                $query->bind_param('s', $etudiant_abs[$key]);
                                $query->execute();
                                $result = $query->get_result();


                                echo '<td>';
                                while ($row = mysqli_fetch_assoc($result)) {
                                    if ($row['justification'] == "oui") {
                                        # code...
                                        // echo $row['date_abs'];
                                        echo $row['periode'];
                                        echo '<a id="green"data-position="right center" data-title="Date de présence : " data-content=' . $row['date_abs'] . '&' . $row['time_abs'] . '>
                                        <i class="green circle icon"></i>
                                        </a>   ';
                                    } else {
                                        echo $row['periode'];
                                        echo '<a id="red_abs" data-position="right center" data-title="Date d\'absence" data-content=' . $row['date_abs'] . '&' . $row['time_abs'] . '>
                                        <i class="red circle icon"></i>
                                        </a>  ';
                                    }
                                }
                            }
                            echo '</td>';
                            echo '<tr>';
                        } else {
                            echo 'No data';
                        }
                        ?>


                    </tbody>
                </table>
            </div>


        </div>
    </div>


    <div class="ui grid">
        <div class="sixteen wide column"></div>
        <div class="ten wide column"></div>
        <div class="six wide column"></div>
    </div>

</body>

<script>
    $('#green , #red_abs').popup();

    let mesge = document.getElementById('abs_messege');
    const date_abs = document.getElementById('date_abs')
    const td = document.getElementById('TD')
    const tp = document.getElementById('TP')
    const cours = document.getElementById('Cours')
    const etud_abs = document.getElementById('etud_abs')
    const valid_abs = document.getElementById('valid_abs');
    const reset_abs = document.getElementById('reset_abs');
    const moduleAbs = <?php echo $_GET['mod_id'] ?>;
    let absClass;
    valid_abs.addEventListener('click', () => {
        let conf = confirm('Êtes-vous sûr d\'ajouter?');

        if (td.checked) {
            absClass = td.id;
        } else if (tp.checked) {
            absClass = tp.id;
        } else if (cours.checked) {
            absClass = cours.id;
        }

        if (conf == true) {

            $.ajax({
                url: "php/abs.php",
                type: "post",
                data: {
                    absClass: absClass,
                    absDate: date_abs.value,
                    time_abs: time_abs.value,
                    etudAbs: etud_abs.value,
                    modu: moduleAbs
                },
                success: function(addClassresponse) {
                    mesge.innerHTML = addClassresponse
                    delMessegeParent();
                 
                },
            });
        } else {
            return false;
        }
    })

    function delMessegeParent() {
        let closeMessage = document.querySelectorAll('.ui.message i.close.icon')
        closeMessage.forEach(el => {
            el.addEventListener('click', (e) => {
                e.target.parentElement.remove()

            })

        });
    }
    
</script>

</html>