		<ol class="breadcrumb ">
              <li><a href="Home.php"><i class="glyphicon glyphicon-home "></i> Home</a></li>
              <li><a href="Profile.php"><i class="glyphicon glyphicon-user active"></i> Profile</a></li>
          </ol>
          <!-- table to display user profile -->

         	<div class="container">
         		<form method="post" action="searchUser.php">
					<div class="form-group">
						<label for="email">Search User:</label>
						<input type="text" name="user1" class="form-control" required="required">
					</div>
				    <button style="display: block; width: 100%;" type="submit" class="btn btn-success" name="search">Search</button>
				</form>
         	</div><br>
         	<div class="container">
         		<?php
         			if(isset($_POST['user'])){
         				$value = findSearchedUser($_POST['user'], $_SESSION['rollno']);
         				
         				echo $value;
         			}

         		?>
         	</div>

        </section>
      </div>

