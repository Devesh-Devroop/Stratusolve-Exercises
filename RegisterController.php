<?php
include('app.php');
include_once('session.php');
if(isset($_POST['signup_var'])){
    $first = htmlspecialchars(validateInput($db->conn,$_POST['firstName'])) ;
    // $first = str_replace("/","''",$first);
    $last = htmlspecialchars(validateInput($db->conn,$_POST['lastName']));
    //$lastDB = strval($_POST['lastName']);
    
     
    $email = htmlspecialchars(validateInput($db->conn,$_POST['email']));
    
    $username = htmlspecialchars(validateInput($db->conn,$_POST['username']));
    // $username = str_replace("/","''",$username);
    $password = htmlspecialchars(validateInput($db->conn,$_POST['password']));
    $passwordRepeat = htmlspecialchars(validateInput($db->conn,$_POST['passwordRepeat']));
    $hashedPwd = password_hash($password,PASSWORD_DEFAULT);

    $register = new RegisterController;

    $result_email = $register->emailValidation($email);
    if($result_email){
        $result_password = $register->confirmPassword($password,$passwordRepeat);
        if($result_password){
            $result_user = $register->userExists($email,$username);
            if($result_user){
                echo 5;
                //redirect("Email or username is already in use","login-form.php");
            }
            else{
                $register_query = $register->registration($first, $last, $email, $username, $hashedPwd);
                if($register_query){
                    echo 1;
                    //redirect("Sign up completed","login-form.php");

                }
                else{
                    echo 2;
                    //redirect("Sign up failed","login-form.php");
                }
            }
        }
        else{
            echo 3;
            //redirect("Password and repeated password do not match","login-form.php");

        }
    }
    else{
        echo 4;
        //redirect("You entered an invalid email address","login-form.php");
    }

}

class RegisterController{
    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }

    public function registration($first,$last,$email,$username,$password){
        $register_query = "INSERT INTO `Users` (`FirstName`,`LastName`,`EmailAddress`,`Username`,`Password`,`img`)
        VALUES (?,?,?,?,?,NULL);";

        $result = $this->conn->prepare($register_query);
        $result->bind_param('sssss',$first,$last,$email,$username,$password);
        if($result->execute()){
            return true;
        }
        else{
            return false;
        }
    }
    public function userExists($email,$username){
        $checkUser = "SELECT `EmailAddress`,`Username` FROM `Users` WHERE `EmailAddress` = ? OR `Username` = ?;";
        $result = $this->conn->prepare($checkUser);
        $result->bind_param('ss',$email,$username);
        if($result->execute()){
            $result->store_result();
            if($result->num_rows>0){
                return true;

            }
            

        }
        else{
            return false;
        }
    }

    public function confirmPassword($password,$passwordRepeat){
        if($password == $passwordRepeat){
            return true;

        }
        else{
            return false;
        }
    }

    public function emptyInput($first,$last,$email,$username,$password,$passwordRepeat){
        $this->result;
        if(empty($first) || empty($last) || empty($email) || empty($username)|| empty($password) || empty($passwordRepeat)){
            return $this->result = false;
        }
        else{
            return $this->result = true;
        }
    }

    public function emailValidation($email){
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            return false;
        }
        else{
            return true;
        }
    }
}