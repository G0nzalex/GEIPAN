<?php

include './classes/Registration.php';

$registration = new Registration;
// $form = "<form action=\"index.php?page=registration\" method=\"post\" enctype=\"multipart/form-data\">";
echo $registration->form();
echo $registration->name();
echo $registration->firstName();
echo $registration->pp();
echo $registration->email();
echo $registration->password();
echo $registration->endofForm();
// $form .= "</form>";

// echo $form;

