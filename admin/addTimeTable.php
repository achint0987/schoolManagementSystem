<?php
  session_start();
  include '../connection/dbCon.php';
  include '../functions/function.php';

  if(isset($_SESSION['Email'])){

      include '../includes/head.php';
    ?>


      <?php include 'HomeHeader.php'; ?>

      <?php include 'HomeSidebar.php';?>

      <ol class="breadcrumb ">
            <li><a href="Home.php"><i class="fa fa-dashboard active"></i> Home</a></li>
            <li><a href="RegisterContent.php"><i class="fa fa-dashboard"></i> Student Registration</a></li>
      </ol>

      <div clas='container'>
        <div class="row well">
          <form class="form-horizontal" method="post"  enctype="multipart/form-data">
        <div class ="form-group">
          <label for="inputPassword" class="control-label col-xs-2">Time Table</label>
                        <div class="col-xs-8">
                            <input type="file" name="table"  id="inputPassword"  required>
                        </div>
        </div>
        <div class ="form-group">
          <label for="inputPassword" class="control-label col-xs-2">Semester</label>
                        <div class="col-xs-8">
                            <input type="text" name="semester" class="form-control" id="inputPassword" placeholder="semester" required>
                        </div>
               </div>
        <div class="col-xs-offset-2 col-xs-8">
                            <button type="submit" class="btn btn-primary btn-flat btn-block" name='btn'>Add</button>
                        </div>
        
      </form>
        </div>
      </div>

       </section>
      </div>

      <?php 
        if(isset($_POST['btn'])){
          $target=   "../pdf/".basename($_FILES['table']['name']);
          $file = $_FILES['table']['name'];
          $semester = $_POST['semester'];
          $query = "insert into timetable values('$semester', '$file')";
          $runQuery = mysql_query($query);
          if($runQuery){
            if(move_uploaded_file($_FILES['table']['tmp_name'], $target)){
              echo "<script>alert('Successful')</script>";
               echo "<script>window.location.href = 'addTimeTable.php';</script>";
            }
          } 
        }

      ?>

      <?php include'HomeBottom.php'; ?>

<?php }else echo "Connection failed"?>

    