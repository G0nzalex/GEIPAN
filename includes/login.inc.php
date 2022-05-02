<?php

$login = new Registration;
$loginTreatment = new RegistrationTreatment;
$query = new Query;

echo $login->form("login");
echo $login->email();
echo $login->password();
echo $login->endofForm("login");

if(isset($_POST['login']))
{
    $err = [];

    $loginTreatment->setEmail($_POST['email']);
    $email = $loginTreatment->getEmail();
    $errMsg = $loginTreatment->errMsg($email, "<p>There is an issue with the email you typed, please try again</p>");
    $loginTreatment->errCount($err, $errMsg);

    $loginTreatment->setPassword($_POST['password']);
    $password = $loginTreatment->getPassword();
    $errMsg = $loginTreatment->errMsg($password, "<p>There is an issue with the password you typed, please try again</p>");
    $loginTreatment->errCount($err, $errMsg);

    if (count($err) === 0)
    {
        $result = $query->select("SELECT * FROM users WHERE userMail= \"$email\"");
        if (count($result) === 0)
        {
            echo $errMsg = "<p>The email you typed does not exist</p>";
        }
        else
        {
            $queryPassword = $result[0]->userPassword;
            $id = $result[0]->id_user;
            if (password_verify($password, $queryPassword))
            {
                if (!isset($_SESSION['login']))
                {
                    $_SESSION['login'] = true;
                    $_SESSION['admin'] = false;
                    $_SESSION['id'] = $id;
                    echo "<script>
                    alert('Login successful !');
                    document.location.replace('http://localhost/GEIPAN/index.php?page=home');
                    </script>";
                }
                else
                {
                echo $errMsg = "<p>You are already logged in</p>";
                }
            }
            else
            {
                echo $errMsg = "<p>Wrong password !</p>";
            }
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