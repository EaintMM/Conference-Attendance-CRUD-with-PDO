<?php
    $title = 'User Login';

    require_once 'includes/header.php';
    require_once 'db/conn.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = strtolower(trim($_POST['username']));
        $password = $_POST['password'];
        $new_password = md5($password . $username);

        $result = $user->getUser($username,$new_password);
        if(!$result){
            echo '<div class="alert-danger" > Username or Password is incorrect! Please try again. </div>';
          
            
        }
        else{
            //session_start();
            $_SESSION['username'] = $username;
            $_SESSION['userid'] = strval($result['id']) ;
            header("Location:viewrecords.php");
            
        }
    }
?>
<h1 class="text-center">Registeration for IT Conference</h1>
   
    <form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
        <div class="mb-3">
            <label for="username" class="form-label">User Name</label>
            <input required type="text" class="form-control" id="username" name="username" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['username']; ?>" >
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input required type="password" class="form-control" id="password" name="password" >
        </div>

        <div class="d-grid gap-2">
        <button type="submit" name="Login" value='Login' class="btn btn-primary">Submit</button>
        </div>
    </form>

    <br>
    <?php
        require_once 'includes/footer.php';
    ?>
