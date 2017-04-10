
      <aside class="main-sidebar">
        <section class="sidebar">
          <div class="user-panel">
            <div class="pull-left image">
              <img src=<?php echo findPic($_SESSION['rollno']); ?> class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo findUser($_SESSION['rollno']); ?></p>
            </div>
          </div>


          <?php include '../includes/userSearch.php'; ?>


          <ul class="sidebar-menu">
            <li class="active treeview">
              <a href="Home.php">
                <i class="glyphicon glyphicon-home"></i> <span>Home</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li> 

            <li class="treeview">
              <a href="profile.php">
                <i class="glyphicon glyphicon-user"></i> <span>Profile</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-pie-chart"></i><span>Grades</span><i class="fa fa-angle-left pull-right"></i>
              </a>
             </li>
            <li class="treeview">
              <a href="subject.php">
                <i class="fa fa-laptop"></i><span>Subject</span><i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Attendance</span><i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-table"></i> <span>Student</span><i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>
            <li>
              <a href="pages/calendar.html">
                <i class="fa fa-calendar"></i> <span>Exam</span><i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>
            <li>
              <a href="pages/mailbox/mailbox.html">
                <i class="fa fa-envelope"></i> <span>Payments</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-share"></i> <span>Students Attendance</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>
          </ul>
        </section>
    
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <center>
            <h1 class="headerFont">
              PDPM IIITDM 
              <small></small>
            </h1>
          </center>
        </section>

        
     



