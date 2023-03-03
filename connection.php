<?php
    //setting up the db connection
    $dsn="mysql:host=localhost;dbname=student_crud";
    $user="root";
    $password="";
    $options=[];
    try{
        $connection=new PDO($dsn,$user,$password,$options);
        // echo "Connection Success";
    }
    catch(PDOException)
    {
        echo "connection error";
    }
?>