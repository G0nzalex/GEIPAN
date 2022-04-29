<?php

class InscriptionForm
{
    private string $name;
    private string $firstName;
    private string $createdAt;
    private string $email;
    private string $password;
    private string $image;

    // public function __construct()
    // {
        
    // }

    public function name() : string
    {
        $this->name = "<label for=\"name\">Your name : </label>";
        $this->name .= "<input type=\"text\" name=\"name\" id=\"name\">";

        return $this->name;
    }
}