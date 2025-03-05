// -------------------------------------------------- white-dark mode -------------------------------------------------- //
function myFunction() 
{
    let element = document.body;
    element.classList.toggle("white-mode");
}

// -------------------------------------------------- bouton retour en haut de page ------------------------------------- //
window.onscroll = function() {scrollFunction()};

// le bouton apparait quand l'utilisateur descend de 20 pixels
// sinon disparait en haut de page
function scrollFunction() {
    let scrollBtn = document.getElementById("scrollBtn");
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        scrollBtn.style.display = "block";
    } else {
        scrollBtn.style.display = "none";
    }
}

// cliquer sur le bouton pour retourner en haut de page
// smooth = retour en de page de manière fluide ou lisse
function scrollToTop() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

// -------------------------------------------------- Menu Burger pour Mobile -------------------------------------------------- //

// ouverture du menu (de haut en bas) avec un clic sur le menu burger //
function openNav() {
    document.getElementById("burger-myNav").style.height = "100%";
  }
  
  // fermeture du menu avec un clic sur le symbole 'X' //
  function closeNav() {
    document.getElementById("burger-myNav").style.height = "0%";
  }
