<?php
        $title = "View Attendee Detail";
        require_once 'includes/header.php';
        require_once 'db/conn.php';
        // get attendee detail by id
        if(!isset($_GET['id'])){
            include "includes/errormessage.php";
            
        }
        else{
            $id = $_GET['id'];
            $result = $crud->getAttendeesDetails($id); 
       
        
?>
<br>

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">
        <?php echo $result['firstname']."  ".$result['lastname']; ?>
    </h5>
    <h6 class="card-subtitle mb-2 text-muted"><?php echo $result['name']; ?></h6>
    <p class="card-text">
        Email :  <?php echo " ".$result['email']; ?>
    </p>
    <p class="card-text">
        Date of Birth :  <?php echo " ".$result['dateofbirth']; ?>
    </p>
    <p class="card-text">
        Phone :  <?php echo " ".$result['phone']; ?>
    </p>
    
  </div>
</div>
<?php
}
?>

<br>
    <?php
        require_once 'includes/footer.php';
?>