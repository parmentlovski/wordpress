// animation image-style de la section music

 
var categorie1 = document.querySelector('#categorie_1'); 
 var categorie2 = document.querySelector('#categorie_2');
 var categorie3 = document.querySelector('#categorie_3');
 var categorie4 = document.querySelector('#categorie_4');

 
 categorie1.addEventListener('mouseover', function() {

     var style = document.querySelector('#style_1'); 
     var titre = document.querySelector('#titre_1');

     style.style.color = "#d09b4a";
     titre.style.color = "#d09b4a";
 });

 categorie1.addEventListener('mouseleave', function(){
     var style = document.querySelector('#style_1'); 
     var titre = document.querySelector('#titre_1');

    style.style.color ="#222222";
    titre.style.color ="#222222";
 });


 categorie2.addEventListener('mouseover', function() {
     var style = document.querySelector('#style_2'); 
     var titre = document.querySelector('#titre_2');
     style.style.color = "#d09b4a";
     titre.style.color = "#d09b4a";
});
 
 categorie2.addEventListener('mouseleave', function(){
     var style = document.querySelector('#style_2'); 
     var titre = document.querySelector('#titre_2');
    style.style.color ="#222222";
    titre.style.color ="#222222";
 });


 categorie3.addEventListener('mouseover', function() {
    var style = document.querySelector('#style_3'); 
    var titre = document.querySelector('#titre_3');
    style.style.color = "#d09b4a";
    titre.style.color = "#d09b4a";
});

categorie3.addEventListener('mouseleave', function(){
    var style = document.querySelector('#style_3'); 
    var titre = document.querySelector('#titre_3');
   style.style.color ="#222222";
   titre.style.color ="#222222";
});


categorie4.addEventListener('mouseover', function() {
    var style = document.querySelector('#style_4'); 
    var titre = document.querySelector('#titre_4');
    style.style.color = "#d09b4a";
    titre.style.color = "#d09b4a";
});

categorie4.addEventListener('mouseleave', function(){
    var style = document.querySelector('#style_4'); 
    var titre = document.querySelector('#titre_4');
   style.style.color ="#222222";
   titre.style.color ="#222222";
});
    



   