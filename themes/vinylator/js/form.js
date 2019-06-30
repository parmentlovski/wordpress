

// Premier champ = NOM 
verifNom = document.querySelector('#name');
verifNom.addEventListener('blur', erreurNom);


function erreurNom() {

    mauvaiseSaisieNom = document.querySelector('#erreurName');
    lettres = /^[A-Za-z é-]+$/;

    if (document.querySelector('#name').value.match(lettres)) {
        mauvaiseSaisieNom.innerHTML = "";
        return true;
    }

    else if (document.querySelector('#name').value === ("")) {
        mauvaiseSaisieNom.style.color = "white";
        mauvaiseSaisieNom.innerHTML = "Votre nom";
        return false;
    }

    else {
        mauvaiseSaisieNom.innerHTML = 'Veuillez utiliser des caractères valides';
        return false;
    }
    
}


// Deuxieme champ : mail 

verifMail = document.querySelector('#email');
verifMail.addEventListener('blur', erreurMail);


function erreurMail() {

    mauvaiseSaisieMail = document.querySelector('#erreurEmail');
    mail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

    if(document.querySelector('#email').value.match(mail)) {
        mauvaiseSaisieMail.style.innerHTML = "";
        return true;
    }

    else if (document.querySelector('#email').value === ("")) {
        mauvaiseSaisieMail.style.color = "white";
        mauvaiseSaisieMail.innerHTML = "Votre adresse email";
        return false;
    }

    else {
        mauvaiseSaisieMail.innerHTML = "Veuillez indiquer une adresse mail valide";
        return false;
    }   
}


// Troisième champ : message 

verifMessage = document.querySelector('#message');
verifMessage.addEventListener('blur', erreurMessage);

function erreurMessage() {
    mauvaiseSaisieMessage = document.querySelector('#erreurMessage');
    message = /^[^<>,<|>]+$/;

    if (document.querySelector('#message').value.match(message)) {
        mauvaiseSaisieMessage.innerHTML = "";
        return true;
    }

    else if (document.querySelector('#message').value === ("")) {
        mauvaiseSaisieMessage.style.color = "white";
        mauvaiseSaisieMessage.innerHTML = "Un message";
        return false;
    }

    else {
        mauvaiseSaisieMessage.innerHTML = "Indiquer un message valide";
        return false;
    }
}

// validation

formulaireErreur = document.querySelector('#erreur');
document.querySelector("form").addEventListener("submit", validation);

function validation(){
 
    if ( erreurNom() === true && erreurMail() === true  && erreurMessage() === true) {
        submitForm();
        event.preventDefault();
    } 
    
    else {    
        formulaireErreur.style.marginTop = "20px";
        formulaireErreur.style.color = "white";
        formulaireErreur.innerHTML = "Veuillez remplir formulaire correctement :";
        event.preventDefault();
    }
};