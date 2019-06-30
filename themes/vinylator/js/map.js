macarte = L.map('map');
var mondayLayer = L.geoJSON();


 // On initialise la latitude et la longitude de Paris (centre de la carte)
var lat = 47.237829;
var lon = 6.0240539;

function Goto(address) {
fetch('https://nominatim.openstreetmap.org/search?format=json&limit=3&q=' + address) // ('url') par défaut méthode get
.then( function(response) { 
    return response.json();
}) 
 .then(function(data) {
var latitudex = data[0]['lat'];
var longitudex = data[0]['lon'];
var marker = L.marker([latitudex, longitudex]).addTo(macarte);
console.log('latitude=' + latitudex + ' et longitude=' + longitudex);
  })

.catch( function(error) {
    console.log('ici '+error.message);
});
}

// var macarte = null;
// Fonction d'initialisation de la carte
function initMap() {
// Créer l'objet "macarte" et l'insèrer dans l'élément HTML qui a l'ID "map"
macarte.setView([lat, lon], 11);
// Leaflet ne récupère pas les cartes (tiles) sur un serveur par défaut. Nous devons lui préciser où nous souhaitons les récupérer. Ici, openstreetmap.fr
L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
    // Il est toujours bien de laisser le lien vers la source des données
    attribution: 'donnsées © <a href="osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="openstreetmap.fr">OSM France</a>',
    minZoom: 1,
    maxZoom: 20
}).addTo(macarte);
}
window.onload = function() {
// Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
initMap();
};
Goto(adress_client);