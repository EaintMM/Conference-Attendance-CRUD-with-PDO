<?php
    require_once 'db/conn.php';

    if(isset($_POST['submit'])){
        // get values from post operation
        $id = $_POST['id'];
        $fname = $_POST['firstName'];
        $lname = $_POST['lastName'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $expertise = $_POST['expertise'];

        // call crud function
        $result = $crud->editAttendee($id,$fname,$lname,$dob,$email,$phone,$expertise);

        // redirect to index.php
        if($result){
           // echo 'hi';
           header("Location:index.php");
           
        }
        else{
            include "includes/errormessage.php";
            header("Location:viewrecords.php");
        }

   
    }
    else{
        include "includes/errormessage.php";
    }
   
?>