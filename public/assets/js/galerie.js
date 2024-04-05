// Sélectionne tous les éléments d'image dans la galerie
const galleryImages = document.querySelectorAll('.grid_image');

// Sélectionne la modal, l'élément image à l'intérieur de la modal et le bouton de fermeture de la modal
const modal = document.getElementById('image-modal');
const modalImage = document.getElementById('modal-image');
const closeModal = document.querySelector('.close');

// Boucle à travers chaque image de la galerie
galleryImages.forEach((image) => {
    // Ajoute un écouteur d'événement "click" à chaque image
    image.addEventListener('click', (event) => {
        // Affiche la modal
        modal.style.display = 'flex';
        // Met à jour la source de l'image dans la modal avec la source de l'image cliquée
        modalImage.src = event.currentTarget.src;
    });
});
// Ajoute un écouteur d'événement "click" au bouton de fermeture de la modal
closeModal.addEventListener('click', () => {
    // Cache la modal
    modal.style.display = 'none';
});
// Ajoute un écouteur d'événement "click" à la modal elle-même
modal.addEventListener('click', (event) => {
    // Vérifie si l'élément cliqué est la modal elle-même (et non l'image ou le bouton de fermeture)
    if (event.target === modal) {
        // Cache la modal
        modal.style.display = 'none';
    }
});