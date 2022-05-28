<?php
require_once 'includes/auth_check.php';
require_once 'db/conn.php';


// id of attendee to be deleted from url $_GET
if(!isset($_GET['id'])){
    include "includes/errormessage.php";
}
else{
    $id = $_GET['id'];
    $result = $crud->deleteAttendee($id);
    if($result){
        header("Location:viewrecords.php");
    }
    else{
        echo 'error';
    }
}




?>