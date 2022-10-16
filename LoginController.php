<?php
// include('DatabaseConnection.php');
// include('app.php');
include_once('session.php');
class LoginController{
    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn; // Create a connection property for this class because you need the same db connection to use this class.
        
    }
// AND `Password` = ?
    public function userLogin($username,$password){
        $checkLogin = "SELECT * FROM `Users` WHERE `Username` = ?;";
        $result = $this->conn->prepare($checkLogin);
        $result->bind_param('s',$username);
        if($result->execute()){
            $dataArray = $result->get_result()->fetch_assoc();
            if(!empty($dataArray)){
                if(password_verify($password,$dataArray['Password'])){
                    $data = $dataArray;
                    $this->userAuthentication($data);
                    return true;

                }
                
            }
        }
        else{
            return false;
        }
        // if($result->num_rows > 0){
        //     $data = $result->fetch_assoc();
        //     $this->userAuthentication($data);
            
        //     return true;

        // }
        // else{
        //     return false;
        // }

    }
    private function userAuthentication($data){
        $_SESSION['authenticated'] = true;
        $_SESSION['auth_user'] = ['user_id'=> $data['id'],'user_name'=>$data['FirstName'],
        'user_lastName'=>$data['LastName'],'user_email'=>$data['EmailAddress'],'user_username'=>$data['Username'],
        'user_password'=>$data['Password']];
    }

    public function logOut(){
        if(isset($_SESSION['authenticated'])===TRUE){
            unset($_SESSION['authenticated']);
            unset($_SESSION['auth-user']);
            return true;
        }
        else{
            return false;
        }
    }
}

