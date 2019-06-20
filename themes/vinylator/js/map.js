document.querySelector('#form_reply').addEventListener('submit', function() {
event.preventDefault();

var xhr = new XMLHttpRequest(); // jusqu'a IE7 (entreprise ont minimum IE11)
xhr.open('POST', '/wp-admin/database.php?'); // pour GET c'est une autre methode
var data = new FormData();
data.append('new-value', document.querySelector('#new-value').value); // créer data.append pour chaque donnée
xhr.onload = function() {
document.getElementById("resultat").innerHTML = this.responseText;
}

xhr.send(data);
// console.log('freezer');
});
