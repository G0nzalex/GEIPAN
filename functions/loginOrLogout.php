<?php

function loginOrlogout()
{
    if(isset($_SESSION['login']) && $_SESSION['login'] === true) {
        echo "<li><a href=\"index.php?page=logout\">Logout</a></li>";
        echo "<li><a href=\"index.php?page=account\">My account</a></li>";
    }
    else {
        echo "<li><a href=\"index.php?page=login\">Login</a></li>";
        echo "<li><a href=\"index.php?page=registration\">Make your account</a></li>";
    }
}