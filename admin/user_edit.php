
<div class="row">
<div class="col-lg-12">
    <h1 class="page-header">
        EDIT USER INFORMATION
    </h1>  
    <div class="col-xs-8">
     <form action="" method="post" enctype="multipart/form-data">


      <?php 
      $user_id=$_GET['useredit'];

          if(isset($_POST['submit']))
          {

            $user_role=$_POST['user_role'];
            $user_firstname=$_POST['user_firstname'];
            $user_lastname=$_POST['user_lastname'];
            $user_email=$_POST['user_email']; 


             $user_image=$_FILES['user_image']['name'];
             $user_imagetemp=$_FILES['user_image']['tmp_name'];
             move_uploaded_file($user_imagetemp,"../images/{$user_image}");
            if(empty($user_image))
            {
                $checkimage_query="SELECT * FROM users WHERE user_id='$user_id'";
                $checkimage_result=mysqli_query($connection,$checkimage_query);
                while($row=mysqli_fetch_assoc($checkimage_result))
                {
                    $user_image=$row['user_image'];
                }
            }

            

            $updateuser_query="UPDATE users SET user_image='$user_image',user_role='$user_role',user_firstname='$user_firstname',user_lastname='$user_lastname',user_email='$user_email' WHERE user_id='$user_id'";
            $updateuser_result=mysqli_query($connection,$updateuser_query);
            if(!$updateuser_result)
            {
                 die("Something went wrong...".mysqli_error($connection));
            }
            else
            {
                  echo "<div class='alert alert-success'>";
                  echo "<label><strong>Success!</strong> Update User Complete</label><br>";
                  echo "</div>"; 
            }  
          }
          if(isset($_GET['useredit']))
          {    
            $edituser_query="SELECT * FROM users WHERE user_id='$user_id'";
            $edituser_result=mysqli_query($connection,$edituser_query);
            $row=mysqli_fetch_assoc($edituser_result);
            $user_role=$row['user_role'];
            $user_image=$row['user_image'];
            $user_firstname=$row['user_firstname'];
            $user_lastname=$row['user_lastname'];
            $user_email=$row['user_email'];
          }

       ?>
     	 <div class="form-group">
            <label for="image">Image</label><br>
            <img name='image' width='150' src="../images/<?php echo $user_image;?>">
            <input name="user_image" type="file" class="form-control"></input>
          </div> 

          <div class="form-group">
           	<label for="post_category">User Role</label>
           	<select name="user_role" class="form-control">                           
              <?php  
              echo $user_role;
                if($user_role=='administrator')
                {
                    echo "<option selected>Administrator</option>";
                    echo "<option>Editor</option>";
                }
                else
                {
                    echo "<option selected>Editor</option>";
                    echo "<option>Administrator</option>";
                }           		           		
              ?>
           	</select>
		  </div> 

     	 <div class="form-group">
            <label for="post_author">First Name</label>
            <input name="user_firstname" type="text" class="form-control" value="<?php echo $user_firstname; ?>"></input>
          </div>  
 		 <div class="form-group">
            <label for="post_author">Last Name</label>
            <input name="user_lastname" type="text" class="form-control" value="<?php echo $user_lastname; ?>"></input>
          </div>  
           <div class="form-group">
            <label for="post_author">Email</label>
            <input name="user_email" type="text" class="form-control" value="<?php echo $user_email; ?>"></input>
          </div>  
         
      	 <div class="form-group">
            <input name="submit" type="submit" class="btn btn-primary"></input>
          </div> 
     </form>
</div>
</div>
</div>
             


        
