<?php

$registration = new Registration;
$query = new Query;
$enctype = "enctype=\"multipart/form-data\"";
$date;
$inputs = [ 
    $registration->form("registration", $enctype),
    $registration->name(),
    $registration->firstName(),
    $registration->pp(),
    $registration->email(),
    $registration->password(),
    $registration->endofForm("registration")
];

$registration->display($inputs, "<br />");
$err = [];

if (isset($_POST['registration']))
{
    $registration->setName($_POST['name']);
    $name = $registration->getName();
    $errMsg = $registration->errMsg($name, "<p>There is an issue with the name you typed, please try again</p>");
    $registration->errCount($err, $errMsg);

    $registration->setFirstName($_POST['firstname']);
    $firstname = $registration->getFirstName();
    $errMsg = $registration->errMsg($firstname, "<p>There is an issue with the first name you typed, please try again</p>");
    $registration->errCount($err, $errMsg);

    $registration->setEmail($_POST['email']);
    $email = $registration->getEmail();
    $errMsg = $registration->errMsg($email, "<p>There is an issue with the email you typed, please try again</p>");
    $registration->errCount($err, $errMsg);

    $registration->setPassword($_POST['password']);
    $password = $registration->getPasswordHash();
    $errMsg = $registration->errMsg($password, "<p>There is an issue with the password you typed, please try again</p>");
    $registration->errCount($err, $errMsg);

    $registration->setpp($_FILES['pp']['name']);
    $image = $registration->getpp("http://localhost/GEIPAN/assets/img/");

    $date = date("YmdHis");
    if (count($err) === 0)
    {
        $result = $query->select("SELECT * FROM users WHERE userName= \"$name\"");
        if (count($result) === 0)
        {
            $role = 2;
            $query->insert("INSERT INTO users (userName, userFirstname, userMail, userPassword, userDate, userAvatar, id_role)
            VALUES (\"$name\", \"$firstname\", \"$email\", \"$password\", \"$date\", \"$image[0]\", \"$role\")
            ");
            echo $success = "<p>Insertion succesful !</p>";
            move_uploaded_file($image[1], $image[2]);
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