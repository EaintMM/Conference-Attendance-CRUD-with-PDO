<?php
  include_once 'session.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link href="css/site.css" rel="stylesheet">
    <title>Attendance - <?php echo $title ?></title>
  </head>
  <body>
      <div class="container">

      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php">IT Conference</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="viewrecords.php">View Attendee</a>
              </li>
              
            </ul>
            <ul class="navbar-nav ms-auto">
              

              <?php
              //session_start();
                if(isset($_SESSION['userid'])){
                 
              ?>
              <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">
              <span class='text-primary'> Hello <?php echo $_SESSION['username']; ?> </span>
              </a>
              
                </li>
               <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="logout.php">Logout</a>
                
              </li>
              <?php 
                }
                else{
                  
              ?>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="login.php">Login</a>
              </li>
              <?php
                }
              ?>
              
            </ul>
          </div>

          
        </div>
      </nav>
      <br>