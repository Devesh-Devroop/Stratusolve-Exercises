<?php
include('app.php');
include('authentication_code.php');
include_once('session.php');
// include('waitPage.php');
error_reporting(E_ALL ^ E_WARNING);

if(time() < $_SESSION['timer']){?>
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
    <title>Login Page</title>
  </head>
  <body>
    
    
    <div class="login-wrap">
        <div class="header">
            Twatter
        </div>
        <div class="login-html">
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Log In</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
            <div class="login-form">
                <div class="sign-in-htm">
                    <form action="" method="post">
                        <div class="password-message"><?php include('message.php');?></div>
                        <div class="group">
                            <label for="username" class="label">Username</label>
                            <input id="username" name="username" type="text" class="input" required>
                        </div>
                        <div class="group">
                            <label for="password" class="label">Password</label>
                            <input id="password" name="password" type="password" class="input" data-type="password" required>
                        </div>
                        
                        <!-- <div class="group">
                            <input id="check" type="checkbox" class="check" checked>
                            <label for="check"><span class="icon"></span> Keep me Signed in</label>
                        </div> -->
                        <div class="group">
                            
                            <!-- <button type="submit" class="button" name="login" id="login" >Log In</button> -->
                            
                            <!-- <a href="Stratusolve-Exercises/twitter.html">
                                <button type="submit" class="button" name="login" id="login" >Log In</button>
                            </a> -->
                    </form>    
                           
                    </div>
                    <div class="hr"></div>
                    <!-- <div class="foot-lnk">
                        <a href="#forgot">Reset Password</a>
                    </div> -->
                </div>
                <div class="sign-up-htm">
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
                            <!-- <button type="submit" class="button" value="Submit" name="signup" id="signup">Sign up</button> -->
                            <!-- <a href="login-form.html">
                                <button type="submit" class="button" value="Submit" name="signup" id="signup">Sign up</button>
                            </a> -->
                            
                        </div>
                    </form>
                    
                    <!-- <div class="hr"></div>
                    <div class="foot-lnk">
                        <label for="tab-1">Already Member?</a>
                    </div> -->
                </div>
                
            </div>
        </div>
        
    </div>
    


 

  </body>
</html>
<?php }
 else{ 


// include_once('attemptController.php');
// include('message.php');
// $_SESSION['fuck'] = false;
// if($_SESSION['fuck'] = true){
//     echo $_SESSION['fuck'];
//     unset($_SESSION['fuck']);
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://kit.fontawesome.com/1ee380941c.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Login Page</title>
  </head>
  <body>
    
    
    <div class="login-wrap">
        <div class="header">
            Twatter
        </div>
        <div class="login-html">
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Log In</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
            <div class="login-form">
                <div class="sign-in-htm">
                    <form action="" method="post">
                        <div class="password-message"><?php include('message.php');?></div>
                        <div class="group">
                            <label for="username" class="label">Username</label>
                            <input id="username" name="username" type="text" class="input" required>
                        </div>
                        <div class="group">
                            <label for="password" class="label">Password</label>
                            <input id="password" name="password" type="password" class="input" data-type="password" required>
                        </div>
                        
                        <!-- <div class="group">
                            <input id="check" type="checkbox" class="check" checked>
                            <label for="check"><span class="icon"></span> Keep me Signed in</label>
                        </div> -->
                        <div class="group">
                            
                            <button type="submit" class="button" name="login" id="login" >Log In</button>
                            
                            <!-- <a href="Stratusolve-Exercises/twitter.html">
                                <button type="submit" class="button" name="login" id="login" >Log In</button>
                            </a> -->
                    </form>    
                           
                    </div>
                    <div class="hr"></div>
                    <div class="foot-lnk">
                        <a href="resetPassword.php">Reset Password</a>
                    </div>
                </div>
                <div class="sign-up-htm">
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
                        <div id="popover-password">
                            <p><span id="result"></span></p>
                            <div class="progress">
                                <div id="password-strength" class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">

                                </div>
                            </div>
                        </div>
                        <ul class="list-unstyled" style="margin-top: 7px;">
                            <li>
                                <span class="low-upper-case">
                                    <i class="fas fa-circle" aria-hidden="true" style="margin-right: 5px;"></i>1 Lowercase character &amp; 1 Uppercase character
                                </span>
                            </li>
                            <li>
                                <span class="one-number">
                                    <i class="fas fa-circle" aria-hidden="true" style="margin-right: 5px;"></i>At least one Number [0-9]
                                </span>
                            </li>
                            <li>
                                <span class="one-special-char">
                                    <i class="fas fa-circle" aria-hidden="true" style="margin-right: 5px;"></i>At least one special character (!@#$^&*)
                                </span>
                            </li>
                            <li>
                                <span class="eight-character">
                                    <i class="fas fa-circle" aria-hidden="true" style="margin-right: 5px;"></i>At least 8 characters long
                                </span>
                            </li>
                        </ul>
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
                            <!-- <a href="login-form.html">
                                <button type="submit" class="button" value="Submit" name="signup" id="signup">Sign up</button>
                            </a> -->
                            
                        </div>
                    </form>
                    
                    <!-- <div class="hr"></div>
                    <div class="foot-lnk">
                        <label for="tab-1">Already Member?</a>
                    </div> -->
                </div>
                
            </div>
        </div>
        
    </div>
    


 
    <script src="ajax_request_script.js"></script>
    <script>
        let password = document.getElementById('pass');
        let passwordStrength = document.getElementById('password-strength');
        let lowerUpperCase = document.querySelector('.low-upper-case i');
        let number = document.querySelector('.one-number i');
        let specialChar = document.querySelector('.one-special-char i');
        let eightChar = document.querySelector('.eight-character i');

        password.addEventListener('keyup',function(){
            let pass = password.value;
            checkStrength(pass);
        })
        function checkStrength(password){
            strength = 0;

            //Lower and upper case
            if(password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)){
                strength += 1;
                lowerUpperCase.classList.remove('fa-circle');
                lowerUpperCase.classList.add('fa-check');
            }
            else{
                lowerUpperCase.classList.add('fa-circle');
                lowerUpperCase.classList.remove('fa-check');
            }
            // Check for number
            if(password.match(/([0-9])/)){
                strength += 1;
                number.classList.remove('fa-circle');
                number.classList.add('fa-check');
            }
            else{
                number.classList.add('fa-circle');
                number.classList.remove('fa-check');
            }
            // Special character
            if(password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)){
                strength += 1;
                specialChar.classList.remove('fa-circle');
                specialChar.classList.add('fa-check'); 
            }
            else{
                specialChar.classList.add('fa-circle');
                specialChar.classList.remove('fa-check');
            }
            // More than 7 characters
            if(password.length > 7){
                //console.log(password.length);
                strength += 1;
                eightChar.classList.remove('fa-circle');
                eightChar.classList.add('fa-check');
            }
            else{
                eightChar.classList.add('fa-circle');
                eightChar.classList.remove('fa-check');
            }

            if(strength == 0){
                passwordStrength.style = 'width: 0%';
            }
            else if(strength == 2){
                passwordStrength.classList.remove('progress-bar-warning');
                passwordStrength.classList.remove('progress-bar-success');
                passwordStrength.classList.add('progress-bar-danger');
                passwordStrength.style = 'width: 10%';
            }
            else if(strength == 3){
                passwordStrength.classList.remove('progress-bar-danger');
                passwordStrength.classList.remove('progress-bar-success');
                passwordStrength.classList.add('progress-bar-warning');
                passwordStrength.style = 'width: 60%';
            }
            else if(strength == 4){
                passwordStrength.classList.remove('progress-bar-warning');
                passwordStrength.classList.remove('progress-bar-danger');
                passwordStrength.classList.add('progress-bar-success');
                passwordStrength.style = 'width: 100%';
            }
        }
    </script>
  </body>
</html>
<?php } ?>