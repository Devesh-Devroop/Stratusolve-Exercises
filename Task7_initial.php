<?php
//Create a class that has 6 functions. Use multiple arrays to source the information required when creating the new users.
$obj = new Person();
if(isset($_POST['update_user'])){
    echo "Update user variable has something";
    $obj->updatePerson();
    header("Location: index.php");
    exit;
}
elseif(isset($_POST['create_var'])){
    echo "Create variable has something";
    $obj->createPerson();
    header("Location: index.php");
    exit;
}
elseif(isset($_POST['delete_var'])){
    echo "elete variable has something";
    $obj->delete();
    header("Location: index.php");
    exit;
}
// if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['create_var'])){
//     $obj->createPerson();
//     header("Location: index.php");
//     exit;
// }
// elseif($_SERVER["REQUEST_METHOD"]=="POST" && !isset($_POST['name'])){
//     $obj->delete();
//     header("Location: index.php");
//     exit;
// }
// elseif($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['update_person'])){
//     $obj->updatePerson();
//     header("Location: index.php");
//     exit;
// }

class Person {

    public $sql;
    public $conn;
    //$this->conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
    public function __construct($servername = "localhost",$username = "root",$password = "root",$dbname = "Task6"){
        $this->conn = new mysqli($servername,$username,$password,$dbname);
        if ($this->conn->connect_error){
            die("Connection failed: " . $this->conn->connect_error);
        }
        // else
        //     echo "We almost there";


    }

   
 

    public function createPerson(){
        if ($_SERVER["REQUEST_METHOD"] == "POST"){

            $firstName=$_POST['name'];

            $lastName=$_POST['surname'];

            $rawdate = $_POST['Date'];

            $Email=$_POST['email'];

            $age=$_POST['age'];

            $sql = "INSERT INTO `Person` (`FirstName`, `Surname`, `DateOfBirth`, `EmailAddress`, `Age`) 
            VALUES ('$firstName', '$lastName', '$rawdate', '$Email', '$age');";
                
            
            if ($this->conn->query($sql) === TRUE) {
                echo "New record created successfully"."<br>";
            
            }
            else
                echo "There is an Error: " . $sql . "<br>" . $this->conn->error;  
        }
         
        

    }
    public function loadAllPeople(){
        // $connection=$object->conn;
        // $query = "SELECT * FROM `Person`";
        // $query_run = mysqli_query($connection,$query);
        $sql = "SELECT * FROM `Person`";
        $output = $this->conn->query($sql);
        // while($rows=$output->fetch_assoc()){
            

        //     // $rows['FirstName'];
        //     // $rows['Surname'];
        //     // $rows['DateOfBirth'];
        //     // $rows['EmailAddress'];
        //     // $rows['Age'];
            
        //     echo 'First name: '.' '.$rows['FirstName'].' '
        //     .'Surname: '.' '.$rows['Surname'].' '.'DOB: '.' '
        //     .$rows['DateOfBirth'].' '.'Email: '.' '
        //     .$rows['EmailAddress'].' '.'Age: '.' '.$rows['Age'].' '."<br>";
        // }
    }
    public function delete(){
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $email = $_POST['email'];
            $sql = "DELETE FROM `Person` WHERE EmailAddress = '$email';";
            if($this->conn->query($sql)){
                echo "Record Deleted successfully";
            }
            else
                echo "Could not delete record";

            
        }


    }
    public function updatePerson(){
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $id = $_POST['id'];

            $firstName=$_POST['name'];

            $lastName=$_POST['surname'];

            $rawdate = $_POST['Date'];

            $Email=$_POST['email'];

            $age=$_POST['age'];

            $sql = "UPDATE `Person` SET `FirstName`='$firstName',`Surname`='$lastName',`DateOfBirth`='$rawdate',`EmailAddress`='$Email',`Age`='$age' WHERE id=$id;";
            if($this->conn->query($sql)){
                echo "Record updated successfully";
            }
            else
                echo "Could not update data";
        }

            
        //UPDATE `Person` SET `FirstName`='[value-1]',`Surname`='[value-2]',`DateOfBirth`='[value-3]',`EmailAddress`='[value-4]',`Age`='[value-5]' WHERE FirstName='';
    }
    public function edit(){
        $person_id = $_GET['id'];
        //echo"$person_id";

        $sql = "SELECT * FROM `Person` WHERE id='$person_id' LIMIT 1;";
        $output = $this->conn->query($sql);
        if($output->num_rows == 1){
            $data = $output->fetch_assoc();
            echo json_encode($data);
            $data_encoded = json_encode($data);
            
            return $data;

        }
        else
            return false;


    }
    public function close(){
        return $this->conn->close();
    }  
}


// elseif($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['delete'])){
//     $obj->delete();
//     header("Location: index.php");
//     exit;

//  }
// else
//     return 0;
 
//$obj->createPerson();
//$obj->updatePerson();



