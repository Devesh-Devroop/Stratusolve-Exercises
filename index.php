<?php
    require 'Task7_initial.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <title>Index</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Person Details
                            <a href="createForm.html" class="btn btn-primary float-end">Add Person</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>First Name</th>
                                    <th>Surname</th>
                                    <th>Date of Birth</th>
                                    <th>Email</th>
                                    <th>Age</th>
                                    <th>Edit/Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $object = new Person();
                                    //$object->loadAllPeople();
                                    // $sql = "SELECT * FROM `Person`";
                                    // $output = $this->conn->query($sql);
                                    
                                    $connection=$object->conn;
                                    $query = "SELECT * FROM `Person`";
                                    $query_run = mysqli_query($connection,$query);
                                    if(mysqli_num_rows($query_run)>0){
                                        foreach($query_run as $rows){

                                            ?>
                                            <tr>
                                                <td><?= $rows['id']; ?></td>
                                                <td><?= $rows['FirstName']; ?></td>
                                                <td><?= $rows['Surname']; ?></td>
                                                <td><?= $rows['DateOfBirth']; ?></td>
                                                <td><?= $rows['EmailAddress']; ?></td>
                                                <td><?= $rows['Age']; ?></td>
                                                <td>
                                                    <form id="DeleteForm"action="index.php">
                                                        <a href="edit.php?id=<?= $rows['id'];?>" class="btn btn-success btn-sm">Edit</a>
                                                        
                                                        <button type="submit" id="delete" name="delete" value="<?= $rows['EmailAddress'];?>" class="deletebutton btn btn-danger btn-sm">Delete</button>
                                                
                                                
                                                    </form>
                                                    
                                                    <!-- *///<button type="submit" id="edit" name="edit" value="" class="btn btn-success btn-sm">Edit</button>
                                                    <a href="" class="btn btn-danger btn-sm">Delete</a> -->
                                                </td>

                                            </tr>
                                            <?php
                                        }
                                    }
                                    // else{
                                    //     "<h5>No record</h5>";
                                    // }
                                    ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="ajax_practice.js"></script>
 
  </body>
</html>

