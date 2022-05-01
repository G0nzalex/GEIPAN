<?php

$login = new Registration;
$loginTreatment = new RegistrationTreatment;
$query = new Query;

echo $login->form("login");
echo $login->email();
echo $login->password();
echo $login->endofForm("login");