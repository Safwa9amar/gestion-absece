const num_insc = document.getElementById("num_inscr");
const nom = document.getElementById("nom");
const prenom = document.getElementById("prenom");
const gender = document.getElementById("gender");
const date_naiss = document.getElementById("date_naiss");
const faculte = document.getElementById("faculte");
const departement = document.getElementById("departement");
const specialite = document.getElementById("specialite");
const Groupe = document.getElementById("Groupe");
const pwd = document.getElementById("pwd");
//
const addEtudiantConfirm = document.getElementById("addEtudiantConfirm");
const addEtudiantDeny = document.getElementById("addEtudiantDeny");
//
const inputRquirAttr = document.querySelectorAll("input");

// The variable that makes Ajax possible!
var ajaxRequest;

addEtudiantConfirm.addEventListener("click", (event) => {
  event.preventDefault();

  for (let i = 0; i < inputRquirAttr.length; i++) {
    inputRquirAttr[i].setAttribute("required", "true");
  }

  if (
    num_insc.value == "" ||
    nom.value == "" ||
    prenom.value == "" ||
    gender.value == "" ||
    date_naiss.value == "" ||
    faculte.value == "" ||
    departement.value == "" ||
    specialite.value == "" ||
    Groupe.value == "" ||
    pwd.value == ""
  ) {
    //console.error(`remplire le champ ${inputRquirAttr[i].id}`);
    let htMl =
    '<div class="ui left menu negative message"><p>S’il vous plaît remplir tous les champs vides</p></div>';
    document.getElementById("err_mesg").innerHTML = htMl;
    $('#addEtudiantmodal').transition('bounce');
  } else {
    // $('#addEtudiantmodal').transition('fly right');
    try {
      // Opera 8.0+, Firefox, Safari
      ajaxRequest = new XMLHttpRequest();
    } catch (e) {
      // Internet Explorer Browsers
      try {
        ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
      } catch (e) {
        try {
          ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (e) {
          // Something went wrong
          alert("Your browser broke!");
          return false;
        }
      }
    }

    // Create a function that will receive data
 
    ajaxRequest.onreadystatechange = function () {
      if (ajaxRequest.readyState == 4) {
        let ResText = Boolean(Number(parseInt(ajaxRequest.responseText)));
        if (parseInt(ajaxRequest.responseText) === 3) {
          let htMl =
            '<div class="ui left menu blue message"><p>L’étudiant existe déjà.</p></div>';
          document.getElementById("err_mesg").innerHTML = htMl;
        } else if (ResText === true) {

          let htMl =
            '<div class="ui left menu positive message"><p>L’étudiant a été ajouté avec succès</p></div>';
          document.getElementById("err_mesg").innerHTML = htMl;
          setTimeout(() => {
            window.location.reload();
          }, 1000);
        } else if (ResText === false) {
          console.log(ajaxRequest.responseText);
          let htMl =
            '<div class="ui left menu blue message"><p>Une erreur s’est produite, réessayez</p></div>';
          document.getElementById("err_mesg").innerHTML = htMl;
          document.querySelector("form").reset();
        }
      }
    };

    // Now get the value from user and pass it to
    // server script.
    var queryString =
      "?&num_insc=" +
      num_insc.value +
      "&nom=" +
      nom.value +
      "&prenom=" +
      prenom.value +
      "&gender=" +
      gender.value +
      "&date_naiss=" +
      date_naiss.value +
      "&faculte=" +
      faculte.value +
      "&departement=" +
      departement.value +
      "&specialite=" +
      specialite.value +
      "&Groupe=" +
      Groupe.value +
      "&pwd=" +
      pwd.value;

    // console.log(queryString);

    ajaxRequest.open("GET", "php/add_etudiant.php" + queryString, true);
    ajaxRequest.send(null);
  }
});
