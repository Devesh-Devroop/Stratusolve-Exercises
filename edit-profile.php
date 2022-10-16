<?php
include('app.php');
include('authentication_code.php');
include_once('AuthenticationController.php');
include_once('session.php');
error_reporting(E_ALL ^ E_WARNING);


?>

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<title>Edit Profile</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="tweetbox-test.css">
<link rel="stylesheet" href="fuck.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<body>
    <div class="header-link">
        <div class="title-app-edit">Twatter</div>
        <div class="auth-user"><?php echo stripslashes($_SESSION['auth_user']['user_name'])." ".stripslashes($_SESSION['auth_user']['user_lastName']); ?></div>
        <!-- <img src="profile-logo.svg"> -->
        <!-- <a href="login-form.php" class="logout-btn">Log out</a> -->
        <form action="" method="post">
            <div class="button-div"><button type="submit" name="logout-btn" id="logout-btn" class=" btn btn-danger" style="position: absolute;right:10px;top:9px;">Log out</button></div>
            
        </form>
    </div>

    <div class="sidebar-link">
        <div class="sidebar-item">
            <img src="home-icon.svg"><a href="twatter.php" class="home-icon-anchor"></a>
            <div class="home-desc"><a href="twatter.php" class="home-anchor">Home</a></div>
        </div>

        <div class="sidebar-item-2">
            <img src="profile-logo.svg">
            <div class="edit-desc"><a href="edit-profile.php" class="profile-anchor active">Profile</a></div>
        </div>
    </div>



    
        <!-- Account page navigation-->
        <!-- <nav class="nav nav-borders">
            <a class="nav-link active ms-0" href="https://www.bootdey.com/snippets/view/bs5-edit-profile-account-details" target="__blank">Home</a>
            <a class="nav-link" href="https://www.bootdey.com/snippets/view/bs5-profile-billing-page" target="__blank">Edit Posts</a>
            
        </nav> -->
        <hr class="mt-0 mb-4">
        <div class="row">
        <div class="col-xl-4">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Profile Picture</div>
                    <div class="card-body text-center">
                    <?php 
                        if(isset($_FILES['userfile'])){
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
                            $file_ext = explode('.',$_FILES['userfile']['name']);
                            $file_ext_array = end($file_ext);
                            if(!in_array($file_ext_array,$extensions)){
                                $ext_error = true;
                            }
                
                            if($_FILES['userfile']['error']){
                                echo $phpFileUploadErrors[$_FILES['userfile']['error']];
                            }
                            elseif($ext_error){
                                echo '<script>swal("Image Upload","Invalid extension","warning")</script>';
                                // echo "Invalid file extension";
                            }
                            else{
                                echo '<script>swal("Image Upload","Image uploaded successfully!","success")</script>';
                                $id = $_SESSION['auth_user']['user_id'];
                                $name = $_FILES['userfile']['name'];
                                $imgContent = addslashes(file_get_contents($_FILES['userfile']['tmp_name']));
                                $checkNull = "SELECT * FROM `Users` WHERE `img` IS NULL AND `id` = '$id';";
                                $checkNullExecute = mysqli_query($db->conn,$checkNull);
                                if($checkNullExecute->num_rows>0){
                                    $query = "UPDATE `Users` SET `img` = '$imgContent' WHERE `id` = '$id';";
                                    $sql = mysqli_query($db->conn,$query);
                                }
                                else{
                                    $query = "UPDATE `Users` SET `img` = '$imgContent' WHERE `id` = '$id';";
                                    $sql = mysqli_query($db->conn,$query);
                                }
                                // $query = "INSERT INTO `testimg` VALUES('$imgContent');";
                                // $sql = mysqli_query($db->conn,$query);
                            }

                            move_uploaded_file($_FILES['userfile']['tmp_name'],'Stratusolve-Exercises'.
                            $_FILES['userfile']['name']);
                        }
                        
                                    
                                    

                    ?>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <!-- Profile picture image-->
                        <!-- <img class="img-account-profile rounded-circle mb-2" src="http://bootdey.com/img/Content/avatar/avatar1.png" alt=""> -->
                        <?php
                        $id = $_SESSION['auth_user']['user_id'];
        $viewQuery = "SELECT `img` FROM `Users` WHERE `id` = '$id';";
        $sqlView = mysqli_query($db->conn,$viewQuery);

        if($sqlView->num_rows>0){?>
            <div >
                <?php while($row = $sqlView->fetch_assoc()){?>
                    <img style="width: 150px; height: 150px;" src="data:image/jpeg;charset=utf8;base64,<?php echo base64_encode($row['img']); ?>"/>
                        <?php } ?>
            </div>

        <?php }


        ?>
                        <!-- Profile picture help block-->
                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                        <!-- Profile picture upload button-->
                        <input type="file" name="userfile" id="userfile" class="btn btn-success" style="width: 60%; ">
                        <input class="btn btn-primary" type="submit" value="Upload image">
                    </form>    
                    </div>
                </div>
            </div>
            
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4" style="width: 80%; margin-left:-10px;">
                    <div class="card-header">Account Details</div>
                    <div class="card-body">
                        <form>
                            <!-- Form Group (username)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputUsername">Username (how your name will appear to other users on the site)</label>
                                <input class="form-control" id="inputUsername" type="text" placeholder="Enter your username" value= "<?php echo $_SESSION['auth_user']['user_username'] ;?>">
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (first name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputFirstName">First name</label>
                                    <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" value="<?php echo stripslashes($_SESSION['auth_user']['user_name']) ;?>">
                                </div>
                                <!-- Form Group (last name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLastName">Last name</label>
                                    <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" value="<?php echo stripslashes($_SESSION['auth_user']['user_lastName']) ;?>">
                                </div>
                            </div>
                            <!-- Form Row        -->
                            
                            <!-- Form Group (email address)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address" value=<?php echo $_SESSION['auth_user']['user_email'] ;?>>
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (phone number)-->
                                <div class="col-md-6">
                                    <input type="hidden" class="id" name="id" id="id" value=<?php echo $_SESSION['auth_user']['user_id'] ;?>>
                                    <label hidden class="small mb-1" for="inputPassword">Password</label>
                                    <input class="form-control" id="inputPassword" type="hidden" placeholder="Enter your password" value="<?php echo $_SESSION['auth_user']['user_password'] ;?>">
                                </div>
                                <!-- Form Group (birthday)-->
                                
                            </div>
                            <!-- Save changes button-->
                            <button class="btn btn-primary" type="submit" id="save-changes" name="save-changes">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="ajax_request_script.js"></script>
</body>
</html>    