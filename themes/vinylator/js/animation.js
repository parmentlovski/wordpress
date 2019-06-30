// animation image-style de la section music

 
var categorie1 = document.querySelector('#categorie_1'); 
 var categorie2 = document.querySelector('#categorie_2');
 var categorie3 = document.querySelector('#categorie_3');
 var categorie4 = document.querySelector('#categorie_4');

 
 categorie1.addEventListener('mouseover', function() {

     var style = document.querySelector('#style_1'); 
     var titre = document.querySelector('#titre_1');
     var image = document.querySelector('#choix-1');

     style.style.color = "#d09b4a";
     titre.style.color = "#d09b4a";
     image.style.opacity = .6;
 });

 categorie1.addEventListener('mouseleave', function(){
     var style = document.querySelector('#style_1'); 
     var titre = document.querySelector('#titre_1');
     var image = document.querySelector('#choix-1');
   
    style.style.color ="#222222";
    titre.style.color ="#222222";
    image.style.opacity = 1;

 });


 categorie2.addEventListener('mouseover', function() {
     var style = document.querySelector('#style_2'); 
     var titre = document.querySelector('#titre_2');
     var image = document.querySelector('#choix-2');    

     style.style.color = "#d09b4a";
     titre.style.color = "#d09b4a";
     image.style.opacity = .6;
});
 
 categorie2.addEventListener('mouseleave', function(){
     var style = document.querySelector('#style_2'); 
     var titre = document.querySelector('#titre_2');
     var image = document.querySelector('#choix-2');

    style.style.color ="#222222";
    titre.style.color ="#222222";
    image.style.opacity = 1;
 });


 categorie3.addEventListener('mouseover', function() {
    var style = document.querySelector('#style_3'); 
    var titre = document.querySelector('#titre_3');
    var image = document.querySelector('#choix-3');

    style.style.color = "#d09b4a";
    titre.style.color = "#d09b4a";
    image.style.opacity = .6;
});

categorie3.addEventListener('mouseleave', function(){
    var style = document.querySelector('#style_3'); 
    var titre = document.querySelector('#titre_3');
    var image = document.querySelector('#choix-3');

   style.style.color ="#222222";
   titre.style.color ="#222222";
   image.style.opacity = 1;
});


categorie4.addEventListener('mouseover', function() {
    var style = document.querySelector('#style_4'); 
    var titre = document.querySelector('#titre_4');
    var image = document.querySelector('#img-decalage');

    style.style.color = "#d09b4a";
    titre.style.color = "#d09b4a";
    image.style.opacity = .6;
});

categorie4.addEventListener('mouseleave', function(){
    var style = document.querySelector('#style_4'); 
    var titre = document.querySelector('#titre_4');  
    var image = document.querySelector('#img-decalage');

   style.style.color ="#222222";
   titre.style.color ="#222222";
   image.style.opacity = 1;
});
    



   