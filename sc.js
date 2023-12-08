
function submitnavForm() {
    document.getElementById("navForm").submit();
}

function submitForm() {
    document.getElementById("myForm").submit();
}
function myFunctionlogin(){
    var login = document.getElementById('login').value;
    var password = document.getElementById('password').value;
    if(login!="" && password!=""){
        document.getElementById('submit').disabled = false;
    }
}

function myFunctionsignup() {
    var login = document.getElementById('login').value;
    var password = document.getElementById('password').value;
    var email = document.getElementById('email').value;
    var adresse = document.getElementById('adresse').value;
    var phone = document.getElementById('phone').value;
  
    // Vérifier si tous les champs sont remplis
    if (login != "" && password != "" && adresse != "" && email != "" && phone != "") {
      document.getElementById('submit').disabled = false;
    }
  }
function myFunction_add_article() {
    var nom = document.getElementById('nom').value;
    var auteur = document.getElementById('auteur').value;
    var img = document.getElementById('img').value;
    var prix = document.getElementById('prix').value;
    var quality = document.getElementById('quality').value;
    var quality = document.getElementById('quality').value;
    var prom = document.getElementById('prom').value;
    var description = document.getElementById('description').value;
  
    // Vérifier si tous les champs sont remplis
    if (nom != "" && auteur != "" && prix != "" && img != "" && quality != ""&& prom != "" && description != "") {
      document.getElementById('submit').disabled = false;
    }
  }
  function redirectToPage() {
    var selectedOption = document.getElementById("mySelect").value;
    var form = document.getElementById("AhForm");

    // Set the form action
    form.setAttribute('action', selectedOption);

    // Submit the form
    form.submit();
}
function myFunctioncause(){
  var cause = document.getElementById('cause').value;
  if(cause!="" ){
      document.getElementById('submit').disabled = false;
  }
}

