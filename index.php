<!DOCTYPE html>
<?php  include "db.php";
$page = (isset($_GET['page']) ? $_GET['page'] : 1);
$perPage = (isset($_GET['per-page']) &&  $_GET['per-page'] <= 50 ? $_GET['per-page'] : 5);
(int)$start = ((int)$page > 1) ? ((int)$page * (int)$perPage) - (int)$perPage : 0;
$sql = "select * from tasks limit ".$start.", ".$perPage."";
$total = $db -> query("select * from tasks") -> num_rows;
$pages = ceil($total / $perPage);
$rows = $db -> query($sql);
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
       <button type="button" class="btn btn-lg  btn-success" data-target="#myModal" data-toggle="modal">Add Task</button>
       <button type="button" class="btn btn-lg  btn-dark" onclick="print()" style="float:right;" >Print</button>
       <hr /><br>
       <div class="col-md-12 text-center">
         <form action="search.php" method="post" class="form-inline justify-content-center">
           <input type="text" placeholder="Search" name="search" class="form-control"> &nbsp;
           <button type="search" class="btn btn-success">Search</button>
         </form>
       </div>
<br>
<table class="table table-dark table-hover">
<!-- Modal -->
<div id="myModal" class="modal fade"  role="dialog">

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title">Add Task</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
         </button>
      </div>
      <div class="modal-body">
        <form method="post" action="add.php">
          <div class="form-group">
            <label for="">Task Name</label>
            <input type="text" required  name="task" class="form-control">
          </div>
          <input type="submit" name="send" value="Add Task" class="btn btn-lg  btn-success" />
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-lg btn-dark" data-dismiss="modal">Close</button>

      </div>
    </div>

</div>
</div>

    <thead>

    <tr>
      <th>ID</th>
      <th>Task</th>

    </tr>
    </thead>
    <tbody>
      <?php while($row = $rows->fetch_assoc()): ?>
    <tr>
      <th><?php echo $row['id'] ?></th>
      <td class="col-md-10"><?php echo $row['name'] ?></td>
    <td><a href="update.php?id=<?php echo $row['id']?>" class="btn btn-success"  >Edit</a></td>
    <td><a href="delete.php?id=<?php echo $row['id']?>" class="btn btn-danger"  >Delete</a></td>
    </tr>
        <?php endwhile; ?>
    </tbody>
    </table>



  <div class="container">
    <ul class="pagination justify-content-center">
      <?php for($i =1; $i <= $pages ; $i++):?>
    <li class="page-item "><a class="page-link" href="?page=<?php echo $i;?> &per-page =<?php echo $perPage;?>"><?php echo $i; ?></a></li>
    <?php endfor; ?>
    </ul>
</div>

  </div>

</div>


   </div>

  </body>
</html>
