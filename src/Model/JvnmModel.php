<?php

namespace ASCII\Model;
use ASCII\Manager\Manager;
use PDO;


class JvnmModel
{
    
// self --> Manager

    public function read()
                
    {
        
        try 
        {
            $sth = Manager::getPDO()->prepare(
                "SELECT 
                `ID`, 
                `nom`, 
                `possesseur`, 
                `console`, 
                `prix`, 
                `nbre_joueurs_max`, 
                `commentaires` FROM `jeux_video` ");
                
                                         
            $sth->execute();
            $this->results = $sth->fetchAll(PDO::FETCH_OBJ);

        } 
        
        catch(\Throwable $e)
        {
            $this->error = $e->getMessage();
        }
    }
}
    
