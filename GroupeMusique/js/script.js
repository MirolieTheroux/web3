'use strict';
/* global bootstrap */

document.addEventListener('DOMContentLoaded', function () {
    /**
     * 
     */
    function creerToastSupprimer() {
        let toast = new bootstrap.Toast(document.getElementById('toast-S'));
        toast.show();
    }
    /**
     * 
     */
    function creerToastModifier() {
        let toast = new bootstrap.Toast(document.getElementById('toast-M'));
        toast.show();
    }
if()
 
});


if (document.getElementById('ajouter')) {
    document.getElementById('ajouter').addEventListener('submit', function (e) {
        e.preventDefault();
        /**
         * 
         */
        function creerToastAjouter() {

            let toast = new bootstrap.Toast(document.getElementById('toast-A'));
            toast.show();
        }

        creerToastAjouter();
    });

}