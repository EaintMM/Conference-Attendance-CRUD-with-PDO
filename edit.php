<?php
        $title = "Edit";
        require_once 'includes/header.php';
        require_once 'includes/auth_check.php';
        require_once 'db/conn.php';

        $result = $crud->getExpertise();
        if(!isset($_GET['id']))
        {
            include "includes/errormessage.php";
            header("Location:viewrecords.php");
        }
        else{
            $id = $_GET['id'];
            $attendee = $crud->getAttendeesDetails($id); 
    ?>

    <h1 class="text-center">Edit Record</h1>
   
    <form method="post" action="editpost.php">
        <!-- for id -->
        <input type="hidden" name='id' value= "<?php echo $attendee['attendee_id'] ?>"  >
        <div class="mb-3">
            <label for="firstName" class="form-label">First Name</label>
            <input type="text" class="form-control" id="firstName" value= "<?php echo $attendee['firstname'] ?>" name="firstName" >
        </div>
        <div class="mb-3">
            <label for="lastName" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lastName" value= "<?php echo $attendee['lastname'] ?>" name="lastName" >
        </div>
        <div class="mb-3">
            <label for="dob" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" id="dob" value= "<?php echo $attendee['dateofbirth'] ?>" name="dob">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" value= "<?php echo $attendee['email'] ?>" name="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <!-- drop down box-->
        <div class="mb-3">
            <label for="expertise" class="form-label">Area of Expertise</label>
            <select class="form-select" id="expertise" name="expertise" aria-label="Default select example">
            <?php while($row = $result->fetch(PDO::FETCH_ASSOC)){ ?>
                <option value="<?php echo $row['expertise_id'] ?>"  <?php
                    // checking the chosen expertise-id is the same as id from drop down to get selected
                    if($row['expertise_id']== $attendee['expertise_id']){
                        echo 'selected';
                    }
                    ?> >
                
                <?php echo $row['name'] ?> 
                   
                </option>
            <?php
            } ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Contact Number</label>
            <input type="text" class="form-control" id="phone" value= "<?php echo $attendee['phone'] ?>" name="phone" >
            <div id="phoneHelp" class="form-text">We'll never share your number with anyone else.</div>
        </div>
        <div class="d-grid gap-2">
        <button type="submit" name="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
<?php
    }
?>
    <br>
    <?php
        require_once 'includes/footer.php';
    ?>