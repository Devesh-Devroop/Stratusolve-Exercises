<?php
// include('app.php');
//include_once('RegisterController.php');
include_once('LoginController.php');
include_once('loginAttemptController.php');
include_once('session.php');

$auth = new LoginController;
$attempt = new loginAttemptController;

// $attempt = new loginAttemptController;

if(isset($_POST['logout-btn'])){
    $checkedLoggedOut = $auth->logOut();
    if($checkedLoggedOut){
        //header("Location: login-form.php");
        redirect("You have been logged out","Login-form.php");
    }
}


//login stuff
if(isset($_POST['login'])){
    $username = validateInput($db->conn,$_POST['username']);
    $password = validateInput($db->conn, $_POST['password']);
    // $getAssoc = $attempt->getAssoc($username);
    
    
    $checkLogin = $auth->userLogin($username,$password);
    // $checkLoginAttempt = $attempt->loginAttempt();
    if($checkLogin){
        $login = $attempt->deleteLoginAttempt($username);
        //redirect("Login successful","twitter.php");
        header("Location: twatter.php");
        
    }
    else{
        //$attempt = new loginAttemptController;
        $checkLoginAttempt = $attempt->loginAttempt($username);

        
        // redirect("Invalid Username/Password","Login-form.php");
           
    }
}




//Sign up stuff

// if(isset($_POST['signup'])){
//     $first = htmlspecialchars(validateInput($db->conn,$_POST['first'])) ;
//     // $first = str_replace("/","''",$first);
//     $last = htmlspecialchars(validateInput($db->conn,$_POST['last']));
    
     
//     $email = htmlspecialchars(validateInput($db->conn,$_POST['email']));
    
//     $username = htmlspecialchars(validateInput($db->conn,$_POST['user']));
//     // $username = str_replace("/","''",$username);
//     $password = htmlspecialchars(validateInput($db->conn,$_POST['pass']));
//     $passwordRepeat = htmlspecialchars(validateInput($db->conn,$_POST['passrepeat']));
//     $hashedPwd = password_hash($password,PASSWORD_DEFAULT);

//     $register = new RegisterController;

//     $result_email = $register->emailValidation($email);
//     if($result_email){
//         $result_password = $register->confirmPassword($password,$passwordRepeat);
//         if($result_password){
//             $result_user = $register->userExists($email,$username);
//             if($result_user){
//                 redirect("Email or username is already in use","login-form.php");
//             }
//             else{
//                 $register_query = $register->registration($first, $last, $email, $username, $hashedPwd);
//                 if($register_query){
//                     redirect("Sign up completed","login-form.php");

//                 }
//                 else{
//                     redirect("Sign up failed","login-form.php");
//                 }
//             }
//         }
//         else{
//             redirect("Password and repeated password do not match","login-form.php");

//         }
//     }
//     else{
//         redirect("You entered an invalid email address","login-form.php");
//     }
//     // $result_password = $register->confirmPassword($password,$passwordRepeat);
//     // if($result_password){
//     //     $result_user = $register->userExists($email);
//     //     if($result_user){
//     //         redirect("Email or username has been used","login-form.php");
//     //     }
//     //     else{
//     //         $register_query = $register->registration($first, $last, $email, $username, $password);
//     //         if($register_query){
//     //             redirect("Sign up completed","login-form.php");
//     //         }
//     //         else{
//     //             redirect("Failed to sign up","login-form.php");
//     //         }
//     //     }
            
//     // }
//     // else{
//     //     redirect("Password and repeated password do not match","login-form.php");
//     // }
// }