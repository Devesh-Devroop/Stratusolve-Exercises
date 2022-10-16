// $(document).ready(function(){
//     $("#yeet-btn").on('click',function(e){
//         e.preventDefault();
//         e.stopPropagation();
//         var create_var = "Create boi";
//         console.log(create_var);
//         console.log(document.getElementById('user_post').value);
//         console.log(document.getElementById('user_id').value);
//         //console log other shit
//         //'http://httpbin.org/post'
//         //PostsController.php
//         if($('#user_post').val().trim().length === 0){
//             alert('Enter something in the text field!');
//             return false;
//         }
//         else{
//             $.post('http://httpbin.org/post',{
//             create_var : create_var,
//             postText: document.getElementById('user_post').value,
//             userID: document.getElementById('user_id').value
//             },
//             function(data){
//                 console.log(data);
//                 window.location.href = "twitter.php";
//             });

            

//         }
//         // location.reload();
        


//         // $.post('http://httpbin.org/post',{
//         //     create_var : create_var,
//         //     postText: document.getElementById('user_post').value,
//         //     userID: document.getElementById('user_id').value
//         // },
//         // function(data){
//         //     console.log(data);
//         // });
//     });
    
// })
$(document).ready(function(){
    $("#yeet-btn").on('click',function(e){
        e.preventDefault();
        e.stopPropagation();
        var create_var = "Create boi";
        console.log(create_var);
        console.log(document.getElementById('user_post').value);
        console.log(document.getElementById('user_id').value);
        //console log other shit
        //'http://httpbin.org/post'
        //PostsController.php
        if($('#user_post').val().trim().length === 0){
            alert('Enter something in the text field!');
            return false;
        }
        else{
            $.post('PostController.php',{
            create_var : create_var,
            postText: document.getElementById('user_post').value,
            userID: document.getElementById('user_id').value
            },
            function(data){
                console.log(data);
                window.location.href = "twatter.php";
            });

            

        }
        // location.reload();
        


        // $.post('http://httpbin.org/post',{
        //     create_var : create_var,
        //     postText: document.getElementById('user_post').value,
        //     userID: document.getElementById('user_id').value
        // },
        // function(data){
        //     console.log(data);
        // });
    });
    $("#save-changes").on('click',function(e){
        e.preventDefault();
        e.stopPropagation();
        var edit_var = "Edit boi";
        console.log(document.getElementById('id').value);
        console.log(edit_var);
        console.log(document.getElementById('inputUsername').value);
        console.log(document.getElementById('inputFirstName').value);
        console.log(document.getElementById('inputLastName').value);
        console.log(document.getElementById('inputEmailAddress').value);
        console.log(document.getElementById('inputPassword').value);

        //console log other shit
        //'http://httpbin.org/post'
        //PostsController.php
        if($('#inputUsername').val().trim().length === 0 || $('#inputFirstName').val().trim().length === 0 || $('#inputLastName').val().trim().length === 0 || $('#inputEmailAddress').val().trim().length === 0|| $('#inputPassword').val().trim().length === 0){
            //alert('Please enter something in all fields');
            swal("Update user details", "Please enter something in all the input fields","warning");
            return false;
        }
        else{
            $.post('PostController.php',{
            edit_var : edit_var,
            username: document.getElementById('inputUsername').value,
            firstName: document.getElementById('inputFirstName').value,
            lastName: document.getElementById('inputLastName').value,
            email: document.getElementById('inputEmailAddress').value,
            password: document.getElementById('inputPassword').value,
            id: document.getElementById('id').value

            },
            function(data){
                console.log(data);
                if(data == 1){
                    swal("Update user details", "Successfully updated your details!","success");
                    setTimeout(function(){
                        window.location.reload();
                    },2000);
                }
                if(data == 2){
                    swal("Update user details", "Username/Email already exists","warning");
                }
                if(data == 3){
                    swal("Update user details", "Username/Email already exists","warning");
                }
                if(data == 4){
                    swal("Update user details", "Invalid Email provided","error");
                }
                // window.location.href = "tweetbox-test.php";
            });

            

        }
       
    });

    $("#reset").on('click',function(e){
        e.preventDefault();
        e.stopPropagation();
        var resetVar = "Reset boi";
        console.log(document.getElementById('resetEmail').value);
        console.log(resetVar);
        // console.log(document.getElementById('inputUsername').value);
        // console.log(document.getElementById('inputFirstName').value);
        // console.log(document.getElementById('inputLastName').value);
        // console.log(document.getElementById('inputEmailAddress').value);
        // console.log(document.getElementById('inputPassword').value);

        //console log other shit
        //'http://httpbin.org/post'
        //PostsController.php
        if($('#resetEmail').val().trim().length === 0 ){
            alert('Please enter something in all fields');
            return false;
        }
        else{
            $.post('resetEmail.php',{
            resetVar : resetVar,
            
            email: document.getElementById('resetEmail').value
            
            

            },
            function(data){
                // console.log(data);
                // alert(data);
                if(data){
                    alert("Message sent successfully");
                    // window.location.href = "postFormCheck.php";
                }
                else{
                    alert("Message could not be sent");
                }
                // window.location.href = "tweetbox-test.php";
            });

            

        }
       
    });

//form-reset
    $("#reset").on('click',function(e){
        e.preventDefault();
        e.stopPropagation();
        var resetVar = "Reset boi";
        console.log(document.getElementById('resetEmail').value);
        console.log(resetVar);
        // console.log(document.getElementById('inputUsername').value);
        // console.log(document.getElementById('inputFirstName').value);
        // console.log(document.getElementById('inputLastName').value);
        // console.log(document.getElementById('inputEmailAddress').value);
        // console.log(document.getElementById('inputPassword').value);

        //console log other shit
        //'http://httpbin.org/post'
        //PostsController.php
        if($('#resetEmail').val().trim().length === 0 ){
            alert('Please enter something in all fields');
            return false;
        }
        else{
            $.post('resetPassword.php',{
            resetVar : resetVar,
            
            email: document.getElementById('resetEmail').value
            
            

            },
            function(data){
                console.log(data);
                // alert(data);
                if(data){
                    alert("Message sent successfully");
                    
                }
                // window.location.href = "Login-form.php";
                // else{
                //     alert("Message could not be sent");
                // }
                // window.location.href = "tweetbox-test.php";
            });

            

        }
    
    });
    //Reset form ajax request to reset controller confirmChange(button id)
    $("#confirmChange").on('click',function(e){
        e.preventDefault();
        e.stopPropagation();
        var changeVar = "Change boi";
        console.log(document.getElementById('rEmail').value);
        console.log(document.getElementById('Rpass').value);
        console.log(document.getElementById('RpassRepeat').value);
        console.log(changeVar);
        // console.log(document.getElementById('inputUsername').value);
        // console.log(document.getElementById('inputFirstName').value);
        // console.log(document.getElementById('inputLastName').value);
        // console.log(document.getElementById('inputEmailAddress').value);
        // console.log(document.getElementById('inputPassword').value);

        //console log other shit
        //'http://httpbin.org/post'
        //PostsController.php
        if($('#rEmail').val().trim().length === 0 || $('#Rpass').val().trim().length === 0 || $('#RpassRepeat').val().trim().length === 0){
            alert('Please enter something in all fields');
            return false;
        }
        else{
            $.post('resetController.php',{
            changeVar : changeVar,
            email: document.getElementById('rEmail').value,
            password : document.getElementById('Rpass').value,
            passwordRepeat : document.getElementById('RpassRepeat').value
            
            

            },
            function(data){
                console.log(data);
                if(data){
                    alert("User password reset successful");
                }
                else{
                    alert("Could not reset this user's password");
                }
                
            });

            

        }
    
    });
    $("#signup").on('click',function(e){
        e.preventDefault();
        e.stopPropagation();
        var signup_var = "Sign up boi";
        // console.log(document.getElementById('id').value);
        console.log(signup_var);
        console.log(document.getElementById('first').value);
        console.log(document.getElementById('last').value);
        console.log(document.getElementById('user').value);
        console.log(document.getElementById('pass').value);
        console.log(document.getElementById('passrepeat').value);
        console.log(document.getElementById('email').value);

        //console log other shit
        //'http://httpbin.org/post'
        //PostsController.php
        if($('#first').val().trim().length === 0 || $('#last').val().trim().length === 0 || $('#user').val().trim().length === 0 || $('#pass').val().trim().length === 0|| $('#passrepeat').val().trim().length === 0 || $('#email').val().trim().length === 0){
            //alert('Please enter something in all fields');
            swal("Sign up process", "Please enter something in all the text fields.", "warning");
            return false;
        }
        if(strength < 4){
            swal("Sign up process","Password does not match the required format.","warning");
        }
        else if(strength === 4){
            $.post('RegisterController.php',{
            signup_var : signup_var,
            username: document.getElementById('user').value,
            firstName: document.getElementById('first').value,
            lastName: document.getElementById('last').value,
            email: document.getElementById('email').value,
            password: document.getElementById('pass').value,
            passwordRepeat: document.getElementById('passrepeat').value

            },
            function(data){
                console.log(data);
                // alert(data);
                if(data == 1){
                    // Updated successfully
                    swal("Sign up process", "You have successfully signed up for Twatter!", "success");
                    setTimeout(function(){
                        window.location.reload();
                    },2000);
                }
                if(data == 2){
                    //Username already exists
                     swal("Sign up process", "Something went wrong", "error");
                 }
                if(data == 3){
                // Email exists
                    swal("Sign up process", "Password and repeated password do not match!", "error");
                }
                if(data == 4){
                // Invalid email provided
                    swal("Sign up process", "Invalid Email provided", "error");
                }
                if(data == 5){
                    swal("Sign up process", "Username/Email already in use!", "warning");
                }
                
                
            });

            

        }
       
    });






    
})
