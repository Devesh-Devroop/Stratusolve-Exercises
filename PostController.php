<?php
include('app.php');
include_once('session.php');

$postObject = new PostController;
if(isset($_POST['create_var'])){
    
    $createFunctionCall = $postObject->createPost();
    // if($createFunctionCall){
    //     header("Location : tweetbox-test.php");
    // }
    // else{
    //     // redirect("Something horrible happened","tweetbox-test.php");
    //     header("Location : tweetbox-test.php");

    // }

}
if(isset($_POST['edit_var'])){
    
    if($_SESSION['auth_user']['user_email'] === $_POST['email'] && $_SESSION['auth_user']['user_username'] === $_POST['username']){
        $editUserDetails = $postObject->editUserDetails();
        
    }
    else{
        $editEmailValidation = $postObject->editEmailValidation($_POST['email']);
        if($editEmailValidation){
            $editUsernameValidation = $postObject->editUserExists($_POST['email']);
            if(!$editUsernameValidation){
                $editUsername = $postObject->editUsernameExists($_POST['username']);
                if(!$editUsername){
                    $editUserDetails = $postObject->editUserDetails();
                    if($editUserDetails){
                        
                        $this->updateSessionVariables();
                        
                    }
                    //echo "User updated successfully";
                    // redirect("User updated successfully","tweetbox-test.php");
                    return true;
                }
                else{
                    echo 2;
                    //echo "Could not update user because username is already in use";
                    // redirect("Could not update user because email is already in use","edit-profile.php");
                    return false;
                }
                // $editUserDetails = $postObject->editUserDetails();
                // echo "User updated successfully";
                // // redirect("User updated successfully","tweetbox-test.php");
                // return true;
    
    
            }
            else{
                echo 3;
                //echo "Could not update user because email is already in use";
                // redirect("Could not update user because email is already in use","edit-profile.php");
                return false;
            }
    
        }
        else{
            echo 4;
            //echo "You entered an invalid email";
            // redirect("You entered an invalid email","edit-profile.php");
            return false;
        }
    }
    

    


}
if(isset($_POST['uploadVar'])){
    $postObject->validateImage();
}




