<?php
//Create a class that has 6 functions. Use multiple arrays to source the information required when creating the new users.
$StartTime = microtime(true); 

class Person {
    public $first = array('Jacob','Bud','Craig','Dave','David','Trevor','Jamie','Steve','Sandra','Mike');
    public $surname = array('Sand','Thomas','Davis','Williams','Copper','Wallace','Nature','Jobs','Barclay','Hunt');
    public $date = array('1993-01-01','1990-01-02','1990-01-03','1990-01-04','1990-01-05','1990-01-06','1990-01-07','1990-01-08','1990-01-09','1990-01-10');
    public $email = array('Jacob@gmail.com','Bud@gmail.com','Craig@gmail.com','Dave@gmail.com','David@gmail.com','Trevor@gmail.com','Jamie@gmail.com','Steve@gmail.com','Sandra@gmail.com','Mike@gmail.com');
    public $age = array(37,21,22,23,24,25,26,27,28,29);
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
        //echo $this->first[0];
        for($i =0;$i<10;$i++){
            // create a new var or curly braces
            $firstName=$this->first[$i];
            $lastName=$this->surname[$i];
            $DoB=$this->date[$i];
            $Email=$this->email[$i];
            $age=$this->age[$i];
            $sql = "INSERT INTO `Person` (`FirstName`, `Surname`, `DateOfBirth`, `EmailAddress`, `Age`) 
            VALUES ('$firstName', '$lastName', '$DoB', '$Email', '$age');";
            
        
            if ($this->conn->query($sql) === TRUE) {
                echo "New record created successfully"."<br>";
        
            }
            else
                echo "Error: " . $sql . "<br>" . $this->conn->error;    
        
                
        }
        

    }
    public function loadAllPeople(){
        $sql = "SELECT * FROM `Person`";
        $output = $this->conn->query($sql);
        while($rows=$output->fetch_assoc()){
            echo 'First name: '.' '.$rows['FirstName'].' '.'Surname: '.' '.$rows['Surname'].' '.'DOB: '.' '.$rows['DateOfBirth'].' '.'Email: '.' '.$rows['EmailAddress'].' '.'Age: '.' '.$rows['Age'].' '."<br>";
        }
    }
    public function close(){
        return $this->conn->close();
    }  
}

$obj = new Person();
//$obj->createPerson();
$obj ->loadAllPeople();

echo 'Execution time in (s): '.(microtime(true)-$StartTime);

