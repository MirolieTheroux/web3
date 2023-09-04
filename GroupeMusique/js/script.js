'use strict';

document.querySelector('a:nth-child(2)').addEventListener('click', creerToastSupprimer);
/**
 * Créer et affiche un toast pendant 3 secondes lors de l'ajout d'un jeu dans le panier.
 * @param {Object} e événement
 */
function creerToastSupprimer() {
    let optionsToast = {
        delay: 3000,
        animation: true,
        autohide: true
    };


    // Création du Toast.
    new bootstrap.Toast(document.getElementById('toast-supprimer'), optionsToast).show();
}