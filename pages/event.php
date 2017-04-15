<?php
  session_start();
  include '../connection/dbCon.php';
  include '../functions/function.php';

  if(isset($_SESSION['rollno'])){

      include '../includes/head.php';
    ?>


      <?php include '../includes/HomeHeader.php'; ?>

      <?php include '../includes/HomeSidebar.php';?>

       <ol class="breadcrumb ">
              <li><a href="Home.php"><i class="glyphicon glyphicon-home "></i> Home</a></li>
              <li><a href="event.php"><i class="glyphicon glyphicon-user active"></i> Event</a></li>
          </ol>

      <div class="container">
                <div class="row col-xs-12">
                  <div class="well">
                    <?php
                      $query = "select * from event order by id DESC";
                      $runQuery = mysql_query($query);
                      if(mysql_num_rows($runQuery) == 0){
                        echo "<center><h3>No Events Found</h3></center>";
                      }else{
                        while($row = mysql_fetch_array($runQuery)){
                         $id = $row['id'];
                         $date = $row['date'];
                         echo "
                            <button type='button'class='btn btn-info btn-flat btn-block' data-toggle='collapse' data-target='#$id'><span style='font-sie: 20px'> EVENT:".$row['eventname']."</span></button>
                            <div id='$id' class='collapse'>
                              <span style='font-size: 20px; font-family: Arial'>".$row['eventdesc']."
                            </span></div> <strong> Created At: </strong>".$date;
                        }
                    }

                    ?>
                  </div>
                </div>
      </div>
       </section>
      </div>

      <?php include'../includes/HomeBottom.php'; ?>



<?php }else echo "Connection failed"?>
