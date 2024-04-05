document.querySelectorAll('.tab-button').forEach((button) => {
    button.addEventListener('click', () => {
        const tabTarget = document.querySelector(button.dataset.tabTarget);
        const tabContents = document.querySelectorAll('.tab-content');
        const tabButtons = document.querySelectorAll('.tab-button');

        // Désactiver tous les onglets
        tabContents.forEach((content) => {
            content.classList.remove('active');
        });

        // Désactiver tous les boutons d'onglet
        tabButtons.forEach((btn) => {
            btn.classList.remove('active');
        });

        // Activer l'onglet cible
        tabTarget.classList.add('active');

        // Activer le bouton d'onglet cible
        button.classList.add('active');
    });
});