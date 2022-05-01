<?php

class Query
{
    use Errors;

    protected string $serverName = "localhost";
    protected string $userName = "root";
    protected string $database = "geipan";
    protected string $userPassword = "";
    protected object $connexion;

    public function __construct()
    {
        try{
            $this->connexion = new PDO("mysql:host=$this->serverName;dbname=$this->database", $this->userName, $this->userPassword);
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e){
            die("Erreur :  " . $e->getMessage());
        }
    }
    public function select($sql) : array
    {
            try{            
                $query = $this->connexion->prepare($sql);
                $query->execute();
                $result = $query->fetchAll(PDO::FETCH_OBJ);
    
    
                return $result;
            }
            catch(PDOException $e){
                die("Erreur :  " . $e->getMessage());
            }
    }
    public function insert($sql) : void
    {
        try{
            $this->connexion->beginTransaction();
            $this->connexion->exec($sql);
            $this->connexion->commit();
        }
        catch(PDOException $e){
            $this->connexion->rollBack();
            die("Erreur :  " . $e->getMessage());
        }
    }
    public function __destruct()
    {
        unset($this->connexion);        
    }
}
