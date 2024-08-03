<?php
  $insert=false;
  $delete=false;
  $update=false;
       $servername="localhost";
       $username="root";
       $password="";
       $database="dodone";
       $conn=mysqli_connect($servername,$username,$password,$database);
       if(!$conn){
           die("sorry we failed to connect because of ".mysqli_connect_error()."<br>");
       }
       if($_SERVER["REQUEST_METHOD"]=="POST"){
         if(isset($_POST["delete"])){
          $sno=$_POST["delete"];
          $sql="DELETE FROM `task` WHERE `sno` = '$sno';";
          $result=mysqli_query($conn,$sql);
          if($result){
            $delete=true;
          }
          else{
            echo "We could not delete the task successfully".mysqli_error($conn)."<br>";
          }
         }
        elseif(isset($_POST["snoedit"])){
            //update task
            // echo "yes";
            $title=$_POST['titleedit'];
            $description=$_POST['descriptionedit'];
            $sno=$_POST['snoedit'];
            $sql="UPDATE `task` SET `title` = '$title',`description`='$description' WHERE `task`.`sno` = '$sno';";
            $result=mysqli_query($conn,$sql);
            if($result){
              $update=true;
            }
            else{
              echo "We could not update the task successfully".mysqli_error($conn)."<br>";
            }
        }
        else{
          $title=$_POST['title'];
            $description=$_POST['description'];
            $sql="insert into `task`(`title`,`description`)
            values ('$title','$description');";
            $result=mysqli_query($conn,$sql);
            if($result){
              // echo "details entered successfully!!";
              $insert=true;
            }
            else{
              echo "details not entered in databse table ".mysqli_error($conn)."<br>";
            }
        }
       }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>doDone-Simplify Your Tasks</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css">
  </head>
  <body>
    <!-- Edit modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editmodal">
  Edit Modal
</button> -->

<!-- Edit Modal -->
<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="editmodalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editmodalLabel">Edit Task</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/php projects/dodone project/index.php" method="post">
      <div class="modal-body">
        <input type="hidden" name="snoedit" id="snoedit">
            <div class="mb-3">
                <h2>Add a Note</h2>
              <label for="titleedit" class="form-label">Note Title</label>
              <input type="text" class="form-control" id="titleedit" aria-describedby="titleedit" name="titleedit">
            </div>
            <div class="mb-3">
                <label for="descriptionedit" class="form-label">Note Description</label>
                <textarea class="form-control" id="descriptionedit" name="descriptionedit" rows="3"></textarea>
              </div>
          </div>
          <div class="modal-footer d-block mr-auto">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
    </div>
  </div>
</div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
        <div class="container-fluid">
          <a class="navbar-brand" href="/php projects/dodone project/"><img src="/php projects/dodone project/dodone_logo.ico" alt="logo" width="30rem">doDone</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/php projects/dodone project/">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/php projects/dodone project/about.php">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/php projects/dodone project/contact_us.php">Contact Us</a>
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
      if($insert){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!! </strong> Your task has been added successfully!!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      }
      ?>
      <?php
      if($delete){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!! </strong> Your task has been deleted successfully!!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      }
      ?>
      <?php
      if($update){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!! </strong> Your task has been updated successfully!!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      }
      ?>
      <div class="container my-4">
        <form action="/php projects/dodone project/index.php" method="post">
            <div class="mb-3">
                <h2>Add a Task to doDone</h2>
              <label for="title" class="form-label">Task Title</label>
              <input type="text" class="form-control" id="title" aria-describedby="title" name="title">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Task Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
              </div>
            <button type="submit" class="btn btn-primary">Add Task</button>
          </form>
      </div>
      <div class="container my-4">
    <table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col">S.no</th>
      <th scope="col">Task Title</th>
      <th scope="col">Task Description</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php 
    $sql="SELECT * FROM `task`";
    $result=mysqli_query($conn,$sql);
    $sno=0;
    while($row=mysqli_fetch_assoc($result)){
      $sno+=1;
      echo " <tr>
      <th scope='row'>".$sno."</th>
      <td>".$row["title"]."</td>
      <td>".$row["description"]."</td>
      <td><div class='btn-group' role='group' aria-label='Basic example'>
      <button class='edit btn btn-sm btn-primary rounded-start rounded-end' id='".$row["sno"]."'>Edit</button> <span style='margin: 0 3px;'></span><button class='delete btn btn-sm btn-primary rounded-start rounded-end' id='del".$row["sno"]."'>Delete</button>
    </div></td>
    </tr>";
     }
    ?>
     
  </tbody>
</table>
      </div>
      <hr>
      <footer class="text-white text-center text-lg-start bg-dark">
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2024 Copyright:
      <a class="text-white" href="https://mdbootstrap.com/" style="text-decoration: none !important;">doDone.com</a>
    </div>
</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/2.0.3/js/dataTables.min.js"></script>
    <script>
      let table = new DataTable('#myTable');
    </script>
    <script>
      let edit=document.getElementsByClassName("edit");
      Array.from(edit).forEach((element)=>{
        element.addEventListener("click",(e)=>{
           tr=e.target.parentNode.parentNode.parentNode;
           title=tr.getElementsByTagName('td')[0].innerText;
           description=tr.getElementsByTagName('td')[1].innerText;
          //  console.log(title,description);
           titleedit.value=title;
           descriptionedit.value=description;
           snoedit.value=e.target.id;
          //  console.log(e.target.id);
           $('#editmodal').modal('toggle');
        });
      });
      let deletes = document.getElementsByClassName("delete");
  Array.from(deletes).forEach((element) => {
    element.addEventListener("click", (e) => {
      let sno = e.target.id.substr(3);
      if (confirm("Are you sure you want to delete this task?")) {
        let deleteForm = document.createElement("form");
        deleteForm.method = "POST";
        deleteForm.action = "/php projects/dodone project/index.php";
        let snoInput = document.createElement("input");
        snoInput.type = "hidden";
        snoInput.name = "delete";
        snoInput.value = sno;
        deleteForm.appendChild(snoInput);
        document.body.appendChild(deleteForm);
        deleteForm.submit();
      }
    });
  });
    </script>
  </body>
</html>