<?php

class Registration
{
    use Form;
    private string $name;
    private string $firstName;
    private string $email;
    private string $password;
    private string $pp;
    private array $storedFile;

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
    public function getpp(string $path) : mixed
    {
        if (isset($_FILES['pp'])) //$_FILES['pp']['name'] !== ""
        { 
            if ($_FILES['pp']['error'] == 0)
            {
                $fileName = mb_strtolower($_FILES['pp']['name']);
                $fileType = $_FILES['pp']['type'];
                $tempFileName = $_FILES['pp']['tmp_name'];
                

                $mime = ["image/jpeg", "image/jpg", "image/png", "image/gif"];

                if (in_array($fileType, $mime)) {
                    $absolutePath = $path;
                    $relativePath = getcwd() . "/assets/img/";
                    // $dateFichier = date('Ymdhis');
                    $finalFileName = $absolutePath . $fileName;
                    $to = $relativePath . $fileName;
                    
                    $this->storedFile = [$finalFileName, $tempFileName, $to];
                    // $this->pp = $absolutePath . $fileName;
                    // $this->pp = str_replace("\\", "/", $this->pp);
                    return $this->storedFile;
                } 
                else {
                    return "<p>Type MIME error !</p>";
                }
            } 
            else
            {
                $errTel = $_FILES['pp']['error'];
                var_dump($errTel);
                switch ($errTel) 
                {
                    case 1:
                        $errFile = "La taille du fichier téléchargé excède la valeur de upload_max_filesize.";
                        break;
                    case 2:
                        $errFile = "La taille du fichier téléchargé excède la valeur de MAX_FILE_SIZE, qui a été spécifiée dans le formulaire HTML.";
                        break;
                    case 3:
                        $errFile = "Le fichier n'a été que partiellement téléchargé.";
                        break;
                    case 4:
                        $errFile = "Aucun fichier n'a été téléchargé.";
                        break;
                    case 6:
                        $errFile = "Un dossier temporaire est manquant.";
                        break;
                    case 7:
                        $errFile = "Échec de l'écriture du fichier sur le disque.";
                        break;
                    case 8:
                        $errFile = "Une extension PHP a arrêté l'envoi de fichier.";
                        break;
                }
                return $errFile;
            }
        }
        else
        {
            return "<p>You have to upload an image</p>";
        }
        // return isset($_FILES['pp']) && $_FILES['pp']['error'] == 0 ? $this->pp : $this->pp = "";
    }
    public function setpp(string $path) : void
    {
        $this->pp = $path;
    }
    
}