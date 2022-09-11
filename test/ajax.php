<?php

$data = $_POST['json'];
$jsondateEncoded = json_decode($data);
    echo $jsondateEncoded->num_inscr;
    echo $jsondateEncoded->pass;
    echo $jsondateEncoded->nom;
    echo $jsondateEncoded->prenom;
    echo $jsondateEncoded->dob;
    echo $jsondateEncoded->fac;
    echo $jsondateEncoded->dep;
    echo $jsondateEncoded->spec;
    echo $jsondateEncoded->grp;



?>