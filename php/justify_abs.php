<?php 

include 'db_conn.php';
$conn -> select_db("abs_users");
if (isset($_POST['absJust'])) {

    $query = $conn -> prepare("UPDATE `absence` SET `justification` = ?, `type_justification` = ? WHERE `absence`.`abs_id` =?");
    $query ->bind_param('ssi',$_POST['just'],$_POST['absJust'] , $_POST['absId']);
    if ($query ->execute()) {
        echo 'asb up';
    }
    else{
        $conn ->error;
    }

}
if (isset($_POST['Nonjust'])) {

    $query = $conn -> prepare("UPDATE `absence` SET `justification` = 'non' ,`type_justification` = '' WHERE `absence`.`abs_id` =?");
    $query ->bind_param('i',$_POST['absId']);
    if ($query ->execute()) {
        echo 'asb up';
    }
    else{
        $conn ->error;
    }

}








?>