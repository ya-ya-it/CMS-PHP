<?php
/**
 * File name: database.php
 * Author's name: Daria Davydenko
 * Student ID: 200335788
 * Website name: CMS
 * https://comp1006-assignment2.herokuapp.com/
 *
 * This is a php file with all settings about connection to a ClearDB
 */

if(session_status() == PHP_SESSION_NONE) {
    session_start();
}
function DBConnection() {

    try {
        //cleardb access
        $dsn = 'mysql:host=us-cdbr-iron-east-03.cleardb.net;dbname=heroku_e42dbaccc14356a';
        $Username = 'b9e464d4a348af';
        $Password = '91999ae0';
        // instantiates a new pdo - an db object
        return new PDO($dsn, $Username, $Password);
    }
    catch(PDOException $e) {
        $message = $e->getMessage();
        echo "An error occurred: " . $message;
        return null;
    }
}
?>