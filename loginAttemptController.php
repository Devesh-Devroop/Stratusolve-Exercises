<?php 
include_once('session.php');
// include_once('LoginController.php');
// include('app.php');
// include('waitPage.php');

// Max login == 5 after that they must reset password.


class loginAttemptController{
    // public $time = time();
    // public $wait = ($time + (60*1));
    public function __construct()
    {
        $conn = new mysqli('localhost','root','root','twitter');
        
        if($conn->connect_error){
            
            die();
        }
        // else{
        //     echo "Database connected";
        // }
        return $this->conn = $conn;
        
    }

    public function loginAttempt($username){
        $time = time();
        $wait = ($time + (60*1));
        $waitMore = ($time + (60*5));

        $query = "SELECT login_attempt.*,users.Username FROM login_attempt,users WHERE login_attempt.Username = ?; ";
        $result = $this->conn->prepare($query);
        $result->bind_param('s',$username);
        $result->execute();
        // $fetchAssoc = $result->fetch_all($result,MYSQLI_ASSOC);
        $result->store_result();
        // $result->get_result();
        // $fetchAssoc = $result->get_result()->fetch_assoc();
        // $fetchAssoc = $result->get_result()->fetch_assoc();
        $numRows = $result->num_rows;
        if($numRows == 0){
            
            // $result->store_result();
            // $usernameInput = mysqli_real_escape_string($this->conn,$_POST['username']);
            $loginCount = 1;
            $waitTime = 0;
            $queryInsert = "INSERT INTO `login_attempt` VALUES(?,?,?); "; // Insert login attempt for user if their record doesn't exist.
            $prepInsert = $this->conn->prepare($queryInsert);
            $prepInsert->bind_param('sii',$username,$loginCount,$waitTime);
            $prepInsert->execute();
            redirect("Invalid credentials","Login-form.php");

            // $prepInsert->store_result();
            // mysqli_close($this->conn);
            // $prepInsert->store_result();
            // $CheckTable = "SELECT login_attempt.*,users.Username FROM login_attempt,users WHERE login_attempt.Username = ?; ";
            // $resultCheck = $this->conn->prepare($CheckTable);
            // $resultCheck->bind_param('s',$username);
            // $resultCheck->execute();
           
        }
        else{
            $resultAssoc = $this->getAssoc($username);
            // $this->waitingComplete($username);
            
            // $fetchAssoc = $result->get_result()->fetch_assoc();$fetchAssoc['login_count']
            // $fetchAssoc = $result->get_result()->fetch_assoc();
            
            if( $resultAssoc['login_count']==2){
                // $_SESSION['timeWaited'] = true;
                // $wait = ($time + (60*1));
                $sqlWait = "UPDATE `login_attempt` SET `login_count` = `login_count` + 1, `wait_time` = ? WHERE `Username` = ?;";
                $resultWait = $this->conn->prepare($sqlWait);
                $resultWait->bind_param('is',$wait,$username);
                $resultWait->execute();
                $_SESSION['timer'] = $resultAssoc['wait_time'];
                redirect("Invalid credentials entered 3 times.","Login-form.php");
                
                // if($wait > $time){
                    
                //     // redirect("You need to wait","Login-form.php");
                //     // die();
            }  
            elseif($resultAssoc['login_count']>2 && $resultAssoc['login_count'] < 4 ){            
                // }
                // else{
                    $_SESSION['timer'] = $resultAssoc['wait_time'];
                    $sqlWait = "UPDATE `login_attempt` SET `login_count` = `login_count` + 1, `wait_time` = 0 WHERE `Username` = ?;";
                    $resultWait = $this->conn->prepare($sqlWait);
                    $resultWait->bind_param('s',$username);
                    $resultWait->execute();
                    // $delete = "DELETE FROM `login_attempt` WHERE `Username` = ?;";
                    // $resultDelete = $this->conn->prepare($delete);
                    // $resultDelete->bind_param('s',$username);
                    // $resultDelete->execute();
                    redirect("If you can't remember your password...RESET IT!","Login-form.php");
                    
                // }


            } 
            elseif($resultAssoc['login_count']==4){
                
                $sqlWait5 = "UPDATE `login_attempt` SET `login_count` = `login_count` + 1, `wait_time` = ? WHERE `Username` = ?;";
                $resultWait5 = $this->conn->prepare($sqlWait5);
                $resultWait5->bind_param('is',$waitMore,$username);
                $resultWait5->execute();
                $_SESSION['timer'] = $resultAssoc['wait_time'];
                redirect("Invalid credentials entered 5 times.","Login-form.php");
            } 
                    
                        
                    
            elseif($resultAssoc['login_count']>4){            
                // }
                // else{
                    $_SESSION['timer'] = $resultAssoc['wait_time'];
                    $delete = "DELETE FROM `login_attempt` WHERE `Username` = ?;";
                    $resultDelete = $this->conn->prepare($delete);
                    $resultDelete->bind_param('s',$username);
                    $resultDelete->execute();
                    redirect("You may try Login again after 5 min","Login-form.php");
                // }


            }
            else{
            $sql = "UPDATE `login_attempt` SET `login_count` = `login_count` + 1 WHERE `Username` = ?;";
            // $queryUpdate .= 'SET `login_count` = `login_count` + 1 ';
            // $queryUpdate .= ',`wait_time` = 0 '; 
            // $queryUpdate .= 'WHERE `Username` = ?';
            
            $resultUpdate = $this->conn->prepare($sql);
            $resultUpdate->bind_param('s',$username);
            $resultUpdate->execute();
            redirect("Invalid credentials","Login-form.php");
            }

            
        }
    }

    public function getAssoc($username){
        $queryAssoc = "SELECT login_attempt.*,users.Username FROM login_attempt,users WHERE login_attempt.Username = ?; ";
        $resultAssoc = $this->conn->prepare($queryAssoc);
        $resultAssoc->bind_param('s',$username);
        $resultAssoc->execute();
        return $resultAssoc->get_result()->fetch_assoc();
    }

    public function deleteLoginAttempt($username){
        $delete = "DELETE FROM `login_attempt` WHERE `Username` = ?;";
        $resultDelete = $this->conn->prepare($delete);
        $resultDelete->bind_param('s',$username);
        $resultDelete->execute();

    }

    
}


// $obj = new loginAttemptController;
// $obj->loginAttempt();