class PostController{
    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
        
    }

    public function createPost(){
        $query = "INSERT INTO `posts`(`PostText`, `UserId`) 
        VALUES (?,?);";
        $result = $this->conn->prepare($query);
        $PostText = htmlspecialchars(mysqli_real_escape_string($this->conn,$_POST['postText']));
        $UserId = htmlspecialchars(mysqli_real_escape_string($this->conn,$_POST['userID']));
        $result->bind_param("si",$PostText,$UserId);
        
        if($result->execute()){
            echo "Data inserted fam";
        }
        else{
            echo "Could not insert data";
        }
    }

    public function editUserDetails(){
        
        $id = htmlspecialchars(mysqli_real_escape_string($this->conn,$_POST['id']));
        $firstName = htmlspecialchars(mysqli_real_escape_string($this->conn,$_POST['firstName']));
        //$lastName = $_POST['lastName'];
        $lastName= htmlspecialchars(mysqli_real_escape_string($this->conn,$_POST['lastName']));
        // $lastName = str_replace("'","/'",$lastName);
        $email = htmlspecialchars(mysqli_real_escape_string($this->conn,$_POST['email']));
        $username = htmlspecialchars(mysqli_real_escape_string($this->conn,$_POST['username']));
        // $password= mysqli_real_escape_string($this->conn,$_POST['password']);
        // $hashedPassword = password_hash($password,PASSWORD_DEFAULT);
        
        $query = "UPDATE users SET FirstName=?,LastName=?,EmailAddress= ?,Username= ? WHERE id= ?;";
        $result = $this->conn->prepare($query);
        
        $result->bind_param('ssssi',$firstName,$lastName,$email,$username,$id);
        
        if($result->execute()){
            //$this->updateSessionVariables();
            echo 1;
            $_SESSION['auth_user']['user_name'] = $_POST['firstName'];
            $_SESSION['auth_user']['user_lastName'] = $_POST['lastName'];
            $_SESSION['auth_user']['user_email'] = $_POST['email'];
            $_SESSION['auth_user']['user_username'] = $_POST['username'];
            //echo "User details updated successfully";
            //$this->updateSessionVariables();
        }
        else{
            echo "Could not update user details";
        }
        
        
    }
    private function updateSessionVariables(){
        //$_SESSION['auth_user']['user_id'] = mysqli_real_escape_string($this->conn,$_POST['id']);
        $_SESSION['auth_user']['user_first'] = mysqli_real_escape_string($this->conn,$_POST['firstName']);
        $_SESSION['auth_user']['user_last'] = mysqli_real_escape_string($this->conn,$_POST['lastName']);
        $_SESSION['auth_user']['user_email'] = mysqli_real_escape_string($this->conn,$_POST['email']);
        $_SESSION['auth_user']['user_username'] = mysqli_real_escape_string($this->conn,$_POST['username']);
        //$_SESSION['auth_user']['user_password'] = mysqli_real_escape_string($this->conn,$_POST['password']);
    }
    

    public function editUserExists($email){
        // $checkUser = "SELECT `EmailAddress`,`Username` FROM `users` WHERE `EmailAddress` = '$email' OR `Username`='$username'; ";
        // $result = $this->conn->query($checkUser);
        // if($result->num_rows >0){
        //     return true;
        // }
        // else{
        //     return false;
        // }
        $checkUser = "SELECT `EmailAddress`FROM `users` WHERE `EmailAddress` = ?; ";
        $result = $this->conn->prepare($checkUser);
        $result->bind_param('s',$email);
        
        if($result->execute()){
            $result->store_result(); //Returns 1 if there is data. Use store_result if you are just checking if data exists. If you want to return data from database use get_results.
            if($result->num_rows>0){
                if($_SESSION['auth_user']['user_email'] === $email){
                    return false;
                }
                else{
                    return true;
                }
                
                
            }
            else{
                return false;
            }
            
            
        }
        else{
            return false;
        }
    }

    public function editUsernameExists($username){
        // $checkUser = "SELECT `EmailAddress`,`Username` FROM `users` WHERE `EmailAddress` = '$email' OR `Username`='$username'; ";
        // $result = $this->conn->query($checkUser);
        // if($result->num_rows >0){
        //     return true;
        // }
        // else{
        //     return false;
        // }
        $checkUser = "SELECT `Username` FROM `users` WHERE `Username`= ?; ";
        $result = $this->conn->prepare($checkUser);
        $result->bind_param('s',$username);
        
        if($result->execute()){
            $result->store_result(); //Returns 1 if there is data. Use store_result if you are just checking if data exists. If you want to return data from database use get_results.
            if($result->num_rows>0){
                if($_SESSION['auth_user']['user_username'] === $username){
                    return false;
                }
                else{
                    return true;
                }
                
                
            }
            else{
                return false;
            }
            
            
        }
        else{
            return false;
        }
    }
    
    public function editEmailValidation($email){
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            return false;
        }
        else{
            return true;
        }

    }

    public function validateImage(){
        if(isset($_POST['uploadValue'])){
            //pre_r($_FILES);
            $phpFileUploadErrors = array(
                0 => 'There is no error, the file uploaded with success',
                1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
                2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
                3 => 'The uploaded file was only partially uplaoded',
                4 => 'No file was uploaded',
                // 5 => 'There is no error, the file uploaded with success',
                6 => 'Missing a temporary folder',
                7 => 'Failed to write file to disk.',
                8 => 'A PHP extension stopped the file upload.',
            );

            $extensions = array('jpg','jpeg','gif','png');
            $file_ext = explode('.',$_POST['uploadValue']);
            $file_ext_array = end($file_ext);
            if(!in_array($file_ext_array,$extensions)){
                $ext_error = true;
                return false;
            }

            // if($_FILES['userfile']['error']){
            //     //echo $phpFileUploadErrors[$_FILES['userfile']['error']];
            //     return false;
            // }
            // elseif($ext_error){
            //     //echo "Invalid file extension";
            //     return false;
            // }
            else{
                $name = $_POST['uploadValue'];
                $imgContent = addslashes(file_get_contents($name));
                echo "Success! Image has been uploaded.";
                $id = $_SESSION['user_id'];
                $query = "INSERT INTO `users` VALUES('$imgContent') WHERE `id` = '$id' ;";
                $sql = mysqli_query($this->conn,$query);
            }

            move_uploaded_file($_FILES['userfile']['tmp_name'],'htdocs'.
            $_POST['uploadValue']);
        }
        
    }
}