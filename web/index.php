<?php 

use ASCII\Http\Response;
use ASCII\Controller\Auth\AuthController;
use ASCII\Controller\Admin\FontsController;
use ASCII\Controller\Admin\CharactersController;
use ASCII\Controller\Admin\CharactersFontsController;
use ASCII\Controller\Admin\SymbolsController;
use ASCII\Manager\Manager;
use ASCII\Entity\User;



require "./../vendor/autoload.php";

//var_dump(json_decode($jsonText)[0]);
//var_dump(json_decode($jsonText)[1]);
//var_dump(json_decode($jsonText)[2]);
//var_dump(md5($pswd));
//var_dump(sha1($pswd));
//var_dump(@crypt($pswd));
//var_dump(password_hash($pswd, PASSWORD_DEFAULT));

    // $url
try {
    //var_dump(password_hash('maman', PASSWORD_DEFAULT));
    //exit;

    /* $user = Manager::getDoctrine()->getRepository(User::class)
                                ->findOneby(["userMail" => "laurent.fonquerne@gmail.com"]);
    var_dump($user->getUserMail());
    exit;                                 */
    //var_dump(htmlentities($var, ENT_QUOTES, "UTF-8"));
    //urlencode($str);
    //var_dump(filter_var($var, FILTER_SANITIZE_URL));
    //var_dump(filter_var($var, FILTER_SANITIZE_FULL_SPECIEL_CHARS, FILTER_FLAG_ENCODE_HIGH));

    $url    = (string) filter_input(INPUT_SERVER, "REDIRECT_URL");
    $action = (string) filter_input(INPUT_GET, "action");
    $route  = 
    [
        "/php_formation/web/auth" => AuthController::class,
        "/php_formation/web/admin/fonts" => FontsController::class,
        "/php_formation/web/admin/characters" => CharactersController::class,
        "/php_formation/web/admin/symbols" => SymbolsController::class,
        "/php_formation/web/admin/fonts/[a-zA-Z0-9-_\s]{1,32}" => CharactersFontsController::class,
    ];
    
    //itération des urls du router

    foreach ($route as $routeUrl => $className){

    // si l'url est présente dans le router
        $routepropre = str_replace("/","\/", $routeUrl);
        
        if (preg_match("/^". $routepropre . "$/", $url)){

            // on demande une instance de la classe associée

            $controller = new $className;

            if (method_exists($controller, $action)){
                $response = $controller->{$action}();
                break;                    
            }
        }
        
    }
    if (!isset($response)){
        $response = new Response;
        $response->setStatus(404, "not found");
        $response->setBody("Aucune Route ne Correspond");
    }
    header($response->getStatus());
    foreach ($response->getHeader() as $key=> $value){
        header($key . ": " . $value);

    }
    echo $response->getBody();
} 

catch (Throwable $e) {
    header("HTTP/1.1 500 INTERNAL SERVER ERROR");
    echo "<h1>Erreur</h1>" . $e->getMessage();
}




    

