<?php
  session_start();
  include '../connection/dbCon.php';
  include '../functions/function.php';

  if(isset($_SESSION['Email'])){

      include '../includes/head.php';
    ?>


      <?php include '../includes/HomeHeader.php'; ?>

      <?php include '../includes/HomeSidebar.php';?>

      <?php $roll = $_GET['id']?>

        <ol class="breadcrumb ">
            <li><a href="Home.php"><i class="fa fa-dashboard active"></i> Home</a></li>
            <li><a href="students.php"><i class="fa fa-dashboard"></i> Students</a></li>
        </ol>
          <div class="container">
           <div class="row well">
              <div class="col-sm-4">
                <img class="imageStyle" src=<?php echo findPic($roll);?>  alt="User Image">
              </div>
              <div class="col-sm-8" id=" tableStyle">
                <table class="table">
                    <tbody>
                     <tr class="success">
                        <th>NAME</th>
                        <td>:</td>
                        <td><span class="subName"><?php echo getName($roll); ?></td>
                    </tr>
                      <tr class="danger">
                        <th>ROLL NO.</th>
                        <td>:</td>
                        <td><span class="subName"><?php echo $roll; ?></span></td>
                      </tr>
                      <tr class="info">
                        <th>EMAIL</th>
                        <td>:</td>
                        <td><span class="subName"><?php echo getEmail($roll); ?></span></td>
                      </tr>
                      <tr class="warning">
                        <th>BRANCH</th>
                        <td>:</td>
                        <td><span class="subName"><?php echo getBranch($roll); ?></span></td>
                      </tr>
                      <tr class="active">
                        <th>BATCH</th>
                        <td>:</td>
                        <td><span class="subName"><?php echo getBatch($roll); ?></span></td>
                      </tr>
                      <tr class="success">
                        <th>CONTACT</th>
                        <td>:</td>
                        <td><span class="subName"><?php echo getContact($roll); ?></td>
                      </tr>
                      <tr class="danger">
                        <th>ADDRESS</th>
                        <td>:</td>
                        <td><span class="subName"><?php echo getAddress($roll); ?></span></td>
                      </tr>
                    </tbody>
                  </table>
                    </div>
                    
                 </div>
              </div>
              </div>
              </div>
              </div>
              </div>
        
         </section>
      </div>
      
      <?php include'../includes/HomeBottom.php'; ?>

<?php }else echo "Connection failed"?>

    