
<div class="row">
<div class="col-lg-12">
    <h1 class="page-header">
        ADD NEW USER
    </h1>

    <?php echo add_user(); ?>
    <div class="col-xs-8">
     <form action="" method="post" enctype="multipart/form-data">

     	 <div class="form-group">
            <label for="user_image">Image</label>
            <input name="user_image" type="file" class="form-control"></input>
          </div> 

          <div class="form-group">
           	<label for="user_role">User Role</label>
           	<select name="user_role" class="form-control">
           		<option>Administrator</option>
           		<option>Editor</option>
           	</select>
		  </div> 

     	 <div class="form-group">
            <label for="user_firstname">First Name</label>
            <input name="user_firstname" type="text" class="form-control"></input>
          </div>  
 		 <div class="form-group">
            <label for="user_lastname">Last Name</label>
            <input name="user_lastname" type="text" class="form-control"></input>
          </div>  
           <div class="form-group">
            <label for="user_email">Email</label>
            <input name="user_email" type="text" class="form-control"></input>
          </div>  
           <div class="form-group">
            <label for="user_username">Username</label>
            <input name="user_username" type="text" class="form-control"></input>
          </div>  
           <div class="form-group">
            <label for="user_password">Password</label>
            <input name="user_password" type="password" class="form-control"></input>
          </div>  
      	 <div class="form-group">
            <input name="submit" type="submit" class="btn btn-primary"></input>
          </div> 
     </form>
</div>
</div>
</div>
             


        
