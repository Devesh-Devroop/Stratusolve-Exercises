<?php
    require 'Task7_initial.php';
    // require 'index.php';
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
    <title>Hello, world!</title>
  </head>
  <body>


    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Update Person
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>

                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if(isset($_GET['id'])){
                            $person_id = $_GET['id'];
                            $objectPerson = new Person;
                            $result = $objectPerson->edit();
                            
                            // $test = $result->id;
                            // $encode = json_encode($result);
                            // $id_encode = $encode->id; // returns array with information
                            if($result){
                                ?>
                                <form id="editForm" action="index.php" method="POST">
                                    <div class="mb-3">
                                        <label>ID</label> 
                                        <input type="hidden" id="id" name="id" value="<?php echo array_values($result)[0];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>First Name</label> 
                                        <input type="text" id="name" name="name" value="<?php echo array_values($result)[1];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Last Name</label> 
                                        <input type="text" id="surname" name="surname" value="<?php echo array_values($result)[2];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Date of Birth</label> 
                                        <input type="date" id="date" name="date" value="<?php echo array_values($result)[3];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Email</label> 
                                        <input type="email" id="email" name="email" value="<?php echo array_values($result)[4];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Age</label> 
                                        <input type="number" id="age" name="age" value="<?php echo array_values($result)[5];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" id="update_person" name="update_person" class="updatebutton btn btn-primary">Update Person</button>
                                    </div>
                                
                            
                                </form>

                                
                            <?php

                                }
                                else{
                                    echo "<h4>No record found</h4>";
                                }

                            }
                            else{
                                echo"<h4>Nothing bro</h4>";
                            }

                            ?>
                         
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

<!-- <script>
    alert('Hello World');

</script> -->

<!-- <script>

    document.getElementById("age").value = 1;
</script> -->