<?php

/**
 * File name: pages.php
 * Author's name: Daria Davydenko
 * Student ID: 200335788
 * Website name: CMS
 * https://comp1006-assignment2.herokuapp.com/
 *
 * This is a php controller for dynamic pages that admin cam create through dashboard.
 */

include_once("Config/database.php");
function _executeAndClose($statement) {
    $statement->execute(); // run on the db server
    $statement->closeCursor(); // close the connection
}
function CreatePage($pageTitle, $bodyText) {
    $db = DBConnection();
    $query = "INSERT INTO pages (title, body_text) VALUES (:page_title, :body_text)";
    $statement = $db->prepare($query); // encapsulate the sql statement
    $statement->bindValue(':page_title', $pageTitle);
    $statement->bindValue(':body_text', $bodyText);
    _executeAndClose($statement);
}
function ReadPage() {
    $db = DBConnection();
    $query = "SELECT * FROM pages"; // SQL statement
    $statement = $db->prepare($query); // encapsulate the sql statement
    $statement->execute(); // run on the db server
    $pages = $statement->fetchAll(); // returns an array
    $statement->closeCursor(); // close the connection
    return $pages;
}
function UpdatePage($pageID, $pageTitle, $bodyText) {
    $db = DBConnection();
    $query = "UPDATE pages SET title = :page_title, body_text = :body_text WHERE page_id = :page_id "; // SQL statement
    $statement = $db->prepare($query); // encapsulate the sql statement
    $statement->bindValue(':page_id', $pageID);
    $statement->bindValue(':page_title', $pageTitle);
    $statement->bindValue(':body_text', $bodyText);
    _executeAndClose($statement);
}
function GetPageById($pageID){
    $db = DBConnection();
    $query = "SELECT * FROM pages WHERE page_id = :page_id"; // SQL statement
    $statement = $db->prepare($query); // encapsulate the sql statement
    $statement->bindValue(':page_id', $pageID);
    $statement->execute(); // run on the db server
    $page = $statement->fetch(); // returns only one record
    $statement->closeCursor(); // close the connection
    return $page;
}
function DeletePage($pageID) {
    $db = DBConnection();
    $query = "DELETE FROM pages WHERE page_id = :page_id ";
    $statement = $db->prepare($query);
    $statement->bindValue(":page_id", $pageID);
    _executeAndClose($statement);
}
?>