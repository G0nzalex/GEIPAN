<?php

$_SESSION['login'] = false;
$_SESSION['admin'] = false;
session_unset();
session_destroy();
echo "<script>document.location.replace('http://localhost/GEIPAN/index.php?page=home');</script>";   