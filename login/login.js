const loginType = document.getElementById('selectLoginType');

const loginFac = document.getElementById('selectLoginFac');

const login_form = document.getElementById('login_form');

const disabledInputs = login_form.querySelectorAll('input');


const alertLog = document.getElementById('alert');

for (let i = 0; i < disabledInputs.length; i++) {
    //loop all element ipnut and make theme disabled
    
    disabledInputs[i].setAttribute('disabled',true);

    //loop all element ipnut and make theme required
    disabledInputs[i].setAttribute('required',true);
}



loginType.setAttribute('disabled',true)

loginFac.addEventListener('change',() => {

    loginType.removeAttribute('disabled');
})



loginType.addEventListener('change',() => {



for (let i = 0; i < disabledInputs.length; i++) {

    disabledInputs[i].removeAttribute('disabled');
}

})


//Browser Support Code
document.getElementById('formSub').addEventListener('click',(event) => {

        event.preventDefault();
        var ajaxRequest;  // The variable that makes Ajax possible!
        
        try {
            // Opera 8.0+, Firefox, Safari
            ajaxRequest = new XMLHttpRequest();
        }catch (e) {
            // Internet Explorer Browsers
            try {
                ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
            }catch (e) {
                try{
                    ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
                }catch (e){
                    // Something went wrong
                    alert("Your browser broke!");
                    return false;
                }
            }
        }
        
        // Create a function that will receive data 
        // sent from the server and will update
        // div section in the same page.
        
        ajaxRequest.onreadystatechange = function(){
            if(ajaxRequest.readyState == 4){
                //var ajaxDisplay = document.getElementById('ajaxDiv');
                //ajaxDisplay.innerHTML = ajaxRequest.responseText;
                console.log(ajaxRequest.responseText);
                if (ajaxRequest.responseText === 'true' ) {
                    alertLog.style.display = 'block';
                    alertLog.classList.remove('alert-danger');
                    alertLog.classList.add('alert-success');
                    alertLog.textContent = `Vous vous êtes connecté avec succès...`;
                    setTimeout(() => {
                            window.location = '/profile.php?ref_id=home';
                    },2000)
                }
                if (ajaxRequest.responseText === 'false') {
                    
                    alertLog.style.display = 'block';
                    alertLog.textContent = `Informations de connexion incorrectes Vérifiez le nom d'utilisateur ou le mot de passe`;
                }
            }
        }
        
        // Now get the value from user and pass it to
        // server script.
        var selectLoginFac = document.getElementById('selectLoginFac').value;
        var selectLoginType = document.getElementById('selectLoginType').value;
        var user = document.getElementById('user').value;
        var password = document.getElementById('password').value;
        
        var queryString =  "?&selectLoginFac=" + selectLoginFac + "&permission=" + selectLoginType + "&user=" + user + "&password=" + password;
        console.log(queryString);
        ajaxRequest.open("GET", "php/login.php" + queryString, true);
        ajaxRequest.send(null); 
    
})