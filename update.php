<!DOCTYPE html>
<?php  include "db.php";


$id = (int)$_GET['id'];
$sql = "select * from tasks where id = '$id'";
$rows = $db -> query($sql);

$row = $rows -> fetch_assoc();
if (isset($_POST['send'])){

$task = htmlspecialchars($_POST['task']) ;

$sql =  "update tasks set name='$task' where id = '$id'";

$db -> query($sql);

header('location: index.php');
}
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

      <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TO DO LIST</title>

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Staatliches&family=Roboto+Condensed&display=swap" rel="stylesheet">

      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>  body{background-color:#dae1e7;font-family: 'Roboto Condensed', sans-serif;} h1{font-family: 'Staatliches', cursive;font-weight: 600;font-size: 6rem;} </style>
  </head>
  <body>
 <div class="container">
   <h1 class="text-center">✔️To Do List</h1>
<div class="row" style="margin-top:1rem;">
  <div class="col-lg-12">

       <hr /><br>
       <div class="col-md-12 text-center">
         <form action="search.php" method="post" class="form-inline justify-content-center">
           <input type="text" placeholder="Search" name="search" class="form-control"> &nbsp;
           <button type="search" class="btn btn-success">Search</button>
         </form>
       </div>
       <br>
        <form method="post" >
          <div class="form-group">
            <label for=""><h4>Task Name</h4></label>
            <input type="text" required  name="task" value="<?php echo $row['name'];?>"class="form-control">
          </div>
          <input type="submit" name="send" value="Update Task" class="btn btn-lg  btn-success" />
          &nbsp;<a href="index.php" class="btn btn-lg btn-dark">Cancel</a>
        </form>
  </div>
</div>
</div>
</body>
</html>
