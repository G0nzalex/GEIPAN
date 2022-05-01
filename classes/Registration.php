<?php

class Registration
{
    private string $name;
    private string $firstName;
    private string $email;
    private string $password;
    private string $pp;

    // public function __construct()
    // {
        
    // }
    public function form($page) : string
    {
        return $this->form = "<form action=\"index.php?page=$page\" method=\"post\" enctype=\"multipart/form-data\">";
    }    
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
    public function endofForm($page) : string
    {
        return $this->endofForm = "<input type=\"submit\" name=\"$page\" id=\"$page\">" . "</form>";
    }
}