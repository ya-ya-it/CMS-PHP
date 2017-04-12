/**
 * File name: script.js
 * Author's name: Daria Davydenko
 * Student ID: 200335788
 * Website name: CMS
 * https://comp1006-assignment2.herokuapp.com/
 *
 * This is a js file with all the scripts for the site.
 */

/**
 * This function shows alert before deleting from the database.
 */
(function(){
    $(".btn-danger").click(function(event){

        if(!confirm("Are You Sure?")) {
            event.preventDefault();
            window.location.assign("index.php?pageId=list");
        }
    });
})();
