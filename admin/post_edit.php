
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            EDIT/UPDATE POST                           
        </h1>                           
    </div>
</div>
<?php 

    if(isset($_POST['update_post']))
    {
        $post_id=$_GET['postedit']; 
        $post_title=$_POST['post_title']; 
        $post_author=$_POST['post_author'];
        $post_category=$_POST['post_category_id'];
        $post_image=$_FILES['post_image']['name'];
        $post_imagetemp=$_FILES['post_image']['tmp_name'];   
        $post_tags=$_POST['post_tags'];
        $post_content=$_POST['post_content'];
        move_uploaded_file($post_imagetemp, "../images/{$post_image}");
        if(empty($post_image))
        {
            $checkimage_query="SELECT * FROM post where post_id='$post_id'";
            $checkimage_result=mysqli_query($connection,$checkimage_query);
            while ($row=mysqli_fetch_assoc($checkimage_result)) 
            {
              $post_image=$row['post_image'];
            }
        }

        $update_query="UPDATE post SET post_date=now(),post_category_id='$post_category', post_title='$post_title', post_author='$post_author', post_image='$post_image', post_tags='$post_tags', post_content='$post_content' WHERE post_id='$post_id'";
        $update_result=mysqli_query($connection,$update_query);
        if(!$update_result)
        {
           die("Something went wrong...".mysqli_error($connection));
        }

        echo "<div class='alert alert-success'>";
        echo "<label><strong>Success!</strong> Update Post Complete</label><br>";
        echo "</div>";     

    }

    if(isset($_GET['postedit']))
    {
        $post_id=$_GET['postedit'];
        $post_query="SELECT * FROM post WHERE post_id='$post_id'";
        $post_result=mysqli_query($connection,$post_query);
        $row=mysqli_fetch_assoc($post_result);
        $post_title=$row['post_title']; 
        $post_author=$row['post_author'];
        $post_category=$row['post_category_id'];
        $post_image=$row['post_image'];
        $post_tags=$row['post_tags'];
        $post_content=$row['post_content'];

 ?>
<div class="col-xs-12">
            
        <form action="" method="post" enctype="multipart/form-data">
         <div class="form-group">
            <label for="post_title">Title</label>
            <input name="post_title" type="text" class="form-control" value='<?php echo $post_title; ?>'></input>
         </div>  
         <div class="form-group">
            <label for="post_category">Category</label>
            <select  name="post_category_id" class="form-control">
            <?php 

                $category_query="SELECT * FROM category";
                $category_result=mysqli_query($connection,$category_query);
                if(!$category_result)
                 {
                     die("Something Went Wrong.....");
                 }

                while($row=mysqli_fetch_assoc($category_result))
                {
                    $category_id=$row['Category_ID'];
                    $category_title=$row['Category_Title'];

                    if($category_id!=$post_category)
                    {
                      echo "<option value=$category_id>$category_title</option>";
                    }
                    else
                    {
                      echo "<option value=$category_id selected>$category_title</option>";
                    }
                }
            ?>
            </select>
          </div>  
          <div class="form-group">
            <label for="post_author">Author</label>
            <input name="post_author" type="text" class="form-control" value='<?php echo $post_author; ?>'></input>
          </div>  

                         
          <div class="form-group">
            <label for="image">Image</label><br>
            <img name='image' width='150' src="../images/<?php echo $post_image;?>">
            <input name="post_image" type="file" class="form-control" ></input>
          </div>  

          <div class="form-group">
            <label for="post_tags">Tags</label>
            <input name="post_tags" type="text" class="form-control" value='<?php echo $post_tags; ?>'></input>
          </div> 

           <div class="form-group">
            <label for="post_content">Content</label>
            <textarea name="post_content" class="form-control"  cols="60" rows="16"><?php echo $post_content; ?>
            </textarea>
          </div>  

            <div class="form-group">
            <input name="update_post" type="submit" class="btn btn-primary" value="Update Post"></input>
          </div> 

    </form>
</div>
<?php } ?>
<!-- /.row -->

