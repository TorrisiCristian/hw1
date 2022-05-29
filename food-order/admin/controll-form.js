//Controllo il corretto inserimento dei parametri nel form di login
function ValidateLoginForm(){

    var form_element_username = document.forms["Login_form"]["username"].value;
    var form_element_password = document.forms["Login_form"]["password"].value;
   

    if(form_element_username == "" || form_element_password == ""){

        alert("Inserisci un valore nella casella ");
        return false;
    }

  


}
//Controllo il corretto inserimento dei paramentri del form di Update
function ValidateForm() {
    let form_element_full_name = document.forms["Update_form"]["full_name"].value;
    let form_element_username = document.forms["Update_form"]["username"].value;
    let controll_string = /^[a-zA-Z0-9]+$/;
    
    if(controll_string.test(form_element_full_name) == false){
        alert("Puoi inserire solo caratteri alfanumerici");
        return false;
    }
    if(controll_string.test(form_element_username) == false){
        alert("Puoi inserire solo caratteri alfanumerici");
        return false;
    }


    
}
//Controllo il corretto inserimento dei parametri nel form AddAdmin 
function ValidateAdd() {
    let full_name = document.getElementById("full_name");
    let username = document.getElementById("username");
    let password = document.getElementById("password");
    let error_message = document.getElementById("errorMessage");
    let error_alert = "<div class='error text-center'> ";
    let controll_string = /^[a-zA-Z0-9]+$/;

  
   

    //Check la presenza di elementi nei campi
    if(full_name.value == ""){
        error_message.innerHTML = error_alert + "<strong>Hai dimenticato di inserire il full-name </strong></div>" ;
        full_name.focus();
        full_name.style.border = "3px solid red";
        return false;
    }
    if(username.value == ""){
        error_message.innerHTML = error_alert + "<strong>Hai dimenticato di inserire l'username </strong></div>" ;
        username.focus();
        username.style.border = "3px solid red";
        return false;
    }
    if(password.value == ""){
        error_message.innerHTML = error_alert + "<strong>Hai dimenticato di inserire la password </strong></div>" ;
        password.focus();
        password.style.border = "3px solid red";
        return false;
    }

    return true;

}    



