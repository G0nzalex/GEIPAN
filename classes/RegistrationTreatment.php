<?php
include 'Errors.php';
class RegistrationTreatment
{
    use Errors;
    private string $name;
    private string $firstName;
    private string $email;
    private string $password;
    private string $pp;

    // public function __construct()
    // {
    //     $this->password = password_hash($this->password, PASSWORD_DEFAULT);
    // }
    
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
    public function setPassword(string $password) : void
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }
    public function getpp() : string
    {
        return !isset($this->pp) || strlen($this->pp) === 0 ? $this->pp = "" : $this->pp;
    }
    public function setpp(string $pp) : void
    {
        $this->pp = $pp;
    }
}