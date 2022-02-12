<?php
        $title = "Success";
        require_once 'includes/header.php';
        require_once 'db/conn.php';

        // checking form submitted
        if(isset($_POST['submit'])){
            // extract values from the $_POST array
            $fname = $_POST['firstName'];
            $lname = $_POST['lastName'];
            $dob = $_POST['dob'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $expertise = $_POST['expertise'];
            // call insert function from crud to insert data to database
            $isSuccess = $crud->insertAttendee($fname,$lname,$dob,$email,$phone,$expertise);
            //
            if($isSuccess){
                include "includes/successmessage.php";
            }
            else{
                include "includes/errormessage.php";
            }
        }
?>



<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">
        <?php echo $_POST['firstName']."  ".$_POST['lastName']; ?>
    </h5>
    <h6 class="card-subtitle mb-2 text-muted"><?php echo $_POST['expertise']; ?></h6>
    <p class="card-text">
        Email :  <?php echo " ".$_POST['email']; ?>
    </p>
    <p class="card-text">
        Date of Birth :  <?php echo " ".$_POST['dob']; ?>
    </p>
    <p class="card-text">
        Phone :  <?php echo " ".$_POST['phone']; ?>
    </p>
    
  </div>
</div>

    
 
    
<br>
<br>
<?php
    require_once 'includes/footer.php';
?>