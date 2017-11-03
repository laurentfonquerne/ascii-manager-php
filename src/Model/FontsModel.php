<?php

namespace ASCII\Model;
use ASCII\Manager\Manager;
use PDO;


class FontsModel
{
    
// self --> Manager

    public function read()
                
    {
        
        try {
            $sth = Manager::getPDO()->prepare("SELECT `font_name` from `font`");
                             
            $sth->execute();
            $this->results = $sth->fetchAll(PDO::FETCH_OBJ);

        } catch(\Throwable $e){
            $this->error = $e->getMessage();
        }
    }

    public function create(
        string $fontsName,
        int $fontsLineHeight)
    {
        if (!$fontsName ||  !$fontsLineHeight) {
            return;
        }
        try {
            $sth = Manager::getPDO()->prepare("INSERT INTO `font`"
            . "(`font_name`, `font_line_height`)"
            . " VALUES (:font_name, :font_line_height)");
            
            // objet capable de faire des requêtes
            
            $sth->bindValue(":font_name", $fontsName);
            $sth->bindValue(":font_line_height", $fontsLineHeight);
            $sth->execute();
            $this->success = $fontsName . " has been created";

        } catch(\Throwable $e){
            $this->error = $e->getMessage();
        }
    }
    public function delete(
        string $fontName)
        
    {
        
        if (!$fontName) {
            return;
        }
        try {
            $sth = Manager::getPDO()->prepare("DELETE FROM `font` WHERE"
            . "(`font_name`) ="
            . " (:font_name)");
            
            // objet capable de faire des requêtes
            
            $sth->bindValue(":font_name", $fontName);
            $sth->execute();
            $this->success = $fontName . " has been deleted";

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