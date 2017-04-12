<?php

/**
 * File name: user.php
 * Author's name: Daria Davydenko
 * Student ID: 200335788
 * Website name: CMS
 * https://comp1006-assignment2.herokuapp.com/
 *
 * This is a php model for the user object.
 */

class User
{
    function __construct($username, $password, $displayName)
    {
        $this->username = $username;
        $this->password = $password;
        $this->displayName  = $displayName;
    }
}
?>