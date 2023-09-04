'use strict';
/* global bootstrap */


document.getElementById('tSupprimer').addEventListener('submit', function(e) {
    creerToast(e);
});

document.getElementById('ajouter').addEventListener('submit', function(e) {
    creerToast(e);
});

/**
 * Créer et affiche un toast pendant 3 secondes lors de l'ajout d'un jeu dans le panier.
 * @param {Object} e événement
 */
function creerToast(e) {
    e.preventDefault();
    let optionsToast = {
        delay: 3000,
        animation: true,
        autohide: true
    };

    // Création du Toast.
    new bootstrap.Toast(document.getElementById('toast'), optionsToast).show();
}
