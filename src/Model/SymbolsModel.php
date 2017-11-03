<?php

namespace ASCII\Model;
use ASCII\Manager\Manager;
use PDO;


class SymbolsModel
{
    
// self --> Manager

    public function read()
                
    {
        
        try {
            $sth = Manager::getPDO()->prepare("SELECT 
            `symbols_name`, 
            `symbols_type`,
            `symbols_value`
            from `symbols`");
                             
            $sth->execute();
            $this->results = $sth->fetchAll(PDO::FETCH_OBJ);

        } catch(\Throwable $e){
            $this->error = $e->getMessage();
        }
    }

    public function create(
        string $symbolsName,
        string $symbolsType,
        string $symbolsValue)
    {
        
        if (!$symbolsName ||  !$symbolsValue || !$symbolsType) {
            return;
        }
        try {
            $sth = Manager::getPDO()->prepare("INSERT INTO `symbols`"
            . "(`symbols_name`, `symbols_value`, `symbols_type`)"
            . " VALUES (:symbols_name, :symbols_value, :symbols_type)");
            
            // objet capable de faire des requêtes
            
            $sth->bindValue(":symbols_name", $symbolsName);
            $sth->bindValue(":symbols_value", $symbolsValue);
            $sth->bindValue(":symbols_type", $symbolsType);
            $sth->execute();
            $this->success = $symbolsName . " has been created";

        } catch(\Throwable $e){
            $this->error = $e->getMessage();
        }
    }
    public function delete(
        string $symbolsValue)
        
    {
        
        if (!$symbolsValue) {
            return;
        }
        try {
            $sth = Manager::getPDO()->prepare("DELETE FROM `symbols` WHERE"
            . "(`symbols_value`) ="
            . " (:symbols_value)");
            
            // objet capable de faire des requêtes
            
            $sth->bindValue(":symbols_value", $symbolsValue);
            $sth->execute();
            $this->success = $symbolsValue . " has been deleted";

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