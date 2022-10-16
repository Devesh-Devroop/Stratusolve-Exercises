<?php
include('app.php');
include_once('session.php');
$object = new resetController;
if(isset($_POST['changeVar'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordRepeat = $_POST['passwordRepeat'];
    $hashedPwd = password_hash($password,PASSWORD_DEFAULT);
    // echo "Your email is:"." ".$email;
    $checkEmailExist = $object->checkEmail($email);
    if($checkEmailExist){
        $checkPasswordMatching = $object->passwordMatch($password,$passwordRepeat);
        if($checkPasswordMatching){
            $callReset = $object->resetPasswordUpdate($hashedPwd,$email);
            if($callReset){
                // redirect("Your password has been reset successfully","Login-form.php");
                unset($_SESSION['access']);
                return true;
            }
            else{
                // redirect("Something went wrong","Login-form.php");
                return false;
            }
        }
        else{
            // redirect("Passwords don't match","resetForm.php");
            return false;
        }
    }
    else{
        unset($_SESSION['access']);
        return false;
    }
    // $checkPasswordMatching = $object->passwordMatch($password,$passwordRepeat);
    // if($checkPasswordMatching){
    //     $callReset = $object->resetPasswordUpdate($hashedPwd,$email);
    //     if($callReset){
    //         redirect("Your password has been reset successfully","Login-form.php");
    //         unset($_SESSION['access']);
    //         return true;
    //     }
    //     else{
    //         redirect("Something went wrong","Login-form.php");
    //         return false;
    //     }
    // }
    // else{
    //     redirect("Passwords don't match","resetForm.php");
    //     return false;
    // }
    

}

class resetController{
    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
        
    }

    public function resetPasswordUpdate($password,$email){
        $query = "UPDATE Users SET Password = ? 
        WHERE EmailAddress= ? ;";
        $result = $this->conn->prepare($query);
        $result->bind_param('ss',$password,$email);
        $result->store_result();
        if($result->execute()){
            if($result->num_rows>0){
                return true;
            }
            else{
                redirect("User does not exist","Login-form.php");
                return false;
            }
            
        }
        else{
            return false;
        }
        
    }

    public function passwordMatch($password,$passwordRepeat){
        if($password == $passwordRepeat){
            return true;

        }
        else{
            return false;
        }
    }

    public function checkEmail($email){
        $query = "SELECT * FROM `Users` WHERE `EmailAddress` = ?;";
        $resultCheck = $this->conn->prepare($query);
        $resultCheck->bind_param('s',$email);
        if($resultCheck->execute()){
            $resultCheck->store_result();
            if($resultCheck->num_rows>0){
                return true;
            }
            else{
                return false;
            }
        }
    }
}