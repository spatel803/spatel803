 <?php
  $connection=new mysqli("localhost","root","","movies");
  if($connection->connect_errno)
  {
    echo $connection->connect_error;
    exit;
  } 
  $user_id="";
  $name="";
  $actor="";
  $actress="";
  $director="";
  $year="";

  if(isset($_GET['uid']))
  {
    $user_id=$_GET['uid'];


  $qry="SELECT * FROM movies where id=".$user_id;
  $result=$connection->query($qry);

      while($total=$result->fetch_assoc())
      {
        $name=$total['name'];
        $actor=$total['actor'];   
        $actress=$total['actress']; 
        $director=$total['director']; 
        $year=$total['year']; 
    }

  }
  
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width,initial-scale=1" charset="utf-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <title>CRUD Operations</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">CRUD Operations</a>
    </nav>

    <div class="container">
      <div class="row">
        <div class="col-lg-12">
            <div class="container"><h1 class="text-center text-primary"><B>Registration</B></h1></div>
              <div class="col-lg-8 mx-auto d-block">
                <form action="<?php
                    if($user_id)
                    {
                        echo 'manage.php?edit_id='.$user_id;
                      }
                      else
                      {
                        echo 'manage.php';
                      }
                ?>" 
                method="POST">
                  <div class="form-group">
                    <label for="user">Name</label>
                    <input type="text" name="name" id="name" class="form-control" autocomplete="off" value="<?=$name?>"> 
                  </div>

                  <div class="form-group">
                    <label for="actor">Actor</label>
                    <input type="text" name="actor" id="actor" class="form-control" autocomplete="off" value="<?=$actor?>">
                  </div>

                   <div class="form-group">
                    <label for="actress">Actress</label>
                    <input type="text" name="actress" id="actress" class="form-control" autocomplete="off" value="<?=$actress?>">
                  </div>

                   <div class="form-group">
                    <label for="director">Director</label>
                    <input type="text" name="director" id="director" class="form-control" autocomplete="off" value="<?=$director?>">
                  </div>

                   <div class="form-group">
                    <label for="year">Year</label>
                    <input type="text" name="year" id="year" class="form-control" autocomplete="off" value="<?=$year?>">
                  </div>

                    </fieldset>

                  <br> 
                  <center>
                      <?php 
                        if(!$user_id)
                        {
                          echo '<button class="btn btn-outline-dark" id="submit_button">Submit</button>';
                        }
                          else
                          {
                            echo '<button class="btn btn-outline-dark" id="update_button">Update</button>';
                           }
                          ?>
                  </center><br><br>
                </form>
              </div>
        </div>
      </div>
    </div>
</body>
</html>