    <?php
        $title = "Home";
        require_once 'includes/header.php';
        require_once 'db/conn.php';

        $result = $crud->getExpertise();
    ?>
    <h1 class="text-center">Registeration for IT Conference</h1>
    <!--
        form attributes
        -first name
        -last name
        -date of birth
        -email
        -expertise
        -phone
    -->
    <form method="post" action="success.php">
        <div class="mb-3">
            <label for="firstName" class="form-label">First Name</label>
            <input required type="text" class="form-control" id="firstName" name="firstName" >
        </div>
        <div class="mb-3">
            <label for="lastName" class="form-label">Last Name</label>
            <input required type="text" class="form-control" id="lastName" name="lastName" >
        </div>
        <div class="mb-3">
            <label for="dob" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" id="dob" name="dob">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input required type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <!-- drop down box-->
        <div class="mb-3">
            <label for="expertise" class="form-label">Area of Expertise</label>
            <select class="form-select" id="expertise" name="expertise" aria-label="Default select example">
            <?php while($row = $result->fetch(PDO::FETCH_ASSOC)){ ?>
                <option value="<?php echo $row['expertise_id'] ?>" > <?php echo $row['name'] ?> </option>
            <?php
            } ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Contact Number</label>
            <input required type="text" class="form-control" id="phone" name="phone" >
            <div id="phoneHelp" class="form-text">We'll never share your number with anyone else.</div>
        </div>
        <div class="d-grid gap-2">
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

    <br>
    <?php
        require_once 'includes/footer.php';
    ?>
