<?php
include('app.php');
include('authentication_code.php');
include_once('AuthenticationController.php');
include_once('session.php'); 
// include('LoginConroller.php');

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Twatter</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="fuck.css">
    <link rel="stylesheet" href="tweetbox-test.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="header-link">
        <div class="title-app">Twatter</div>
        <div class="auth-user"><?php echo stripslashes($_SESSION['auth_user']['user_name'])." ".stripslashes($_SESSION['auth_user']['user_lastName']); ?></div>
        <!-- <img src="profile-logo.svg"> -->
        <!-- <a href="login-form.php" class="logout-btn">Log out</a> -->
        <form action="" method="post">
            <div class="button-div"><button type="submit" name="logout-btn" id="logout-btn" class="btn btn-danger" style="position: absolute;right:10px;top:9px;">Log out</button></div>
            
        </form>
    </div>

    <div class="sidebar-link">
        <div class="sidebar-item">
            <img src="home-icon.svg"><a href="twatter.php" class="home-icon-anchor"></a>
            <div class="home-desc" style="color:rgb(54, 99, 223);"><a href="twatter.php" class="home-anchor active">Home</a></div>
        </div>

        <div class="sidebar-item-2">
            <img src="profile-logo.svg">
            <div class="edit-desc" style="color:rgb(54, 99, 223);"><a href="edit-profile.php" class="profile-anchor">Profile</a></div>
        </div>
    </div>

    <!-- <div class="input">
        <input type="text" id="input" name="input" placeholder="What's happening?">
    </div> -->
    <div class="loginBox">
    <div><?php include('message.php') ?></div>
    <div class="home" style="font-size: 20px;font-weight:600;font-family:'Times New Roman', Times, serif;">Home</div>
    <div class="tweetbox">
        <div class="header-post">
        <?php
                        $id = $_SESSION['auth_user']['user_id'];
        $viewQuery = "SELECT `img` FROM `Users` WHERE `id` = '$id';";
        $sqlView = mysqli_query($db->conn,$viewQuery);

        if($sqlView->num_rows>0){?>
            <div class="picture" style="margin-top:-5px;">
                <?php while($row = $sqlView->fetch_assoc()){?>
                    <?php if(is_null($row['img'])){?> <img src="default.png"><?php   }if(!is_null($row['img'])){?><img src="data:image/jpeg;charset=utf8;base64,<?php echo base64_encode($row['img']); ?>"><?php }?>
                    <!-- <img src="data:image/jpeg;charset=utf8;base64,<?php //echo base64_encode($row['img']); ?>"/> -->
                        <?php } ?>
            </div>

        <?php }
        


        ?>
            <!-- <div class="name"><?php //echo $_SESSION['auth_user']['user_name']." ".$_SESSION['auth_user']['user_lastName']  ?></div> -->
            <div class="author-slug" style="margin-top:-5px;">@<?php echo $_SESSION['auth_user']['user_username'] ?></div>
            <!-- <div class="time"> 1 min ago</div> -->
            <input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['auth_user']['user_id'] ; ?>">
        </div>



        <div class="post-text">
            <form method="post">
                
                <textarea id="user_post" name="user_post" class="text" rows="4" cols="45" maxlength="500" placeholder="What's going on you twat?"></textarea>
                
            </form>
        </div>



        <div class="footer-btn">
            
            <button type="submit" class="yeet-btn" name="yeet-btn" id="yeet-btn">Yeet</button>
            
        </div>

        <div id="the-count" class="counter">
                <span id="current">0</span>
                <span id="maximum">/ 500</span>
            </div>

    </div> 
    <?php 
      $sql = "SELECT users.FirstName,users.LastName,users.img,users.Username,posts.* FROM users,posts WHERE users.id = posts.UserId ORDER BY posts.PostTimeStamp DESC;";
      $sql_execute = mysqli_query($db->conn,$sql);
      if(mysqli_num_rows($sql_execute)>0){
        foreach($sql_execute as $users){
          // echo $users['FirstName'];
          ?>
        <div class="big-div" style="
    display: flex;
    flex-direction: column;
    border-bottom: solid;
    width: 900px;
    border-color: rgba(0,0,0,0.08);
    border-width: 1px;
    margin-bottom: 15px;
    ">
        <div class="tweetbox-yas1">
            <div class="header-post1" style="display: flex;justify-content: space-between; margin-top:-10px;">
                <div class="picture1" ><?php if(is_null($users['img'])){?> <img style="width: 18px; height:15px; border-radius:50%;" src="default.png"><?php   }if(!is_null($users['img'])){?><img style="width: 18px; height:15px;border-radius:50%" src="data:image/jpeg;charset=utf8;base64,<?php echo base64_encode($users['img']); ?>"><?php }?>   </div>
                <div style="color: #5b7083; margin-left:-350px;" class="author-slug1">@<?php echo $users['Username'];   ?></div>
                <div style="color: #5b7083;" class="time1"><?php echo $users['PostTimeStamp'];   ?> </div>
            </div>



            <div class="post-text-yas1">
                <?php echo trim($users['PostText']);  ?>
            </div>



            

        </div> 
    </div>   
    <?php 
        }
    }?>
    <!-- <div class="tweetbox-yas">
        <div class="header-post">
            <div class="name">Yasemin De Zoete</div>
            <div class="author-slug">@aysdeZoete</div>
            <div class="time"> 9 hrs ago</div>
        </div>



        <div class="post-text-yas">
            This is a test
        </div>



         <div class="footer-btn">
            
            <button type="submit" class="yeet-btn" name="yeet-btn" id="yeet-btn">Yeet</button>
            
        </div>

        <div id="the-count" class="counter">
                <span id="current">0</span>
                <span id="maximum">/ 500</span>
            </div>

    </div> -->
    <script>
        $('textarea').keyup(function() {
    
        var characterCount = $(this).val().length,
        current = $('#current'),
        maximum = $('#maximum'),
        theCount = $('#the-count');
      
        current.text(characterCount);
   
    
        /*This isn't entirely necessary, just playin around*/
        if (characterCount < 70) {
        current.css('color', '#666');
        }
        if (characterCount > 70 && characterCount < 90) {
        current.css('color', '#6d5555');
        }
        if (characterCount > 90 && characterCount < 100) {
        current.css('color', '#793535');
        }
        if (characterCount > 100 && characterCount < 120) {
        current.css('color', '#841c1c');
        }
        if (characterCount > 120 && characterCount < 139) {
        current.css('color', '#8f0001');
        }
        
        if (characterCount >= 440) {
        maximum.css('color', '#8f0001');
        current.css('color', '#8f0001');
        theCount.css('font-weight','bold');
        } else {
        maximum.css('color','#666');
        theCount.css('font-weight','normal');
        }
        
            
        });
    </script>
    <script src="ajax_request_script.js"></script> 
    <script>
        $("textarea").keydown(function(e){
            if(e.keyCode == 13){
                e.preventDefault();
            }
        })
    </script>
    
    

    
     
    

  </body>
</html>