<?php require 'connection.php';
?>

<?php require 'header.php';
?>
<!-- Deleting the value from db using id -->
<?php
    //getting the id
    $id=$_GET['id'];
    $sql='DELETE FROM student_data WHERE id=:id';
    $statement=$connection->prepare($sql);
    $query=$statement->execute([':id'=>$id]);
    if($query)
    {
        echo "<script>alert('Deleted Successfully!');document.location='index.php'</script>";
    }
    else{
        echo"<script>alert('Deletion UnSuccess!')</script>";
    }
?>
<?php require 'footer.php' ?>