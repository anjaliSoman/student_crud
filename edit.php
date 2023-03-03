<?php
require 'connection.php';
?>
<?php
require 'header.php';
?>

<!-- Getting the details using id -->
<?php
    $id=$_GET['id'];
    $sql='SELECT * FROM student_data WHERE id=:id';
    $statement=$connection->prepare($sql);
    $statement->execute([':id'=>$id]);
    $student=$statement->fetch(PDO::FETCH_OBJ);
?>
<!-- Updating the values -->
<?php
if(isset($_POST['stud_id'])&&isset($_POST['stud_name'])&&isset($_POST['course']))
{
    $stud_id=$_POST['stud_id'];
    $stud_name=$_POST['stud_name'];
    $course=$_POST['course'];

    //query for updation
    $sql='UPDATE student_data SET stud_id=:stud_id, stud_name=:stud_name, course=:course WHERE id=:id';
    $statement=$connection->prepare($sql);
    $query_execute=$statement->execute([':stud_id'=>$stud_id,':stud_name'=>$stud_name,':course'=>$course,':id'=>$id]);
    if($query_execute)
    {
        echo "<script>alert('Updated Successfully!');document.location='index.php'</script>";
    }
    else{
        echo"<script>alert(''Updation UnSuccess!)</script>";
    }
}
?>

<div class="container col-sm-5 mt-5 pt-5">
    <div class="mb-5">
    <h2 class="text-success">Student Details Updation</h2>
    </div>
    <form action="" method="POST" onsubmit="return validate()">
        <div class="mb-3">
            <input type="text"  class="form-control border border-2 border-success" id="stud_id" name="stud_id" value="<?=$student->stud_id;?>">
        </div>
        <div class="mb-3">
            <input type="text"  class="form-control border border-2 border-success" id="stud_name" name="stud_name" value="<?=$student->stud_name;?>">
        </div>
        <div class="mb-3">
            <input type="text"  class="form-control border border-2 border-success" id="course" name="course" value="<?=$student->course;?>">
        </div>
        <div class="mb-3">
            <input type="submit" value="Update" class="btn btn-success text-white">
        </div>

    </form>
</div>
<?php require 'footer.php';
?>