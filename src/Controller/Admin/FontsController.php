<?php 

namespace ASCII\Controller\Admin;

use ASCII\Controller\Controller;
use ASCII\Http\Response;
use ASCII\Model\FontsModel;


class FontsController extends Controller
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
            $model = new FontsModel();

            if ($this->isSuperAdmin) {
                $model->create(
                    (string) filter_input(INPUT_POST, "font_name"),
                    (int) filter_input(INPUT_POST, "font_line_height")
                    
                );

                $model->delete(
                    (string) filter_input(INPUT_GET, "font_name")
                );
            }    
       
            $model->read();
                
            return $this->render (
                "fonts/manage",
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