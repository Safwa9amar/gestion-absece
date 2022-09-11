
<?php
    
    include 'db_conn.php';
    $conn -> select_db("abs_users");
    if (isset($_POST['absClass'])) {

            if (isset($_POST['etudAbs']) || isset($_POST['modu']) || isset($_POST['absDate']) || isset($_POST['time_abs'])) {
            
                $etudAbs = $_POST['etudAbs'];
                $modu = $_POST['modu'];
                $absDate = $_POST['absDate'];
                $time_abs = $_POST['time_abs'];
                $absClass = $_POST['absClass'];
                if(empty($etudAbs)){
                    echo '<div class="ui negative message"><i class="close icon"></i>Veuillez choiser un etudiant</div>';
                }
                
                if(empty($absDate)){
                    echo '<div class="ui negative message"><i class="close icon"></i>Veuillez remplir champ date </div>';

                }
                if(empty($time_abs)){
                    echo '<div class="ui negative message"><i class="close icon"></i>Veuillez remplir champ heure</div>';

                }
                else {
                    $query = $conn -> prepare("INSERT INTO `absence` 
                    (`abs_id`, `etudant_id`, `mod_id`, `date_abs`, `time_abs`, `justification`, `type_justification`, `periode`)
                    VALUES
                    (NULL, ?, ?, ?, ?, 'non', '', ?)");
                    $query ->bind_param('iisss' , $etudAbs , $modu , $absDate ,$time_abs , $absClass);
                    
                    
                    if ($query ->execute()) {
                        # code...
                        echo '<div class="ui green message"><i class="close icon"></i>L\'absence a été enregistrée avec succès</div>';
                    }
                    else{
                        echo 'err try again';
                    }
                }
            }
    }

    else{
        echo '<div class="ui negative message"><i class="close icon"></i>Veuillez choiser un Periode(TD,Tp,Cours)</div>';
    }


?>