<?php 

namespace ASCII\Controller\Admin;

use ASCII\Controller\Controller;
use ASCII\Http\Response;
use ASCII\Model\SymbolsModel;


class SymbolsController extends Controller
{
    public function manage() : Response
    {    
        if (array_key_exists("user", $_SESSION )) {
            $level = $_SESSION["user"]["level"];
            var_dump($level)  ;
        }
    
        if (($level !== "superAdmin") &&
            ($level !== "Admin")) 
        {
            $this->isUser = true;
        }                

        if($level === "superAdmin") {
            $this->isSuperAdmin = true;
        }

        if($level === "Admin") {
            $this->isAdmin = true;
        }

        if($this->isUser){
            // redirection vers auth
            $this->response->addHeader("Location", "/php_formation/web/auth?action=auth");
            return $this->response; 
        }

        if ($this->isAdmin || $this->isSuperAdmin) {
                
            $model = new SymbolsModel();
            
            if ($this->isSuperAdmin) {
                $model->create(
                    (string) filter_input(INPUT_POST, "symbols_name"),
                    (string) filter_input(INPUT_POST, "symbols_type"),
                    (string) filter_input(INPUT_POST, "symbols_value")
                    
                );
                    
                $model->delete(
                    (string) filter_input(INPUT_GET, "symbols_value")
                                                
                );
            }
                
            $model->read();

            return $this->render (
                "symbols/manage",
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
            
}