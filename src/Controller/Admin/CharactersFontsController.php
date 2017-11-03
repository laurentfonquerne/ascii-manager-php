<?php 

namespace ASCII\Controller\Admin;

use ASCII\Controller\Controller;
use ASCII\Http\Response;
use ASCII\Model\CharactersFontsModel;


class CharactersFontsController extends Controller
{
    public function manage() : Response
    {           
                
                $model = new CharactersFontsModel();
                
                $model->read();
                
                return $this->render (
                    "charactersfonts/manage",
                    [
                        "token" => $_SESSION["token"],
                        "user" => array_key_exists("user", $_SESSION)
                            ? $_SESSION["user"]["level"]
                            : null, 
                        "model" => $model
                    ]
                    
                );

                
                  
    }
    
    
    
}