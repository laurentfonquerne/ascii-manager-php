<?php
namespace ASCII\Controller\Auth;

use ASCII\Controller\Controller;
use ASCII\Manager\Manager;
use ASCII\Entity\User;
use ASCII\Entity\UserLevel;

class AuthController extends Controller
{
    public function auth()
    {
        
        
        try {
            $model = new \stdclass();

            if (array_key_exists("user", $_SESSION )) {
                throw new \Exception("You are already logged in");
            }

            if (!($mail  = filter_input(INPUT_POST, "user_mail"))
         ||     !($pswd  = filter_input(INPUT_POST, "user_pswd"))    
         ||     !($token = filter_input(INPUT_POST, "token"))
         ||      ($token !== $_SESSION["token"])) {
                 throw new \RuntimeException;
            } else if (!($user = Manager::getDoctrine()
                ->getRepository(User::class)
                ->findoneby(["userMail" => $mail]))) {
                throw new \OutOfBoundsException;
            }
            
            if (!password_verify($pswd, $user->getUserPswd())) {
                throw new \OutOfBoundsException;
            }

            $_SESSION["user"] = [
                "userAgent" => filter_input(INPUT_SERVER, "HTTP_USER_AGENT"),
                "ip" => filter_input(INPUT_SERVER, "REMOTE_ADDR"),
                "time" => time(),
                "level" => $user->getUserLevel()->getUserLevelName(),
            ];
            $model->success = "You are logged";
                        
            
            if ($user->getUserLevel()->getUserLevelName() === "Admin" 
            ||  $user->getUserLevel()->getUserLevelName() === "superAdmin"){
                $model->success = "You are logged and (admin ou super-admin)";
                
            } else {
                $model->success = "You are logged out not admin not super admin";
                $this->response->addHeader("Location", "https://www.google.fr");
            }
            
        } catch (\OutOfBoundsException $e) {
            $error = "Bad Credentials";
        } catch (\RuntimeException $e) {

        } catch (\Throwable $e) {
            $error = $e->getMessage();
        } finally {
            
            $model->error = isset($error) ? $error : null;
            return $this->render("auth/auth", [
                "token" => $_SESSION["token"],
                "user" => array_key_exists("user", $_SESSION)
                        ? $_SESSION["user"]["level"]
                        : null,
                "model" => $model
            ]);
        }

    }

    public function destroy()
    {
            try {
                $model = new \stdClass();
                
                    if (!array_key_exists("user", $_SESSION )){
                        throw new \Exception("You are still logged out");
                    } 
                    
                    if ($_SESSION["token"] !== filter_input(INPUT_GET, "token")) {
                        throw new \Exception("You should not try");
                    }
                session_destroy();

                // Detruire la session
                $_SESSION = [];
                $model->success = "You are logged out";
                
                } catch (\Throwable $e) {
                    $model->error = $e->getMessage() ;

                } finally {
                    return $this->render("auth/destroy", ["model"=>$model,
                   "user" => array_key_exists("user", $_SESSION)
                            ? $_SESSION["user"]["level"]
                            : null,
                   "token" => array_key_exists("user", $_SESSION)
                              ? $_SESSION["token"]
                              : null,
                    ]);
                }
                
    }
            
}