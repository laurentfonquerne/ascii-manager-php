<?php

namespace ASCII\Model;
use ASCII\Manager\Manager;
use PDO;


class CharactersFontsModel
{
    
// self --> Manager

    public function read()
                
    {
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