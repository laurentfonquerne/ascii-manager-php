<?php 

namespace ASCII\Controller;

use ASCII\Http\Response;

abstract class Controller 
{
    protected $response;

    protected $isSuperAdmin = false;
    protected $isAdmin      = false;
    protected $isUser       = false;

    public function __construct()
    {
        $this->response = new Response;
        session_start();
        
        if (!array_key_exists("token", $_SESSION)){
            $_SESSION["token"] = password_hash(uniqid(), PASSWORD_DEFAULT);
        } else if (array_key_exists("user", $_SESSION)
            && $_SESSION["user"]["ip"] !== filter_input (INPUT_SERVER, "REMOTE_ADDR")
            && $_SESSION["user"]["userAgent"] !== filter_input (INPUT_SERVER, "HTTP_USER_AGENT")
        
        ) {
            die("do no try to rob a user session");        
        }
    }

    private function getTemplateName(string $template) : string
    {
        return __DIR__ . "/../../app/views/" . $template . ".php";
        
    }
     
    protected function render(string $template, array $data) : Response
    {
        $fileName = $this->getTemplateName($template);
        
        if (is_file($fileName)) {
            //déclarer un tampon
            extract($data);
            ob_start();
            //on peut inclure
           include $fileName;
           // récupérer le contenu du tampon
           $output = ob_get_contents();
           // désactiver le tampon
           ob_end_clean();
           $this->response->setBody($output);
           
           return $this->response;
        }
        throw new \Exception("Template : " . $template . " is not a file ");
    }
    
    protected function level_habilitation(string $getLevel) : string
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
    }
     
    
}