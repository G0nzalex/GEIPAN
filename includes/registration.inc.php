<?php

$registration = new Registration;
$registrationTreatment = new RegistrationTreatment;
$query = new Query;

echo $registration->form();
echo $registration->name();
echo $registration->firstName();
echo $registration->pp();
echo $registration->email();
echo $registration->password();
echo $registration->endofForm();

$err = [];

if (isset($_POST['registration']))
{
    $registrationTreatment->setName($_POST['name']);
    $name = $registrationTreatment->getName();
    echo $errMsg = $registrationTreatment->errMsg($name, "There is an issue with the name you typed, please try again");
    $registrationTreatment->errCount($err, $errMsg);

    $registrationTreatment->setFirstName($_POST['firstname']);
    $firstname = $registrationTreatment->getFirstName();
    echo $errMsg = $registrationTreatment->errMsg($firstname, "There is an issue with the first name you typed, please try again");

    // $registrationTreatment->setName($_POST['name']);
    // $name = $registrationTreatment->getName();
    // echo $errMsg = $registrationTreatment->errMsg($name, "There is an issue with the name you typed, please try again");

    $registrationTreatment->setEmail($_POST['email']);
    $email = $registrationTreatment->getEmail();
    echo $errMsg = $registrationTreatment->errMsg($email, "There is an issue with the name you typed, please try again");

    $registrationTreatment->setPassword($_POST['password']);
    $password = $registrationTreatment->getPassword();
    echo $errMsg = $registrationTreatment->errMsg($password, "There is an issue with the name you typed, please try again");

    $query->select("SELECT * FROM users WHERE userName= \"$name\"");
    dumps($name, $firstname, $email, $password);
}