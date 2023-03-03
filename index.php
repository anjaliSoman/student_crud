<?php 
require 'connection.php';
?>
<!-- Inserting data into the database -->
<?php
    if(isset($_POST['stud_id'])&&isset($_POST['stud_name'])&&isset($_POST['course']))
    {
        $stud_id=$_POST['stud_id'];
        $stud_name=$_POST['stud_name'];
        $course=$_POST['course'];

        //check if data already exists-student-id
        $sql='SELECT * FROM student_data WHERE stud_id=:stud_id LIMIT 1';
        $statement=$connection->prepare($sql);
        $statement->execute([':stud_id'=>$stud_id]);
        $sql_execute=$statement->fetch(PDO::FETCH_ASSOC);

        if($sql_execute)
        {
            echo"<script>alert('Student id already exists!')</script>";
        }
        else{
            //preparing and executing the query
        $sql='INSERT INTO student_data(stud_id,stud_name,course)VALUES(:stud_id,:stud_name,:course)';
        $statement=$connection->prepare($sql);
        $query_execute=$statement->execute([':stud_id'=>$stud_id,':stud_name'=>$stud_name,':course'=>$course]);
        if($query_execute)
        {
            echo"<script>alert('Registration Successful :)')</script>";
            // echo "success";
        }
        else{
            echo"<script>alert('Registration Unuccessful :(')</script>";
        }
        }
        
    }
    //displaying data from db
    $sql='SELECT * FROM student_data';
    $statement=$connection->prepare($sql);
    $statement->execute();
    $students=$statement->fetchAll(PDO::FETCH_OBJ);
?>

<?php
require 'header.php';
?>
<!-- UI - Registration Form-->
<div class="container col-sm-5 mt-5 pt-5">
    <div class="mb-5">
    <h2 class="text-warning">Student Registration</h2>
    <p><span class="text-danger">*</span> denotes mandatory</p>
    </div>
    <form action="" method="POST" onsubmit="return validate()">
        <div class="mb-3">
            <input type="text" placeholder="*Student id" class="form-control border border-2 border-warning" id="stud_id" name="stud_id">
        </div>
        <div class="mb-3">
            <input type="text" placeholder="*Name" class="form-control border border-2 border-warning" id="stud_name" name="stud_name">
        </div>
        <div class="mb-3">
            <input type="text" placeholder="*Course" class="form-control border border-2 border-warning" id="course" name="course">
        </div>
        <div class="mb-3">
            <input type="submit" value="Register" class="btn btn-warning text-white">
        </div>

    </form>
</div>
<!-- Table for receiving the data from db -->
<div class="container col-sm-6 mt-5">
    <table class="table">
    <thead>
        <tr>
            <th>Student ID</th>
            <th>Name</th>
            <th>Course</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
        <!-- looping the data -->
        <?php foreach($students as $stud): ?>
            <tr>
                <td><?= $stud->stud_id;?></td>
                <td><?=$stud->stud_name;?></td>
                <td><?= $stud->course;?></td>
                <td><a href="edit.php?id=<?=$stud->id;?>" class="btn btn-outline-primary">Edit</a></td>
                <td><a href="delete.php?id=<?=$stud->id;?>" class="btn btn-outline-danger">Delete</a></td>
            </tr>
        <?php endforeach ?>
    </tbody>
    </table>
</div>

<?php
require 'footer.php';
?>