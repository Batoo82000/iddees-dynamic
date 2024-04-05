"use strict";

//------------------------------------//
// gestion de la navbar en mode portable
//------------------------------------//
const burger = document.querySelector(".burger");
const menu = document.querySelector(".ul-navbar");
const mobileLinks = document.querySelectorAll(".ul-navbar li a");
burger.addEventListener("click", function () {
  menu.classList.toggle("show");
});

mobileLinks.forEach((link) => {
  link.addEventListener("click", function () {
    // Vérifiez si le menu est visible (la classe 'show' est présente)
    if (menu.classList.contains("show")) {
      // Masquez le menu en supprimant la classe 'show'
      menu.classList.remove("show");
    }
  });
});
document.addEventListener("click", function (event) {
  // Vérifiez si l'élément cliqué est en dehors du menu et du bouton burger
  if (!menu.contains(event.target) && !burger.contains(event.target)) {
    // Si c'est le cas, supprimez la classe 'show' du menu
    menu.classList.remove("show");
  }
});
//------------------------------------//
// gestion de la navbar en mode portable
//------------------------------------//

//------------------------------------//
// gestion des accordions
//------------------------------------//

document.addEventListener("DOMContentLoaded", function () {
  // Sélectionnez tous les éléments d'accordéon
  let accordions = document.querySelectorAll('.accordion');

  // Ajoutez un gestionnaire d'événements à chaque élément d'accordéon
  accordions.forEach(function (accordion) {
    let accordionBtn = accordion.querySelector('.accordion_btn');
    let accordionContent = accordion.querySelector('.accordion_content');

    accordionBtn.addEventListener("click", function () {
      if (accordionContent.classList.contains("active")) {
        accordionContent.classList.remove("active");
      } else {
        accordionContent.classList.add("active");
      }
    });
  });
});