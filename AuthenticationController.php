<?php
class AuthenticationController{
    public function __construct()
    {
        $this->checkIsLoggedIn();
        
    }

    private function checkIsLoggedIn(){
        if(!isset($_SESSION['authenticated'])){
            redirect("Login to access main page","Login-form.php");
            return false;
        }
        else{
            return true;
        }
    }
}

$authenticated = new AuthenticationController;