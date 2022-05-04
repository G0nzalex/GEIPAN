<?php

class Registration
{
    use Form;
    private string $name;
    private string $firstName;
    private string $email;
    private string $password;
    private string $pp;

    // Inputs
    public function name() : string
    {
        $this->name = "<label for=\"name\">Your name : </label>";
        $this->name .= "<input type=\"text\" name=\"name\" id=\"name\">";

        return $this->name;
    }
    public function firstName() : string
    {
        $this->firstName = "<label for=\"firstname\">Your first name : </label>";
        $this->firstName .= "<input type=\"text\" name=\"firstname\" id=\"firstname\">";

        return $this->firstName;
    }
    public function pp() : string
    {
        $this->pp = "<label for=\"pp\">Upload your profile picture : </label>";
        $this->pp .= "<input type=\"file\" name=\"pp\" id=\"pp\">";

        return $this->pp;
    }
    public function email() : string
    {
        $this->email = "<label for=\"email\">Your email : </label>";
        $this->email .= "<input type=\"email\" name=\"email\" id=\"email\">";

        return $this->email;
    }
    public function password() : string
    {
        $this->password = "<label for=\"password\">Your password : </label>";
        $this->password .= "<input type=\"password\" name=\"password\" id=\"password\">";

        return $this->password;
    }
    // Treating data sent by the user
    public function getName() : string
    {
        return !isset($this->name) || strlen($this->name) === 0 || !ctype_alpha($this->name) ? $this->name = "" : mb_strtoupper($this->name);

    }
    public function setName(string $name) : void
    {
        $this->name = $name;
    }
    public function getFirstName() : string
    {
        return !isset($this->firstName) || strlen($this->firstName) === 0 || !ctype_alpha($this->firstName) ? $this->firstName = "" : $this->firstName;
    }
    public function setFirstName(string $firstName) : void
    {
        $this->firstName = $firstName;
    }
    public function getEmail() : string
    {
        return !isset($this->email) || strlen($this->email) === 0 || !filter_var($this->email, FILTER_VALIDATE_EMAIL) ? $this->email = "" : $this->email;
    }
    public function setEmail(string $email) : void
    {
        $this->email = $email;
    }
    public function getPassword() : string
    {
        return !isset($this->password) || strlen($this->password) === 0 ? $this->password = "" : $this->password;
    }
    public function getPasswordHash() : string
    {
        return !isset($this->password) || strlen($this->password) === 0 ? $this->password = "" : password_hash($this->password, PASSWORD_DEFAULT);
    }
    public function setPassword(string $password) : void
    {
        $this->password = $password;
    }
    // }
    public function getpp() : string
    {
        return isset($_FILES['pp']) && $_FILES['pp']['error'] == 0 ? $this->pp : $this->pp = "";
    }
    public function setpp(string $path, string $pp) : void
    {
        $this->pp = $path . "/" . $pp;
    }
    
}