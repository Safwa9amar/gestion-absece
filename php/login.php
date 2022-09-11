<?php

include('db_conn.php');
session_start();

// Retrieve data from Query String
$departement =$_GET['selectLoginFac'];

$permission = $_GET['permission'];

$user = $_GET['user'];

$pwd = $_GET['password'];
 

if ($permission === 'admin') {

  $_sql = "SELECT * FROM `abs_users`. _admin WHERE user_name ='$user' AND departement = '$departement' AND pwd = '$pwd' AND permission = '$permission' ";
  
  if ($conn->query($_sql) -> num_rows > 0) {
  
    echo 'true';
    $_SESSION['username'] = $user;
    $_SESSION['permission'] = $permission ;
  
  }
  else {
    echo 'false';
  }
  
}
elseif ($permission === 'prof') {

    $_sql = "SELECT * FROM  `abs_users`. professeur WHERE user_name ='$user' AND departement = '$departement' AND pwd = '$pwd' AND  permission = '$permission'";
    if ($conn->query($_sql) -> num_rows > 0) {
      echo 'true';
          $res = mysqli_query($conn,$_sql);
          if (!empty($res)) {
            # code...
          $ress = mysqli_fetch_assoc($res);
          // $_SESSION['faculte'] =  $ress['faculte'];
          $_SESSION['departement'] =  $ress['departement'];
          $_SESSION['prof_nom'] =  $ress['nom_prof'];
          $_SESSION['prof_id'] =  $ress['id'];
          $_SESSION['username'] = $user;
          $_SESSION['permission'] = $permission ;
        }
    
    }
    else {
      echo 'false';
    }

}
elseif ($permission === 'chefDep') {
    
    $_sql = "SELECT * FROM  `abs_users`. chefDep WHERE user_name ='$user' AND departement = '$departement' AND pwd = '$pwd' AND  permission = '$permission'";
    if ($conn->query($_sql) -> num_rows > 0) {
  
      echo 'true';
      $_SESSION['username'] = $user;
      $_SESSION['permission'] = $permission ;
    
    }
    else {
      echo 'false';
    }
    
}
elseif ($permission === 'Etud') {
    
    $_sql = "SELECT * FROM  `abs_users`. Etudiant WHERE user_name ='$user' AND departement = '$departement' AND pwd = '$pwd' AND  permission = '$permission'";
    if ($conn->query($_sql) -> num_rows > 0) {
  
      echo 'true';
      $_SESSION['username'] = $user;
      $_SESSION['permission'] = $permission ;
    
    }
    else {
      echo 'false';
    }
    
}
