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
              <li><a href="Home.php"><i class="glyphicon glyphicon-home "></i> Home</a></li>
              <li><a href="event.php"><i class="glyphicon glyphicon-user active"></i> Event</a></li>
          </ol>
          

              <div class="container">
                <div class="row col-xs-7">
                  <div class="well">
                    <center><h2><strong>Events</strong></h2><hr></center>
                    <?php
                      $query = "select * from event order by id DESC";
                      $runQuery = mysql_query($query);
                      if(mysql_num_rows($runQuery) == 0){
                        echo "<center><h3>No Events Found</h3></center>";
                      }else{
                        while($row = mysql_fetch_array($runQuery)){
                         $id = $row['id'];
                         $id2 = $id."x";
                         $date = $row['date'];
                         echo "
                            <button type='button'class='btn btn-info btn-flat btn-block' data-toggle='collapse' data-target='#$id'><span style='font-sie: 20px'> EVENT:".$row['eventname']."</span></button>
                            <div id='$id' class='collapse'>
                              <span style='font-size: 18px; color: blue; font-family: Arial'>".$row['eventdesc']."
                            </span><br>
                            
                            <button class='btn btn-danger btn-flat btn-xs' data-toggle='modal' data-target='#$id2'>UPDATE</button>
                              <div class='modal fade' id='$id2' role='dialog'>
                              <div class='modal-dialog'>
                                <div class='modal-content'>
                                  <div class='modal-header'>
                                    <h4 class='modal-title'>Edit Event</h4>
                                  </div>
                                  <div class='modal-body'>
                                    <p>
                                      <form method='post'>
                                      <div class='form-group'>
                                        <label for='email'>Event Name:</label>
                                        <input type='text' name='eventname' class='form-control' required='required'>
                                      </div>
                                      <div class='form-group'>
                                        <label for='pwd'>Event Description:</label>
                                        <textarea name='eventdesc' class='form-control' required='required'></textarea>
                                      </div>
                                        </p>
                                      </div>
                                      <input type='text' value='$id' name ='id' hidden>
                                  <div class='modal-footer'>
                                    <button type='submit' class='btn btn-danger' name='edit'>Update</button>
                                      <button type='button' class='btn btn-primary' data-dismiss='modal'>Close</button>
                                  </div>
                                  </form>
                                </div>
                                </div>
                                </div>
                              
                            <form method='get'>
                            <button class='btn btn-xs btn-danger btn-flat' name='delete' value='$id'>DELETE</button>
                            </div></form><strong>Created At:</strong> ".$date;
                        }
                    }

                    ?>

                    <?php
                      if(isset($_POST['edit'])){
                        $eventname = $_POST['eventname'];
                        $eventdesc = $_POST['eventdesc'];
                        $id = $_POST['id'];
                        $query = "UPDATE EVENT SET eventname = '$eventname', eventdesc = '$eventdesc' where id= '$id'";
                        if(mysql_query($query)){
                          echo "<script>alert('Successfull');</script>";
                          echo "<script>window.location.href= 'event.php';<script>";
                        }else{
                          echo "<script>alert('Problem In Editing..');</script>";
                          echo "<script>window.location.href= 'event.php';<script>";
                        }
                        
                      }
                      if(isset($_GET['delete'])){
                        $val = $_GET['delete'];
                        echo "<script>alert('You are going to delete this event...');</script>";
                        $query = "delete from event where id = $val";
                        if(mysql_query($query)){
                          echo "<script>alert('Successfully Deleted');</script>";
                          echo "<script>window.location.href = 'event.php';</script>";
                        }else{
                          echo "<script>alert('Some Error Occured');</script>";
                          echo "<script>window.location.href = 'event.php';</script>";
                        }
                      }

                    ?>
                  </div>
                </div>
                <div class="row col-xs-1">
                  
                </div>
                <div class="row col-xs-4">
                  <div class="well">
                    <center><h4 class="header"><button class='btn btn-primary btn-block btn-flat' disabled >Create An Event</button></h4></center><hr><hr>
                    <form method="post" class="form-horizontal">
                      <div class="form-group">
                        <div class="col-xs-12">
                            <input type="text" name="eventname" class="form-control" id="inputPassword" placeholder="Name Of Event" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <textarea name="eventdesc" class="form-control" id="inputPassword" placeholder="Description of Event" required="required"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <button class="btn btn-danger btn-flat btn-block" name='create'>Create</button>
                        </div>
                    </div>
                    </form>
                  </div>
                </div>
            </div>
          </div>

        </section>
      </div>
      <?php

        if(isset($_POST['create'])){
          $eventname = $_POST['eventname'];
          $eventdesc = $_POST['eventdesc'];
          $query = "insert into event(eventname, eventdesc) values('$eventname', '$eventdesc')";
          $runQuery = mysql_query($query);
          if($runQuery){
            echo "<script>alert('Event Created Successfully');</script>";
            echo "<script>window.location.href = 'event.php';</script>";
          }else{
            echo "<script>alert('Something Went Wrong');</script>";
          }
        }
      ?>
      <?php include'HomeBottom.php'; ?>

<?php }else echo "Connection failed"?>


