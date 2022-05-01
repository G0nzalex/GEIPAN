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
    $errMsg = $registrationTreatment->errMsg($name, "<p>There is an issue with the name you typed, please try again</p>");
    $registrationTreatment->errCount($err, $errMsg);

    $registrationTreatment->setFirstName($_POST['firstname']);
    $firstname = $registrationTreatment->getFirstName();
    $errMsg = $registrationTreatment->errMsg($firstname, "<p>There is an issue with the first name you typed, please try again</p>");
    $registrationTreatment->errCount($err, $errMsg);
    // $registrationTreatment->setName($_POST['name']);
    // $name = $registrationTreatment->getName();
    // echo $errMsg = $registrationTreatment->errMsg($name, "There is an issue with the name you typed, please try again");

    $registrationTreatment->setEmail($_POST['email']);
    $email = $registrationTreatment->getEmail();
    $errMsg = $registrationTreatment->errMsg($email, "<p>There is an issue with the email you typed, please try again</p>");
    $registrationTreatment->errCount($err, $errMsg);

    $registrationTreatment->setPassword($_POST['password']);
    $password = $registrationTreatment->getPassword();
    $errMsg = $registrationTreatment->errMsg($password, "<p>There is an issue with the password you typed, please try again</p>");
    $registrationTreatment->errCount($err, $errMsg);

    if (count($err) === 0)
    {
        $result = $query->select("SELECT * FROM users WHERE userName= \"$name\"");
        if (count($result) === 0)
        {
            $role = 2;
            $query->insert("INSERT INTO users (userName, userFirstname, userMail, userPassword, id_role)
            VALUES (\"$name\", \"$firstname\", \"$email\", \"$password\", \"$role\")
            ");
            echo $success = "<p>Insertion succesful !</p>";
        }
        else
        {
            echo $errMsg = "<p>You have been already registered</p>";
        }
    }
    elseif (count($err) === 1)
    {
        echo $errMsg;
    }
    else
    {
        echo $errMsg = "<p>Many inputs have not been correctly filled in, please try again</p>";
    }
}