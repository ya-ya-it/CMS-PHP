<?php

/**
 * File name: user.php
 * Author's name: Daria Davydenko
 * Student ID: 200335788
 * Website name: CMS
 * https://comp1006-assignment2.herokuapp.com/
 *
 * This is a php controller which login or register user into the system.
 */

include_once("Config/database.php");
function CheckIfAuthenticated() {
    if(!isset($_SESSION["is_logged_in"])) {
        // if everything good go to index page
        header('Location: index.php?pageId=login');
    }
    return true;
}
function Login($username, $password) {
    $messages = "";
    try{
        $db = DBConnection();
        $query = "SELECT password, displayName FROM users 
                  WHERE username = :username"; // SQL statement
        $statement = $db->prepare($query); // encapsulate the sql statement
        $statement->bindValue(':username', $username);
        $statement->execute(); // run on the db server
        $hashed_password = $statement->fetch();
        if(password_verify($password, $hashed_password["password"])) {
            $statement->closeCursor(); // close the connection
            if(session_status() != PHP_SESSION_ACTIVE) {
                session_start();
            }
            $_SESSION["is_logged_in"] = true;
            $_SESSION["displayName"] = $hashed_password["displayName"];
            // if everything good go to index page
            header('Location: index.php?pageId=dashboard');
        }
        else {
            $statement->closeCursor(); // close the connection
            $messages = "Invalid Username or Password";
        }
    }
    catch(Exception $e) {
        $messages = $e->getMessage();
    }
    return $messages;
}
function Register($username, $password) {
    $messages = "";
    $isUserNameUnique = false;
    try {
        $db = DBConnection();
        $query = "SELECT * FROM users 
                  WHERE username = :username";
        $statement = $db->prepare($query); // encapsulate the sql statement
        $statement->bindValue(':username', $username);
        $statement->execute(); // run on the db server
        if($statement->rowCount() == 1) { // we have a match
            $messages="Invalid Username";
        }
        else {
            $isUserNameUnique = true;
        }
        $statement->closeCursor(); // close the connection
    }
    catch(Exception $e) {
        $messages = $e->getMessage();
    }
    if($isUserNameUnique) {
        try {
            $db = DBConnection();
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            $displayName = $_POST["displayName"];
            $query = "INSERT INTO users (username, password, displayName) VALUES (:username, :password, :displayName)";
            $statement = $db->prepare($query);
            $statement->bindValue(':username', $username);
            $statement->bindValue(':password', $hashed_password);
            $statement->bindValue(':displayName', $displayName);
            $statement->execute();
            $statement->closeCursor();
            // if everything good login
            $messages = Login($username, $password);
        } catch (Exception $e) {
            $messages = $e->getMessage();
        }
    }
    return $messages;
}
function Logout() {
    session_start();
    session_destroy();
    header('Location: index.php');
}
?>