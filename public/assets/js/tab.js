// Je récupère tous les noeuds .tabs sous forme de tableau avec le spread Opérator
const tabs = [...document.querySelectorAll('.tab')];
// Je récupère tous les noeuds .tabContents sous forme de tableau avec le spread Opérator
const tabContents = [...document.querySelectorAll('.tab_content')];
// Je boucle sur mon tableau de noeud et ajoute un eventlistenenr à chacun
tabs.forEach( tab=> tab.addEventListener('click', tabsAnimation));
// Je crée la fonction liée à l'eventListener
function tabsAnimation(e) {
    // On recherche l'index du noeud qui contient la class .active_tab
    const indexToRemove = tabs.findIndex(tab => tab.classList.contains("active_tab"));
    // Avec la valeur d'index correspondant à indexToRemove, on lui enlève la class .active_tab
    tabs[indexToRemove].classList.remove("active_tab");

    // Avec la valeur d'index correspondant à indexToRemove, on lui enlève la class .active_tab_content
    tabContents[indexToRemove].classList.remove("active_tab_content");
    console.log(tabContents[indexToRemove])
    // On récupère la cible de l'eventListener avec son index
    const indexToShow = tabs.indexOf(e.target)
    // On applique l'ajout de la class .active_tab à la cible de l'eventListener
    tabs[indexToShow].classList.add("active_tab")
    // On applique l'ajout de la class .active_tab_content au noeud de l'index de à la cible de l'eventListener
    tabContents[indexToShow].classList.add("active_tab_content")
}