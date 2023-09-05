'use strict';
/* global bootstrap */


    /**
     * Créer un toast lors d'une modification
     */
    function creerToastM() {
        let optionsToast = {
            delay: 3000,
            animation: true,
            autohide: true
        };

        new bootstrap.Toast(document.getElementById('toast-M'), optionsToast).show();
    }

    /**
     * Créer un toast lors d'un ajout
     */
        function creerToastA() {
            let optionsToast = {
                delay: 3000,
                animation: true,
                autohide: true
            };
    
            new bootstrap.Toast(document.getElementById('toast-A'), optionsToast).show();
        }

    /**
     * Créer un toast lorsque supprimé
     */
    function creerToastS() {
        let optionsToast = {
            delay: 3000,
            animation: true,
            autohide: true
        };

        new bootstrap.Toast(document.getElementById('toast-S'), optionsToast).show();
    }



