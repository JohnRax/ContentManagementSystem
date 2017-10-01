
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            ADD NEW POST                           
        </h1>                           
    </div>
</div>

<div class="col-xs-8">

<?php 
    if(isset($_POST['submit']))
    {
        
        $post_category_id=$_POST['post_category_id'];
        $post_title=$_POST['post_title'];
        $post_author=$_POST['post_author'];
        $post_content=$_POST['post_content'];  
        $post_tags=$_POST['post_tags'];
        $post_date=date('d-m-y');
        $post_image=$_FILES['post_image']['name'];
        $post_imagetemp=$_FILES['post_image']['tmp_name'];
        move_uploaded_file($post_imagetemp, "../images/{$post_image}");
          
           $post_query="INSERT INTO post(post_category_id,post_title,post_author,post_date,post_image,post_content,post_tags) values('$post_category_id','$post_title','$post_author',' $post_date','$post_image','$post_content',' $post_tags')";
           $post_result=mysqli_query($connection,$post_query);
           if(!$post_result)
           {
                die("Something went wrong....".mysqli_error($connection));
           }

            echo "<div class='alert alert-success'>";
            echo "<label><strong>Success!</strong> Add New Post Complete</label><br>";
            echo "</div>";                        
     
    }
 ?>                
        <form action="" method="post" enctype="multipart/form-data">
         <div class="form-group">
            <label for="post_title">Title</label>
            <input name="post_title" type="text" class="form-control"></input>
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

                    
                      echo "<option value=$category_id>$category_title</option>";
                   
                }
            ?>
            </select>
          </div>  
          <div class="form-group">
            <label for="post_author">Author</label>
            <input name="post_author" type="text" class="form-control"></input>
          </div>  

          <div class="form-group">
            <label for="post_image">Image</label>
            <input name="post_image" type="file" class="form-control"></input>
          </div>  
          <div class="form-group">
            <label for="post_tags">Tags</label>
            <input name="post_tags" type="text" class="form-control"></input>
          </div> 

           <div class="form-group">
            <label for="post_content">Content</label>
            <textarea name="post_content" class="form-control" id="" cols="60" rows="16"></textarea>
          </div>  

           <div class="form-group">
            <input name="submit" type="submit" class="btn btn-primary"></input>
          </div> 

    </form>
</div>



