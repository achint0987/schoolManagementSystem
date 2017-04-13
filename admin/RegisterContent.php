    <ol class="breadcrumb ">
            <li><a href="Home.php"><i class="fa fa-dashboard active"></i> Home</a></li>
            <li><a href="RegisterContent.php"><i class="fa fa-dashboard"></i> Student Registration</a></li>
        </ol>

        <div class="container">
            <div class="well">
                <form class="form-horizontal" method="post" action="../pages/registrationValidation.php" enctype="multipart/form-data">
                    
                    <div class="form-group">
                        <label for="inputPassword" class="control-label col-xs-2">Firstname</label>
                        <div class="col-xs-4">
                            <input type="text" name="firstName" class="form-control" id="inputPassword" placeholder="Firstname" required="required">
                        </div>
                        
                        <label for="inputPassword" class="control-label col-xs-2">Lastname</label>
                        <div class="col-xs-4">
                            <input type="text" name="lastName" class="form-control" id="inputPassword" placeholder="Lastname" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail" class="control-label col-xs-2">Email</label>
                        <div class="col-xs-4">
                            <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email" required="required">
                        </div>
                        <label for="inputPassword" class="control-label col-xs-2">Password</label>
                        <div class="col-xs-4">
                            <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="control-label col-xs-2">Rollno</label>
                        <div class="col-xs-4">
                            <input type="text" name="rollNo" class="form-control" id="inputPassword" placeholder="Rollno" required="required">
                        </div>
                        <label for="inputPassword" class="control-label col-xs-2">Branch</label>
                        <div class="col-xs-4">
                            <select name="branch" class="form-control" required="required">
                                <option>Branch</option>
                                <?php   
                                        
                                        $runQuery = getBranchDetails();

                                        while ($row = mysql_fetch_array($runQuery)) {
                                            echo "<option value=".$row['branchCode'].">".$row['branchName']."</option>";
                                        }

                                 ?>
                            </select>
                        </div>
                                            
                    </div>
                    <div class="form-group">
                        <label for="inputEmail" class="control-label col-xs-2">Year of Joining</label>
                        <div class="col-xs-4">
                            <input type="text" name="DOJ" class="form-control" id="inputEmail" placeholder="Year Of Joining" required="required">
                        </div>
                        <label for="inputEmail" class="control-label col-xs-2">Phone</label>
                        <div class="col-xs-4">
                            <input type="text" name="contact" class="form-control" id="inputEmail" placeholder="Phone" required="required">
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <label for="inputEmail"  class="control-label col-xs-2">Address</label>
                        <div class="col-xs-4">
                            <input type="text" name="address" class="form-control" id="inputEmail" placeholder="Address" required="required">
                        </div>
                        <label for="inputEmail" class="control-label col-xs-2">Semester</label>
                        <div class="col-xs-4">
                            <select name="semester" class="form-control" required="required">
                                <option value="1">I</option>
                                <option value="2">II</option>
                                <option value="3">III</option>
                                <option value="4">IV</option>
                                <option value="5">V</option>
                                <option value="6">VI</option>
                                <option value="7">VII</option>
                                <option value="8">VIII</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="control-label col-xs-2">Photo</label>
                        <div class="col-xs-4">
                            <input type="file"  name="image"id="inputPassword" placeholder="Phone">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-xs-offset-2 col-xs-10">
                            <button type="submit" class="btn btn-primary btn-flat btn-block">Register</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    
        </section><!-- /.content -->
      </div>

