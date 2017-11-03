<?php

namespace ASCII\Model;
use ASCII\Manager\Manager;
use PDO;


class CharactersModel
{
    
// self --> Manager

    public function read()
                
    {
        
        try {
            $sth = Manager::getPDO()->prepare("SELECT 
            `characters_unicode_name`, 
            `characters_unicode_value`
            from `characters`");
                             
            $sth->execute();
            $this->results = $sth->fetchAll(PDO::FETCH_OBJ);

        } catch(\Throwable $e){
            $this->error = $e->getMessage();
        }
    }

    public function create(
        string $charactersName,
        string $charactersValue)
    {
        
        if (!$charactersName ||  !$charactersValue) {
            return;
        }
        try {
            $sth = Manager::getPDO()->prepare("INSERT INTO `characters`"
            . "(`characters_unicode_name`, `characters_unicode_value`)"
            . " VALUES (:characters_unicode_name, :characters_unicode_value)");
            
            // objet capable de faire des requêtes
            
            $sth->bindValue(":characters_unicode_name", $charactersName);
            $sth->bindValue(":characters_unicode_value", $charactersValue);
            $sth->execute();
            $this->success = $charactersName . " has been created";

        } catch(\Throwable $e){
            $this->error = $e->getMessage();
        }
    }
    public function delete(
        string $charactersValue)
        
    {
        
        if (!$charactersValue) {
            return;
        }
        try {
            $sth = Manager::getPDO()->prepare("DELETE FROM `characters` WHERE"
            . "(`characters_unicode_value`) ="
            . " (:characters_unicode_value)");
            
            // objet capable de faire des requêtes
            
            $sth->bindValue(":characters_unicode_value", $charactersValue);
            $sth->execute();
            $this->success = $charactersValue . " has been deleted";

        } catch(\Throwable $e){
            $this->error = $e->getMessage();
        }
    }
    public static function getPDO()
    {
        
        if (null === Manager::getInstance()->dbh) {
            Manager::$instance->dbh = new \PDO(
                "mysql:host=localhost;dbname=ascii;charset=UTF8",
                "root",
                ""
            );
            Manager::$instance->dbh->setAttribute(
                \PDO::ATTR_ERRMODE, 
                \PDO::ERRMODE_EXCEPTION
            );
                                   
        }
        return Manager::$instance->dbh;
    }
}