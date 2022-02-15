<?php

  $connection=new mysqli("localhost","root","","movies");
  if($connection->connect_errno)
  {
    echo $connection->connect_error;
    exit;
  }  
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width,initial-scale=1" charset="utf-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function(){
      $(".deleteuser").click(function(){
        return confirm("Do you want to Delete this data ?");      
      });
    });
  </script>
  <title>CRUD Operation</title>

</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">CRUD Operations</a>
    </nav>

    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-sm-12">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th scope="col">No.</th>
                <th scope="col">Movie Name</th>
                <th scope="col">Actor</th>
                <th scope="col">Actress</th>
                <th scope="col">Director</th>
                <th scope="col">Year</th>
              </tr>
            </thead>
            <tbody>
            <?php 
            $qry="SELECT * FROM movies";
            $result=$connection->query($qry);
            while($total=$result->fetch_assoc())
            {
            ?>
              <tr>
                <td><?=$total['id']?></td>
                <td><?=$total['name']?></td>
                <td><?=$total['actor']?></td>
                <td><?=$total['actress']?></td>
                <td><?=$total['director']?></td>
                <td><?=$total['year']?></td>
                <td>
                  <a href="insert.php?uid=<?=$total['id']?>" 
                  class="btn btn-warning edituser">Edit</a>
                  
                  <a href="manage.php?id=<?=$total['id']?>" 
                  class="btn btn-danger Deleteuser"
                  onclick="return confirm('Do you want to delete ?')"
                  >Delete</a>
                </td>
              </tr>
            <?php
              }
            ?>            
            </tbody>
        </table>
        <center><a href="insert.php"><button class="btn btn-success">Add Record</button></a></center>
        </div> 
      </div>
    </div>
</body>
</html>