<?php
include('app.php');
include_once('session.php');
// include_once('phpmailer/EmailTemplate.php');
// include('authentication_code.php');
// session_start();
// include('resetPassword.php');
if(!isset($_SESSION['access']) === TRUE){
    redirect("You need to generate an email link.","resetPassword.php");
}
// else{
//     unset($_SESSION['access']);
// }


?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <title>Hello, world!</title>
  </head>
  <body>
    
    
    <div class="login-wrap">
        <div class="header">
            Twatter
        </div>
        <div class="login-html">
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Reset Password</label>
            <input id="tab-2" type="hidden" name="tab" class="sign-up"><label hidden for="tab-2" class="tab">Sign Up</label>
            <div class="login-form">
                <div class="sign-in-htm">
                    <form action="" method="post">
                        <div class="password-message"><?php include('message.php');?></div>
                        <div class="group">
                            <label for="rEmail" class="label">Email</label>
                            <input id="rEmail" name="rEmail" type="email" class="input" value="<?php echo $_SESSION['EmailFuck'];?>" disabled>
                        </div>
                        <div class="group">
                            <label for="Rpass" class="label">Password</label>
                            <input id="Rpass" name="Rpass" type="password" class="input" data-type="password" required>
                        </div>
                        <div class="group">
                            <label for="RpassRepeat" class="label">Confirm Password</label>
                            <input id="RpassRepeat" name="RpassRepeat" type="password" class="input" data-type="password" required>
                        </div>
                        <!-- <div class="group">
                            <label for="password" class="label">Password</label>
                            <input id="password" name="password" type="password" class="input" data-type="password" required>
                        </div> -->
                        
                        <!-- <div class="group">
                            <input id="check" type="checkbox" class="check" checked>
                            <label for="check"><span class="icon"></span> Keep me Signed in</label>
                        </div> -->
                        <div class="group">
                            
                            <button type="submit" class="button" name="confirmChange" id="confirmChange" >Confirm</button>
                            
                            <!-- <a href="Stratusolve-Exercises/twitter.html">
                                <button type="submit" class="button" name="login" id="login" >Log In</button>
                            </a> -->
                    </form>    
                           
                    </div>
                    <div class="hr"></div>
                    <div class="foot-lnk">
                        <a href="Login-form.php">Back to Login Page</a>
                    </div>
                </div>
                <!-- <div class="sign-up-htm">
                    <form action="" method="post">
                        
                        <div class="group">
                            <label for="first" class="label">First Name</label>
                            <input id="first" name="first" type="text" class="input" required>
                        </div>

                        <div class="group">
                            <label for="last" class="label">Last Name</label>
                            <input id="last" name="last" type="text" class="input" required>
                        </div>


                        <div class="group">
                            <label for="user" class="label">Username</label>
                            <input id="user" name="user" type="text" class="input" required>
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Password</label>
                            <input id="pass" name="pass" type="password" class="input" data-type="password" required>
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Confirm Password</label>
                            <input id="passrepeat" name="passrepeat" type="password" class="input" data-type="password" required>
                        </div>
                        <div class="group">
                            <label for="email" class="label">Email Address</label>
                            <input id="email" name="email" type="email" class="input" required>
                        </div>
                        <div class="group">
                            <button type="submit" class="button" value="Submit" name="signup" id="signup">Sign up</button>
                            <a href="login-form.html">
                                <button type="submit" class="button" value="Submit" name="signup" id="signup">Sign up</button>
                            </a> -->
                            
                        <!-- </div>
                    </form>
                    
                    <div class="hr"></div>
                    <div class="foot-lnk">
                        <label for="tab-1">Already Member?</a>
                    </div>
                </div>  -->
                
            </div>
        </div>
        
    </div>
    


 
<script src="bullshit.js"></script>
  </body>
</html>
