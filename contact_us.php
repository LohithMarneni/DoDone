<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
        <div class="container-fluid">
          <a class="navbar-brand" href="/php projects/dodone project/"><img src="/php projects/dodone project/dodone_logo.ico" alt="logo" width="30rem">doDone</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent" >
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link " aria-current="page" href="/php projects/dodone project/">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/php projects/dodone project/about.php">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="/php projects/dodone project/contact_us.php">Contact Us</a>
              </li>
            </ul>
            <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
          </div>
        </div>
      </nav>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
  $name=$_POST['name'];
  $email=$_POST['email'];
  $concern=$_POST['concern'];
$servername="localhost";
$username="root";
$password="";
$database="dodone";
$conn=mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    die("sorry we failed to connect because of ".mysqli_connect_error());
}
else{
  //submit into database
    $sql="insert into `contactus`(`name`,`email`,`concern`)
values ('$name','$email','$concern');";
$result=mysqli_query($conn,$sql);
if($result){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!! </strong>your entry has been submitted successfully!!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
else{
    // echo "details not entered in database table ----->".mysqli_error($conn);
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!! </strong> We are facing some technical issue, form was not submitted. Sorry for inconvenience!!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
}
}
 ?>
<div class="container my-4" >
<form action="contact_us.php" method="post">
  <div class="mb-3">
    <h3>Contact us</h3>
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" aria-describedby="name" name="name">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
    <div id="email" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Description</label>
    <textarea name="concern" id="concern" class="form-control" cols="30" rows="5"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<hr>
<footer class="text-white text-center text-lg-start bg-dark">
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2024 Copyright:
      <a class="text-white" href="https://mdbootstrap.com/" style="text-decoration: none !important;">doDone.com</a>
    </div>
</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>