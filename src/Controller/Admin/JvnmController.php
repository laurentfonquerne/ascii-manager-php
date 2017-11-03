<?php 

namespace ASCII\Controller\Admin;

use ASCII\Controller\Controller;
use ASCII\Http\Response;
use ASCII\Model\JvnmModel;


class JvnmController extends Controller
{
    
    public function read() : Response
    {
        
        $model = new JvnmModel();
        
                $model->read();
                   
                return $this->render (
                    "jvnm/read",
                    [
                        "model" => $model
                    ]
                    
                );
                
        
    }
           
}